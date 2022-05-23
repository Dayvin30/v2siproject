
<?php 

session_start();
if(isset($_SESSION['email']) && $_SESSION['role']=='admin'){
include('include/gestionBDD.php');
$countClients=countClients();
$ListeClient=ListerClients();
if($ListeClient!==null){
$ListeClient=ListerClientsByLimit($_GET['rowNumber'],$_GET['startingRow']);
    include('vues/vGererClients.php');;



}else{
    include('vues/navbar.php');
    echo "Aucun client n'est enregistré";
}



}
else{

    header('Location: Connexion.php');
}

?>

