<?php
require_once '../../db/connexion.inc.php';


// a faire
session_start();
$idMembre = $_SESSION['idMembre'];
$idFilm = $_GET['idFilm'];
$result = $crud->retirerUnfilmDuPanier($idMembre,$idFilm);



unset($_SESSION['Cart'][$_GET['idFilm']]);



if($result){
    
    header("Location:listerPanier.php");
    
}
else echo "Film non Retirer";
?>