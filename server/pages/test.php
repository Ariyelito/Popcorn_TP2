<?php
require_once '../../db/connexion.inc.php';

$photo = $_POST["photo"];
$dossier = "client/photo";

if($_FILES['photo']['tmp_name']!==""){
    //Upload de la photo
    $nomPhoto = sha1($prenom.time());
    $tmp = $_FILES['photo']['tmp_name'];
    $fichier= $_FILES['photo']['name'];
    $extension=strrchr($fichier,'.');
    @move_uploaded_file($tmp,$dossier.$nomPhoto.$extension);
    // Enlever le fichier temporaire chargé
    @unlink($tmp); //effacer le fichier temporaire
    $photo=$nomPhoto.$extension;
}



?>