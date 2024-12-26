<?php
include_once "fonctions.php";

// Récupérer les catégories
$categories = getCategories($mysqlclient);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Catégories</title>
    <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
    <h1>Gestion des Catégories</h1>
    <ul>
        <?php foreach ($categories as $categorie): ?>
            <li><?= $categorie['titre'] ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
