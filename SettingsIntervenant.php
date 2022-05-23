
<?php 

session_start();

if(isset($_SESSION['email'])){
    include('include/gestionBDD.php'); 
    $ListeIntervenant=ListerIntervenant();
    $count=CountIntervenant();
    $i=0;
    $j=0;

   include('vues/vSettingsIntervenant.php'); 


if(isset($_POST['addValueNom']) && isset($_POST['addValuePrenom']))
{
    if($_POST['addValueNom']!="" && $_POST['addValuePrenom']!="")
   {

    addIntervenant($_POST['addValuePrenom'], $_POST['addValueNom']);

    echo("<script>location.href='PrendreRDV.php'</script>");

    }
}




if(isset($_POST['removeValue']))
{
    
    if($_POST['removeValue']!="Aucun")
   {
    $FullName  = $_POST['removeValue'];
    $Intervenant = explode(" ", $FullName);

    removeIntervenant($Intervenant[0], $Intervenant[1]);
    echo("<script>location.href='PrendreRDV.php'</script>");

    }

}


}
else{

    header('Location: Connexion.php');
}

?>

