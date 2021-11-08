<?php
$title = "Liste des membres";
$root = "../../";
$lister = true;
include '../../includes/header.php';
require_once '../../db/connexion.inc.php';
$result = $crudMembre->getAllMembres();
//$result = $result->fetchAll();
?>


<h1 class="h1 text-center mt-5">Liste des membres</h2>
<div id="contListMembre" class="container mt-3">
    <table class="table table-striped table-hover table-borderless">
        <thead class="table-danger">
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
                    <form  action="./updateMembreStatue.php" method="GET">
                            <input type="hidden" name="idMembre" value="<?php echo $r['idMembre']?>">                
                            <input class="btn bg-gradient btn-outline-warning"  type="submit"value="Update Statue"><br><br>                          
                            </form>
                     
                        <a onclick="return confirm('Are you sure want to delete this record?')" 
                            href="deleteMembre.php?idMembre=<?php echo $r['idMembre']?> " class="btn bg-gradient btn-outline-danger">Delete
                        </a>
                    </div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="container">
        <a id="btnRetour" class="btn btn-success bg-gradient" href="../../admin.php">Retour</a>
    </div>
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