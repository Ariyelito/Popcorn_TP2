<?php
require_once '../../db/connexion.inc.php';


// a faire
$result = $crudMembre->retirerUnfilmDuPanier($idFilm);

unset($_SESSION['Cart'][$_GET['idFilm']]);

if($result){
    
    header("Location:listerPanier.php");
    
}
else echo "Film non Retirer";
?>