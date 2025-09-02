<?php
// English: File updated at: app/Services/MailService.php

namespace App\Services;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\EmailTemplateModel;
use App\Models\UserModel;
use App\Models\ProfileModel;
use App\Models\ReportModel;
// Add other models here as you activate more shortcodes

class MailService 
{
    private $mailer;

    public function __construct() 
    {
        $this->mailer = new PHPMailer(true);
        $this->configureSmtp();
    }

    /**
     * Configures PHPMailer with SMTP settings from the database.
     */
    private function configureSmtp() 
    {
        try {
            $this->mailer->isSMTP();
            $this->mailer->Host       = setting('smtp_host', 'localhost');
            $this->mailer->SMTPAuth   = true;
            $this->mailer->Username   = setting('smtp_user', '');
            $this->mailer->Password   = setting('smtp_pass', '');
            $this->mailer->SMTPSecure = setting('smtp_secure', PHPMailer::ENCRYPTION_STARTTLS);
            $this->mailer->Port       = setting('smtp_port', 587);
            $this->mailer->setFrom(setting('site_email', 'noreply@example.com'), setting('site_name', 'Your Site'));
            $this->mailer->isHTML(true);
        } catch (Exception $e) {
            // In a real application, this should be logged.
        }
    }

    /**
     * The main function to send an email based on a template name.
     * It gathers all necessary data and replaces shortcodes automatically.
     *
     * @param string $templateName The name of the template (e.g., 'report_resolved').
     * @param string $recipientEmail The email address of the recipient.
     * @param array  $context An array of IDs and dynamic data (e.g., ['user_id' => 1, 'verification_code' => '123456']).
     * @return bool True on success, false on failure.
     */
    public function sendTemplateEmail($templateName, $recipientEmail, $context = [])
    {
        $templateModel = new EmailTemplateModel();
        $template = $templateModel->getTemplateByName($templateName);

        if (!$template) {
            return false; // Template not found
        }

        // 1. Gather all data that can be fetched from the database based on IDs in the context.
        $dbData = $this->gatherDataForContext($context);

        // 2. Merge the dynamically provided context (like the verification code)
        //    with the data fetched from the database. This is the crucial fix.
        $fullData = array_merge($dbData, $context);

        // 3. Replace shortcodes in subject and body using the complete data set.
        $subject = $this->replaceShortcodes($template['subject'], $fullData);
        $body = $this->replaceShortcodes($template['body'], $fullData);

        // 4. Send the email.
        $recipientName = $fullData['user']['username'] ?? $fullData['profile']['name'] ?? 'User';
        return $this->send($recipientEmail, $recipientName, $subject, $body);
    }

    /**
     * Gathers all necessary data from different models based on the provided context of IDs.
     *
     * @param array $context An array of IDs.
     * @return array A comprehensive array of data for shortcode replacement.
     */
    private function gatherDataForContext($context)
    {
        $data = [
            'site' => [], 'user' => [], 'profile' => [], 'report' => [],
            // Add other data keys as needed: 'comment', 'content', etc.
        ];

        // --- GATHER SITE DATA ---
        $data['site']['name'] = setting('site_name', 'Your Site');
        $data['site']['url'] = 'http://' . $_SERVER['HTTP_HOST'];
        $data['site']['email'] = setting('site_email', 'noreply@example.com');

        // --- GATHER USER & PROFILE DATA ---
        if (!empty($context['user_id'])) {
            $userModel = new UserModel();
            $data['user'] = $userModel->findById($context['user_id']);
        }
        if (!empty($context['profile_id'])) {
            $profileModel = new ProfileModel();
            $data['profile'] = $profileModel->findById($context['profile_id'], $context['user_id'] ?? null);
        }

        // --- GATHER REPORT DATA ---
        if (!empty($context['report_id'])) {
            $reportModel = new ReportModel();
            $data['report'] = $reportModel->findReportDetailsById($context['report_id']);
        }

        // --- GATHER OTHER DATA (add more as you activate features) ---
        // if (!empty($context['comment_id'])) { ... }
        // if (!empty($context['content_id'])) { ... }

        return $data;
    }

    /**
     * Replaces all available shortcodes in a string with their corresponding data.
     *
     * @param string $string The template string (subject or body).
     * @param array  $data The array of gathered data.
     * @return string The processed string.
     */
    private function replaceShortcodes($string, $data)
    {
        // This is where all the magic happens.
        $replacements = [
            // Site Info
            '{{site_name}}' => $data['site']['name'] ?? '',
            '{{site_url}}' => $data['site']['url'] ?? '',
            '{{site_email}}' => $data['site']['email'] ?? '',
            '{{current_year}}' => date('Y'),

            // User & Profile Info
            '{{username}}' => $data['user']['username'] ?? '',
            '{{user_email}}' => $data['user']['email'] ?? '',
            '{{profile_name}}' => $data['profile']['name'] ?? ($data['user']['username'] ?? ''),

            // Report Info
            '{{report_id}}' => $data['report']['id'] ?? '',
            '{{content_title}}' => $data['report']['content_title'] ?? '',
            '{{reason}}' => $data['report']['reason'] ?? '',

            // --- NEW: Security Info Shortcodes
            '{{login_ip_address}}' => $data['login_ip_address'] ?? 'N/A',
            '{{login_user_agent}}' => $data['login_user_agent'] ?? 'N/A',
            '{{current_time}}' => date('Y-m-d H:i:s'),
            
            // --- THE FIX IS HERE ---
            // Dynamic values passed directly in the context.
            '{{verification_code}}' => $data['verification_code'] ?? '',
            '{{verification_link}}' => $data['site']['url'] . '/verify/' . ($data['verification_token'] ?? ''),
            '{{password_reset_link}}' => $data['site']['url'] . '/reset-password/' . ($data['reset_token'] ?? ''),
        ];

        return str_replace(array_keys($replacements), array_values($replacements), $string);
    }

    /**
     * The core send function that uses PHPMailer.
     */
    public function send($toEmail, $toName, $subject, $body) 
    {
        try {
            // Clear previous recipient addresses before sending a new email
            $this->mailer->clearAddresses();

            $this->mailer->addAddress($toEmail, $toName);
            $this->mailer->Subject = $subject;
            $this->mailer->Body    = $body;

            return $this->mailer->send();
        } catch (Exception $e) {
            // For debugging, you can uncomment the line below.
            // error_log("Message could not be sent. Mailer Error: {$this->mailer->ErrorInfo}");
            return false;
        }
    }
}

