<?php

$lister = false;
$root = "../../";
include '../../includes/header.php';

require_once '../../db/connexion.inc.php';

?>


<div class="container mt-5">
 <?php 


 if(session_status() == 1){
   $msg= "1 Vous devez vous connecter ou crée un Compte avant d'ajouter un film à votre panier.". session_status();
   afficherMessage($msg);
    exit;
   }

   if (!isset($_SESSION['idMembre'])) { 
    $msg= "Erreur, Vous devez vous connecter ou crée un Compte avant d'ajouter un film à votre panier.";  
   afficherMessage($msg);
    exit;
}

    $idMembre = $_SESSION['idMembre'];
    $idFilm = $_GET['idFilm'];
    
   
    
   
    $panier  = $crud->getPanierParIdMembre($idMembre)->fetch();
    if($panier){      
       $done =  $crud->addFilmDansLePanier($panier['idPanier'],$idFilm);
       if(!$done){
         echo "movie existe deja dans panier";
         exit;
       }
    }
   else {  
    $panier = new Panier(0,$idMembre,$idFilm); 
    $crud->addPanier($panier);
    $panier = $crud->getPanierParIdMembre($idMembre)->fetch();
   
    
   $done =  $crud->addFilmDansLePanier($panier['idPanier'],$idFilm);
   if(!$done){
    echo "movie existe deja dans panier";
    exit;
   }
   }

   $msgFilmAdd = "Film ajouter au panier";
   afficherMessage($msgFilmAdd);
   ?>

   <?php function afficherMessage($msg) { ?>
  <br>
    <p><?php echo $msg?></p>
 
 
 <?php } ?>
 
   </div>
 
 
 
 
 
 
 
 
 
 

 
<?php /*  

echo session_status();
  if(session_status() == 1){
    echo "Vous devez vous connecter ou crée un Compte avant d'ajouter un film à votre panier.";
    exit;
   }

    $idMembre = $_SESSION['idMembre'];
    $idFilm = $_GET['idFilm'];
    
    if(!$idMembre){
        echo "Vous devez vous connecter ou crée un Compte avant d'ajouter un film à votre panier.";
        exit;
    }
    

    $panier  = $crud->getPanierParIdMembre($idMembre)->fetch();
    if($panier){      
        $crud->addFilmDansLePanier($panier['idPanier'],$idFilm);
    }
   else {  
    $panier = new Panier(0,$idMembre,$idFilm); 
    $crud->addPanier($panier);
    $panier = $crud->getPanierParIdMembre($idMembre)->fetch();
   
    $crud->addFilmDansLePanier($panier['idPanier'],$idFilm);
   }
   
    
*/
?>
</div>

<?php 

include '../../includes/footer.php';
?>
