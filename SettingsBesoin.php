
<?php 

session_start();

if(isset($_SESSION['email'])){
    include('include/gestionBDD.php'); 
    $ListeBesoin=ListerBesoin();
    $count=CountBesoin();
    $ListeBesoin=ListerBesoin();
    $i=0;

   include('vues/vSettingsBesoin.php'); 


if(isset($_POST['addValue']))
{
    if($_POST['addValue']!="")
   {

    addBesoin($_POST['addValue']);

    echo("<script>location.href='PrendreRDV.php'</script>");

    }
}



if(isset($_POST['removeValue']))
{
    
    if($_POST['removeValue']!="")
   {

    removeBesoin($_POST['removeValue']);
    echo("<script>location.href='PrendreRDV.php'</script>");

    }

}


}
else{

    header('Location: Connexion.php');
}

?>

