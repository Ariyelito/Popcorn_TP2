<?php
$title = "Accueil";
include 'includes/header.php';
require_once 'db/connexion.inc.php';
?>

<!-- Fin menu de navigation -->


<!-- Form connexion utilisateur -->

<div id="contLogIn" class="container">
    <h1 class="h1">Se connecter</h1>

    <form id="myForm" class="row" action="server/pages/login.php" method="POST" onSubmit="return valider()">

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
<!-- Fin Form connection -->
<!-- Form devenir membre -->
<div id="contRegister" class="container mt-3">
    <h1 class="h1">Devenir membre</h1>
    <form id="formRegister" class="row" action="server/pages/enregistrer.php" method="POST"
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

<!-- container de cards  -->

<?php
//$isMembre = false;
$result = $crud->getMovies();
include 'includes/cards.php'; 
?>

<?php 
$root = "";
include 'includes/footer.php';
?>