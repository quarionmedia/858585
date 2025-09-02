<?php
// English: File created at: app/Models/BaseModel.php

namespace App\Models;

use PDO;
use PDOException;

/**
 * Base Model that handles the database connection for all other models.
 */
class BaseModel 
{
    /** @var PDO */
    protected $pdo;

    public function __construct() 
    {
        // This stable PDO connection will be inherited by all child models.
        $host = 'localhost';
        $dbname = 'muvixtvdb';
        $user = 'root';
        $password = '';
        $charset = 'utf8mb4';
        
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $user, $password, $options);
        } catch (PDOException $e) {
            // In a real application, this should be logged, not displayed.
            die("Database connection error: " . $e->getMessage());
        }
    }
}