<?php
ob_start();
session_start();
use Opium\EcommerceWebsite\db;
// require '../database/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href=<?= $css ?> />
    <style>
        * {
            scroll-behavior: smooth;
        }

        #contact_info,
        #contact_us {
            height: 600px;
            width: 600px;
        }

        @media only screen and (max-width: 768px) {
            #contact_info {
                display: none;
            }
        }

        section {
            padding: 60px 0px;
        }

        .heading {
            padding: 50px 0;
            font-size: 25px;
            text-transform: uppercase;
            font-weight: 500;
            letter-spacing: 2px;
            text-align: center;
            color: #7c3aed;
        }

        #contact #contact_info {
            letter-spacing: 1px;
            color: white;
            text-transform: uppercase;
            font-weight: 400;
            font-size: 40px;
        }

        #contact #contact_us {
            font-size: 30px;
        }

        #contact #contact_us input {
            padding: 10px;
        }

        #contact #contact_us input[type="submit"] {
            padding: 7px 20px;
            text-transform: uppercase;
            font-weight: 600;
            border-radius: 5px;
        }

        .create_form {
            width: 100%;
            display: flex;
            /* justify-content: center; */
            /* align-items: center; */
        }

        .create_form .column {
            padding: 10px;
            width: 50%;
        }

        section .comment {
            width: 100%;
        }

        .login {
            height: 100vh;
        }

        .checkbox:checked+.check-icon {
            display: flex;
        }

        .signup {
            padding: 20px 0;
            text-align: center;
            text-transform: capitalize;
            width: 100%;
            letter-spacing: 1px;
        }

        .sign {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 50px 0;
        }

        .sign_body {
            width: 60%;
        }

        .menu-ecom {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container mx-auto p-5">
        <div class="md:flex md:flex-row md:justify-between text-center text-sm sm:text-base">
            <div class="flex flex-row justify-center">
                <div class="bg-gradient-to-r from-purple-400 to-red-400 w-10 h-10 rounded-lg"></div>
                <h1 class="text-3xl text-gray-600 ml-2">E-commerce</h1>
            </div>
            <div class="mt-2 menu-ecom">
                <a href=<?= $home ?> class="text-gray-600 hover:text-purple-600 p-4 px-3 sm:px-4">Home</a>
                <a href=<?= $shop ?> class="text-gray-600 hover:text-purple-600 p-4 px-3 sm:px-4">Shop</a>
                <a href=<?= $contact ?> class="text-gray-600 hover:text-purple-600 p-4 px-3 sm:px-4">Contact</a>

                <?php if (isset($_SESSION['admin'])) : ?>
                    <a href='<?= $admin ?>' class="text-gray-600 hover:text-purple-600 p-4 px-3 sm:px-4">dashbord</a>
                <?php endif; ?>

                <?php if (isset($_SESSION['user'])) : ?>
                    <div class="max-w-lg mx-auto .menu-ecom">
                        <button class="text-purple-600 bg-white-700 font-medium text-sm px-4 py-2.5 text-center inline-flex items-center" type="button" data-dropdown-toggle="dropdown">My Account<svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg></button>

                        <!-- Dropdown menu -->
                        <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown">
                            <ul class="py-1" aria-labelledby="dropdown">
                                <li>
                                    <a href="<?= $profile ?>" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Profile</a>
                                </li>
                                <li>
                                    <a href="<?= $commande ?>" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">commande</a>
                                </li>
                                <li>
                                    <a href="<?= $Sign_out ?>" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Sign out</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                <?php endif; ?>

                <?php if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) : ?>
                    <a href=<?= $Login ?> class="text-gray-600 hover:text-purple-600 p-4 px-3 sm:px-4">login</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['admin'])): ?>
                  
                <a href="<?= $Sign_out ?>" class="bg-purple-600 text-gray-50 hover:bg-purple-700 p-3 px-3 sm:px-5 rounded-full"> 
                <svg class="h-5 w-5 text-teal-900 mr-1 inline-block"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />  <polyline points="10 17 15 12 10 7" />  <line x1="15" y1="12" x2="3" y2="12" /></svg>Log Out
                </a>
                <?php endif; ?>
                <?php if (!isset($_SESSION['admin'])): ?>
                <a href=<?= $cart ?> class="bg-purple-600 text-gray-50 hover:bg-purple-700 p-3 px-3 sm:px-5 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    Card
                </a>
                <?php endif; ?>
            </div>
        </div>
        <!-- Main Navigation -->