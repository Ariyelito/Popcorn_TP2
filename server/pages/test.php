<?php
require_once '../../db/connexion.inc.php';

$nombre = $crud->getPrixPourUnFilm(3);

echo $nombre;
?>