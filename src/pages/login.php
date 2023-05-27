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
$shop = 'shop.php';
$contact = 'contact.php';
$Login = "login.php";
$cart = "cart.php";
require_once 'header.php';


?>

<!-- component -->
<form action="login_action.php" method="post" class="relative flex min-h-screen text-gray-800 antialiased flex-col justify-center overflow-hidden py-6 sm:py-12 login">
  <div class="relative py-3 sm:w-96 mx-auto text-center">
    <span class="text-2xl font-light ">Login to your account</span>
    <div class="text-red-500 mt-4">
      <?php if (isset($_SESSION["message"])) {
        echo $_SESSION["message"];
        session_unset();
      } ?>
    </div>
    <div class="mt-4 bg-white shadow-md rounded-lg text-left">
      <div class="h-2 bg-purple-400 rounded-t-md"></div>

      <div class="px-8 py-6" id="normal">
        <label class="block font-semibold"> Username or Email </label>
        <input type="text" name="text" placeholder="Email" class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md" required>
        <label class="block mt-3 font-semibold"> Username or Email </label>
        <input type="password" name="password" placeholder="Password" class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md" required>
        <div class="flex justify-between items-baseline">
          <button type="submit" name="login" class="mt-4 bg-purple-500 text-white py-2 px-6 rounded-md hover:bg-purple-600 ">Login</button>
          <a href="#" class="text-sm hover:underline" id="forgot">Forgot password?</a>
        </div>

        <div class="signup">
          <a href="signup.php" class="signup">Don't Have Account</a>
        </div>

      </div>

      <div class="px-8 py-6" id="password">
        <label class="block font-semibold"> retrieve password</label>
        <input type="text" name="retrieve" placeholder="sentence for retrieve password " class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md">
        <label class="block mt-3 font-semibold"> new password </label>
        <input type="password" name="new_password" placeholder="Password" class="border w-full h-5 px-3 py-5 mt-2 hover:outline-none focus:outline-none focus:ring-indigo-500 focus:ring-1 rounded-md">
        <div class="flex justify-between items-baseline">
          <button type="submit" name="change" class="mt-4 bg-purple-500 text-white py-2 px-6 rounded-md hover:bg-purple-600 ">change</button>
          <a href="#" class="text-sm hover:underline" id="login">login!</a>
        </div>
        <div class="signup">
          <a href="signup.php" class="signup">Don't Have Account</a>
        </div>

      </div>

    </div>
  </div>

  <?php
  require_once 'footer.php';
  ?>