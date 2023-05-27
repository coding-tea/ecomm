<?php

use Opium\EcommerceWebsite\db;
require_once '../database/db.php';
session_start();

if(isset($_POST['product_add_to_card'])){
    db::ExecQuery(
        "INSERT INTO `panier` (`id_produit`, `Num_user`, `Qte`) VALUES (?, ?, ?)"
        ,[$_POST['id'], $_SESSION['numU'], $_POST['qte']]
    );
    header('Location:cart.php');
    die();
}

if (!isset($_SESSION['user']) || !isset($_SESSION['numU'])) {
    header('Location:login.php');
    die();
}

if(!isset($_GET['id'])){
    header('Location:../index.php');
    die();
}
$stm = db::ExecQuery("select * from panier where id_produit = ? and Num_user = ?", [$_GET['id'], $_SESSION['numU']]);

if($stm->rowCount() == 1){
  db::ExecQuery(
    "update panier set Qte = Qte + 1 where id_produit=? and Num_user = ?"
    ,[$_GET['id'], $_SESSION['numU']]
);
}
else {
  db::ExecQuery(
    "INSERT INTO `panier` (`id_produit`, `Num_user`, `Qte`) VALUES (?, ?, 1)"
    ,[$_GET['id'], $_SESSION['numU']]
);
}


header('Location:../index.php');