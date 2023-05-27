<?php
ob_start();
session_start();
ob_start();
use Opium\EcommerceWebsite\db;

require_once '../database/db.php';

if (isset($_POST['login'])) {
    $email = $_POST["text"];
    $password = $_POST["password"];
    if (!empty($email) && !empty($password)) {
        $stmt = db::ExecQuery('SELECT C.id_compte, role, U.Num_user FROM compte C , users U WHERE C.id_compte=U.id_compte and C.email = ? and C.password = ?', [$email, $password]);
        $stm = db::ExecQuery("SELECT id_compte, role FROM compte WHERE email = ? and password = ? and role= 'admin' ", [$email, $password]);
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        $admin = $stm->fetch(PDO::FETCH_OBJ);
        if ($stmt->rowCount() == 1 || $stm->rowCount() == 1) {
            echo 'admin';
            if ($admin->role == 'admin') {
                echo 'admin';
                $_SESSION['admin'] = $admin->id_compte;
                header('Location:../dashbord/dashbord.php');
                die();
            } else {
                $_SESSION['user'] = $user->id_compte;
                $_SESSION['numU'] = $user->Num_user;
                header('Location:../index.php');
                die();
            }
        } else {
            $_SESSION["message"] = "MOT DE PASSE ET|OU EMAIL INCORRECTS";
            header('Location:login.php');
            die();
        }
    } else {
        header('Location:login.php');
        die();
    }
}

if (isset($_POST['change'])) {
    $stmt = db::ExecQuery('UPDATE compte inner join users set password = ? where compte.id_compte = users.id_compte and retrieve_password = ?', [$_POST['new_password'], $_POST['retrieve']]);
}
