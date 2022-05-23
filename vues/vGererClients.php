<!DOCTYPE html>
<html>

  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  





<body>
  
<?php include('vues/navbar.php');
      
?>
<br>
<div id="card">
  
<table id="sortMe" style = "background-color: #FFFFFF;" class="table table-hover">
  <thead>
    <tr>
      <th style ="text-transform: uppercase;" scope="col">Nom</th>
      <th style ="text-transform: uppercase;" scope="col">Prénom</th>
      <th style ="text-transform: uppercase;" scope="col">Societe</th>
      <th style ="text-transform: uppercase;" scope="col">Adresse</th>
      <th style ="text-transform: uppercase;" scope="col">Email</th>
      <th style ="text-transform: uppercase;" scope="col">Numero</th>
      <th style ="text-transform: uppercase;" scope="col">Modifier</th>
      <th style ="text-transform: uppercase;" scope="col">Supprimer</th>
    </tr>
  </thead>
  

  <tbody>
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Nom de la société...">
  <?php
    $i = 0;
    while($i < count($ListeClient))
    { 
 ?> 
  <tr  style = "background-color: #FFFFFF;" class="table-light">
  <td  data-label="Nom" style = "background-color: #FFFFFF;"><?php echo $ListeClient[$i]["Nom"]?></td>
  <td  data-label="Prénom" style = "background-color: #FFFFFF;"><?php echo $ListeClient[$i]["Prenom"]?></td>
  <td  data-label="Société" style = "background-color: #FFFFFF;"><?php echo $ListeClient[$i]["Societe"]?></td>
  <td  data-label="Adresse" style = "background-color: #FFFFFF;"><?php echo $ListeClient[$i]["Adresse"]?></td>
  <td  data-label="Email" style = "background-color: #FFFFFF;"><?php echo $ListeClient[$i]["Email"]?></td>
  <td  data-label="Numéro" style = "background-color: #FFFFFF;"><?php echo $ListeClient[$i]["Numero"]?></td>
  <td  data-label="Modifier" style = "background-color: #FFFFFF;"><a href="ModifierClientForm.php?Nom=<?php echo $ListeClient[$i]["Nom"]?>&Prenom=<?php echo $ListeClient[$i]["Prenom"] ?>" ><button class ="btn btn-outline-warning">Modifier</button></a></td>
  <td  data-label="Supprimer" style = "background-color: #FFFFFF;"><a href="SupprimerClients.php?Nom=<?php echo $ListeClient[$i]["Nom"]?>&Prenom=<?php echo $ListeClient[$i]["Prenom"] ?>"href="deletelink" onclick="return confirm('Êtes vous sûr de vouloir supprimer cette intervention ?')"><button onClick="window.location.reload()" class ="btn btn-outline-danger">Supprimer</button></td>

    </tr>
    <?php
        $i = $i + 1;
     }
?> 

  </tbody>
</table>

</div>
<div class="pagination" style="display: flex;align-items: center;justify-content: center;">
<?php 
$count=0;
$i=1;
while($count<$countClients){
  ?>
    <a href="AfficherClients.php?startingRow=12&rowNumber=<?php echo($count) ?>"><?php echo($i); ?></a>
  <?php $count=$count+12; $i++; ?>  <?php
}
?>
  

  <style>.pagination {
  display: inline-block;
}

.paginaion a.active {
  background-color: #4CAF50;
  color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  border-radius: 5px;
  transition: background-color .3s;
}



  </div>
</body>
</html>

















































<style>table {
    border: 1px solid #ccc;
    width: 100%;
    margin:0;
    padding:0;
    border-collapse: collapse;
    border-spacing: 0;
  }

  table tr {
    border: 1px solid #ddd;
    padding: 5px;
		background: #fff;

  }

  table th, table td {
    padding: 10px;
    text-align: center;

  }

  table th {
    text-transform: uppercase;
    letter-spacing: 1px;
  }
  
  
  @media screen and (max-width: 600px) {

   #card table {
      border: 0;
    }

   #card table thead {
      display: none;
    }

   #card table tr {
      margin-bottom: 20px;
      display: block;
      border-bottom: 2px solid #ddd;
	 box-shadow: 2px 2px 1px #dadada;

    }

   #card table td {
      display: block;
      text-align: right;
      font-size: 13px;
    }

   #card table td:last-child {
      border-bottom: 0;
    }

   #card table td::before {
      content: attr(data-label);
      float: left;
      text-transform: uppercase;
      font-weight: bold;
    }
    	#card	tbody{
			line-height:0!important;
		}

  }</style>

<style>#myInput {
  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}

#myTable {
  border-collapse: collapse; /* Collapse borders */
  width: 100%; /* Full-width */
  border: 1px solid #ddd; /* Add a grey border */
  font-size: 18px; /* Increase font-size */
}

#myTable th, #myTable td {
  text-align: left; /* Left-align text */
  padding: 12px; /* Add padding */
}

#myTable tr {
  /* Add a bottom border to all table rows */
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  /* Add a grey background color to the table header and on hover */
  background-color: #f1f1f1;
}</style>
<script>
function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, t0, t1, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("sortMe");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    t2 = tr[i].getElementsByTagName("td")[2];
    
    if (t2) {
      txtValue = t2.textContent || t2.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
    







  }
}
</script>
