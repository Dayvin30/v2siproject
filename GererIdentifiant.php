
<?php 

session_start();
if(isset($_SESSION['email'])  && $_SESSION['role']=="admin"  ){
include('include/gestionBDD.php');
$countIdentifiant=countClients();
$ListeIdentifiant=ListerIdentifiants();
include('vues/vGererIdentifiant.php');



}
else{

    header('Location: Connexion.php');
}

?>

