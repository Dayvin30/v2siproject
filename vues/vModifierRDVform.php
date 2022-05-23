<!DOCTYPE html>
<html>

  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <head><script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}

</script></head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">

  

<body>
<div class="bg-image"
 
     style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/76.jpg');
            height: 100vh">
<?php include('navbar.php');
?>




<form id="contactForm" action="#" method="post" >
<div class="container"> <div class=" text-center mt-5 ">
        <h1>Modifier une intervention</h1>
    </div>
    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        <form id="contactForm"  role="form" >
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">Prénom</label> <input  id="form_name" type="text" name="PrenomIntervention" class="form-control" onClick="this.setSelectionRange(0, this.value.length)" value="<?php echo $info['Prenom'] ?>" required="required" data-error="Firstname is required."> </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_lastname">Nom</label> <input  id="form_lastname" type="text" name="NomIntervention" class="form-control" onClick="this.setSelectionRange(0, this.value.length)" value="<?php echo $info['Nom']?>" required="required" data-error="Lastname is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_email">Email</label> <input id="form_email" type="email" name="EmailIntervention" class="form-control" onClick="this.select();" value="<?php echo $info['Email']?>" required="required" data-error="Valid email is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">Numéro de téléphone</label> <input id="form_name" type="tel" name="NumeroTelephoneIntervention" onClick="this.setSelectionRange(0, this.value.length)" class="form-control" value="<?php echo $info['NumeroClient']?>" required="required" data-error="Firstname is required."> </div>
                                    </div>

                                    
                                    
                                </div>
                                
                                
                                
                                <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group"> <label for="form_lastname">Adresse</label> <input id="form_lastname" type="text" name="LieuIntervention" class="form-control" onClick="this.setSelectionRange(0, this.value.length)" value="<?php echo $info['AdresseIntervention']?>" required="required" data-error="Lastname is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_need">Spécifiez le besoin</label> <select id="form_need" name="BesoinIntervention" class="form-select" required="required" data-error="Please specify your need.">
                                                <option><?php echo $info['BesoinIntervention']?></option>
                                                <option>Réparation de matériel</option>
                                                <option>Problème logiciel</option>
                                                <option>Problème réseau</option>
                                                <option>Autre</option>
                                            </select> </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_date">Date</label> <input id="form_date" type="date" name="DateIntervention" class="form-control" value="<?php echo $info['DateIntervention']?>" required="required" data-error="Lastname is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">Heure du rendez-vous</label> <input id="form_name" type="time" name="HeureIntervention" class="form-control" value="<?php echo $info['HeureIntervention']?>" required="required" data-error="Firstname is required."> </div>
                                    </div>
                                   
                                <div class="row">
                                    <div class="col-md-12">
                                        <br>
                                    </div>
                                    <div class="col-md-12"><input type="submit" href="deletelink" onclick="return confirm('Êtes vous sûr de vouloir modifier cette intervention ?')" class="btn btn-warning" value="Enregistrer les modifications"></div>
                                    
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
</body>
</html>


