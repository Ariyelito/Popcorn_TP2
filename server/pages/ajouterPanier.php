
<div class="container mt-3">
    <?php


$lister = false;
$root = "../../";
include '../../includes/header-a.php';

require_once '../../db/connexion.inc.php';


    session_start();
    $idMembre = $_SESSION['idMembre'];
    $idFilm = $_GET['idFilm'];
    
    

    $panier  = $crud->getPanierParIdMembre($idMembre)->fetch();
    if($panier){

        $crud->addFilmDansLePanier($panier['idPanier'],$idFilm);
    }
   else {
    $panier = new Panier(0,$idMembre,$idFilm); 
    $crud->addPanier($panier);
    $panier->idPanier = $pdo->lastInsertId();
    $crud->addFilmDansLePanier($panier->$idPanier,$idFilm);
   }
   
    

?>
</div>


<?php 

include '../../includes/footer.php';
?>
