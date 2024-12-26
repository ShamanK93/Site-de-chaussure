<?php
try {
    $mysqlclient = new PDO(
        'mysql:host=localhost;dbname=chaussures;charset=utf8',
        'root', 
        '', 
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>
