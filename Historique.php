
<?php 

session_start();
if(isset($_SESSION['email']) && ($_SESSION['role']=="admin" || $_SESSION['role']=="lecteur")){
include('include/gestionBDD.php');

$ListeIntervention=HistoriqueByLimit($_GET["rowNumber"],$_GET["startingRow"]);
$countHistorique=countHistorique();
include('vues/vHistorique.php');



}
else{

    header('Location: Connexion.php');
}

?>

