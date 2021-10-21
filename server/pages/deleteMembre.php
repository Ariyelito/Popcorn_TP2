<?php
require_once '../../db/connexion.inc.php';

$id = $_GET['idMembre'];
$result = $crudMembre->deleteMembre($id);
if($result->rowCount()){
    
    header("Location:lister.php?id=$id&msg=Le+membre+à+été+enlevé");
    
}
else echo "Deletion failed";
?>