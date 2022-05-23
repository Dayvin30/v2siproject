  
<meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/5/flatly/bootstrap.min.css" >
<link rel="stylesheet" type="text/css" href="https://bootswatch.com/5/flatly/bootstrap.css  " >
<script src="https://kit.fontawesome.com/78ea5fd995.js" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<head><script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
</script>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
<div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="assets/logo.png" height="35"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="Accueil.php">Accueil
            <span class="visually-hidden">(current)</span>
          </a>
        </li>

        <?php if($_SESSION['role']=="client" || $_SESSION['role']=="admin" || $_SESSION['role']=="technicien"){ ?>            <li class="nav-item">
          <a class="nav-link" href="PrendreRDV.php">Plannifier un rendez-vous</a>
        </li>                <?php } ?>

       
      <!--  <li class="nav-item">
          <a class="nav-link" href="AfficherRDV.php">Afficher les rendez-vous</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link" target="_blank" onclick="return confirm('Vous allez être redirigé vers une autre page')"  href="https://calendly.com/app/scheduled_events/user/me">Gérer un rendez-vous</a>
        </li> -->

        <?php if($_SESSION['role']=="admin"){ ?>           <li class="nav-item">
          <a class="nav-link" href="AfficherClients.php?rowNumber=0&startingRow=12">Gérer clients</a>
        </li>                  <?php } ?>

        <?php if($_SESSION['role']=="admin" || $_SESSION['role']=="lecteur" || $_SESSION['role']=="technicien"){ ?>             <li class="nav-item">
          <a class="nav-link" href="ClientsBySocieteForm.php">Société</a>
        </li>                <?php } ?>


        <?php if($_SESSION['role']=="admin" || $_SESSION['role']=="lecteur" || $_SESSION['role']=="technicien" || $_SESSION['role']=="client") { ?>           <li class="nav-item">
          <a class="nav-link" href="Calendrier.php">Agenda</a>
        </li>                  <?php } ?>


        <?php if($_SESSION['role']=="admin" || $_SESSION['role']=="lecteur"){ ?>             <li class="nav-item">
          <a class="nav-link" href="Historique.php?rowNumber=0&startingRow=12">Historique</a>
        </li>                <?php } ?>

        <?php if($_SESSION['role']=="admin"){ ?>          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Administration</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="GererIdentifiant.php">Gestions des identifiants</a>
            <a class="dropdown-item" href="GererActivite.php">Gérer l'activité d'un compte</a>

        </li>                   <?php } ?>

        <?php if($_SESSION['role']!="admin"){ ?>          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Administration</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="ModifierMDP.php?Email="<?php $_SESSION['email'] ?> >Modifier mon mot de passe</a>

        </li>                   <?php } ?>


     
      </ul>

      <div class="nav navbar-nav navbar-right"> 
      <li class="nav-item">
          <a class="nav-link" href="/V2SI/Deconnexion.php">Déconnexion</a>
        </li>
      </div>
      
      
      
    </div>
  </div>
</nav>

<br><br>
