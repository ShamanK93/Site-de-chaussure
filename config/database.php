<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=b2dev2;charset=utf8', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>
