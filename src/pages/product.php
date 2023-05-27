<?php
use Opium\EcommerceWebsite\db;
require_once '../database/db.php';
//variables about navbar
$profile = 'profile.php';
$commande = 'commande.php';
$Sign_out = '../dashbord/destroy.php';
$admin = '../dashbord/dashbord.php';
$title = 'product';
$css = '../css/tailwind.css';
$home = '../index.php';
$shop = 'shop.php';
$contact = 'contact.php';
$Login = "login.php";
$cart = "cart.php";
require_once 'header.php';

if (!isset($_GET['id'])) {
  die();
  header("Location:../header.php");
}

$stm = db::ExecQuery('SELECT * FROM produit where id_produit = ?', [$_GET['id']]);
$product = $stm->fetchAll(PDO::FETCH_ASSOC);
?>
<?php if (isset($product)) : ?>
  <?php foreach ($product as $p) : ?>
    <section>
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
        <div class="flex flex-col md:flex-row -mx-4">
          <div class="md:flex-1 px-4">
            <div x-data="{ image: 1 }" x-cloak>
              <div class="product_umage">
                <img src="../images/products/<?= $p['url_img'] ?>" alt="">
              </div>
            </div>
          </div>
          <div class="md:flex-1 px-4">
            <h2 class="mb-2 leading-tight tracking-tight font-bold text-gray-800 text-2xl md:text-3xl"> <?= $p['Name'] ?> </h2>

            <div class="flex items-center space-x-4 my-4">
              <div>
                <div class="rounded-lg bg-gray-100 flex py-2 px-3">
                  <span class="text-indigo-400 mr-1 mt-1">$</span>
                  <span class="font-bold text-indigo-600 text-3xl"><?= $p['price'] ?></span>
                </div>
              </div>
              <div class="flex-1">
                <p class="text-green-500 text-xl font-semibold">Save <?= $p['discount'] ?>%</p>
                <!-- <p class="text-gray-400 text-sm">Inclusive of all Taxes.</p> -->
              </div>
            </div>

            <p class="text-gray-500"><?= $p['description'] ?></p>

            <form method="post" action="cart_action.php" class="flex py-4 space-x-4">
              <div class="relative">
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                <div class="text-center left-0 pt-2 right-0 absolute block text-xs uppercase text-gray-400 tracking-wide font-semibold">Qty</div>
                <select name="qte" class="cursor-pointer appearance-none rounded-xl border border-gray-200 pl-4 pr-8 h-14 flex items-end pb-1">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>

                <svg class="w-5 h-5 text-gray-400 absolute right-0 bottom-0 mb-2 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                </svg>
              </div>

              <button type='submit' name="product_add_to_card" class="h-14 px-6 py-2 font-semibold rounded-xl bg-indigo-600 hover:bg-indigo-500 text-white">
                Add to Cart
              </button>
            </form>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    </section>
    <!-- end product info -->

    <section>
      <div class="my-20">
        <div class="flex flex-row justify-between my-5">
          <h2 class="text-3xl">Related products</h2>
          <a href="shop.php" class="flex flex-row text-lg hover:text-purple-700">
            View All
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
          </a>
        </div>

        <div class="grid grid-flow-row grid-cols-1 md:grid-cols-3 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-10">

          <?php
          $stmt = db::ExecQuery('SELECT * FROM produit where Num_categorie = ? limit 4', [$p['Num_categorie']]);
          $product_category = $stmt->fetchAll(PDO::FETCH_OBJ);
          ?>

          <?php if (isset($product_category)) : ?>
            <?php foreach ($product_category as $row) : ?>
              <div class="shadow-lg rounded-lg">
                <a href="pages/product.php?id=<?= $row->id_produit ?>">
                  <img src='../images/products/<?= $row->url_img ?>' class="rounded-tl-lg rounded-tr-lg" />
                </a>
                <div class="p-5">
                  <h3><a href="#"><?= $row->Name ?></a></h3>
                  <div class="flex flex-col xl:flex-row justify-between">
                    <a class="bg-gradient-to-r from-red-600 to-pink-500 rounded-full py-2 px-4 my-2 text-sm text-white hover:bg-pink-600 hover:from-pink-600 hover:to-pink-600 flex flex-row justify-center" href="#">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                      </svg>
                      Add to cart
                    </a>
                    <a class="bg-purple-600 rounded-full py-2 px-4 my-2 text-sm text-white hover:bg-purple-700 flex flex-row justify-center" href="?id=<?= $row->id_produit ?>">
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
    </section>
    <!-- end products by category -->

  <?php endif; ?>
  <?php require_once 'footer.php' ?>