<?php
require_once '../../db/connexion.inc.php';

$id = $_GET['idMembre'];
$result = $crudMembre->deleteMembre($id);
if($result->rowCount()){
    
    echo "Le membre avec le id = $id a été supprimé";
    
}
else echo "Deletion failed";
?>