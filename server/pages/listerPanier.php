<?php
$title = "Votre panier";
$root = "../../";
require_once '../../includes/header-m.php';
require_once '../../db/connexion.inc.php';
session_start();?>

<div class="container mt-5">
<?php
    $result = $crud->getPanierParIdMembre( $_SESSION["idMembre"]);
    while($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
    <!-- interface du panier -->
<?php } ?>

    <a id="btnRetour" class="btn btn-success bg-gradient" href="../../membrePage.php">Retour</a>
</div>

<?php
include '../../includes/footer.php';
?>