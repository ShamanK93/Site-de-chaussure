<?php
include_once "fonctions.php";

if (isset($_POST['ajouter'])) {
    $produit = [
        'titre' => $_POST['titre'],
        'description' => $_POST['description'],
        'prix' => $_POST['prix'],
        'categorie' => $_POST['categorie']
    ];
    ajouterProduit($mysqlclient, $produit);
    header("Location: produits.php");
}

$produits = getProduits($mysqlclient);
$categories = getCategories($mysqlclient);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Produits</title>
    <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
    <h1>Gestion des Produits</h1>
    <form method="POST" action="produits.php">
        <label>Titre :</label>
        <input type="text" name="titre" required>
        <label>Description :</label>
        <textarea name="description" required></textarea>
        <label>Prix :</label>
        <input type="number" name="prix" required>
        <label>Catégorie :</label>
        <select name="categorie" required>
            <?php foreach ($categories as $categorie): ?>
                <option value="<?= $categorie['id'] ?>"><?= $categorie['titre'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" name="ajouter">Ajouter</button>
    </form>

    <h2>Liste des Produits</h2>
    <ul>
        <?php foreach ($produits as $produit): ?>
            <li><?= $produit['titre'] ?> - <?= $produit['prix'] ?> €
                <a href="supprimer.php?type=produit&id=<?= $produit['id'] ?>">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
