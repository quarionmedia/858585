<?php
// English: File created at: app/Models/PageModel.php

namespace App\Models;

use PDO;
use PDOException;

// PageModel extends BaseModel to inherit the stable database connection.
class PageModel extends BaseModel
{
    /**
     * Finds all custom pages from the database.
     *
     * @return array An array of all custom pages.
     */
    public function findAll()
    {
        try {
            $stmt = $this->pdo->query("SELECT * FROM custom_pages ORDER BY title ASC");
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     * Finds a single custom page by its ID.
     *
     * @param int $id The ID of the page.
     * @return array|null The page data or null if not found.
     */
    public function findById($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM custom_pages WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            return null;
        }
    }

    /**
     * Finds a single active custom page by its slug for the front-end view.
     *
     * @param string $slug The URL-friendly slug of the page.
     * @return array|null The page data or null if not found or not active.
     */
    public function findBySlug($slug)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM custom_pages WHERE slug = ? AND is_active = 1");
            $stmt->execute([$slug]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            return null;
        }
    }

    /**
     * Creates a new custom page.
     *
     * @param array $data An associative array containing 'title', 'slug', and 'content'.
     * @return int|false The ID of the newly created page, or false on failure.
     */
    public function create($data)
    {
        try {
            $stmt = $this->pdo->prepare(
                "INSERT INTO custom_pages (title, slug, content, is_active) VALUES (?, ?, ?, ?)"
            );
            $success = $stmt->execute([
                $data['title'],
                $data['slug'],
                $data['content'],
                $data['is_active'] ?? 1
            ]);
            return $success ? $this->pdo->lastInsertId() : false;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Updates an existing custom page.
     *
     * @param int   $id   The ID of the page to update.
     * @param array $data An associative array containing 'title', 'slug', 'content', and 'is_active'.
     * @return bool True on success, false on failure.
     */
    public function update($id, $data)
    {
        try {
            $stmt = $this->pdo->prepare(
                "UPDATE custom_pages SET title = ?, slug = ?, content = ?, is_active = ? WHERE id = ?"
            );
            return $stmt->execute([
                $data['title'],
                $data['slug'],
                $data['content'],
                $data['is_active'] ?? 1,
                $id
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Deletes a custom page by its ID.
     *
     * @param int $id The ID of the page to delete.
     * @return bool True on success, false on failure.
     */
    public function deleteById($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM custom_pages WHERE id = ?");
            return $stmt->execute([$id]);
        } catch (PDOException $e) {
            return false;
        }
    }
}