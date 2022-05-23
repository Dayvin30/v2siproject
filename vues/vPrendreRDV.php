<!DOCTYPE html>
<html>

  <meta http-equiv="Content-type" content="text/html; charset=utf-8" name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  

<body>
<div class="bg-image"
 
     style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/76.jpg');
             background-size: cover;" >
<?php include('vues/navbar.php');?>



<script>document.getElementById('form_societe').onkeypress = function () {
    if (event.keyCode === 39) { // apostrophe
        // prevent the keypress
        return false;
    }
};​</script>
<form method = post action="">
<div class="container"> <div class=" text-center mt-5 ">
        <h1>Planifier une intervention</h1>
    </div>
    
    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        <form id="contact-form" role="form">
                            <div class="controls">
                                <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">Société</label> <input id="form_societe" type="text" name="Societe" class="form-control" placeholder="Entrez la société..." required="required" data-error="Firstname is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">Prénom</label> <input id="form_name" type="text" name="PrenomIntervention" class="form-control" placeholder="Entrez le prénom..." required="required" data-error="Firstname is required."> </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_lastname">Nom</label> <input id="form_lastname" type="text" name="NomIntervention" class="form-control" placeholder="Entrez le nom..." required="required" data-error="Lastname is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_email">Email</label> <input id="form_email" type="email" name="EmailIntervention" class="form-control" placeholder="Entrez l'adresse email..." required="required" data-error="Valid email is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">Numéro de téléphone</label> <input pattern="[0-9]*" id="form_name" type="number" name="NumeroTelephoneIntervention" class="form-control" placeholder="Entrez un numéro de téléphone..." required="required" data-error="Firstname is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                <div class="form-group">
                                <label for="dresse">Saisisez votre adresse :</label>
                                <textarea  name="LieuIntervention" class ="form-control" id="adresse" rows="1" placeholder="Saisissez une adresse..."></textarea>
                                <div id="selection" style="display: none;" class="dropdown">
                                 </div>
                                </div> 
                               </div>
                               
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_date">Date</label> <input id="form_date" type="date"  name="DateIntervention" class="form-control" required="required" data-error="Lastname is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">Heure du rendez-vous</label> <input id="form_name" type="time" value="09:00" step="900"  name="HeureIntervention" class="form-control" placeholder="Entrez un numéro de téléphone..." required="required" data-error="Firstname is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group"> <label for="besoin">Choisissez un besoin</label>
                                    <input placeholder="Type de besoin..." list="TypeBesoin" id="form_besoin" name="BesoinIntervention" class="form-control"/>

                                    <datalist id="TypeBesoin">
                                    <?php while($i<$count) { 
                                        echo("<option value='".$ListeBesoin[$i]['Besoin']."'>");
                                        $i++;                                                                
                                        }?>
                                    </datalist><?php if($_SESSION['role']=="admin"){ ?>        <button class="btn btn-primary btn-sm" style="font-size:10px" onclick="window.location.href='SettingsBesoin.php'"> 
                                    
                                    
                                    <i class="fas fa-cog"></i></button>             <?php } ?>



                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-6">
                                    <div class="form-group"> <label for="intervenant">Choisissez un intervenant</label>
                                    <input  placeholder="Choisir un intervenant..." list="ListeIntervenant" id="intervenant" name="ListeIntervenant" class="form-control"/>

                                    <datalist id="ListeIntervenant">
                                    <?php while($j<$countIntervenant) { 
                                        echo("<option value='".$ListeIntervenant[$j]['PrenomIntervenant']." " .$ListeIntervenant[$j]['NomIntervenant']."'>");
                                        $j++;                                                                
                                        }?>
                                    </datalist><?php if($_SESSION['role']=="admin"){ ?>         <button class="btn btn-primary btn-sm" style="font-size:10px" onclick="window.location.href='SettingsIntervenant.php'"><i class="fas fa-cog"></i></button>            <?php } ?>
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group"> <label for="form_commentaire">Commentaire</label> <textarea  name="Commentaire"                 class ="form-control" id="Commentaire" rows="3" placeholder="Saisissez des informations complémentaires..."></textarea> </div>
                                    </div>
                                    <div class="col-md-6">
                                        
                                        <div class="form-group"> <label for="form_fichier">Fichier</label> <input id="form_fichier" type="file" name="Fichier" class="form-control" required="required" data-error="Lastname is required."> </div>
                                    </div>
                                    
                                   
                                    
                                   
                                <div class="row">
                                    <div class="col-md-12">
                                        <br>
                                    </div>
                                    <div class="col-md-12"> <input type="submit" action ="" class="btn btn-primary" value="Enregistrer l'intervention"> </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- /.8 -->
        </div> <!-- /.row-->
    </div>
</div>
</form>

</div>

<script type="text/javascript">
    var requestURL = 'https://api-adresse.data.gouv.fr/search/?q=';
    var select = document.getElementById("selection");
    window.onload = function() {
        document.getElementById("adresse").addEventListener("input", autocompleteAdresse, false);
    };
    function displaySelection(response) {
        if (Object.keys(response.features).length > 0) {
            select.style.display = "block";
            select.removeChild(select.firstChild);
            var ul = document.createElement('ul');
            select.appendChild(ul);
            response.features.forEach(function (element) {
                var li = document.createElement('li');
                var ligneAdresse = document.createElement('span');
                var infosAdresse = document.createTextNode(element.properties.postcode + ' ' + element.properties.city);
                ligneAdresse.innerHTML = element.properties.name;
                li.onclick = function () { selectAdresse(element); };
                li.appendChild(ligneAdresse);
                li.appendChild(infosAdresse);
                ul.appendChild(li);
            });
        } else {
            select.style.display = "none";
        }
    }
    function autocompleteAdresse() {
        var inputValue = document.getElementById("adresse").value;
        if (inputValue) {
            fetch(setQuery(inputValue))
                .then(function (response) {
                    response.json().then(function (data) {
                        displaySelection(data);
                    });
                });
        } else {
            select.style.display = "none";
        }
    };
    function selectAdresse(element) {
        document.getElementById("adresse").value = element.properties.name + " " + element.properties.postcode + " " + element.properties.city;
        select.style.display = "none";
        document.getElementById("resAdresse").value = element.properties.name;
        document.getElementById("CP").value = element.properties.postcode;
        document.getElementById("Ville").value = element.properties.city;
    }
    function setQuery(value) {
        return requestURL + value + "?type=housenumber&autocomplete=1";
    }
</script>


</body>
</html>


