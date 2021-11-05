<?php
require_once '../../db/connexion.inc.php';

// a faire
$result = $crudMembre->retirerUnfilmDuPanier($idFilm);
if($result){
    
    header("Location:listerPanier.php");
    
}
else echo "Film non Retirer";
?>