<?php

use Opium\EcommerceWebsite\db;

require_once '../database/db.php';

$title = 'create product';
$css = '../css/tailwind.css';
$home = '../index.php';
$shop = '#';
$contact = 'contact.php';
$Login = "pages/login.php";
$cart = "cart.php";
require_once '../pages/header.php';
if (!isset($_SESSION['admin'])) {
    header('Location:../pages/login.php');
}
?>
<section>
    <h1 class="heading">create a new product</h1>
    <div class="block p-6 rounded-lg shadow-lg bg-white ">
        <form method="POST" action="create_action.php">

            <div class="create_form">
                <div class="column">
                    <div class="form-group mb-6">
                        <label for="exampleInputEmail1" class="form-label inline-block mb-2 text-gray-700">Product name</label>
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
                    " id="exampleFormControlTextarea1" rows="5" placeholder="product description" required></textarea>
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
                            <option selected>Open this select menu</option>
                            <?php
                            foreach ($category as $obj) :
                            ?>
                                <option value=<?= $obj->Num_categorie ?>><?= $obj->Name_categorie ?></option>
                            <?php
                            endforeach;;
                            ?>
                        </select>
                    </div>
                </div>

                <div class="column">
                    <div class="form-group mb-6">
                        <label for="exampleInputEmail1" class="form-label inline-block mb-2 text-gray-700">quantity</label>
                        <input name="quantite_produit" type="number" class="form-control
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
                        <input name="price" type="number" class="form-control
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
                        <input name="discount" type="number" class="form-control
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
                        <input name="image" type="file" class="form-control
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
            <button type="submit" name="create" class="
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
                ease-in-out">Add Product</button>

        </form>

</section>

<?php
require_once '../pages/footer.php';
?>