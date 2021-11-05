<?php
$title = "Liste des membres";
$root = "../../";
//$lister = true;
include '../../includes/header01.php';
require_once '../../db/connexion.inc.php';
$result = $crud->getMovies();
//$result = $result->fetchAll();
?>


<h1 class="h1 text-center mt-5">Liste des membres</h2>
<div id="contListMembre" class="container mt-3">
    <table class="table table-striped table-hover table-borderless">
        <thead class="table-danger">
            <th scope="col">ID</th> 
            <th scope="col">titre</th> 
            <th scope="col">duree</th>
            <th scope="col">langue</th>
            <th scope="col">date</th>
            <th scope="col">montant</th>
            <th scope="col">photo</th>
            <th scope="col">Actions
            <a class="btn bg-gradient btn-primary">Add</a>


            </th>
        </thead>
        <tbody>
        <?php 
        while($r = $result->fetch(PDO::FETCH_ASSOC)) { 
           ?>
            <tr>
                <td><?php echo $r['idFilm']?></td>
                <td><?php echo $r['titre']?></td>
                <td><?php echo $r['duree']?></td>
                <td><?php echo $r['langue']?></td>
                <td><?php echo $r['date']?></td>
                <td><?php echo $r['montant']?></td>
                <td><?php echo $r['photo']?></td>
                <td>
                    <div class="btn-group">
                        <a class="btn bg-gradient btn-outline-warning">Update</a>
                        <a  class="btn bg-gradient btn-outline-danger">Delete
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