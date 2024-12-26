<?php
include 'fonctions.php'; 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $marque = $_POST['marque'];
    $taille = $_POST['taille'];
    $prix = $_POST['prix'];
    $categorie = $_POST['categorie'];
    $description = $_POST['description'];

    $stmt = $pdo->prepare("
        INSERT INTO chaussures (nom, marque, taille, prix, categorie_id, description)
        VALUES (:nom, :marque, :taille, :prix, :categorie, :description)
    ");
    $stmt->execute([
        'nom' => $nom,
        'marque' => $marque,
        'taille' => $taille,
        'prix' => $prix,
        'categorie' => $categorie,
        'description' => $description
    ]);

    header("Location: chaussures.php");
    exit;
}

$categories = $pdo->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);


$chaussures = $pdo->query("
    SELECT c.*, cat.titre AS categorie
    FROM chaussures c
    LEFT JOIN categories cat ON c.categorie_id = cat.id
")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Chaussures</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Gestion des Chaussures</h1>

    <form method="POST" action="chaussures.php">
        <label>Nom :</label>
        <input type="text" name="nom" required>

        <label>Marque :</label>
        <input type="text" name="marque" required>

        <label>Taille :</label>
        <input type="number" step="0.5" name="taille" required>

        <label>Prix :</label>
        <input type="number" step="0.01" name="prix" required>

        <label>Catégorie :</label>
        <select name="categorie" required>
            <?php foreach ($categories as $categorie): ?>
                <option value="<?= $categorie['id'] ?>"><?= $categorie['titre'] ?></option>
            <?php endforeach; ?>
        </select>

        <label>Description :</label>
        <textarea name="description" required></textarea>

        <button type="submit">Ajouter</button>
    </form>

    <h2>Liste des Chaussures</h2>
    <ul>
        <?php foreach ($chaussures as $chaussure): ?>
            <li>
                <?= htmlspecialchars($chaussure['nom']) ?> - <?= htmlspecialchars($chaussure['marque']) ?> - 
                Taille : <?= $chaussure['taille'] ?> - Prix : <?= $chaussure['prix'] ?> € - 
                Catégorie : <?= htmlspecialchars($chaussure['categorie']) ?> 
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
