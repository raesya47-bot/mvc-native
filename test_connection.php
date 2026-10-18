<?php

require_once __DIR__ . '/config/database.php';

try {
    $pdo = (new Database())->connect();
    echo "Koneksi PDO berhasil";
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}

?>