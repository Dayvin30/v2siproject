
<?php 

session_start();
if(isset($_SESSION['email']) && $_SESSION['role']=="admin"){
include('include/gestionBDD.php');
$countIdentifiant=countClients();
$ListeIdentifiant=ListerIdentifiants();
include('vues/vGererActivite.php');

if(isset($_GET['Statut'])){


        ModifierStatut($_GET['Prenom'], $_GET['Nom'], $_GET['Email'], $_GET['Statut']);
        ?> <script> window.location.href = "GererActivite.php";
        </script>
    
        <?php

}

if(isset($_GET['supprimer'])){


    SupprimerClient($_GET['Nom'], $_GET['Prenom']);
    
    ?> <script> window.location.href = "GererActivite.php";
    </script>

    <?php

}

}
else{

    header('Location: Connexion.php');
}

?>

