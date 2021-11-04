<?php
require_once '../../db/connexion.inc.php';

$nombre = $crud->getNombreFilmsDansPanier(24);

echo $nombre;
?>