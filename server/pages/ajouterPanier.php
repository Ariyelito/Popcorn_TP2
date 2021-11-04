
<div class="container mt-3">
    <?php


$lister = false;
$root = "../../";
include '../../includes/header-a.php';

require_once '../../db/connexion.inc.php';


   if(session_status() == PHP_SESSION_NONE){
    echo "il faut login";
    exit;
   }
    session_start();
    $idMembre = $_SESSION['idMembre'];
    $idFilm = $_GET['idFilm'];
    
    if(!$idMembre){
        header("il faut login");
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
   
    

?>
</div>


<?php 

include '../../includes/footer.php';
?>
