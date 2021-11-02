<?php
require_once '../../db/connexion.inc.php';


///////////////////////////////////////////////////////////// code a changer test  /////////////////////////////////////////////////////
  $idFilms = array(1,2,3,4,5,6); 
    
  session_start();
  $idMembre = $_SESSION['idMembre'];
  
  $panier = $crud->getPanierParIdMembre($idMembre)->fetch();

  foreach($idFilms as $idFilm){
    $crud->addFilmDansLePanier($panier['idPanier'],$idFilm);
  } 
  
  $crud->payer($idMembre ,$panier['idPanier'], 3);
  $crud->viderPanier($panier['idPanier']);

  

/////////////////////////////////////////////////////////////// fin test ////////////////////////////////////////////////////


?>
<?php 

include '../../includes/footer.php';
?>