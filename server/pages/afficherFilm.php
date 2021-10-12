<?php
require_once '../../db/connexion.inc.php';

    $id = $_GET['idFilm'];
    $result = $crud->getFilmById($id);
    $r = $result->fetch();
    if($r){
        echo $r['titre'];
    }
?>