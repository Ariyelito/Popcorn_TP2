<?php

require_once '../../db/connexion.inc.php';

$idMembre = $_GET['idMembre'];


if($crudMembre->UpdateMembreStatue($idMembre)){
    header('Location: ./lister.php');
}

?>




<?php 

include  '../../includes/footer.php';
?>