<!DOCTYPE html>
<html>

<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  


<body>
<?php include('vues/navbar.php');

    
?>

<br>
<div class="table-responsive" id="card">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Rechercher par prénom">
<table  id="sortMe" style = "background-color: #FFFFFF;" class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Prénom</th>
      <th scope="col">Nom</th>
      <th scope="col">Adresse d'intervention</th>
      <th scope="col">Date de l'intervention</th>
      <th scope="col">Heure du rendez-vous</th>
      <th data-type="number" scope="col">Numéro du client</th>
      <th scope="col">Sujet de l'intervention</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i = 0;
    while($i < count($ListeIntervention))
    { 
 ?> 
  <tr style = "background-color: #FFFFFF;" class="table-light">
  <td data-label="Prénom" style = "background-color: #FFFFFF;"><?php echo $ListeIntervention[$i]["Prenom"]?></td>
  <td data-label="Nom" style = "background-color: #FFFFFF;"><?php echo $ListeIntervention[$i]["Nom"]?></td>
  <td data-label="Adresse d'intervention" style = "background-color: #FFFFFF;"><?php echo $ListeIntervention[$i]["AdresseIntervention"]?></td>
  <td data-label="date de l'intervention" style = "background-color: #FFFFFF;"><?php echo $ListeIntervention[$i]["DateIntervention"]?></td>
  <td data-label="Heure du rendez-vous" style = "background-color: #FFFFFF;"><?php echo $ListeIntervention[$i]["HeureIntervention"]?></td>
  <td data-label="Numéro du client" style = "background-color: #FFFFFF;"><?php echo $ListeIntervention[$i]["NumeroClient"]?></td>
  <td data-label="Sujet de l'intervention" style = "background-color: #FFFFFF;"><?php echo $ListeIntervention[$i]["BesoinIntervention"]?></td>

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
while($count<$countHistorique){
  ?>
    <a href="Historique.php?startingRow=12&rowNumber=<?php echo($count) ?>"><?php echo($i); ?></a>
  <?php $count=$count+12; $i++; ?><?php
}

?>
  



  </div>









































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


</style></style>
</body>
</html>



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
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("sortMe");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

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