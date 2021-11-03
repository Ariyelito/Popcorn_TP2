<?php
$title = "Votre panier";
$root = "../../";
require_once '../../includes/header-m.php';
require_once '../../db/connexion.inc.php';
session_start();



$result = $crud->getPanierParIdMembre( $_SESSION["idMembre"]);
while($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>








<?php }?>

<!-- interface du panier -->

<?php
include '../../includes/footer.php';
?>