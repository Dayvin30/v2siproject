
<?php 
session_start();
$login=false;
include('vues/vConnexion.php');
include('include/gestionBDD.php');


  if(isset($_POST['email']) && isset($_POST['password']))
  {
      $login=connexion($_POST['email'], $_POST['password']);

  }

  if($login)
  {
    header('Location: accueil.php');
    $_SESSION['email']=$_POST['email'];
    $_SESSION['mdp']=$_POST['password'];
    $role=GetRole($_POST['email'], $_POST['password']);
    $_SESSION['role']=$role;
    
  }
?>

 
 

