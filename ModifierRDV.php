
<?php 

session_start();

if(isset($_SESSION['email'])&& $_SESSION['role']=="admin" ){

   include('vues/vModifierRDV.php'); 









}
else{

    header('Location: Connexion.php');
}

?>

