<?php
session_start();
use Opium\EcommerceWebsite\db;

$profile = 'profile.php';
$commande = 'commande.php';
$Sign_out = '../dashbord/destroy.php';
$admin = '../dashbord/dashbord.php';
$title = 'Shop';
$css = '../css/tailwind.css';
$home = '../index.php';
$shop = '#';
$contact = 'contact.php';

require '../database/db.php';

// GET ALL PRODUCT :
$flag = db::ExecQuery("select * from Produit  order by id_produit desc");

// FILTER PRODUCT :

if (isset($_GET["categorie"])) {
  $flag = db::ExecQuery("select * from Produit P,categorie C where P.num_categorie = C.num_categorie and C.Name_categorie = ?", [$_GET['categorie']]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST["sorting"]) && isset($_GET["categorie"])) {

    switch ($_POST["sorting"]) {

      case "sorting":

        $flag = db::ExecQuery("select * , price - (price * (discount / 100)) as discountP from Produit P, categorie C where 
        P.num_categorie = C.num_categorie and C.Name_categorie = ? order by id_produit", [$_GET['categorie']]);
        break;
      case "price":

        $flag = db::ExecQuery("select * , price - (price * (discount / 100)) as discountP from Produit P, categorie C where 
        P.num_categorie = C.num_categorie and C.Name_categorie = ? order by discountP", [$_GET['categorie']]);
        break;
      case "discount desc":
        $flag = db::ExecQuery("SELECT * FROM produit P, categorie C where P.num_categorie=C.num_categorie and C.Name_categorie = ? order by " . $_POST['sorting'], [$_GET['categorie']]);
        break;
    }
  } else if (isset($_POST["sorting"]) && $_POST["sorting"] != "sorting") {
    switch ($_POST["sorting"]) {

      case "price":

        $flag = db::ExecQuery("select *, price - (price * (discount / 100)) as discountP from Produit P order by discountP");

        break;
      case "discount desc":
        $flag = db::ExecQuery("select * from Produit order by ".$_POST['sorting']);
        break;
    }
  } else if (isset($_POST["filter"]) && isset($_GET["categorie"])) {

    switch ($_POST["filter"]) {

      case "*":
        $flag = db::ExecQuery("select * from Produit P, categorie C where 
        P.num_categorie = C.num_categorie and C.Name_categorie = ?", [$_GET['categorie']]);
        break;
      case "0":
        $flag = db::ExecQuery("select * from Produit P, categorie C where 
        P.num_categorie = C.num_categorie and C.Name_categorie = ? and price between 0 and 200", [$_GET['categorie']]);
        break;
      case "200":
        $flag = db::ExecQuery("select * from Produit P, categorie C where 
        P.num_categorie = C.num_categorie and C.Name_categorie = ? and price between 200 and 400", [$_GET['categorie']]);
        break;
      case "400":
        $flag = db::ExecQuery("select * from Produit P, categorie C where 
        P.num_categorie = C.num_categorie and C.Name_categorie = ? and price between 400 and 600", [$_GET['categorie']]);
        break;
      case "600":
        $flag = db::ExecQuery("select * from Produit P,categorie C where 
        P.num_categorie = C.num_categorie and C.Name_categorie = ? and price between 600 and 800", [$_GET['categorie']]);
        break;
      case "800":
        $flag = db::ExecQuery("select * from Produit P, categorie C where 
        P.num_categorie = C.num_categorie and C.Name_categorie = ? and price >= 800", [$_GET['categorie']]);
        break;
    }
  } else if (isset($_POST["filter"])) {
    switch ($_POST["filter"]) {

      case "*":
        $flag = db::ExecQuery("select * from Produit");
        break;
      case "0":
        $flag = db::ExecQuery("select * from Produit where price between 0 and 200");
        break;
      case "200":
        $flag = db::ExecQuery("select * from Produit where  price between 200 and 400");
        break;
      case "400":
        $flag = db::ExecQuery("select * from Produit where  price between 400 and 600");
        break;
      case "600":
        $flag = db::ExecQuery("select * from Produit where  price between 600 and 800");
        break;
      case "800":
        $flag = db::ExecQuery("select * from Produit where  price >= 800");
        break;
    }
  }
}

$produits = $flag->fetchAll(PDO::FETCH_ASSOC);

$title = 'Product';
$css = '../css/tailwind.css';
$home = '../index.php';
$shop = '#';
$contact = 'contact.php';
$Login = "login.php";
$cart = "cart.php";
?>

<!--       HEADER         -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/cart.css">
  <!-- Customized Bootstrap Stylesheet -->
  <link href="../css/style1.css" rel="stylesheet">
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

    .btn {
      border-radius: 30px;
      height: 40px;
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
    
    .sign_body {
        display: flex;
        justify-content: center;
        align-items: center;
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
      <div class="flex flex-row justify-center sign_body">
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

        <a href=<?= $cart ?> class="bg-purple-600 text-gray-50 hover:bg-purple-700 p-3 px-3 sm:px-5 rounded-full">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          Cart (0)
        </a>
      </div>
    </div><!-- Main Navigation -->


    <!-- Navbar Start -->
    <form action="" method="$_POST">
      <div class="container-fluid mb-30 mt-10" style="background-color: #6f42c1; border-radius: 14px;">
        <div class="row px-xl-5">
          <div class="col-lg-3 d-none d-lg-block">
            <a class="btn d-flex align-items-center justify-content-between " data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;background-color: #F08080;border-radius: 7px;">
              <h6 class="text-white m-0"><i style='color:white' class="fa fa-bars mr-2"></i>Categories</h6>
              <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
              <div class="navbar-nav w-100">
                <?php
                $stm = db::ExecQuery("SELECT * FROM categorie group by Name_categorie");
                $categories = $stm->fetchAll(PDO::FETCH_ASSOC);
                foreach ($categories as $categorie) :
                ?>
                  <a href="./shop.php?categorie=<?= $categorie['Name_categorie'] ?>" class="nav-item nav-link"><?= $categorie["Name_categorie"] ?></a>

                <?php endforeach; ?>
              </div>
            </nav>
          </div>
        </div>
      </div>
  </div>
  </form>

  <!-- Navbar End -->

  <!-- Shop Start -->
  <div class="container-fluid">
    <div class="row px-xl-5">
      <!-- Shop Sidebar Start -->
      <div class="col-lg-3 col-md-4">
        <!-- Price Start -->
        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by price</span>
        </h5>
        <div class="bg-light p-4 mb-30">
          <form action="" method="POST">
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
              <input type="radio" class="custom-control-input" checked id="price-all" name="filter" value="*">
              <label class="custom-control-label" for="price-all">All Price</label>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
              <input type="radio" class="custom-control-input" id="price-1" name="filter" value="0" <?= (isset($_POST["filter"]) && $_POST["filter"] == "0") ? 'checked' : '' ?>>
              <label class="custom-control-label" for="price-1">0 - 200</label>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
              <input type="radio" class="custom-control-input" id="price-2" name="filter" value="200" <?= (isset($_POST["filter"]) && $_POST["filter"] == "200") ? 'checked' : '' ?>>
              <label class="custom-control-label" for="price-2">200 - 400</label>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
              <input type="radio" class="custom-control-input" id="price-3" name="filter" value="400" <?= (isset($_POST["filter"]) && $_POST["filter"] == "400") ? 'checked' : '' ?>>
              <label class="custom-control-label" for="price-3">400 - 600</label>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
              <input type="radio" class="custom-control-input" id="price-4" name="filter" value="600" <?= (isset($_POST["filter"]) && $_POST["filter"] == "600") ? 'checked' : '' ?>>
              <label class="custom-control-label" for="price-4">600 - 800</label>
            </div>
            <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
              <input type="radio" class="custom-control-input" id="price-5" name="filter" value="800" <?= (isset($_POST["filter"]) && $_POST["filter"] == "800") ? 'checked' : '' ?>>
              <label class="custom-control-label" for="price-5">more than 800</label>
            </div>
            <div class="text-center mt-2">
              <button class="btn btn-outline-info rounded mt-2 " style="height: 40px" type="submit" name="filterBtn">Search</button>

            </div>
          </form>
        </div>
        <!-- Price End -->
      </div>
      <!-- Shop Sidebar End -->


      <!-- sorting Start -->
      <div class="col-lg-9 col-md-8">
        <div class="row pb-3">
          <div class="col-12 pb-1">
            <div class="d-flex align-items-center justify-content-between mb-4">
              <div class="ml-2 w-100">
                <form action="" method="post">
                  <select class="form-select-lg mb-3  p-2 text-center w-25 rounded" style="outline: none; border : 1px solid gray" name="sorting">
                    <option selected value="sorting">Last Product</option>
                    <option value="price" <?= (isset($_POST["sorting"]) && $_POST["sorting"] == "price desc") ? 'selected' : '' ?>>Prix</option>
                    <option value="discount desc" <?= (isset($_POST["sorting"]) && $_POST["sorting"] == "discount") ? 'selected' : '' ?>>Offres</option>
                  </select>
                  <button class="btn btn-outline-info rounded mb- 2 ml-3" style="height: 40px;" type="submit" value="sortBtn">Search</button>
                </form>

              </div>
            </div>
          </div>

          <!-- sorting end -->



          <!-- shop product start -->


          <?php


          foreach ($produits as $produit) :

          ?>

            <div class="d-flex col-lg-4 col-md-6 col-sm-6 pb-1 rounded">
              <div class=" align-items-stretch  flex-column product-item rounded  bg-light mb-4">
                <div class="product-img  position-relative overflow-hidden ">
                  <img class="img-fluid w-100 p-1" src="../images/products/<?= $produit["url_img"] ?>" alt="">
                </div>
                <div class="text-center py-4">
                  <a class="h6 text-decoration-none text-truncate" href=""><?= $produit["Name"] ?></a>
                  <div class="d-flex align-items-center justify-content-center mt-2">
                    <h5><?= $produit["price"] - ($produit["price"] * ($produit["discount"] / 100))  ?></h5>
                    <h6 class="text-muted ml-2"><del><?= $produit["price"] ?></del></h6>
                  </div>
                  <div class="d-flex align-items-center justify-content-center mb-1">
                    <!-- <small class="fa fa-star text-primary mr-1"></small>
                    <small class="fa fa-star text-primary mr-1"></small>
                    <small class="fa fa-star text-primary mr-1"></small>
                    <small class="fa fa-star text-primary mr-1"></small>
                    <small class="fa fa-star text-primary mr-1"></small> -->
                    <small>(quantity : <?= $produit["quantite_produit"] ?>)</small>
                  </div>
                  <div class="d-flex align-items-center justify-content-center mb-1">
                    <button type="button" class="btn btn-danger m-1 btn-sm"><a href="shop_action.php?id=<?= $produit['id_produit'] ?>">Add To Card</a></button>
                    <button type="button" class="btn btn-info m-1  btn-sm"><a href="product.php?id=<?= $produit['id_produit'] ?>">View Details</a></button>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          <!-- shop product end -->


          <!-- next  start -->

          <!-- <div class="col-12">
                        <nav>
                          <ul class="pagination justify-content-center">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                          </ul>
                        </nav>
                    </div>
                </div>
            </div> -->
          <!-- next End -->
        </div>
      </div>
      <!-- Shop End -->


      <!-- Back to Top -->
      <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

      <!-- Footer Section -->

      <div class="border-t-2 border-gray-300 w-100 d-flex justify-content-between text-center py-5 text-sm">
        <div class="mb-4">
          <a href="#" class="mx-2.5">About</a>
          <a href="#" class="mx-2.5">Privacy Policy</a>
          <a href="#" class="mx-2.5">Terms of Services</a>
        </div>
        <p>&copy; Copyright Reserved 2023</p>
      </div>

    </div>

    <!-- Footer Section -->
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>
    <script src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js'></script>
</body>

</html>