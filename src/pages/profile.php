<?php

use Opium\EcommerceWebsite\db;

require_once '../database/db.php';
$profile = '#';
$commande = 'commande.php';
$Sign_out = '../dashbord/destroy.php';
$admin = '../dashbord/dashbord.php';
$title = 'update profile';
$css = '../css/tailwind.css';
$home = '../index.php';
$shop = 'shop.php';
$contact = 'contact.php';
$Login = "login.php";
$cart = "card.php";
require_once 'header.php';
if (!isset($_SESSION['user'])) {
    header('Location:/login.php');
}
?>

<h1 class="heading">your Account</h1>
<section class="sign">

    <?php
    $stmt = db::ExecQuery('SELECT * FROM users WHERE id_compte=?',[$_SESSION['user']]);
    $users_data = $stmt->fetch(PDO::FETCH_OBJ);
    $stm = db::ExecQuery('SELECT * FROM compte WHERE id_compte=?',[$_SESSION['user']]);
    $compte_data = $stm->fetch(PDO::FETCH_OBJ);
    ?>
    <?php if(isset($users_data) && isset($compte_data)): ?>
    <form action="" method="post" class="sign_body bg-white shadow rounded-lg p-6">
        <div class="grid lg:grid-cols-2 gap-6">

            <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="name" class="bg-white text-gray-600 px-1">Full name *</label>
                    </p>
                </div>
                <p>
                    <input id="name" value='<?= $users_data->fullName ?>' name="name" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 text-gray-900 outline-none block h-full w-full">
                </p>
            </div>

            <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="number" class="bg-white text-gray-600 px-1">Phone Number *</label>
                    </p>
                </div>
                <p>
                    <input id="number" value='<?= $users_data->phone  ?>' name="phone" autocomplete="false" tabindex="0" type="tel" class="py-1 px-1 outline-none block h-full w-full">
                </p>
            </div>

            <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="Adresse" class="bg-white text-gray-600 px-1">Adresse *</label>
                    </p>
                </div>
                <p>
                    <input id="Adresse" value='<?= $users_data->adresse ?>' name="Adresse" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full">
                </p>
            </div>

            <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="city" class="bg-white text-gray-600 px-1">city *</label>
                    </p>
                </div>
                <p>
                    <input id="city" value='<?= $users_data->city ?>' name="city" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full">
                </p>
            </div>

            <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="city" class="bg-white text-gray-600 px-1">password *</label>
                    </p>
                </div>
                <p>
                    <input value='<?= $users_data->city ?>' name="password" autocomplete="false" tabindex="0" type="password" class="py-1 px-1 outline-none block h-full w-full">
                </p>
            </div>


            <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="email" class="bg-white text-gray-600 px-1">email *</label>
                    </p>
                </div>
                <p>
                    <input id="email" value='<?= $compte_data->email ?>' name="email" autocomplete="false" tabindex="0" type="email" class="py-1 px-1 outline-none block h-full w-full">
                </p>
            </div>

            <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="zip" class="bg-white text-gray-600 px-1">zip code *</label>
                    </p>
                </div>
                <p>
                    <input id="zip" value='<?= $users_data->zip_code ?>' name="zip" autocomplete="false" tabindex="0" type="number" class="py-1 px-1 outline-none block h-full w-full">
                </p>
            </div>

            <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="retrieve" class="bg-white text-gray-600 px-1">for retrieve password *</label>
                    </p>
                </div>
                <p>
                    <input id="retrieve" value='<?= $users_data->retrieve_password ?>' name="retrieve" autocomplete="false" tabindex="0" type="text" class="py-1 px-1 outline-none block h-full w-full" placeholder="write a sentence for retrieve your password">
                </p>
            </div>

        </div>
        <div class="border-t mt-6 pt-3">
            <button type="submit" name="update" class="rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300">
                update
            </button>
        </div>
    </form>
    <?php endif; ?>
</section>

<?php
if(isset($_POST['update'])){
    db::ExecQuery(
        "UPDATE `compte` SET `email` = ?, `password` =? WHERE `id_compte` = ? ",
        [$_POST['email'], $_POST['password'], $_SESSION['user']]
    );

    db::ExecQuery(
        "UPDATE `users` SET `fullName` =?, `phone` =?, `adresse` =?, `city` =?, `zip_code` =?, `retrieve_password`=? WHERE id_compte = ?",
        [$_POST['name'], $_POST['phone'], $_POST['Adresse'], $_POST['city'], $_POST['zip'], $_POST['retrieve'], $_SESSION['user']]
    );
}
?>

<?php
require_once 'footer.php';
?>