<?php
$title = "Liste des membres";
$root = "../../";
$lister = true;
include '../../includes/header-a.php';
require_once '../../db/connexion.inc.php';
$result = $crudMembre->getAllMembres();
//$result = $result->fetchAll();
?>


<h1 class="h1 text-center">Liste des membres</h2>
<div class="container mt-3" id="recordsContainer">
    <table class="table table-danger table-striped">
        <thead>
            <th scope="col">ID</th> 
            <th scope="col">Prénom</th> 
            <th scope="col">Nom</th>
            <th scope="col">Courriel</th>
            <th scope="col">Statut</th>
            <th scope="col">Rôle</th>
            <th scope="col">Actions</th>
        </thead>
        <tbody>
        <?php 
        while($r = $result->fetch(PDO::FETCH_ASSOC)) { 
            $connexion = $crudMembre->getMembreConnexion($r['email']);?>
            <tr>
                <td><?php echo $r['idMembre']?></td>
                <td><?php echo $r['prenom']?></td>
                <td><?php echo $r['nom']?></td>
                <td><?php echo $r['email']?></td>
                <td><?php echo getStatut($connexion['statue'])?></td>
                <td><?php echo getRole($connexion['role'])?></td>
                <td>
                    <div class="btn-group">
                        <a href="modifierMembre.php?id=<?php echo $r['idMembre']?> " class="btn bg-gradient btn-warning">Update</a>
                        <a onclick="return confirm('Are you sure want to delete this record?')" href="deleteMembre.php?idMembre=<?php echo $r['idMembre']?> " class="btn bg-gradient btn-danger">Delete</a>
                    </div>
                </td>


            </tr>
            <?php }  ?>
        </tbody>

</div>
<?php
function getStatut($statut)
{
if ($statut == 0) {
    return "inactif";
} else return "actif";
}
function getRole($role)
{

if ($role == 'A')
    return "Admin";
else if ($role == 'M')  return "Membre";
}

?>

<?php

include '../../includes/footer.php';
?>