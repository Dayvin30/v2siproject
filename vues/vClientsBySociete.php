<!DOCTYPE html>
<html>

  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  
  <style type="text/css">
    #warning-message { display: none; }
    @media only screen and (orientation:portrait){
        #wrapper { display:none; }
        #warning-message { display:block; }
    }
    @media only screen and (orientation:landscape){
        #warning-message { display:none; }
    }
</style>
<body>
  
<?php include('vues/navbar.php');
      
?>
<div id="wrapper">
<table style = "background-color: #FFFFFF;" class="table table-hover">
  <thead>
    <tr>
    <th scope="col">Société</th>
      <th scope="col">Prénom</th>
      <th scope="col">Nom</th>
      <th scope="col">Adresse</th>
      <th scope="col">Email</th>
      <th scope="col">Numero</th>

    </tr>
  </thead>
  <tbody>
  <?php
    $i = 0;
    while($i < $count)
    { 
 ?> 
  <tr  style = "background-color: #FFFFFF;" class="table-light">
  <td  style = "background-color: #FFFFFF;"><?php echo $ListeClientBySociete[$i]["Societe"]?></td>
  <td  style = "background-color: #FFFFFF;"><?php echo $ListeClientBySociete[$i]["Prenom"]?></td>
  <td  style = "background-color: #FFFFFF;"><?php echo $ListeClientBySociete[$i]["Nom"]?></td>
  <td  style = "background-color: #FFFFFF;"><?php echo $ListeClientBySociete[$i]["Adresse"]?></td>
  <td  style = "background-color: #FFFFFF;"><?php echo $ListeClientBySociete[$i]["Email"]?></td>
  <td  style = "background-color: #FFFFFF;"><?php echo $ListeClientBySociete[$i]["Numero"]?></td>

    </tr>
    <?php
        $i = $i + 1;
     }
?> 

  </tbody>
</table>

</div>
<div id="warning-message">
    Cette partie du site est seulement disonible en mode paysage.
</div>

</body>
</html>


