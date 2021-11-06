<?php
$title = "Accueil";
$root = "";
include 'includes/header.php';
require_once 'db/connexion.inc.php';



if(isset($_GET['idContenu'])) {
$contenu =$_GET["idContenu"];
}else {
    $contenu = 0; 
}


?>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#LogInModal">
  Launch demo modal
</button> -->
<!-- modal pour se connecter -->
<div class="modal" id="LogInModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger bg-gradient">
        <h5 id="logInText" class="modal-title ">Se connecter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Connectez vous pour ajouter un film à votre panier!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary bg-gradient" data-bs-dismiss="modal">Annuler</button>
        <a type="button" class="btn btn-danger bg-gradient" href="index.php?idContenu=2">Se connecter</a>
      </div>
    </div>
  </div>
</div>
<!-- Form connexion utilisateur -->

<?php 
if($contenu == 2){
?>


<div id="contLogIn1" class="container mt-5">
    <h1 class="h1">Se connecter</h1>

    <form id="myForm" class="row mt-1" action="server/pages/login.php" method="POST" onSubmit="return valider()">

        <div class="form-group col-12">

            <label for="email" class="form-label">Courriel</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Username">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>

        <div class="form-group col-12">
            <label for="mdp" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Password">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>

        <div class="form-group col-12 mt-3">

            <button id="btnConnecter" type="submit" class="btn btn-outline-danger btn-lg">Se connecter</button>

        </div>

    </form>
</div>


<?php } ?>
<!-- Fin Form connection -->
<!-- Form devenir membre -->

<?php 
if($contenu == 1){
    
?>

<div id="contRegister1" class="container mt-5">
    <h1 class="h1">Devenir membre</h1>
    <form id="formRegister" class="row mt-1" action="server/pages/enregistrer.php" method="POST"
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


<?php 
}
?>
<!-- Fin Form enregister -->

<!-- container de cards  -->



<?php
if($contenu == 0){
//$isMembre = false;
$result = $crud->getMovies();
$member = false;
include 'includes/cards.php'; 
}
?>

<?php 
$root = "";
include 'includes/footer.php';
?>