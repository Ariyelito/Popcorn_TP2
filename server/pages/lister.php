<?php
    $title = "Liste des membres";
    include '../../includes/header-a.php';
 
?>


        <?php


require_once '../../db/connexion.inc.php';

$result = $crudMembre->getAllMembres();
$result = $result->fetchAll();

echo '<h2 style="text-align:center;color:blue;">LISTE DES MEMBRES</h2>';
$rep = '<table class="table table-striped">';
$rep .= '<thead><tr><th scope="col">Prénom</th> <th scope="col">Nom</th>';
$rep .= '<th scope="col">Courriel</th> <th scope="col">Statut</th>';
$rep .= '<th scope="col">Rôle</th> </tr></thead>';


$rep .= "<tbody>";

foreach($result as $membre){
    $connexion = $crudMembre->getMembreConnexion($membre['email']);
    $rep .= "<tr>";
    $rep .= "<td>".$membre['prenom']."</td>";
    $rep .= "<td>".$membre['nom']."</td>";
    $rep .= "<td>".$membre['email']."</td>";
    $rep .= "<td>".getStatut($connexion['statue'])."</td>";
    $rep .= "<td>".getRole($connexion['role'])."</td>";
    
  
    $rep .="</tr>";
}



$rep .= "</tbody>";

echo $rep;

function getStatut($statut){
    if($statut ==0){
        return "inactif";
    }else return "actif";
}
function getRole($role){

    if($role == 'A')
        return "Admin";
    else if($role == 'M')  return "Membre";

}

?>

<?php 
$root = "../../";
include '../../includes/footer.php';
?>