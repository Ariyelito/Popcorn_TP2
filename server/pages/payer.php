<?php
require_once '../../db/connexion.inc.php';


  session_start();
  $idMembre = $_SESSION['idMembre'];
  $carts = $_SESSION['Cart'];
  $panier = $crud->getPanierParIdMembre($idMembre)->fetch();

  $crud->payer($idMembre ,$panier['idPanier'], $carts);
  $crud->ajouterFilmsPaiments($idMembre);
  //$crud->viderPanier($panier['idPanier']);

  



?>
<?php 

include '../../includes/footer.php';
?>