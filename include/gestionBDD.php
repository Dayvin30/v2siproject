 <?php

// MODIFs A FAIRE
// Ajouter en têtes 
// Voir : jeu de caractères à la connection

/** 
 * Se connecte au serveur de données                     
 * Se connecte au serveur de données à partir de valeurs
 * prédéfinies de connexion (hôte, compte utilisateur et mot de passe). 
 * Retourne l'identifiant de connexion si succès obtenu, le booléen false 
 * si problème de connexion.
 * @return resource identifiant de connexion
 */
function connexionBDD() 
{
    $PARAM_hote='localhost'; // le chemin vers le serveur
    $PARAM_port='3306';
    $PARAM_nom_bd='v2si'; // le nom de votre base de données
    $PARAM_utilisateur='root'; // nom d'utilisateur pour se connecter
    $PARAM_mot_passe=''; // mot de passe de l'utilisateur pour se connecter
    $connect = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe);
    
    
    return $connect;

    //$hote = "localhost";
    // $login = "root";
    // $mdp = "";
    // return mysql_connect($hote, $login, $mdp);
}


/** 
 * Ferme la connexion au serveur de données.
 * Ferme la connexion au serveur de données identifiée par l'identifiant de 
 * connexion $idCnx.
 * @param resource $idCnx identifiant de connexion
 * @return void  
 */
function deconnecterServeurBD($idCnx) {

}


function connexion($email, $mdp)
{

  $connexion=connexionBDD();
  $requete="select Email, Mdp from client where Email = '".$email."' and Mdp ='".$mdp."' and Statut like 'Actif'";
  echo $requete;
  $reponse=$connexion->query($requete); 
  $reponse->setFetchMode(PDO::FETCH_OBJ);
  $ligne = $reponse->fetch(); 
  $i=0;
  while($ligne){

    $i++;
    $ligne=$reponse->fetch();

  }

  if($i==0){ 

    echo('Identifiants non reconnus  <br> <br>');
    $login=false;

  }else{

      echo('Vous etes connecté <br> <br>');
      $login=true;
     

  }
return($login);

}


function CreerClient($PrenomClient, $NomClient, $Adresse, $Email, $Numero, $Societe)
{

  $connexion=connexionBDD();

  $requete='select * from client where Prenom="'.$PrenomClient.'" AND Nom="'.$NomClient.'" and Email="'.$Email.'"';


  $reponse=$connexion->query($requete);
  $reponse->setFetchMode(PDO::FETCH_OBJ);
  
    if($reponse->rowCount()==0){

 
      $requete='insert into client (Prenom, Nom, Adresse, Email, Numero, Societe, Mdp, role, statut) VALUES ("'.$PrenomClient.'", "'.$NomClient.'", "'.$Adresse.'", "'.$Email.'" ,  "'.$Numero.'" , "'.$Societe.'", "uistercynene", "lecteur", "actif");';
      echo($requete);

      $reponse=$connexion->prepare($requete);
      $reponse->execute([$PrenomClient, $NomClient, $Adresse, $Email, $Numero, $Societe]);
   
      
    }


   

}


function CreerIntervention($Societe, $PrenomClient, $NomClient, $Email, $Numero, $DateIntervention, $HeureIntervention, $LieuIntervention, $BesoinIntervention, $Intervenant, $Statut, $Commentaire, $Document)
{

  $connexion=connexionBDD();

  $requete='select * from intervention where DateIntervention="'.$DateIntervention.'" AND HeureIntervention="'.$HeureIntervention.'"';


  $reponse=$connexion->query($requete);
  $reponse->setFetchMode(PDO::FETCH_OBJ);
  
    if($reponse->rowCount()>50){ /* > 0 */

      echo '<br> <div style="text-align:center"> <span class="badge bg-danger" style="font-size: 115%" >Une intervention existe déjà !</span> </div>';
   
      
    }
    else{



          $requete='insert into intervention (Societe, PrenomClient, NomClient, email, Numero, DateIntervention, HeureIntervention, LieuIntervention, BesoinIntervention, Intervenant, Statut, Commentaire, Document) VALUES ("'.$Societe.'", "'.$PrenomClient.'", "'.$NomClient.'", "'.$Email.'", "'.$Numero.'", "'.$DateIntervention.'", "'.$HeureIntervention.'" ,"'.$LieuIntervention.'", "'.$BesoinIntervention.'", "'.$Intervenant.'", "'.$Statut.'", "'.$Commentaire.'", "'.$Document.'");';
          echo($requete);

          $reponse=$connexion->prepare($requete);
          $reponse->execute([$Societe, $PrenomClient, $NomClient, $Email, $Numero, $DateIntervention, $HeureIntervention, $LieuIntervention, $BesoinIntervention, $Intervenant, $Statut, $Commentaire, $Document]);


          echo '<br> <div style="text-align:center"> <span class="badge bg-success" style="font-size: 115%" >L\'intervention a été crée !</span> </div>';
       /*
          $date = implode('-', array_reverse(explode('/', $DateIntervention)));
          echo '<script> window.open("https://calendly.com/dayvin30/itv1h/'.$date.'T'.$HeureIntervention.':00+01:00?month=2021-12&date=2021-12-16&name='.$PrenomClient.'&last_name='.$NomClient.'&email='.$Email.'&a3='.$Intervenant.'&a1='.$Societe.'&a2='.$Numero.'&a4='.$LieuIntervention.'&a5='.$Commentaire.'","_blank" // <- This is what makes it open in a new window.
        ); </script>';*/
        
        CreerClient($PrenomClient, $NomClient, $LieuIntervention, $Email, $Numero, $Societe);
  
    }

   

}

function addBesoin($Besoin)
{

  $connexion=connexionBDD();

  $requete='select * from besoinintervention where besoin="'.$Besoin.'"';


  $reponse=$connexion->query($requete);
  $reponse->setFetchMode(PDO::FETCH_OBJ);
  
    if($reponse->rowCount()==0){

 
      $requete='insert into besoinintervention (besoin) VALUE ("'.$Besoin.'");';
      
    

      $reponse=$connexion->prepare($requete);
      $reponse->execute([$Besoin]);
   
      
    }

  }

  function addIntervenant($PrenomIntervenant, $NomIntervenant)
{

  $connexion=connexionBDD();

  $requete='select * from intervenant where PrenomIntervenant="'.$PrenomIntervenant.'" and NomIntervenant="'.$NomIntervenant.'"';


  $reponse=$connexion->query($requete);
  $reponse->setFetchMode(PDO::FETCH_OBJ);
  
    if($reponse->rowCount()==0){

 
      $requete='insert into intervenant (PrenomIntervenant, NomIntervenant) VALUE ("'.$PrenomIntervenant.'", "'.$NomIntervenant.'");';
      
    

      $reponse=$connexion->prepare($requete);
      $reponse->execute([$PrenomIntervenant, $NomIntervenant]);
   
      
    }

  }

  function removeBesoin($Besoin)
{

  $connexion=connexionBDD();

  $requete='select * from besoinintervention where besoin="'.$Besoin.'"';


  $reponse=$connexion->query($requete);
  $reponse->setFetchMode(PDO::FETCH_OBJ);
  
    if($reponse->rowCount()>=1){

 
      $requete='delete from besoinintervention where besoin ="'.$Besoin.'"';

    

      $reponse=$connexion->prepare($requete);
      $reponse->execute([$Besoin]);
   
      
    }

  }

  function removeIntervenant($PrenomIntervenant, $NomIntervenant)
  {
  
    $connexion=connexionBDD();
  
    $requete='select * from intervenant where PrenomIntervenant="'.$PrenomIntervenant.'" and NomIntervenant = "'.$NomIntervenant.'"';
  
  
    $reponse=$connexion->query($requete);
    $reponse->setFetchMode(PDO::FETCH_OBJ);
    
      if($reponse->rowCount()>=1){
  
   
        $requete='delete from intervenant where PrenomIntervenant ="'.$PrenomIntervenant.'" and NomIntervenant="'.$NomIntervenant.'"';
        echo($requete);
  
      
  
        $reponse=$connexion->prepare($requete);
        $reponse->execute([$PrenomIntervenant, $NomIntervenant]);
     
        
      }
  
    }

function ListerIntervention()
{
  $connexion = connexionBDD();
      
  $requete="select Societe, Email, IDIntervention, PrenomClient, NomClient, LieuIntervention, DateIntervention, HeureIntervention, Numero, BesoinIntervention, Document from intervention where DATE(DateIntervention) >= DATE(NOW())";
      
  $ListeIntervetion=NULL;
      
  $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
  $i = 0;
  $ligne = $reponse->fetch();

  if($reponse!==false){

      while($ligne)
      {
          $ListeIntervetion[$i]['Societe']=$ligne->Societe;
          $ListeIntervetion[$i]['Email']=$ligne->Email;
          $ListeIntervetion[$i]['IDIntervention']=$ligne->IDIntervention;
          $ListeIntervetion[$i]['Prenom']=$ligne->PrenomClient;
          $ListeIntervetion[$i]['Nom']=$ligne->NomClient;
          $ListeIntervetion[$i]['AdresseIntervention']=$ligne->LieuIntervention;
          $ListeIntervetion[$i]['DateIntervention']=$ligne->DateIntervention;
          $ListeIntervetion[$i]['HeureIntervention']=$ligne->HeureIntervention;
          $ListeIntervetion[$i]['NumeroClient']=$ligne->Numero;
          $ListeIntervetion[$i]['BesoinIntervention']=$ligne->BesoinIntervention;
          $ListeIntervetion[$i]['Fichier']=$ligne->Document;
          $ligne=$reponse->fetch();
          $i = $i + 1;
      }
    }
  $reponse->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $ListeIntervetion;
}






function ListerInterventionAgenda()
{
  $connexion = connexionBDD();
      
  $requete="select Societe, Email, IDIntervention, PrenomClient, NomClient, LieuIntervention, DateIntervention, HeureIntervention, Numero, BesoinIntervention, Document from intervention"; // ajouter where DATE(DateIntervention) >= DATE(NOW())
      
  $ListeIntervetion=NULL;
      
  $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
  $i = 0;
  $ligne = $reponse->fetch();

  if($reponse!==false){

      while($ligne)
      {

       
          $ListeIntervention[$i]['Societe']=$ligne->Societe;
          $ListeIntervention[$i]['Email']=$ligne->Email;
          $ListeIntervention[$i]['IDIntervention']=$ligne->IDIntervention;
          $ListeIntervention[$i]['Prenom']=$ligne->PrenomClient;
          $ListeIntervention[$i]['Nom']=$ligne->NomClient;
          $ListeIntervention[$i]['AdresseIntervention']=$ligne->LieuIntervention;
          $ListeIntervention[$i]['DateIntervention']=$ligne->DateIntervention;
          $ListeIntervention[$i]['HeureIntervention']=$ligne->HeureIntervention;
          $ListeIntervention[$i]['NumeroClient']=$ligne->Numero;
          $ListeIntervention[$i]['BesoinIntervention']=$ligne->BesoinIntervention;
          $ListeIntervention[$i]['Fichier']=$ligne->Document;
          echo("{
      
            title  : '".$ListeIntervention[$i]['BesoinIntervention']."',
            start  : '".$ListeIntervention[$i]['DateIntervention']."T".$ListeIntervention[$i]['HeureIntervention'].":00',
            description : '".$ListeIntervention[$i]['AdresseIntervention'].", ".$ListeIntervention[$i]['Prenom']." ".$ListeIntervention[$i]['Nom']."',
            url  : 'ModifierRDVform?IDIntervention=".$ListeIntervention[$i]['IDIntervention']."'
          },");
          $ligne=$reponse->fetch();
          $i = $i + 1;
      }
    }
  $reponse->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);

}








function ListerInterventionAgendaByClient($Email)
{
  $connexion = connexionBDD();
      
  $requete="select Societe, Email, IDIntervention, PrenomClient, NomClient, LieuIntervention, DateIntervention, HeureIntervention, Numero, BesoinIntervention, Document from intervention where Email='".$Email."'"; // ajouter where DATE(DateIntervention) >= DATE(NOW())
      
  $ListeIntervetion=NULL;
      
  $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
  $i = 0;
  $ligne = $reponse->fetch();

  if($reponse!==false){

      while($ligne)
      {

       
          $ListeIntervention[$i]['Societe']=$ligne->Societe;
          $ListeIntervention[$i]['Email']=$ligne->Email;
          $ListeIntervention[$i]['IDIntervention']=$ligne->IDIntervention;
          $ListeIntervention[$i]['Prenom']=$ligne->PrenomClient;
          $ListeIntervention[$i]['Nom']=$ligne->NomClient;
          $ListeIntervention[$i]['AdresseIntervention']=$ligne->LieuIntervention;
          $ListeIntervention[$i]['DateIntervention']=$ligne->DateIntervention;
          $ListeIntervention[$i]['HeureIntervention']=$ligne->HeureIntervention;
          $ListeIntervention[$i]['NumeroClient']=$ligne->Numero;
          $ListeIntervention[$i]['BesoinIntervention']=$ligne->BesoinIntervention;
          $ListeIntervention[$i]['Fichier']=$ligne->Document;
          echo("{
      
            title  : '".$ListeIntervention[$i]['BesoinIntervention']."',
            start  : '".$ListeIntervention[$i]['DateIntervention']."T".$ListeIntervention[$i]['HeureIntervention'].":00',
            description : '".$ListeIntervention[$i]['AdresseIntervention'].", ".$ListeIntervention[$i]['Prenom']." ".$ListeIntervention[$i]['Nom']."',
            url  : 'ModifierRDVform?IDIntervention=".$ListeIntervention[$i]['IDIntervention']."'
          },");
          $ligne=$reponse->fetch();
          $i = $i + 1;
      }
    }
  $reponse->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);

}




































function GetRole($email, $mdp)
{
  $connexion = connexionBDD();
      
  $requete="select role from client where Email='".$email."' and Mdp ='".$mdp."'";
  echo $requete;
      
  $role=NULL;
      
  $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
  $i = 0;
  $ligne = $reponse->fetch();

  if($reponse!==false){

      if($ligne)
      {
          $role=$ligne->role;
          $ligne=$reponse->fetch();
          
      }
    }
  $reponse->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $role;
}

function ListerIdentifiants()
{
  $connexion = connexionBDD();
      
  $requete="select Nom, Prenom, Email, Mdp, Statut from client where Prenom != 'admin' and Nom !='admin' ";
      
  $ListeIdentifiant=NULL;
      
  $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
  $i = 0;
  $ligne = $reponse->fetch();

  if($reponse!==false){

      while($ligne)
      {
           $ListeIdentifiant[$i]['Nom']=$ligne->Nom;
           $ListeIdentifiant[$i]['Prenom']=$ligne->Prenom;
          $ListeIdentifiant[$i]['Email']=$ligne->Email;
          $ListeIdentifiant[$i]['Mdp']=$ligne->Mdp;
          $ListeIdentifiant[$i]['statut']=$ligne->Statut;
          $ligne=$reponse->fetch();
          $i = $i + 1;
      }
    }
  $reponse->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $ListeIdentifiant;
}






















function ListerClients()
{
  $connexion = connexionBDD();
      
  $requete="select Prenom, Nom, Adresse, Numero, Email, Societe from client where Prenom != 'admin' and Nom !='admin' ";
      
  $ListeClient=NULL;
      
  $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
  $i = 0;
  $ligne = $reponse->fetch();

  if($reponse!==false){

      while($ligne)
      {
          $ListeClient[$i]['Prenom']=$ligne->Prenom;
          $ListeClient[$i]['Nom']=$ligne->Nom;
          $ListeClient[$i]['Adresse']=$ligne->Adresse;
          $ListeClient[$i]['Numero']=$ligne->Numero;
          $ListeClient[$i]['Email']=$ligne->Email;
          $ListeClient[$i]['Societe']=$ligne->Societe;
          $ligne=$reponse->fetch();
          $i = $i + 1;
      }
    }
  $reponse->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $ListeClient;
}

function ListerClientsBySociete($Societe)
{
  $connexion = connexionBDD();
      
  $requete="select Prenom, Nom, Adresse, Numero, Email, Societe from client where Prenom != 'admin' and Nom !='admin' and Societe='".$Societe."'";
      
  $ListeClient=NULL;
      
  $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
  $i = 0;
  $ligne = $reponse->fetch();

  if($reponse!==false){

      while($ligne)
      {
          $ListeClient[$i]['Prenom']=$ligne->Prenom;
          $ListeClient[$i]['Nom']=$ligne->Nom;
          $ListeClient[$i]['Adresse']=$ligne->Adresse;
          $ListeClient[$i]['Numero']=$ligne->Numero;
          $ListeClient[$i]['Email']=$ligne->Email;
          $ListeClient[$i]['Societe']=$ligne->Societe;
          $ligne=$reponse->fetch();
          $i = $i + 1;
      }
    }
  $reponse->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $ListeClient;
}

function ListerClientsByLimit($rowNumber, $startingRow)
{
  $connexion = connexionBDD();
      
  $requete="select Prenom, Nom, Adresse, Numero, Email, Societe from client where Prenom != 'admin' and Nom !='admin' order by nom limit ".$rowNumber.", ".$startingRow;
  echo $requete;
      
  $ListeClient=NULL;
      
  $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
  $i = 0;
  $ligne = $reponse->fetch();

  if($reponse!==false){

      while($ligne)
      {
          $ListeClient[$i]['Prenom']=$ligne->Prenom;
          $ListeClient[$i]['Nom']=$ligne->Nom;
          $ListeClient[$i]['Adresse']=$ligne->Adresse;
          $ListeClient[$i]['Numero']=$ligne->Numero;
          $ListeClient[$i]['Email']=$ligne->Email;
          $ListeClient[$i]['Societe']=$ligne->Societe;
          $ligne=$reponse->fetch();
          $i = $i + 1;
      }
    }
  $reponse->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $ListeClient;
}

function countClients()
{
  $connexion = connexionBDD();
      
  $requete="select Prenom, Nom, Adresse, Numero, Email, Societe from client where Prenom != 'admin' and Nom !='admin'";
      
  $ListeClient=NULL;
      
  $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
  $i = 0;
  $ligne = $reponse->fetch();

  if($reponse!==false){

      while($ligne)
      {
          $ligne=$reponse->fetch();
          $i = $i + 1;
      }
    }
  $reponse->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $i;
}

function CountClientBySociete($Societe)
{
  $connexion = connexionBDD();
      
  $requete="select Prenom, Nom, Adresse, Numero, Email, Societe from client where Prenom != 'admin' and Nom !='admin' and Societe='".$Societe."'";
      
  $ListeClient=NULL;
      
  $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
  $i = 0;
  $ligne = $reponse->fetch();

  if($reponse!==false){

      while($ligne)
      {
          $ligne=$reponse->fetch();
          $i = $i + 1;
      }
    }
  $reponse->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $i;
}

function ListerSociete()
{
  $connexion = connexionBDD();
      
  $requete="select distinct Societe from client where Prenom !='admin' order by Societe ";
      
  $ListeSociete=NULL;
      
  $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
  $i = 0;
  $ligne = $reponse->fetch();

  if($reponse!==false){

      while($ligne)
      {
          $ListeSociete[$i]['Societe']=$ligne->Societe;
          $ligne=$reponse->fetch();
          $i = $i + 1;
      }
    }
  $reponse->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $ListeSociete;
}


function SupprimerIntervention($IDIntervention)
{

  $connexion=connexionBDD();



$requete='delete from intervention where IDIntervention = "'.$IDIntervention.'";'; 


$reponse=$connexion->prepare($requete);
$reponse->execute([$IDIntervention]);


}


function SupprimerClient($Nom, $Prenom)
{

  $connexion=connexionBDD();



$requete='delete from client where Nom = "'.$Nom.'" AND Prenom ="'.$Prenom.'";'; 
echo($requete);



$reponse=$connexion->prepare($requete);
$reponse->execute([$Nom, $Prenom]);


}




function ModifierIntervention($IDIntervention, $PrenomClient, $NomClient, $Email, $Numero, $DateIntervention, $HeureIntervention, $LieuIntervention, $BesoinIntervention, $Statut, $Commentaire, $Document)
{
  $message="test";

  $connexion=connexionBDD();

  $requete='select * from intervention where DateIntervention="'.$DateIntervention.'" AND HeureIntervention="'.$HeureIntervention.'"';


  $reponse=$connexion->query($requete);
  $reponse->setFetchMode(PDO::FETCH_OBJ);

  $reponsestart=$connexion->query($requete);
  $reponsestart->setFetchMode(PDO::FETCH_OBJ);

  if($reponse->rowCount()>1){
    $message= '<br> <div style="text-align:center"> <span class="badge bg-danger" style="font-size: 115%" >Il y a déjà un rendez vous prévu à cette heure ci !</span> </div>';
  }else{

     if($reponse->rowCount()==1){
      $requete='select * from intervention where IDIntervention="'.$IDIntervention.'" AND DateIntervention="'.$DateIntervention.'" AND HeureIntervention="'.$HeureIntervention.'"';
  
      $reponse=$connexion->prepare($requete);
      $reponse->execute([$PrenomClient, $NomClient, $Email, $Numero, $DateIntervention, $HeureIntervention, $LieuIntervention, $BesoinIntervention, $Statut, $Commentaire, $Document]);

    if($reponse->rowCount()==1){

      $requete='update intervention set PrenomClient = "'.$PrenomClient.'", NomClient="'.$NomClient.'",Email="'.$Email.'",Numero="'.$Numero.'",DateIntervention="'.$DateIntervention.'",HeureIntervention="'.$HeureIntervention.'",LieuIntervention="'.$LieuIntervention.'",BesoinIntervention="'.$BesoinIntervention.'" where IDIntervention ='.$IDIntervention.';';

      $reponse=$connexion->prepare($requete);
      $reponse->execute([$PrenomClient, $NomClient, $Email, $Numero, $DateIntervention, $HeureIntervention, $LieuIntervention, $BesoinIntervention, $Statut, $Commentaire, $Document]);
      $message= '<br> <div style="text-align:center"> <span class="badge bg-success" style="font-size: 115%" >Modification enregistré !</span> </div>';



    }
    else {
      
        $message= '<br> <div style="text-align:center"> <span class="badge bg-danger" style="font-size: 115%" >Il y a déjà un rendez vous prévu à cette heure ci !</span> </div>';
    
    
    
        }
  }
}
   
    
if($reponsestart->rowCount()==0){

    $requete='update intervention set PrenomClient = "'.$PrenomClient.'", NomClient="'.$NomClient.'",Email="'.$Email.'",Numero="'.$Numero.'",DateIntervention="'.$DateIntervention.'",HeureIntervention="'.$HeureIntervention.'",LieuIntervention="'.$LieuIntervention.'",BesoinIntervention="'.$BesoinIntervention.'" where IDIntervention ='.$IDIntervention.';';
   
    $reponse=$connexion->prepare($requete);
    $reponse->execute([$PrenomClient, $NomClient, $Email, $Numero, $DateIntervention, $HeureIntervention, $LieuIntervention, $BesoinIntervention, $Statut, $Commentaire, $Document]);

    $message= '<br> <div style="text-align:center"> <span class="badge bg-success" style="font-size: 115%" >Modification enregistré !</span> </div>';
      }
  

return $message;

}

function ModifierClient($PrenomClient, $NomClient, $exPrenom, $exNom)
{
  $message="test";

  $connexion=connexionBDD();

  $requete='select * from client where Prenom="'.$PrenomClient.'" AND Nom="'.$NomClient.'"';


  $reponse=$connexion->query($requete);
  $reponse->setFetchMode(PDO::FETCH_OBJ);


  if($reponse->rowCount()>=1){
    $message= '<br> <div style="text-align:center"> <span class="badge bg-danger" style="font-size: 115%" >Ce client existe déjà !</span> </div>';
  }
    else {
     
    $requete='update client set Prenom = "'.$PrenomClient.'", Nom="'.$NomClient.'" where Prenom="'.$exPrenom.'" and Nom = "'.$exNom.'";';
    
   
    $reponse=$connexion->prepare($requete);
    $reponse->execute([$PrenomClient, $NomClient]);

    $message= '<br> <div style="text-align:center"> <span class="badge bg-success" style="font-size: 115%" >Modification enregistré !</span> </div>';
    
    
    
        }
  
   
    


      
  



}

function ModifierMDP($email, $Mdp)
{
  $message="test";

  $connexion=connexionBDD();

  $requete='select * from client where Email="'.$email.'"';


  $reponse=$connexion->query($requete);
  $reponse->setFetchMode(PDO::FETCH_OBJ);


  if($reponse->rowCount()>=1){
    $requete='update client set Mdp = "'.$Mdp.'" where Email ="'.$email.'";';
    echo($requete);
    $reponse=$connexion->prepare($requete);
    $reponse->execute([$email]);
    $message= '<br> <div style="text-align:center"> <span class="badge bg-danger" style="font-size: 115%" >Modification enregistré</span> </div>';
  }
    else {


    $message= '<br> <div style="text-align:center"> <span class="badge bg-success" style="font-size: 115%" >Erreur !!! !</span> </div>';

        }
}

function ModifierStatut($PrenomClient, $NomClient, $email, $Statut)
{
  $message="test";

  $connexion=connexionBDD();

  $requete='select * from client where Prenom="'.$PrenomClient.'" AND Nom="'.$NomClient.'" AND Email="'.$email.'"';


  $reponse=$connexion->query($requete);
  $reponse->setFetchMode(PDO::FETCH_OBJ);


  if($reponse->rowCount()>=1){
    $requete='update client set Statut = "'.$Statut.'" where Prenom="'.$PrenomClient.'" and Nom = "'.$NomClient.'" and Email ="'.$email.'";';
    echo($requete);
    $reponse=$connexion->prepare($requete);
    $reponse->execute([$PrenomClient, $NomClient, $email]);
    $message= '<br> <div style="text-align:center"> <span class="badge bg-danger" style="font-size: 115%" >Modification enregistré</span> </div>';
  }
    else {


    $message= '<br> <div style="text-align:center"> <span class="badge bg-success" style="font-size: 115%" >Erreur !!! !</span> </div>';
    
        }
}



function Historique()
{
  $connexion = connexionBDD();
      
      $requete="select Email, IDIntervention, PrenomClient, NomClient, LieuIntervention, DateIntervention, HeureIntervention, Numero, BesoinIntervention from intervention where DATE(DateIntervention) <= DATE(NOW()) and IDIntervention != 1";
      
       $ListeIntervetion=NULL;
      
      $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $i = 0;
      $ligne = $reponse->fetch();
      if($reponse!==false){
      while($ligne)
      {
          $ListeIntervetion[$i]['Email']=$ligne->Email;
          $ListeIntervetion[$i]['IDIntervention']=$ligne->IDIntervention;
          $ListeIntervetion[$i]['Prenom']=$ligne->PrenomClient;
          $ListeIntervetion[$i]['Nom']=$ligne->NomClient;
          $ListeIntervetion[$i]['AdresseIntervention']=$ligne->LieuIntervention;
          $ListeIntervetion[$i]['DateIntervention']=$ligne->DateIntervention;
          $ListeIntervetion[$i]['HeureIntervention']=$ligne->HeureIntervention;
          $ListeIntervetion[$i]['NumeroClient']=$ligne->Numero;
          $ListeIntervetion[$i]['BesoinIntervention']=$ligne->BesoinIntervention;
          $ligne=$reponse->fetch();
          $i = $i + 1;
      }
    }
  $reponse->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $ListeIntervetion;
}

function HistoriqueByLimit($rowNumber, $startingRow)
{
  $connexion = connexionBDD();
      
      $requete="select Email, IDIntervention, PrenomClient, NomClient, LieuIntervention, DateIntervention, HeureIntervention, Numero, BesoinIntervention from intervention where DATE(DateIntervention) <= DATE(NOW()) and IDIntervention != 1 order by DateIntervention limit ".$rowNumber.", ".$startingRow;
      
      
       $ListeIntervetion=NULL;
      
      $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $i = 0;
      $ligne = $reponse->fetch();
      if($reponse!==false){
      while($ligne)
      {
          $ListeIntervetion[$i]['Email']=$ligne->Email;
          $ListeIntervetion[$i]['IDIntervention']=$ligne->IDIntervention;
          $ListeIntervetion[$i]['Prenom']=$ligne->PrenomClient;
          $ListeIntervetion[$i]['Nom']=$ligne->NomClient;
          $ListeIntervetion[$i]['AdresseIntervention']=$ligne->LieuIntervention;
          $ListeIntervetion[$i]['DateIntervention']=$ligne->DateIntervention;
          $ListeIntervetion[$i]['HeureIntervention']=$ligne->HeureIntervention;
          $ListeIntervetion[$i]['NumeroClient']=$ligne->Numero;
          $ListeIntervetion[$i]['BesoinIntervention']=$ligne->BesoinIntervention;
          $ligne=$reponse->fetch();
          $i = $i + 1;
      }
    }
  $reponse->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $ListeIntervetion;
}

function countHistorique()
{
  $connexion = connexionBDD();
      
      $requete="select Email, IDIntervention, PrenomClient, NomClient, LieuIntervention, DateIntervention, HeureIntervention, Numero, BesoinIntervention from intervention where DATE(DateIntervention) <= DATE(NOW()) and IDIntervention != 1";
      
       $ListeIntervetion=NULL;
      
      $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $i = 0;
      $ligne = $reponse->fetch();
      if($reponse!==false){
      while($ligne)
      {
         
          $ligne=$reponse->fetch();
          $i = $i + 1;
      }
    }
  $reponse->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $i;
}

function ListerInterventionById($IDIntervention)
{
  $connexion = connexionBDD();
      
      $requete="select Email, IDIntervention, PrenomClient, NomClient, LieuIntervention, DateIntervention, HeureIntervention, Numero, BesoinIntervention from intervention where IDIntervention = ".$IDIntervention."";

      
       $ListeIntervetion=NULL;
      
      $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
      $i = 0;
      $ligne = $reponse->fetch();
     
     
          $ListeIntervetion['Email']=$ligne->Email;
          $ListeIntervetion['IDIntervention']=$ligne->IDIntervention;
          $ListeIntervetion['Prenom']=$ligne->PrenomClient;
          $ListeIntervetion['Nom']=$ligne->NomClient;
          $ListeIntervetion['AdresseIntervention']=$ligne->LieuIntervention;
          $ListeIntervetion['DateIntervention']=$ligne->DateIntervention;
          $ListeIntervetion['HeureIntervention']=$ligne->HeureIntervention;
          $ListeIntervetion['NumeroClient']=$ligne->Numero;
          $ListeIntervetion['BesoinIntervention']=$ligne->BesoinIntervention;
          $ligne=$reponse->fetch();
          $i = $i + 1;
      
    
  $reponse->closeCursor();   // fermer le jeu de résultat
  // deconnecterServeurBD($idConnexion);
  return $ListeIntervetion;
}





function ListerBesoin()
{
  $connexion = connexionBDD();
      
      $requete="select Besoin from besoinintervention";

      
       $ListeBesoin=NULL;
      
        
       $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

       $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
       $i = 0;
       $ligne = $reponse->fetch();
       if($reponse!==false){
       while($ligne)
       {
           $ListeBesoin[$i]['Besoin']=$ligne->Besoin;
           $ligne=$reponse->fetch();
           $i = $i + 1;
       }
     }
   $reponse->closeCursor();   // fermer le jeu de résultat
   // deconnecterServeurBD($idConnexion);
   return $ListeBesoin;
 }

 function ListerIntervenant()
{
  $connexion = connexionBDD();
      
      $requete="select * from intervenant";

      
       $ListeIntervenant=NULL;
      
        
       $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

       $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
       $i = 0;
       $ligne = $reponse->fetch();
       if($reponse!==false){
       while($ligne)
       {
           $ListeIntervenant[$i]['NomIntervenant']=$ligne->NomIntervenant;
           $ListeIntervenant[$i]['PrenomIntervenant']=$ligne->PrenomIntervenant;
           $ligne=$reponse->fetch();
           $i = $i + 1;
       }
     }
   $reponse->closeCursor();   // fermer le jeu de résultat
   // deconnecterServeurBD($idConnexion);
   return $ListeIntervenant;
 }

function CountBesoin()
{
  $connexion = connexionBDD();
      
  $requete="select Besoin from besoinintervention";

  $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
  $i = 0;
  $ligne = $reponse->fetch();
  if($reponse!==false){
  while($ligne)
  {
      $ligne=$reponse->fetch();
      $i = $i + 1;
  }
}
$reponse->closeCursor();   // fermer le jeu de résultat
// deconnecterServeurBD($idConnexion);
return $i;
}

function CountSociete()
{
  $connexion = connexionBDD();
      
  $requete="select distinct societe from client where Prenom != 'admin' ";

  $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
  $i = 0;
  $ligne = $reponse->fetch();
  if($reponse!==false){
  while($ligne)
  {
      $ligne=$reponse->fetch();
      $i = $i + 1;
  }
}
$reponse->closeCursor();   // fermer le jeu de résultat
// deconnecterServeurBD($idConnexion);
return $i;
}

function CountIntervenant()
{
  $connexion = connexionBDD();
      
  $requete="select * from intervenant";

  $reponse=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

  $reponse->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le résultat soit récupérable sous forme d'objet     
  $i = 0;
  $ligne = $reponse->fetch();
  if($reponse!==false){
  while($ligne)
  {
      $ligne=$reponse->fetch();
      $i = $i + 1;
  }
}
$reponse->closeCursor();   // fermer le jeu de résultat
// deconnecterServeurBD($idConnexion);
return $i;
}































function isAdmin($identifiant, $mdp)
{


    $connexion = connexionBDD();

    $requete = 'select typeutilisateur from utilisateur where identifiant = \'' . $identifiant . '\' and mdp = \'' . $mdp . '\'';


    $reponse = $connexion->query($requete);
    $reponse -> setFetchMode(PDO::FETCH_OBJ);
    $ligne = $reponse->fetch();
    $i=0;
    $utilisateur=[];
 while($ligne)
      {
          $utilisateur[$i]['utilisateur']=$ligne->typeutilisateur;
         
          $ligne=$reponse->fetch();
          $i = $i + 1;
      }

        return($utilisateur);
    }


?>
