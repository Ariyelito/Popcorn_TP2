<?php
$title = "membre";
$root = "";
include 'includes/header-m.php';
require_once 'db/connexion.inc.php';
$result = $crud->getMovies();

?>

<?php
$title = "membre";
$result = $crud->getMovies();
$connected = true;
include 'includes/cards.php';
?>

<?php 
$root = "";
include 'includes/footer.php';
?>