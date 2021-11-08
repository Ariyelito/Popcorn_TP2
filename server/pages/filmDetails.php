<?php
$title = "admin";
$lister = false;
$root = "../../";
include '../../includes/header.php';
require_once '../../db/connexion.inc.php';
?>

<div class="container mt-5 d-flex p-2">
<?php

$idFilm = $_GET['idFilm'];
$film = $crud->getMoviesById($idFilm);

?>

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?php echo $film["titre"]?></h5>
    <img src="<?php echo $film['photo'] ?>" class="card-img-top" alt="poster officiel du film">
              
    <h6 class="card-subtitle mb-2 text-muted">realisateur</h6>
    <p >Acteur: </p>
    <p >Langue: <?php echo $film["langue"]?></p>
    <p >Prix(1 jour): <?php echo $film["montant"]?>$</p>
    <p ><?php echo $film["description"]?></p>
    <a class="btn bg-gradient btn-danger btnCard" 
     <?php if(isset($_SESSION["idMembre"])){ ?> href="./ajouterPanier.php?idFilm=<?php echo $film['idFilm']?>"
     <?php } else { ?> href="<?php echo $root?>index.php?idContenu=2" <?php } ?> >Ajouter au panier</a>

  </div>
</div>


<iframe width="800" height="400" src="https://www.youtube.com/embed/oZ6iiRrz1SY" frameborder="0" allowfullscreen></iframe>


</div>
<?php 
$root = "../../";
include '../../includes/footer.php';
?>


