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
    <th scope="col">Societe</th>
      <th scope="col">Prénom</th>
      <th scope="col">Nom</th>
      <th scope="col">Adresse d'intervention</th>
      <th scope="col">Date de l'intervention</th>
      <th scope="col">Heure du rendez-vous</th>
      <th scope="col">Numéro de téléphone</th>
      <th scope="col">Sujet de l'intervention</th>
      <th scope="col">Fichier</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i = 0;
    while($i < count($ListeIntervention))
    { 
 ?> 
  <tr  style = "background-color: #FFFFFF;" class="table-light">
  <td  style = "background-color: #FFFFFF;"><?php echo $ListeIntervention[$i]["Societe"]?></td>
  <td  style = "background-color: #FFFFFF;"><?php echo $ListeIntervention[$i]["Prenom"]?></td>
  <td  style = "background-color: #FFFFFF;"><?php echo $ListeIntervention[$i]["Nom"]?></td>
  <td  style = "background-color: #FFFFFF;"><?php echo $ListeIntervention[$i]["AdresseIntervention"]?></td>
  <td  style = "background-color: #FFFFFF;"><?php echo $ListeIntervention[$i]["DateIntervention"]?></td>
  <td  style = "background-color: #FFFFFF;"><?php echo $ListeIntervention[$i]["HeureIntervention"]?></td>
  <td  style = "background-color: #FFFFFF;"><?php echo $ListeIntervention[$i]["NumeroClient"]?></td>
  <td  style = "background-color: #FFFFFF;"><?php echo $ListeIntervention[$i]["BesoinIntervention"]?></td>
  <td  style = "background-color: #FFFFFF;"><a href='Fichiers/<?php echo $ListeIntervention[$i]["Fichier"]?>' target="_blank" ><button class ="btn btn-outline-info">Document</button></a></td>

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


