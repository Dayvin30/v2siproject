<?php



session_start();
if(isset($_SESSION['email'])){
include('vues/vAccueil.php');
var_dump($_SESSION['role']);
var_dump($_SESSION['email']);
var_dump($_SESSION['mdp']);
}else{

    header('Location: Connexion.php');
}









?>


