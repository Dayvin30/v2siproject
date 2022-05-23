<?php 
session_start();


if(isset($_SESSION['email'])&& $_SESSION['role']=="admin" ){
    include('include/gestionBDD.php');
    $info=ListerIdentifiants();
    include('vues/vModifierIdentifiantForm.php');
    

if(isset($_POST['PrenomClient']) && isset($_POST['NomClient']))
{

ModifierMDP($_POST['EmailClient'],$_POST['MdpClient']);

if($_SESSION['role']=="admin")
{
    ?> <script>  window.location.href = "GererIdentifiant.php";
    </script> <?php
}

}

}

else{
    
    
    header('Location: Connexion.php');

}
if(isset($_SESSION['msg'])){
    echo $_SESSION["msg"];
    }

?>


