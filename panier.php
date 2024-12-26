<?php
include_once 'connexion.php'; 

session_start();
$panier = $_SESSION['panier'] ?? [];


$total = 0;
foreach ($panier as $article) {
    $total += $article['prix'] * $article['quantite'];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="./CSS/style.css">

</head>
<body>
    <h1>Panier</h1>
    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($panier as $article): ?>
                <tr>
                    <td><?= htmlspecialchars($article['nom']); ?></td>
                    <td><?= htmlspecialchars($article['prix']); ?>€</td>
                    <td><?= htmlspecialchars($article['quantite']); ?></td>
                    <td><?= htmlspecialchars($article['prix'] * $article['quantite']); ?>€</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div>
        <strong>Total : <?= $total; ?>€</strong>
    </div>
    <button>Passer la commande</button>
</body>
</html>
