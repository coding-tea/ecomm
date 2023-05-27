<?php

use Opium\EcommerceWebsite\db;
require_once '../database/db.php';

if (isset($_POST['create'])) {
    db::ExecQuery("INSERT INTO `produit` VALUES (NULL, ?, ?, ?, ?, ?, ?,?, ?)", [$_POST['name'], $_POST['description'], $_POST['image'], $_POST['quantite_produit'], $_POST['price'], $_POST['discount'], 1, $_POST['category']]);
    header('Location:dashbord.php');
}