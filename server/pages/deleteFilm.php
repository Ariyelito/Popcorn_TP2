
<?php
require_once '../../db/connexion.inc.php';
$idFilm = $_GET['idFilm'];
$crud->deleteFilm($idFilm);

header("Location:listerFilms.php");
?>