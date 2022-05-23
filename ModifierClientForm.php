<?php 
session_start();


if(isset($_SESSION['email'])  && $_SESSION['role']=="admin"  ){
    include('include/gestionBDD.php');
    $info=ListerClients();
    include('vues/vModifierClientsForm.php');
    

if(isset($_POST['PrenomClient']) && isset($_POST['NomClient']))
{

ModifierClient($_POST['PrenomClient'],$_POST['NomClient'],$_GET['Prenom'],$_GET['Nom']);


}

}

else{
    
    
    header('Location: Connexion.php');

}
if(isset($_SESSION['msg'])){
    echo $_SESSION["msg"];
    }

?>


