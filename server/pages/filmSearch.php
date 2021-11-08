<?php
require_once '../../db/connexion.inc.php';
$titre =$_GET["titre"];

$r = $crud->getMoviesTitre($titre);
var_dump($r[titre']);


?>