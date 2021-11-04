<?php
$title = "Admin";
$root = "";
$lister = false;
include 'includes/header01.php';
require_once 'db/connexion.inc.php';
$result = $crud->getMovies();
// methode a faire 
// $result2 = $crud->getLangues();
// $result3 = $crud->getCategories();

?>

<?php
$result = $crud->getMovies();
$member = false;
$admin = true;
include 'includes/cards.php' 
?>

<form id="formLister" action="server/pages/lister.php" method="POST"> </form>

<!-- Form ajouter un film-->
<div id="contAddFilm" class="container mt-5">
    <h1 class="h1">Ajouter un film</h1>
    <form id="formRegister" class="row" action="server/pages/ajouterFilm.php" method="POST"
        onSubmit="return validerFilm()">

        <div class="col-md-6 mt-3">
            <div class="form-group">
                <label for="inputTitre" class="form-label">Titre :</label>
                <input type="text" class="form-control" id="inputTitre" name="inputTitre" value="">
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group">
                <label for="inputReal" class="form-label">Réalisateur :</label>
                <input type="text" class="form-control" id="inputReal" name="inputReal" value="">
            </div>
        </div>

        <div class="col-6 mt-3">
            <div class="form-group">
                <label for="inputDate">Date de sortie :</label>
                <input type="text" class="form-control" id="inputDate" name="inputDate">
            </div>
        </div>

        <div class="col-6 mt-3">
            <div class="form-group">
                <label for="InputLangue">Langue :</label>
                <select class="form-control" id="InputLangue" name="langue">
                    <option value="1">Français</option>
                    <option value="2">Anglais</option>
                    <option value="3">Espagnol</option>
                    <?php //while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <!-- <option value="<?php //echo $r['langue_id'] ?>"><?php //echo $r['name']; ?></option> -->
                    <?php //}?>

                </select>
            </div>
        </div>

        <div class="col-6 col-sm-4 mt-3">
            <div class="form-group">
                <label for="inputCout">Coût :</label>
                <input type="text" class="form-control" id="inputCout" name="inputCout">
            </div>
        </div>

        <div class="col-6 col-sm-4 mt-3">
            <div class="form-group">
                <label for="inputDure">Durée :</label>
                <input type="text" class="form-control" id="inputDure" name="inputDure">
            </div>
        </div>
        
        <div class="col-sm-4 mt-3">
            <div class="form-group">
                <label for="inputCat">Catégorie :</label>
                <select class="form-control" id="inputCat" name="inputCat">
                    <option value="1">Comédie</option>
                    <option value="2">Action</option>
                    <option value="3">Romance</option>
                    <option value="4">Drame</option>
                    <option value="5">Science-fiction</option>
                    <option value="6">Horreur</option>
                    <?php //while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                    <!-- <option value="<?php //echo $r['horreur_id'] ?>"><?php //echo $r['nom']; ?></option> -->
                    <?php //}?>

                </select>
            </div>
        </div>
        <br>
        <div class="col-12 mt-3">
            <button id="btnAddFilm" type="submit" class="btn btn-outline-success bg-gradient">Ajouter</button>
        </div>
    </form>
</div>


<?php 
$root = "";
include 'includes/footer.php';
?>