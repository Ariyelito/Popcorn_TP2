<?php
$title = "Admin";
$root = "";
$lister = false;
include 'includes/header.php';
require_once 'db/connexion.inc.php';
$result = $crud->getMovies();
// methode a faire 
// $result2 = $crud->getLangues();
// $result3 = $crud->getCategories();

?>

<?php
$result = $crud->getMovies();
$member = false;
$admin = true;
include 'includes/cards.php' 
?>

<form id="formLister" action="server/pages/lister.php" method="POST"> </form>

<?php 
$root = "";
include 'includes/footer.php';
?>