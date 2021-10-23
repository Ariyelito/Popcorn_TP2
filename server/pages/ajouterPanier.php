
<div class="container mt-3">
    <?php



include '../../includes/header-new.php';

require_once '../../db/connexion.inc.php';


    $idMembre = $_GET['idMembre'];
    $idFilm = $_GET['idFilm'];
  
    $panier  = new Panier(0,$idMembre,$idFilm);
    $crud->addPanier($panier);
    $panier->idPanier = $pdo->lastInsertId();
//    $crud->addFilmDansLePanier($membre);
    

?>
</div>


<?php 

include '../../includes/footer.php';
?>
