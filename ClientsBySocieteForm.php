
<?php 

session_start();

if(isset($_SESSION['email']) && ( $_SESSION['role']=="admin" || $_SESSION['role']=="lecteur" || $_SESSION['role']=="technicien" )){
    include('include/gestionBDD.php'); 
    $ListeSociete=ListerSociete();
    $count=CountSociete();
    $i=0;

   include('vues/vClientsBySocieteForm.php'); 

   if(isset($_POST['Societe'])){

    echo("<script> location.href = 'ClientsBySociete.php?Societe=".$_POST['Societe']."' </script>");

   }




}
else{

    header('Location: Connexion.php');
}

?>

