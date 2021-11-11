<?php
$title = "membre";
$root = "";
include 'includes/header.php';
require_once 'db/connexion.inc.php';
$result = $crud->getMovies();

if(isset($_GET["msg"])){
    echo"<br><br>".($_GET["msg"]);
    
}

?>

<?php
$title = "membre";
$result = $crud->getMovies();
$member = true;
include 'includes/cards.php';

$result = $crudMembre->getMembreByIdM($_SESSION['idMembre']);
$nom  =$result['nom'];
$prenom =$result['prenom'];
$email =$result['email'];
$sexe= $result['sexe'];
$date =$result['date'];
$photo =$result['photo'];
?>
<div class="modal" id="msModalg" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger bg-gradient">
        <h5 id="logInText" class="modal-title ">Se connecter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><?php if(isset($_GET["msg"])){
            echo $_GET["msg"];
            }  ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary bg-gradient" data-bs-dismiss="modal">Annuler</button>
        <a type="button" class="btn btn-danger bg-gradient" href="index.php?idContenu=2">Se connecter</a>
      </div>
    </div>
  </div>
</div>
<div class="modal" id="UpdateProfilModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger bg-gradient">
        <h5 id="logInText" class="modal-title ">Profile</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="formRegister" class="row mt-1" action="server/pages/updateProfilMembre.php" method="POST"
        onSubmit="return validerMembre()">

        <div class="col-md-6">
            <label for="inputNom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="inputNom" name="inputNom" value="<?php echo $nom ?>" placeholder="Nom">
        </div>
        <div class="col-md-6">
            <label for="inputPrenom" class="form-label">Prenom</label>
            <input type="text" class="form-control" id="inputPrenom" name="inputPrenom"value="<?php echo $prenom ?>" placeholder="Prenom">
        </div>
        <div class="col-12">
            <label for="inputEmail" class="form-label">Courriel</label>
            <br>
            <label class="form-label"  > "<?php echo $email ?></label>
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
            <input type="date" id="inputBd" name="inputBd" value="<?php echo $date ?>" min="1900-01-01" max="2003-12-31">
        </div> 
         <!-- <div class="col-6 mt-3">
            <div class="form-group">
                <label for="inputDate">Date de naissance :</label>
                <input type="text" class="form-control" id="inputBd" name="inputBd">
            </div>
        </div>-->
        <div class="col-md-6">
            <label for="inputPassword" class="form-label">Nouveau Mot de passe</label>
            <input type="password" class="form-control" id="inputPassword" name="inputPassword" value=""
                placeholder="...">
        </div>

        <div class="col-md-6">
            <label for="inputPassword2" class="form-label">Confirmez votre Nouveau mot de passe</label>
            <input type="password" class="form-control" id="inputPassword2" name="inputPassword2">
        </div> <br>
        <div class="col-12 mt-3">
            <button id="btnEnregistrer" type="submit" class="btn btn-outline-danger btn-lg">Modifier</button>
        </div>
    </form>
      </div>
     
    </div>
  </div>
</div>


<?php 
$root = "";
include 'includes/footer.php';
?>