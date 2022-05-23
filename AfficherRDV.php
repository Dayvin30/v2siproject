
<?php 

session_start();
if(isset($_SESSION['email'])){
include('include/gestionBDD.php');

$ListeIntervention=ListerIntervention();
if($ListeIntervention!==null){

    include('vues/vAfficherRDV.php');;


}else{
    include('vues/navbar.php');
    echo "Aucun rendez-vous de prévu";
}



}
else{

    header('Location: Connexion.php');
}

?>

