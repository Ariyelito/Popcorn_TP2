<?php
$title = "membre";
$root = "";
include 'includes/header.php';
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