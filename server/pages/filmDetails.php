<?php
$title = "admin";
$lister = false;
$root = "../../";
include '../../includes/header.php';
require_once '../../db/connexion.inc.php';
?>

<div class="container mt-5">
<?php

$idFilm = $_GET['idFilm'];
$film = $crud->getMoviesById($idFilm);

?>

<div class="card" style="width: 18rem;">
  <div class="card-body">

    <h5 class="card-title"><?php echo $film["titre"]?></h5>
    <h6 class="card-subtitle mb-2 text-muted">realisateur</h6>
    <p class="card-text"><?php echo $film["description"]?></p>
    <a class="btn bg-gradient btn-danger btnCard" 
     <?php if(isset($_SESSION["idMembre"])){ ?> href="./ajouterPanier.php?idFilm=<?php echo $r['idFilm']?>"
     <?php } else { ?> href="<?php echo $root?>index.php?idContenu=2" data-bs-toggle="modal" data-bs-target="#LogInModal" <?php } ?> >Ajouter au panier</a>


  </div>
</div>



</div>
<?php 
$root = "../../";
include '../../includes/footer.php';
?>


