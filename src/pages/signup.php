<?php

use Opium\EcommerceWebsite\db;

require '../database/db.php';
$profile = 'profile.php';
$Sign_out = '../dashbord/destroy.php';
$admin = '../dashbord/dashbord.php';
$title = 'create product';
$css = '../css/tailwind.css';
$home = '../index.php';
$shop = '#';
$contact = 'contact.php';
$Login = "#";
$cart = "cart.php";
require_once 'header.php';

// -------------------------- ///////


if($_SERVER["REQUEST_METHOD"] == "POST"){

}
?>




<!-- component -->
<h1 class="heading">create Account</h1>
<div class="sign">
  <form action="" method="post" class="sign_body bg-white shadow rounded-lg p-6">
    <div class="grid lg:grid-cols-2 gap-6">

      <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
          <p>
            <input id="name" name="name" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 text-gray-900 outline-none block h-full w-full">
          </p>
        </div>
        <p>
          <input id="name" name="name" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 text-gray-900 outline-none block h-full w-full" placeholder="enter youe name" required>
        </p>
      </div>

      <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
          <p>
            <label for="number" class="bg-white text-gray-600 px-1">Phone Number *</label>
          </p>
        </div>
        <p>
          <input id="number" name="phone" autocomplete="false" tabindex="0" type="number" class="py-1 px-1 outline-none block h-full w-full" placeholder="enter your number" required>
        </p>
      </div>

      <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
          <p>
            <label for="Adresse" class="bg-white text-gray-600 px-1">Adresse *</label>
          </p>
        </div>
        <p>
          <input id="Adresse" name="Adresse" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full" placeholder="youe adresse" required>
        </p>
      </div>

      <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
          <p>
            <label for="city" class="bg-white text-gray-600 px-1">city *</label>
          </p>
        </div>
        <p>
          <input id="city" name="city" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full" placeholder="your city" required>
        </p>
      </div>

      <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
          <p>
            <label for="city" class="bg-white text-gray-600 px-1">password *</label>
          </p>
        </div>
        <p>
          <input name="password" autocomplete="false" tabindex="0" type="password" class="py-1 px-1 outline-none block h-full w-full" placeholder="your password" required>
        </p>
      </div>

      <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
          <p>
            <label for="email" class="bg-white text-gray-600 px-1">email *</label>
          </p>
        </div>
        <p>
          <input id="email" name="email" autocomplete="false" tabindex="0" type="email" class="py-1 px-1 outline-none block h-full w-full" placeholder="your email" required>
        </p>
      </div>

      <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
          <p>
            <label for="zip" class="bg-white text-gray-600 px-1">zip code *</label>
          </p>
        </div>
        <p>
          <input id="zip" name="zip" autocomplete="false" tabindex="0" type="number" class="py-1 px-1 outline-none block h-full w-full" placeholder="postal code" required>
        </p>
      </div>

      <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
        <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
          <p>
            <label for="retrieve" class="bg-white text-gray-600 px-1">for retrieve password *</label>
          </p>
        </div>
        <p>
          <input id="retrieve" name="retrieve" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full" placeholder="sentence for retrieve your password" required>
        </p>
      </div>

    </div>
    <div class="border-t mt-6 pt-3">
      <button type="submit" name="create_user" class="rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300">
        create
      </button>
    </div>
  </form>
</div>

<?php
if (isset($_POST['create_user'])) {
  db::ExecQuery(
    "INSERT INTO `compte` (`id_compte`, `email`, `password`, `role`) VALUES (null, ?, ?, 'user') ",
    [$_POST['email'], $_POST['password']]
  );

  $stmt = db::ExecQuery('SELECT id_compte from compte where email = ? ',[$_POST['email']]);
  $idCompte = $stmt->fetch(PDO::FETCH_OBJ);

  db::ExecQuery(
    "INSERT INTO `users` (`Num_user`, `fullName`, `phone`, `adresse`, `city`, `zip_code`, `retrieve_password`, `id_compte`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)",
    [$_POST['name'], $_POST['phone'], $_POST['Adresse'], $_POST['city'], $_POST['zip'], $_POST['retrieve'], $idCompte->id_compte]
  );

  // header('Location:login.php');
}
?>

<?php
require_once 'footer.php';
?>