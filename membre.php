<?php
$title = "membre";
include 'includes/header-m.php';
require_once 'db/connexion.inc.php';
$result = $crud->getMovies();
?>

<?php
$title = "membre";
$result = $crud->getMovies();
$isMembre = true;
include 'includes/cards.php';
?>

<?php include 'includes/footer.php' ?>