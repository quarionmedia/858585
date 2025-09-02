<?php
// app/Models/RequestModel.php

namespace App\Models;

use PDO;
use PDOException;

class RequestModel extends BaseModel
{
    /**
     * Kullanıcının yaptığı yeni bir içeriği veritabanına ekler.
     * Bu versiyon, hatalı transaction (commit/rollback) mantığı olmadan,
     * daha basit ve stabil çalışacak şekilde düzeltilmiştir.
     */
    public function create($data)
    {
        try {
            // SQL sorgusu poster_path ve created_at sütunlarını içerir
            $sql = "INSERT INTO requests (user_id, profile_id, title, type, poster_path, status, created_at) 
                    VALUES (?, ?, ?, ?, ?, 'pending', NOW())";
            
            $stmt = $this->pdo->prepare($sql);
            
            return $stmt->execute([
                $data['user_id'],
                $data['profile_id'],
                $data['title'],
                $data['type'],
                $data['poster_path']
            ]);

        } catch (PDOException $e) {
            // Hata olursa, hatayı bir log dosyasına yazmak daha iyidir.
            // error_log("RequestModel Create Error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * E-posta gönderimi için, ID'si verilen bir isteğin tüm detaylarını
     * ve o isteği yapan kullanıcının e-posta/kullanıcı adı bilgilerini getirir.
     */
    public function getRequestWithUserDetails($requestId)
    {
        try {
            $sql = "SELECT r.*, u.email as user_email, u.username 
                    FROM requests r
                    JOIN users u ON r.user_id = u.id
                    WHERE r.id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$requestId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }

    // --- Mevcut Diğer Fonksiyonlarınız ---

    public function findByProfileId($profileId)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM requests WHERE profile_id = ? ORDER BY created_at DESC");
            $stmt->execute([$profileId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
    
    public function getAllRequestsWithUsers()
    {
        try {
            $sql = "SELECT r.*, u.username, p.name as profile_name 
                    FROM requests r
                    LEFT JOIN users u ON r.user_id = u.id
                    LEFT JOIN profiles p ON r.profile_id = p.id
                    ORDER BY r.created_at DESC";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function updateStatus($id, $status)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE requests SET status = ? WHERE id = ?");
            return $stmt->execute([$status, $id]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM requests WHERE id = ?");
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            return false;
        }
    }
}