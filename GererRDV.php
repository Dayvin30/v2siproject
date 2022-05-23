  
<?php 

session_start();


if(isset($_SESSION['email'])){

   
    include('include/gestionBDD.php');
  

   


 
    $ListeIntervention=ListerIntervention();
  

  
 if(isset($_GET['IDIntervention'])){

          if($ListeIntervention!==null){

           SupprimerIntervention($_GET['IDIntervention']);
           header('Location: GererRDV.php');


    }
   
    }

    



    
}
else{

    header('Location: Connexion.php');
}

include('vues/vGererRDV.php'); 
var_dump($_SESSION['admin']);


?>

