<?php
$title = "Votre panier";
$root = "../../";
require_once '../../includes/header-m.php';
require_once '../../db/connexion.inc.php';
$result = $crud->getPanier();
?>

<!-- interface du panier -->

<?php
include '../../includes/footer.php';
?>