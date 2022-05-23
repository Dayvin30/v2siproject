<!DOCTYPE html>
<html>

<?php 

include('vues/navbar.php'); ?>
 
 <?php
  if(!isset($_SESSION['first_run'])){
  
  $_SESSION['first_run'] = 1;
  ?> <br><div class="alert alert-dismissible alert-success">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong>Vous êtes bien connecté!</strong></div>
  


<?php
}
?>
<body>
<div class="bg-image"
 
     style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/76.jpg');
            height: 100vh">
            </div>




























</body>
</html>

