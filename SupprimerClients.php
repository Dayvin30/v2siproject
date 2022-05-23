<?php 
session_start();


if(isset($_SESSION['email'])&& $_SESSION['role']=="admin" ){
    include('include/gestionBDD.php');
    $info=ListerClients();
    


if(isset($_GET['Nom']) && isset($_GET['Prenom']))
{

SupprimerClient($_GET['Nom'],$_GET['Prenom']);


?>

<script type="text/javascript">
window.location.href = 'AfficherClients.php';


</script>

<?php

}

}

else{
    
    
    header('Location: Connexion.php');

}
if(isset($_SESSION['msg'])){
    echo $_SESSION["msg"];
    }

?>


