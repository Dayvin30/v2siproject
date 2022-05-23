
<?php 

session_start();
if(isset($_SESSION['email']) && ( $_SESSION['role']=="admin" || $_SESSION['role']=="lecteur" || $_SESSION['role']=="technicien")){
include('include/gestionBDD.php');

$ListeClientBySociete=ListerClientsBySociete($_GET['Societe']);
$count=CountClientBySociete($_GET['Societe']);
if($ListeClientBySociete!==null){

    include('vues/vClientsBySociete.php');;


}else{
    include('vues/navbar.php');
    echo "Aucun client n'est enregistré";
}



}
else{

    header('Location: Connexion.php');
}

?>

