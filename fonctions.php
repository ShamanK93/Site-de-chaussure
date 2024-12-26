<?php
include_once "connexion.php";

function ajouterProduit($mysqlclient, $produit) {
    $sql = "INSERT INTO produits (titre, description, prix, categorie) VALUES (:titre, :description, :prix, :categorie)";
    $stmt = $mysqlclient->prepare($sql);
    $stmt->execute([
        'titre' => $produit['titre'],
        'description' => $produit['description'],
        'prix' => $produit['prix'],
        'categorie' => $produit['categorie']
    ]);
}

function getProduits($mysqlclient) {
    $stmt = $mysqlclient->prepare("SELECT * FROM produits");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getCategories($mysqlclient) {
    $stmt = $mysqlclient->prepare("SELECT * FROM categories");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
