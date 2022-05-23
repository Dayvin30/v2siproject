
<?php 
header("Content-Type: text/html;charset=utf-8");
session_start();
if(isset($_SESSION['email']) && $_SESSION['role']!='lecteur'){
    include('include/gestionBDD.php');
    $ListeBesoin=ListerBesoin();
    $count=CountBesoin();
    $ListeBesoin=ListerBesoin();
    $ListeIntervenant=ListerIntervenant();
    $countIntervenant=CountIntervenant();
    $i=0;
    $j=0;
    include('vues/vPrendreRDV.php');



    var_dump($_SESSION['role']);
                                        
                                    
if(isset($_POST['DateIntervention']) && isset($_POST['PrenomIntervention']) && isset($_POST['NomIntervention']) && isset($_POST['EmailIntervention']) && isset($_POST['NumeroTelephoneIntervention']) && isset($_POST['LieuIntervention']) && isset($_POST['BesoinIntervention']))
{

    $_POST['LieuIntervention'] =  str_replace("'", '', $_POST['LieuIntervention']);
    $_POST['Societe'] =  str_replace("'", '', $_POST['Societe']);
    $_POST['PrenomIntervention'] =  str_replace("'", '', $_POST['PrenomIntervention']);
    $_POST['NomIntervention'] =  str_replace("'", '', $_POST['NomIntervention']);
    $_POST['EmailIntervention'] =  str_replace("'", '', $_POST['EmailIntervention']);
    $_POST['NumeroTelephoneIntervention'] =  str_replace("'", '', $_POST['NumeroTelephoneIntervention']);
    $_POST['HeureIntervention'] =  str_replace("'", '', $_POST['HeureIntervention']);
    $_POST['BesoinIntervention'] =  str_replace("'", '', $_POST['BesoinIntervention']);
    $_POST['ListeIntervenant'] =  str_replace("'", '', $_POST['ListeIntervenant']);
    

    $date = implode('-', array_reverse(explode('/', $_POST['DateIntervention'])));
CreerIntervention($_POST['Societe'], $_POST['PrenomIntervention'],$_POST['NomIntervention'], $_POST['EmailIntervention'], $_POST['NumeroTelephoneIntervention'], $date,$_POST['HeureIntervention'], $_POST['LieuIntervention'], $_POST['BesoinIntervention'], $_POST['ListeIntervenant'], "Aucun", $_POST['Commentaire'], $_POST['Fichier']);   











}
}
else{
        
    
    
    header('Location: Connexion.php');

}
?>

