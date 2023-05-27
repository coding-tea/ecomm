<?php

use Opium\EcommerceWebsite\db;

require_once '../database/db.php';

$profile = 'profile.php';
$commande = 'commande.php';
$Sign_out = '../dashbord/destroy.php';
$admin = '../dashbord/dashbord.php';
$title = 'create product';
$css = '../css/tailwind.css';
$home = '../index.php';
$shop = 'shop.php';
$contact = 'contact.php';
$Login = "login.php";
$cart = "#";
require_once 'header.php';
if (!isset($_SESSION['user'])) {
  header('Location:login.php');
}
?>
<div class="container mx-auto mt-10">
  <div class="flex shadow-md my-10">
    <div class="w-3/4 bg-white px-10 py-10">
      <div class="flex justify-between border-b pb-8">
        <h1 class="font-semibold text-2xl">Shopping Cart</h1>
        <h2 class="font-semibold text-2xl">Items</h2>
      </div>
      <div class="flex mt-10 mb-5">
        <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Details</h3>
        <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
        <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
        <h3 class="font-semibold text-center text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
      </div>

      <?php
      $stm = db::ExecQuery('select Pr.Name,Pa.id_produit , Pr.url_img, Pr.price, Pa.Qte,(Pa.Qte*Pr.price) as TT from Produit Pr inner join Panier Pa on Pr.id_produit=Pa.id_produit inner join Users on Users.Num_user=Pa.Num_user where Users.id_compte=:USER', [':USER' => $_SESSION["user"]]);
      $Cproducts = $stm->fetchAll(PDO::FETCH_OBJ);
      ?>
      <?php if (isset($Cproducts)) : ?>
        <?php foreach ($Cproducts as $row) : ?>
          <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
            <div class="flex w-2/5"> <!-- product -->
              <div class="w-20">
                <img class="h-24 rounded" src="../images/products/<?= $row->url_img ?>" alt="">
              </div>
              <div class="flex flex-col justify-between ml-4 flex-grow">
                <span class="font-bold text-sm"><?= $row->Name ?></span>
                <a href='cart.php?id=<?= $row->id_produit ?>' class="font-semibold hover:text-red-500 text-gray-500 text-xs">Remove</a>
              </div>
            </div>
            <div class="flex justify-center w-1/5">
              <span class="text-center w-1/5 font-semibold text-sm"><?= $row->Qte ?></span>
            </div>
            <span class="text-center w-1/5 font-semibold text-sm"><?= $row->price ?></span>
            <span class="text-center w-1/5 font-semibold text-sm"><?= $row->TT ?></span>
          </div>

        <?php endforeach; ?>
      <?php endif;
      if (isset($_GET['id'])) {
        $stm = db::ExecQuery('delete from Panier where id_produit=?', [$_GET['id']]);
        if ($stm) {
          header('location:cart.php');
        }
      }
      ?>

    </div>
    <?php
    $stm = db::ExecQuery('select count(Pa.id_produit) as nb ,Sum(Pa.Qte*(Pr.price - Pr.price * (Pr.discount /100))) as ToT from Produit Pr inner join Panier Pa on Pr.id_produit=Pa.id_produit inner join Users on Users.Num_user=Pa.Num_user where Users.id_compte=:USER group by Pa.id_produit, Pa.Qte', [':USER' => $_SESSION["user"]]);
    $products = $stm->fetch(PDO::FETCH_OBJ);
    ?>
    <?php if (isset($products)) : ?>
      <div id="summary" class="w-1/4 px-8 py-10">
        <h1 class="font-semibold text-2xl border-b pb-8">Order Summary</h1>
        <div class="flex justify-between mt-10 mb-5">
          <span class="font-semibold text-sm uppercase">Items <?= (isset($products->nb)) ? $products->nb : '' ?></span>
          <span class="font-semibold text-sm"><?= (isset($products->ToT)) ? $products->ToT : '' ?></span>
        </div>
        <div>
          <label class="font-medium inline-block mb-3 text-sm uppercase">Shipping</label>
          <select class="block p-2 text-gray-600 w-full text-sm">
            <option>Standard shipping - 10.00 DH</option>
          </select>
        </div>
        <div class="border-t mt-8">
          <div class="flex font-semibold justify-between py-6 text-sm uppercase">
            <span>Total cost</span>
            <span><?= (isset($products->ToT)) ? $products->ToT + 10 : '' ?></span>
          </div>
          <a href="cart.php?idC=true" class="bg-indigo-500 font-semibold hover:bg-indigo-600 py-3 px-6 text-sm text-white uppercase w-full">Checkout</a>
        </div>
      </div>
    <?php endif;
    if (isset($_GET['idC'])) {
      $user = $_SESSION['numU'];

      $stm = db::ExecQuery('insert into Commande (Num_user,id_compte,state_commande) values (:NU,:ID, 0)', [':NU' => $user, ':ID' => $_SESSION["user"]]);

      $stm2 = db::ExecQuery('select * from panier where Num_user =:USER', [':USER' => $user]);
      $stmt3 = db::ExecQuery('select * from panier p,commande c where p.Num_user = c.Num_user and p.Num_user = :USER order by num_commande desc limit 1', [':USER' => $user]);
      $num_commande = $stmt3->fetch(PDO::FETCH_OBJ);
      $products = $stm2->fetchAll(PDO::FETCH_OBJ);
      foreach ($products as $p) {
        // print_r($p);
       db::ExecQuery("INSERT INTO `lignecommande` (`id_produit`, `num_commande`, `Num_user`, `qte_commande`) VALUES (?, ?, ?, 1)", [$p->id_produit, $num_commande->num_commande, $user]);
      }

      $stmt = db::ExecQuery('DELETE FROM panier WHERE Num_user = ? ', [$user]);
      header('Location:commande.php');
    }
    ?>
  </div>
  <?php
  require_once 'footer.php';
  ?>