<?php
$title = "membre";
$root = "";
$panier = false;
include 'includes/header-m.php';
require_once 'db/connexion.inc.php';
$result = $crud->getMovies();

?>

<?php
$title = "membre";
$result = $crud->getMovies();
$member = true;
include 'includes/cards.php';
?>

<?php 
$root = "";
include 'includes/footer.php';
?>