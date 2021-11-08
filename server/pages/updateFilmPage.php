<?php
$title = "admin";

$root = "../../";
include '../../includes/header.php';
require_once '../../db/connexion.inc.php';

?>


<?php
$idFilm =$_GET["idFilm"];
$r = $crud->getMoviesById($idFilm);


$titre = $r['titre'];
$duree = $r['duree'];
$langue = $r['langue'];
$date = $r['date'];
$montant = $r['montant'];
$description = $r["description"];
?>

<!-- FORm -->
<div class="container mt-5">
<form id="formRegister" class="row" action="updateFilm.php" method="POST" onSubmit="return validerFilm()">

<div class="col-md-6 mt-3">
    <div class="form-group">
        <label for="inputTitre" class="form-label">Titre :</label>
        <input type="text" class="form-control" id="inputTitre" name="inputTitre" value="<?php echo $titre ?>">
    </div>
</div>
<div class="col-md-6 mt-3">
    <div class="form-group">
        <label for="inputReal" class="form-label">Réalisateur :</label>
        <input type="text" class="form-control" id="inputReal" name="inputReal" value="<?php echo $titre ?>">
    </div>
</div>

<div class="col-6 mt-3">
    <div class="form-group">
        <label for="inputDate">Date de sortie :</label>
        <input type="text" class="form-control" id="inputDate" name="inputDate" value="<?php echo $date ?>">
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
        <input type="text" class="form-control" id="inputCout" name="inputCout" value="<?php echo $montant ?>">
    </div>
</div>

<div class="col-6 col-sm-4 mt-3">
    <div class="form-group">
        <label for="inputDure">Durée :</label>
        <input type="text" class="form-control" id="inputDure" name="inputDure"  value="<?php echo $duree ?>">
    </div>
</div>

<div class="col-sm-4 mt-3">
    <div class="form-group">
        <label for="inputCat">Catégorie :</label>
        <select class="form-control" id="inputCat" name="inputCat">
           <?php

            $cat = $crud->getAllCategories();

             while($c = $cat->fetch(PDO::FETCH_ASSOC)){ ?>

                <option value="<?php echo $c['idCategorie'] ?>"><?php echo $c['nomCategorie']  ?></option>

                <?php } ?>
                
        </select>
    </div>
</div>
<input type="hidden" name="idFilm" value="<?php echo $idFilm?>">     
<div class="col-12 mt-3">
    <label for="formFile" class="form-label">Poster pour le film (image) :</label>
    <input class="form-control" type="file" id="formFile">
</div>
<br>
<div class="col-12 mt-3">
    <label for="descriptionText" class="form-label">Description du film :</label>
    <textarea id="descriptionText" name="descriptionText" class="form-control" rows="3"><?php echo $description ?></textarea>
</div>
<div class="col-12 mt-3">
    <button id="btnAddFilm" type="submit" class="btn btn-success bg-gradient">Modifier</button>

</div>
</form>




</div>
<?php 
$root = "../../";
include '../../includes/footer.php';
?>


