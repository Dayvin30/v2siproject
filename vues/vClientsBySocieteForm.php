<!DOCTYPE html>
<html>

  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
  <div class="bg-image"
  

     style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/76.jpg');
            height: 100vh">
            <script src="assets/jquery.min.js"></script>
            <script src="dist/js/bootstrap.bundle.min.js"></script>
            
<?php include('vues/navbar.php'); ?>
<body>
    
<form method = post action="">
<div class="container"> <div class=" text-center mt-5 ">
        <h3>Société</h3>
    </div>
    
    <div class="row ">
        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                <div class="card-body bg-light">
                    <div class="container">
                        <form id="contact-form" role="form">
                            <div class="controls">
                                <div class="row">
                               
                                        
                                        <div class="form-group">
                                        <label for="exampleSelect1" class="form-label mt-4">Choisir une société</label>
                                        <select class="form-select" name="Societe" id="exampleSelect1">
                                          <?php while($i<$count) { 
                                        echo("<option>".$ListeSociete[$i]['Societe']);
                                        $i++;                                                                
                                        } ?> 
                                        </select>
                                        
                                      </div>
                                    </div>
                                        </div><br><input type="submit" action ="" class="btn btn-primary" value="Valider">
                                    
                                </div>
                                    
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div> 
</div>
</form> 

</body>
</html>


