<?php
// English: File created/updated at: app/Models/EmailTemplateModel.php

namespace App\Models;

// Import the required classes
use PDO;
use PDOException;

// The EmailTemplateModel now extends BaseModel to inherit the stable PDO connection.
class EmailTemplateModel extends BaseModel
{
    /**
     * Gets a single email template by its unique name.
     *
     * @param string $templateName The unique name of the template (e.g., 'report_resolved').
     * @return array|null The template data or null if not found.
     */
    public function getTemplateByName($templateName)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM email_templates WHERE template_name = ?");
            $stmt->execute([$templateName]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            // On error, return null to prevent crashes.
            return null;
        }
    }

    /**
     * Gets all email templates for the admin panel.
     * @return array An array of all templates.
     */
    public function getAllTemplates()
    {
        try {
            $stmt = $this->pdo->query("SELECT * FROM email_templates");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     * Updates multiple email templates at once.
     * @param array $templatesData An array of templates to update.
     * @return bool True on success, false on failure.
     */
    public function updateTemplates($templatesData)
    {
        $this->pdo->beginTransaction();
        try {
            $stmt = $this->pdo->prepare(
                "UPDATE email_templates SET subject = ?, body = ? WHERE id = ?"
            );
            foreach ($templatesData as $id => $data) {
                $stmt->execute([$data['subject'], $data['body'], $id]);
            }
            $this->pdo->commit();
            return true;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            return false;
        }
    }
}
