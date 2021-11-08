<?php


require_once '../../db/connexion.inc.php';
session_start();


$idFilm = $_POST['idFilm'];
$titre = $_POST['inputTitre'];
$date = $_POST['inputDate'];
$langue = $_POST['langue'];
$montant = $_POST['inputCout'];
$duree = $_POST['inputDure'];
$photo = "";
$idCategories = array(1); // A completer
$idRealisateurs = array();  // A completer
$description = $_POST['descriptionText'];

$film = new Film($idFilm,$titre,$duree,$langue,$date,$montant,$photo,$idCategories,$idRealisateurs,$description);

$crud->updateFilm($film);

?>




<?php 

include  '../../includes/footer.php';
?>