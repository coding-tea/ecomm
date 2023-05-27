<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header('Location:../pages/login.php');
}


use Opium\EcommerceWebsite\db;

require_once '../database/db.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>dashbord</title>
  <link rel="stylesheet" href='../css/tailwind.css' />
  <style>
    .table {
      border-spacing: 0 15px;
    }

    i {
      font-size: 1rem !important;
    }

    .table tr {
      border-radius: 20px;
    }

    tr td:nth-child(n + 6),
    tr th:nth-child(n + 6) {
      border-radius: 0 0.625rem 0.625rem 0;
    }

    tr td:nth-child(1),
    tr th:nth-child(1) {
      border-radius: 0.625rem 0 0 0.625rem;
    }

    .section {
      background-color: #fff;
      padding: 20px;
      box-shadow: 4px 20px 30px rgba(0, 0, 0, 0.2);
      border-radius: 10px;
    }

    .title {
      padding: 20px 0px;
      font-size: 20px;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: #2563eb;
      font-weight: 500;
    }

    .hero {
      text-align: center;
      padding: 20px;
      font-size: 20px;
      font-weight: bold;
      color: #2563eb;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
  </style>

  <!-- component -->
  <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" />
</head>

<body>


  <main class="relative h-screen bg-gray-100 dark:bg-gray-800 rounded-2xl">
    <div class="flex items-start justify-between">
      <div class="relative hidden h-screen my-4 ml-4 shadow-lg lg:block w-80">
        <div class="sticky h-full bg-white rounded-2xl dark:bg-gray-700">
          <div class="flex items-center justify-center pt-6 hero">
            Ecommerce
          </div>
          <nav class="mt-6">
            <div>
              <a id='main' class="flex items-center justify-start w-full p-4 my-2 font-thin text-blue-500 uppercase transition-colors duration-200 border-r-4 border-blue-500 bg-gradient-to-r from-white to-blue-100 dark:from-gray-700 dark:to-gray-800" href="../index.php">
                <span class="text-left">
                  <svg width="20" height="20" fill="currentColor" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1070 1178l306-564h-654l-306 564h654zm722-282q0 182-71 348t-191 286-286 191-348 71-348-71-286-191-191-286-71-348 71-348 191-286 286-191 348-71 348 71 286 191 191 286 71 348z">
                    </path>
                  </svg>
                </span>
                <span class="mx-4 text-sm font-normal">
                  home page
                </span>
              </a>

              <a id="category_btn" class="flex items-center  justify-start w-full p-4 my-2 font-thin text-gray-500 uppercase transition-colors duration-200 dark:text-gray-200 hover:text-blue-500 active:text-blueF-500" href="#">
                <span class="text-left">
                  <svg width="20" height="20" fill="currentColor" class="m-auto" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1024 1131q0-64-9-117.5t-29.5-103-60.5-78-97-28.5q-6 4-30 18t-37.5 21.5-35.5 17.5-43 14.5-42 4.5-42-4.5-43-14.5-35.5-17.5-37.5-21.5-30-18q-57 0-97 28.5t-60.5 78-29.5 103-9 117.5 37 106.5 91 42.5h512q54 0 91-42.5t37-106.5zm-157-520q0-94-66.5-160.5t-160.5-66.5-160.5 66.5-66.5 160.5 66.5 160.5 160.5 66.5 160.5-66.5 66.5-160.5zm925 509v-64q0-14-9-23t-23-9h-576q-14 0-23 9t-9 23v64q0 14 9 23t23 9h576q14 0 23-9t9-23zm0-260v-56q0-15-10.5-25.5t-25.5-10.5h-568q-15 0-25.5 10.5t-10.5 25.5v56q0 15 10.5 25.5t25.5 10.5h568q15 0 25.5-10.5t10.5-25.5zm0-252v-64q0-14-9-23t-23-9h-576q-14 0-23 9t-9 23v64q0 14 9 23t23 9h576q14 0 23-9t9-23zm256-320v1216q0 66-47 113t-113 47h-352v-96q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v96h-768v-96q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v96h-352q-66 0-113-47t-47-113v-1216q0-66 47-113t113-47h1728q66 0 113 47t47 113z">
                    </path>
                  </svg>
                </span>
                <span class="mx-4 text-sm font-normal">
                  category
                </span>
              </a>

              <a id="products_btn" class="flex items-center justify-start w-full p-4 my-2 font-thin text-gray-500 uppercase transition-colors duration-200 dark:text-gray-200 hover:text-blue-500" href="#">
                <span class="text-left">
                  <svg width="20" height="20" fill="currentColor" class="m-auto" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                    <path d="M685 483q16 0 27.5-11.5t11.5-27.5-11.5-27.5-27.5-11.5-27 11.5-11 27.5 11 27.5 27 11.5zm422 0q16 0 27-11.5t11-27.5-11-27.5-27-11.5-27.5 11.5-11.5 27.5 11.5 27.5 27.5 11.5zm-812 184q42 0 72 30t30 72v430q0 43-29.5 73t-72.5 30-73-30-30-73v-430q0-42 30-72t73-30zm1060 19v666q0 46-32 78t-77 32h-75v227q0 43-30 73t-73 30-73-30-30-73v-227h-138v227q0 43-30 73t-73 30q-42 0-72-30t-30-73l-1-227h-74q-46 0-78-32t-32-78v-666h918zm-232-405q107 55 171 153.5t64 215.5h-925q0-117 64-215.5t172-153.5l-71-131q-7-13 5-20 13-6 20 6l72 132q95-42 201-42t201 42l72-132q7-12 20-6 12 7 5 20zm477 488v430q0 43-30 73t-73 30q-42 0-72-30t-30-73v-430q0-43 30-72.5t72-29.5q43 0 73 29.5t30 72.5z">
                    </path>
                  </svg>
                </span>
                <span class="mx-4 text-sm font-normal">
                  products
                </span>
              </a>

              <a id="users_btn" class="flex items-center justify-start w-full p-4 my-2 font-thin text-gray-500 uppercase transition-colors duration-200 dark:text-gray-200 hover:text-blue-500" href="#">
                <span class="text-left">
                  <svg width="20" height="20" fill="currentColor" class="m-auto" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                    <path d="M960 0l960 384v128h-128q0 26-20.5 45t-48.5 19h-1526q-28 0-48.5-19t-20.5-45h-128v-128zm-704 640h256v768h128v-768h256v768h128v-768h256v768h128v-768h256v768h59q28 0 48.5 19t20.5 45v64h-1664v-64q0-26 20.5-45t48.5-19h59v-768zm1595 960q28 0 48.5 19t20.5 45v128h-1920v-128q0-26 20.5-45t48.5-19h1782z">
                    </path>
                  </svg>
                </span>
                <span class="mx-4 text-sm font-normal">
                  users
                </span>
              </a>

              <a id="commande_btn" class="flex items-center justify-start w-full p-4 my-2 font-thin text-gray-500 uppercase transition-colors duration-200 dark:text-gray-200 hover:text-blue-500" href="#">
                <span class="text-left">
                  <svg width="20" height="20" class="m-auto" fill="currentColor" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1070 1178l306-564h-654l-306 564h654zm722-282q0 182-71 348t-191 286-286 191-348 71-348-71-286-191-191-286-71-348 71-348 191-286 286-191 348-71 348 71 286 191 191 286 71 348z">
                    </path>
                  </svg>
                </span>
                <span class="mx-4 text-sm font-normal">
                  commande
                </span>
              </a>

              <a class="flex items-center justify-start w-full p-4 my-2 font-thin text-gray-500 uppercase transition-colors duration-200 dark:text-gray-200 hover:text-blue-500" href="destroy.php">
                <span class="text-left">
                  <svg width="20" height="20" fill="currentColor" class="m-auto" viewBox="0 0 2048 1792" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1024 1131q0-64-9-117.5t-29.5-103-60.5-78-97-28.5q-6 4-30 18t-37.5 21.5-35.5 17.5-43 14.5-42 4.5-42-4.5-43-14.5-35.5-17.5-37.5-21.5-30-18q-57 0-97 28.5t-60.5 78-29.5 103-9 117.5 37 106.5 91 42.5h512q54 0 91-42.5t37-106.5zm-157-520q0-94-66.5-160.5t-160.5-66.5-160.5 66.5-66.5 160.5 66.5 160.5 160.5 66.5 160.5-66.5 66.5-160.5zm925 509v-64q0-14-9-23t-23-9h-576q-14 0-23 9t-9 23v64q0 14 9 23t23 9h576q14 0 23-9t9-23zm0-260v-56q0-15-10.5-25.5t-25.5-10.5h-568q-15 0-25.5 10.5t-10.5 25.5v56q0 15 10.5 25.5t25.5 10.5h568q15 0 25.5-10.5t10.5-25.5zm0-252v-64q0-14-9-23t-23-9h-576q-14 0-23 9t-9 23v64q0 14 9 23t23 9h576q14 0 23-9t9-23zm256-320v1216q0 66-47 113t-113 47h-352v-96q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v96h-768v-96q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v96h-352q-66 0-113-47t-47-113v-1216q0-66 47-113t113-47h1728q66 0 113 47t47 113z">
                    </path>
                  </svg>
                </span>
                <span class="mx-4 text-sm font-normal">
                  Sign out
                </span>
              </a>
            </div>
          </nav>

          <!-- navbar -->
        </div>
      </div>


      <div class="w-full pl-0 md:p-4 md:space-y-4">

        <div class="section add_category" id="category">
          <h1 class="title">add category</h1>
          <form action="" method="post">
            <div class="form-group mb-6">
              <label for="exampleInputEmail1" class="form-label inline-block mb-2 text-gray-700">category name</label>
              <input type="text" name="name" class="form-control
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter category name" required>
              <!-- <small id="emailHelp" class="block mt-1 text-xs text-gray-600">We'll never share your email with anyone
                        else.</small> -->
            </div>

            <div class="form-group mb-6">
              <label for="exampleInputEmail1" class="form-label inline-block mb-2 text-gray-700">category description</label>
              <input type="text" name="description" class="form-control
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter category description" required>
              <!-- <small id="emailHelp" class="block mt-1 text-xs text-gray-600">We'll never share your email with anyone
                        </div>

                        <div class="form-group mb-6">
                            <label for="exampleInputEmail1" class="form-label inline-block mb-2 text-gray-700">category image</label>
                            <input type="file" name="img" class="form-control
                            block
                            w-full
                            px-3
                            py-1.5
                            text-base
                            font-normal
                            text-gray-700
                            bg-white bg-clip-padding
                            border border-solid border-gray-300
                            rounded
                            transition
                            ease-in-out
                            m-0
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter category description">
                            <!-- <small id="emailHelp" class="block mt-1 text-xs text-gray-600">We'll never share your email with anyone
                        else.</small> -->
            </div>


            <button type="submit" name="create_category" class="
                        px-6
                        py-2.5
                        bg-blue-600
                        text-white
                        font-medium
                        text-xs
                        leading-tight
                        uppercase
                        rounded
                        shadow-md
                        hover:bg-blue-700 hover:shadow-lg
                        focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                        active:bg-blue-800 active:shadow-lg
                        transition
                        duration-150
                        ease-in-out">
              Add category
            </button>
          </form>

          <?php
          if (isset($_POST['create_category'])) {
            db::ExecQuery("INSERT INTO `categorie` (`Num_categorie`, `Name_categorie`, `image_categorie`, `Description_categorie`) VALUES (NULL, ?, ?, ?)", [$_POST['name'], $_POST['img'], $_POST['description']]);
          }
          ?>
          <table  class="table inline-block text-gray-400 border-separate space-y-6 text-sm w-full">
            <thead class="bg-blue-500 text-white">
              <tr>
                <th class="p-3">num category</th>
                <th class="p-3 text-left">category name</th>
                <th class="p-3 text-left">category description</th>
                <th class="p-3 text-left">delete</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $stmt = db::ExecQuery('SELECT * FROM categorie');
              $categorie = $stmt->fetchAll(pdo::FETCH_OBJ);
              if (isset($categorie)) :
                foreach ($categorie as $row) :
              ?>

                  <tr class="bg-blue-200 lg:text-black">
                    <td class="p-3 font-medium capitalize"><?= $row->Num_categorie ?></td>
                    <td class="p-3"><?= $row->Name_categorie ?></td>
                    <td class="p-3"><?= $row->Description_categorie ?></td>
                    <td class="p-3">
                      <a href="delete_categoty.php?num=<?= $row->Num_categorie ?>" class="text-red-400 hover:text-gray-100 ml-2">
                        <em class="material-icons-round text-base">delete_outline</i>
                      </a>
                    </td>
                  </tr>

              <?php
                endforeach;
              endif;
              ?>
            </tbody>
          </table>


        </div>

        <div class="section products" id="products">
          <h1 class="title">manage products</h1>

          <a href="create.php" class="
                        px-6
                        py-2.5
                        bg-blue-600
                        text-white
                        font-medium
                        text-xs
                        leading-tight
                        uppercase
                        rounded
                        shadow-md
                        hover:bg-blue-700 hover:shadow-lg
                        focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                        active:bg-blue-800 active:shadow-lg
                        transition
                        duration-150
                        ease-in-out">
            Add product
          </a>

          <table class="table inline-block text-gray-400 border-separate space-y-6 text-sm w-full">
            <thead class="bg-blue-500 text-white">
              <tr>
                <th class="p-3">id</th>
                <th class="p-3 text-left">name</th>
                <th class="p-3 text-left">description</th>
                <th class="p-3 text-left">quantity</th>

                <th class="p-3 text-left">price</th>
                <th class="p-3 text-left">discount</th>
                <th class="p-3 text-left">action</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $stmt = db::ExecQuery('SELECT * FROM produit');
              $products = $stmt->fetchAll(PDO::FETCH_OBJ);
              if (isset($products)) :
                foreach ($products as $row) :
              ?>

                  <tr class="bg-blue-200 lg:text-black">
                    <td class="p-3 font-medium capitalize"><?= $row->id_produit ?></td>
                    <td class="p-3"><?= $row->Name ?></td>
                    <td class="p-3"><?= $row->description ?></td>
                    <td class="p-3 uppercase"><?= $row->id_produit ?></td>

                    <td class="p-3"><?= $row->price ?></td>
                    <td class="p-3"><?= $row->discount ?></td>
                    <td class="p-3">
                      <a href="update_product.php?id=<?= $row->id_produit ?>" class="text-yellow-400 hover:text-gray-100 mx-2">
                        <em class="material-icons-outlined text-base">edit</i>
                      </a>
                      <a href="delete_product.php?id=<?= $row->id_produit ?>" class="text-red-400 hover:text-gray-100 ml-2">
                        <em class="material-icons-round text-base">delete_outline</i>
                      </a>
                    </td>
                  </tr>

              <?php
                endforeach;
              endif;
              ?>
            </tbody>
          </table>
        </div>

        <div class="section users" id="users">
          <h1 class="title">manage users</h1>

          <table class="table inline-block text-gray-400 border-separate space-y-6 text-sm w-full">
            <thead class="bg-blue-500 text-white">
              <tr>
                <th class="p-3">num user</th>
                <th class="p-3 text-left">full name</th>
                <th class="p-3 text-left">phone number</th>
                <th class="p-3 text-left">adresse</th>

                <th class="p-3 text-left">city</th>
                <th class="p-3 text-left">zip code</th>
                <th class="p-3 text-left">action</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $stmt = db::ExecQuery('SELECT * FROM users');
              $users = $stmt->fetchAll(PDO::FETCH_OBJ);
              if (isset($users)) :
                foreach ($users as $row) :
              ?>

                  <tr class="bg-blue-200 lg:text-black">
                    <td class="p-3 font-medium capitalize"><?= $row->Num_user ?></td>
                    <td class="p-3"><?= $row->fullName ?></td>
                    <td class="p-3"><?= $row->phone ?></td>
                    <td class="p-3 uppercase"><?= $row->adresse ?></td>

                    <td class="p-3"><?= $row->city ?></td>
                    <td class="p-3"><?= $row->zip_code ?></td>
                    <td class="p-3">
                      <a href="delete_user.php?num=<?= $row->Num_user ?>" class="text-red-400 hover:text-gray-100 ml-2">
                        <em class="material-icons-round text-base">delete_outline</i>
                      </a>
                    </td>
                  </tr>

              <?php
                endforeach;
              endif;
              ?>
            </tbody>
          </table>

        </div>

        <div class="section commande" id="commande">
          <h1 class="title">commande</h1>
          <table class="table inline-block text-gray-400 border-separate space-y-6 text-sm w-full">
            <thead class="bg-blue-500 text-white">
              <tr>
                <th class="p-3 ">Num Commande</th>
                <th class="p-3 text-left">Nom Client</th>
                <th class="p-3 text-left">Date de commande</th>
                <th class="p-3 text-left">Quantity</th>
                <th class="p-3 text-left">Produit</th>
                <th class="p-3 text-left">Total</th>
                <th class="p-3 text-left">action</th>
              </tr>
            </thead>
            <tbody>

              <?php

              // get table commande
              $stmtCommande = db::ExecQuery('SELECT * FROM commande C, users U where C.Num_user=U.Num_user and state_commande = 0');
              $commandes = $stmtCommande->fetchAll(PDO::FETCH_OBJ);
              // get table LigneCommande

              if (isset($commandes)) :
                foreach ($commandes as $commande) :
                  $stmtLigne = db::ExecQuery('SELECT * FROM lignecommande L, produit P where L.id_produit=P.id_produit and num_commande = ?', [$commande->num_commande]);
                  $lignecommandes = $stmtLigne->fetchAll(PDO::FETCH_OBJ);
              ?>

                  <tr class="bg-gray-200 lg:text-black hover:bg-blue-300">
                    <td class="p-3 font-bold capitalize text-center"><?= $commande->num_commande ?></td>
                    <td class="p-3 font-bold"><?= $commande->fullName ?></td>
                    <td class="p-3 font-bold"><?= $commande->date_commande ?></td>
                    <td class="p-3 font-bold">
                      <?php
                      if (isset($lignecommandes)) :
                        foreach ($lignecommandes as $ligne) : ?>
                          <h4 style="padding: 2px;margin : 15px"><?= $ligne->qte_commande  ?></h4>
                      <?php endforeach;
                      endif; ?>
                    </td>

                    <td class="p-3 uppercase  font-bold">
                      <?php if (isset($lignecommandes)) :
                        $price = 0;
                        foreach ($lignecommandes as $ligne) :
                          $price += $ligne->qte_commande * $ligne->price;
                      ?>
                          <img src="../images/products/<?= $ligne->url_img  ?>" class="w-12 h-12 rounded-full border-2 border-blue-200" alt="img"><br>
                      <?php endforeach;
                      endif; ?>


                    </td>

                    <td class="p-3" font-bold>
                      <p class="font-bold"><?= $price ?> DH</p>
                    </td>
                    <td class="p-3" font-bold>
                      <a href="verifierCommande.php?numC=<?= $commande->num_commande ?>" class="text-yellow-400 hover:text-gray-100 mx-2">
                      <svg class="h-6 w-6 text-green-900 inline-block"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <rect x="4" y="4" width="16" height="16" rx="2" />  <path d="M9 12l2 2l4 -4" /></svg>
                      </a>
                      <a href="deleteCommande.php?numC=<?= $commande->num_commande ?>" class="text-red-400 hover:text-gray-100 ml-2">
                        <svg class="h-6 w-6 text-red-900 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>


                      </a>
                    </td>
                  </tr>

              <?php
                endforeach;
              endif;
              ?>
            </tbody>
          </table>
        </div>

        <script>
          document.querySelector('#category').style = 'display:block';
          document.querySelector('#products').style = 'display:none';
          document.querySelector('#users').style = 'display:none';
          document.querySelector('#commande').style = 'display:none';

          //main
          document.querySelector('#main').onclick = () => {
            document.querySelector('#category').style = 'display:block';
            document.querySelector('#products').style = 'display:none';
            document.querySelector('#users').style = 'display:none';
            document.querySelector('#commande').style = 'display:none';
          }

          //category
          document.querySelector('#category_btn').onclick = () => {
            document.querySelector('#category').style = 'display:block';
            document.querySelector('#products').style = 'display:none';
            document.querySelector('#users').style = 'display:none';
            document.querySelector('#commande').style = 'display:none';
          }

          //products
          document.querySelector('#products_btn').onclick = () => {
            document.querySelector('#products').style = 'display:block';
            document.querySelector('#category').style = 'display:none';
            document.querySelector('#users').style = 'display:none';
            document.querySelector('#commande').style = 'display:none';
          }

          //users
          document.querySelector('#users_btn').onclick = () => {
            document.querySelector('#products').style = 'display:none';
            document.querySelector('#category').style = 'display:none';
            document.querySelector('#users').style = 'display:block';
            document.querySelector('#commande').style = 'display:none';
          }

          //commande
          document.querySelector('#commande_btn').onclick = () => {
            document.querySelector('#products').style = 'display:none';
            document.querySelector('#category').style = 'display:none';
            document.querySelector('#users').style = 'display:none';
            document.querySelector('#commande').style = 'display:block';
          }
        </script>

</body>

</html>