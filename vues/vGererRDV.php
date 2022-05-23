<!DOCTYPE html>
<html>

  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  
<head><script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}


</script></head>



<body>
  
<?php include('vues/navbar.php'); 

    $i = 0;
    if($ListeIntervention!==null){
      ?> 
      <div class="table-responsive" id="wrapper">
     <table  style = "background-color: #FFFFFF;" id="table" class="table table-hover">
       <thead>
         <tr>
           <th scope="col">Prénom</th>
           <th scope="col">Nom</th>
           <th scope="col">Adresse d'intervention</th>
           <th scope="col">Date de l'intervention</th>
           <th scope="col">Heure du rendez-vous</th>
           <th scope="col">Numéro du client</th>
           <th scope="col">Sujet de l'intervention</th>
           <th scope="col">Modifier l'intervention</th>
           <th scope="col">Annuler l'intervention</th>
         </tr>
       </thead>
       <tbody> <?php
    while($i < count($ListeIntervention))
    { 
   
?>  

    
  <tr class="table-light">
  <?php $ListeIntervention[$i]["IDIntervention"]?>
  <?php $ListeIntervention[$i]["Email"]?>
  <td style = "background-color: #FFFFFF;"><?php echo $ListeIntervention[$i]["Prenom"]?></td>
  <td style = "background-color: #FFFFFF;"><?php echo $ListeIntervention[$i]["Nom"]?></td>
  <td style = "background-color: #FFFFFF;"><?php echo $ListeIntervention[$i]["AdresseIntervention"]?></td>
  <td style = "background-color: #FFFFFF;"><?php echo $ListeIntervention[$i]["DateIntervention"]?></td>
  <td style = "background-color: #FFFFFF;"><?php echo $ListeIntervention[$i]["HeureIntervention"]?></td>
  <td style = "background-color: #FFFFFF;"><?php echo $ListeIntervention[$i]["NumeroClient"]?></td>
  <td style = "background-color: #FFFFFF;"><?php echo $ListeIntervention[$i]["BesoinIntervention"]?></td>

  <td style = "background-color: #FFFFFF;"><a href="ModifierRDVform.php?IDIntervention= <?php echo $ListeIntervention[$i]["IDIntervention"]?>" ><button class ="btn btn-outline-warning">Modifier</button></a></td>
 
 



  <td style = "background-color: #FFFFFF;"><a href="GererRDV.php?IDIntervention= <?php echo $ListeIntervention[$i]["IDIntervention"]?>" href="deletelink" onclick="return confirm('Êtes vous sûr de vouloir supprimer cette intervention ?')"><button onClick="window.location.reload()" class ="btn btn-outline-danger">Supprimer</button></td>

    </tr>
    <?php
        $i = $i + 1;
     }
    }else{


    }
?> 

  </tbody>
</table>

</div>




</body>
</html>


