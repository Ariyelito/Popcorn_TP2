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
                        <a  data-bs-toggle="modal" data-bs-target="#updateMembreModal"class="btn bg-gradient btn-outline-warning">Update</a>
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



<!-- MODAL -->

<div class="modal" id="updateMembreModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger bg-gradient">
        <h5 id="logInText" class="modal-title ">Se connecter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Connectez vous pour ajouter un film à votre panier!</p>
        <form id="formRegister" class="row mt-1" action="server/pages/updateMembre.php" method="POST"
        onSubmit="return validerMembre()">

        <div class="col-md-6">
            <label for="inputNom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="inputNom" name="inputNom" value="" placeholder="Nom">
        </div>
        <div class="col-md-6">
            <label for="inputPrenom" class="form-label">Prenom</label>
            <input type="text" class="form-control" id="inputPrenom" name="inputPrenom" value="" placeholder="Prenom">
        </div>
        <div class="col-12">
            <label for="inputEmail" class="form-label">Courriel</label>
            <input type="email" class="form-control" id="inputEmail" name="inputEmail" value=""
                placeholder="This will be your username ID">
        </div>
        <div class="col-6 mt-3">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="Homme" name="inputSexe" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Homme
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" value="Femme" type="radio" name="inputSexe" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                    Femme
                </label>
            </div>
        </div>
       <div class="col-6 mt-3">
            <label for="inputBd">Date de naissance :</label>
            <input type="date" id="inputBd" name="inputBd" value="2000-01-01" min="1900-01-01" max="2003-12-31">
        </div> 
         <!-- <div class="col-6 mt-3">
            <div class="form-group">
                <label for="inputDate">Date de naissance :</label>
                <input type="text" class="form-control" id="inputBd" name="inputBd">
            </div>
        </div>-->
        <div class="col-md-6">
            <label for="inputPassword" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="inputPassword" name="inputPassword" value=""
                placeholder="...">
        </div>

        <div class="col-md-6">
            <label for="inputPassword2" class="form-label">Confirmez votre mot de passe</label>
            <input type="password" class="form-control" id="inputPassword2" name="inputPassword2">
        </div> <br>
        <div class="col-12 mt-3">
            <button id="btnEnregistrer" type="submit" class="btn btn-outline-danger btn-lg">Sign in</button>
        </div>
    </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<!--FIn MODAL -->





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