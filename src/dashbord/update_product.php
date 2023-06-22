<?php
// session_start();


if (!isset($_GET['id'])) {
    header('Location:dashbord.php');
}

use Opium\EcommerceWebsite\db;

require_once '../database/db.php';

$title = 'update product';
$css = '../css/tailwind.css';
$home = '../index.php';
$shop = '../pages/shop.php';
$contact = '../pages/contact.php';
$Login = "pages/login.php";
$cart = "../pages/cart.php";
require_once '../pages/header.php';
if (!isset($_SESSION['admin'])) {
    header('Location:../pages/login.php');
}
?>
<section>
    <h1 class="heading">update product</h1>
    <div class="block p-6 rounded-lg shadow-lg bg-white ">
        <form method="POST" action="update_action.php">
            <?php
            $stmt = db::ExecQuery('SELECT * FROM produit WHERE id_produit = ?', [$_GET['id']]);
            $obj = $stmt->fetch(PDO::FETCH_OBJ);
            ?>
            <div class="create_form">
                <div class="column">
                    <div class="form-group mb-6">
                        <label for="exampleInputEmail1" class="form-label inline-block mb-2 text-gray-700">Product name</label>
                        <input type="text" value="<?= $obj->Name ?>" name="name" class="form-control
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
                        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product name" required>
                        <!-- <small id="emailHelp" class="block mt-1 text-xs text-gray-600">We'll never share your email with anyone
                    else.</small> -->
                    </div>

                    <div class="form-group mb-6">
                        <label for="exampleInputEmail1" class="form-label inline-block mb-2 text-gray-700">Description</label>
                        <textarea name="description" class="
                            form-control
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
                            focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
                            " id="exampleFormControlTextarea1" rows="5" placeholder="product description" required>
                            <?= $obj->description ?>
                        </textarea>
                    </div>


                    <?php
                    $stmt = db::ExecQuery('SELECT Num_categorie	, Name_categorie from categorie group by Name_categorie ', []);
                    $category = $stmt->fetchAll(PDO::FETCH_OBJ);
                    ?>
                    <div class="form-group mb-6">
                        <label for="exampleInputEmail1" class="form-label inline-block mb-2 text-gray-700">Category</label>
                        <select name="category" class="form-select
                    appearance-none
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding bg-no-repeat
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Disabled select example" required>
                            <?php
                            foreach ($category as $ob) :
                            ?>
                                <option value="<?= $ob->Num_categorie ?>" selected=<?= $ob->Num_categorie == $obj->Num_categorie ?>><?= $ob->Name_categorie ?></option>
                            <?php
                            endforeach;;
                            ?>
                        </select>
                    </div>
                </div>

                <div class="column">
                    <div class="form-group mb-6">
                        <label for="exampleInputEmail1" class="form-label inline-block mb-2 text-gray-700">quantity</label>
                        <input name="quantite_produit" value="<?= $obj->quantite_produit ?>" type="number" class="form-control
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
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product Amount" required>
                        <!-- <small id="emailHelp" class="block mt-1 text-xs text-gray-600">We'll never share your email with anyone
                else.</small> -->
                    </div>

                    <div class="form-group mb-6">
                        <label for="exampleInputEmail1" class="form-label inline-block mb-2 text-gray-700">price</label>
                        <input name="price" value="<?= $obj->price ?>" type="number" class="form-control
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
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product price" required>
                        <!-- <small id="emailHelp" class="block mt-1 text-xs text-gray-600">We'll never share your email with anyone
                else.</small> -->
                    </div>

                    <div class="form-group mb-6">
                        <label for="exampleInputEmail1" class="form-label inline-block mb-2 text-gray-700">discount</label>
                        <input name="discount" value="<?= $obj->discount ?>" type="number" class="form-control
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
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product discount">
                        <!-- <small id="emailHelp" class="block mt-1 text-xs text-gray-600">We'll never share your email with anyone
                else.</small> -->
                    </div>

                    <div class="form-group mb-6">
                        <label for="exampleInputEmail1" class="form-label inline-block mb-2 text-gray-700">image</label>
                        <input name="url_img" value="<?= $obj->url_img ?>" type="file" class="form-control
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
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product image url" required>
                        <!-- <small id="emailHelp" class="block mt-1 text-xs text-gray-600">We'll never share your email with anyone
                else.</small> -->
                    </div>
                </div>

            </div>
            <button type="submit" name="update" class="
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
      ease-in-out">modify Product</button>

        </form>

</section>

<?php
require_once '../pages/footer.php';
?>