<?php

use Opium\EcommerceWebsite\db;
require_once '../database/db.php';

if (isset($_POST['update'])) {
    $stmt = db::ExecQuery("UPDATE `produit` SET `Name` = ?, `description` = ?, `url_img` = ?, `quantite_produit` = ?, `price` = ?, `discount` = ?, `Num_categorie` = ? WHERE `produit`.`id_produit` = ?", [$_POST['name'], $_POST['description'], $_POST['url_img'], $_POST['quantite_produit'], $_POST['price'], $_POST['discount'], $_POST['category'], $_GET['id']]);
    header('Location:dashbord.php');
}