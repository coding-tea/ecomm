<?php

use Opium\EcommerceWebsite\db;

require '../database/db.php';
$profile = 'profile.php';
$Sign_out = '../dashbord/destroy.php';
$admin = '../dashbord/dashbord.php';
$title = 'my Commande';
$css = '../css/tailwind.css';
$home = '../index.php';
$shop = 'shop.php';
$contact = 'contact.php';
$Login = "login.php";
$cart = "cart.php";
require_once 'header.php';
if (!isset($_SESSION['user'])) {
  header('Location:/login.php');
}
?>

<section>
  <h1 class="heading">my Commande</h1>
  <div>
    <table class="table inline-block text-gray-400 border-separate space-y-6 text-sm w-full">
      <thead class="bg-blue-500 text-white">
        <tr>
          <th class="p-3 text-center">Date de commande</th>
          <th class="p-3 text-center">Quantity</th>
          <th class="p-3 text-center">Produit</th>
          <th class="p-3 text-center">Total</th>
          <th class="p-3 text-center">State</th>
          <th class="p-3 text-center">action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($_SESSION['user'])) :
          try {
            $num_user = $_SESSION['numU'];
            // $stm = db::ExecQuery("select * from  commande C, lignecommande L, produit P where C.num_commande=L.num_commande and L.id_produit = P.id_produit and C.id_compte = ?", [$id_compte]);
            $stm = db::ExecQuery("select * from  commande  where Num_user = ? order by state_commande", [$num_user]);
            $commandes = $stm->fetchAll(PDO::FETCH_OBJ);
            if (isset($commandes)) :
              foreach ($commandes as $commande) :
                $stmtLigne = db::ExecQuery('SELECT * FROM lignecommande L, produit P where L.id_produit=P.id_produit and num_commande = ?', [$commande->num_commande]);
                $lignecommandes = $stmtLigne->fetchAll(PDO::FETCH_OBJ);
                if (isset($lignecommandes)) :
        ?>


                  <tr class="bg-gray-200 lg:text-black hover:bg-blue-100 text-center">
                    <td class="p-3 font-bold"><?= $commande->date_commande ?></td>
                    <td class="p-3 font-bold">
                      <!--  Afficher la quantité de cette  COMMANDE -->
                      <?php
                      foreach ($lignecommandes as $ligne) : ?>
                        <h4 style="padding: 2px;margin : 15px"><?= $ligne->qte_commande  ?></h4>
                      <?php endforeach; ?>

                    </td>

                    <td class="p-3 uppercase  font-bold">

                      <!--  Afficher  les image des produit de cette COMMANDE -->

                      <?php
                      $price = 0;
                      foreach ($lignecommandes as $ligne) :
                        $price += $ligne->qte_commande * $ligne->price;
                      ?>
                        <img src="../images/products/<?= $ligne->url_img  ?>" class="w-12 h-12 rounded-full border-2 border-blue-200" alt="img"><br>
                      <?php endforeach; ?>


                    </td>
                    <!--  Calculer Total de cette   COMMANDE -->


                    <td class="p-3" font-bold>
                      <p class="font-bold"><?= $price ?> DH</p>
                    </td>

                    <td class="p-3" font-bold>
                      <p class="font-bold">

                        <!-- Afficher les cas de la comande  -->

                        <?php
                        if ($commande->state_commande == 0) echo "En Attente";
                        else if ($commande->state_commande == 1) echo "En Cours";
                        else if ($commande->state_commande == 2) echo "Terminer";
                        ?>
                      </p>
                    </td>



                    <!-- to check if users can cancel the commande or the commande are received and he cant't remove it -->



                    <?php if ($commande->state_commande == 0) { ?>
                      <td class="p-3" font-bold>
                        <!-- before verify the commande user can only cancel the commande -->

                        <button class="bg-transparent hover:bg-red-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" onClick="return confirm('Do you sure to cancel this commande')">
                          <a href="deleteCommande.php?numC=<?= $commande->num_commande ?>">
                            cancel
                          </a>
                        </button>
                      </td>
                    <?php } ?>
                    <?php if ($commande->state_commande == 1) { ?>

                      <!-- after verify the commande user can verife that the commande received or cancel the commande -->
                      <td class="p-3" font-bold>
                        <button class="bg-transparent hover:bg-green-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                          <a href="verifierCommande.php?numC=<?= $commande->num_commande ?>">
                            Received
                          </a>
                        </button>

                      </td>
                    <?php } ?>

                    <!-- after received the commande user have no action -->



                  </tr>

        <?php
                endif;
              endforeach;
            endif;
          } catch (Exception $e) {
            echo "Error : " . $e->getMessage();
          }
        endif;
        ?>

      </tbody>
    </table>
  </div>
</section>

<?php
require_once 'footer.php';
?>