<?php
require_once '../../db/connexion.inc.php';


  session_start();
  $idMembre = $_SESSION['idMembre'];
  $carts = $_SESSION['Cart'];
  $panier = $crud->getPanierParIdMembre($idMembre)->fetch();

  $crud->payer($idMembre ,$panier['idPanier'], $carts);
  $crud->ajouterFilmsPaiments($idMembre);
  $crud->viderPanier($panier['idPanier']);

  header('Location: ../../membrePage.php?msg=Votre+paiment+a+été+effectuer');
  



?>
<?php 

include '../../includes/footer.php';
?>