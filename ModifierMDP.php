<?php 
session_start();


if(isset($_SESSION['email'])){
    include('include/gestionBDD.php');
    $info=ListerIdentifiants();
    include('vues/vModifierMDP.php');
    

if(isset($_POST['MDP']) && isset($_POST['newMDP']))
{

ModifierMDP($_SESSION['email'],$_POST['newMDP']);
$_SESSION['mdp']=$_POST['newMDP'];

if($_SESSION['role']!="admin")
{
    ?> <script>  window.location.href = "ModifierMDP.php";

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


