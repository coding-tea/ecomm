<?php

use Opium\EcommerceWebsite\db;

require_once 'database/db.php';
$profile = 'pages/profile.php';
$commande = 'pages/commande.php';
$Sign_out = 'dashbord/destroy.php';
$admin = 'dashbord/dashbord.php';
$title = 'E-commerce';
$css = 'css/tailwind.css';
$home = '#';
$shop = 'pages/shop.php';
$contact = 'pages/contact.php';
$Login = "pages/login.php";
$cart = "pages/cart.php";
require_once 'pages/header.php';
?>

<div class="md:flex md:flex-row mt-20">
  <div class="md:w-2/5 flex flex-col justify-center items-center">
    <h2 class="font-serif text-5xl text-gray-600 mb-4 text-center md:self-start md:text-left">Dive into a dazzling deal!</h2>
    <p class="uppercase text-gray-600 tracking-wide text-center md:self-start md:text-left">Browse the inventory to find your favourite discount.</p>
    <a href="pages/shop.php" class="bg-gradient-to-r from-red-600 to-pink-500 rounded-full py-4 px-8 text-gray-50 uppercase text-xl md:self-start my-5">Shop Now</a>
  </div>
  <div class="md:w-3/5">
    <img src="./images/hero-img.svg" class="w-full" alt="img" />
  </div>
</div><!-- Hero sectioin -->

<div class="my-20">
  <div class="flex flex-row justify-between my-5">
    <h2 class="text-3xl">Last products</h2>
    <a href="pages/shop.php" class="flex flex-row text-lg hover:text-purple-700">
      View All
      <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
      </svg>
    </a>
  </div>
  <div class="grid grid-flow-row grid-cols-1 md:grid-cols-3 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">

    <?php
    $stm = db::ExecQuery('select * from produit order by id_produit desc limit 8');
    $last_products = $stm->fetchAll(PDO::FETCH_OBJ);
    ?>

    <?php if (isset($last_products)) : ?>
      <?php foreach ($last_products as $row) : ?>

        <div class="shadow-lg rounded-lg ">
          <a href="pages/product.php?id=<?= $row->id_produit ?>">
            <img src='images/products/<?= $row->url_img ?>' class="rounded-tl-lg rounded-tr-lg" alt="img" />
          </a>
          <div class="p-5">
            <h3 class="text-center"><a href="#"><?= $row->Name ?></a></h3>
            <h3 class="text-center"><?= $row->price - ($row->price * ($row->discount  / 100)) ?> DH <del><?= $row->price ?></del></h3>

            <div class="flex flex-col xl:flex-row justify-between">
              <a class="bg-gradient-to-r from-red-600 to-pink-500 rounded-full py-2 px-4 my-2 text-sm text-white hover:bg-pink-600 hover:from-pink-600 hover:to-pink-600 flex flex-row justify-center" href="pages/cart_action.php?id=<?= $row->id_produit ?>">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Add to cart
              </a>
              <a class="bg-purple-600 rounded-full py-2 px-4 my-2 ml-1 text-sm text-white hover:bg-purple-700 flex flex-row justify-center" href="pages/product.php?id=<?= $row->id_produit ?>">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
                View Details
              </a>
            </div>
          </div>
        </div>

      <?php endforeach; ?>
    <?php endif; ?>



  </div>
  <!-- last products Section -->

  <div class="rounded-lg shadow-lg my-20 flex flex-row">
    <div class="lg:w-3/5 w-full bg-gradient-to-r from-black to-purple-900 lg:from-black lg:via-purple-900 lg:to-transparent rounded-lg text-gray-100 p-12">
      <div class="lg:w-1/2">
        <h3 class="text-2xl font-extrabold mb-4">Subscribe to get our offers first</h3>
        <p class="mb-4 leading-relaxed">Want to hear from us when we have new offers? Sign up for our newsletter and we'll email you every time we have new sale offers.</p>
        <div>


          <?php if (!isset($_SESSION['user']) && !isset($_SESSION['admin'])) : ?>
            <input readonly type="email" placeholder="Enter email address" class="bg-gray-600 text-gray-200 placeholder-gray-400 px-4 py-3 w-full rounded-lg focus:outline-none mb-4" />
            <a href="./pages/signup.php"> <button type="submit" class="bg-red-600 py-3 rounded-lg w-full">Subscribe</button></a>
          <?php endif; ?>
          <?php if (isset($_SESSION['user']) || isset($_SESSION['admin'])) : ?>
            <input readonly type="email" placeholder="Enter email address" class="bg-gray-600 text-gray-200 placeholder-gray-400 px-4 py-3 w-full rounded-lg focus:outline-none mb-4" />
            <button type="submit" class="bg-red-600 py-3 rounded-lg w-full" disabled>Already Subscribe</button>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="lg:w-2/5 w-full lg:flex lg:flex-row hidden">
      <img src="./images/subscribe-banner.png" class="h-96" alt="img"/>
    </div>
  </div><!-- Newsletter Section -->

  <?php require_once 'pages/footer.php'; ?>