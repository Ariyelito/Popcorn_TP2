<?php
$title = "admin";
$lister = false;
$root = "../../";
include '../../includes/header.php';
require_once '../../db/connexion.inc.php';
?>
<div class="container mt-3">
<?php

$titre = $_POST['inputTitre'];
$date = $_POST['inputDate'];
$langue = $_POST['langue'];
$montant = $_POST['inputCout'];
$duree = $_POST['inputDure'];
$photo = "";
$idCategories = array(1,2);
$idRealisateurs = array(1,2);
$description = "";

$film = new Film(0,$titre,$duree,$langue,$date,$montant,$photo,$idCategories,$idRealisateurs,$description);

$crud->addFilm($film);
$film->idFilm = $pdo->lastInsertId();

$crud->addCategoriesPourFilm($film->idFilm,$idCategories);
$crud->addRealisateursPourFilm($film->idFilm,$idRealisateurs);

echo ("Le film ".$film->idFilm." a été bien ajouté à la base de données.");
?>
</div>
<?php 
$root = "../../";
include '../../includes/footer.php';
?>


