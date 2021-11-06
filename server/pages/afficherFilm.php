<?php
require_once '../../db/connexion.inc.php';

 
    $idFilm = $_GET['idFilm'];
    
   /*$str=  $_SERVER['QUERY_STRING'];
  parse_str($str, $output);
  echo $output['idFilm'];
  echo $output['idMembre'];
  "; */

    $result = $crud->getFilmById($idFilm);
    $r = $result->fetch();
    if($r){
        echo $r['titre'];
    }else{
        echo "Erreur";
    exit;}
    $root = "../../";
    $img = $root . $r['photo'];

?>


    <div class="col mt-3">
            <div class="card">
                <img src="<?php echo $img ?>" class="card-img-top" alt="image du film ne peut etre afficher" >
                <div class="card-body description">
                    <h5 class="card-title"><?php echo $r['titre'] ?></h5>
                    <p class="card-text">
                    <?php echo $r['montant'] ?> </br>
                    <?php echo $r['date'] ?> </br>
                    <?php echo $r['langue'] ?>
                    </p>
                </div>
                <input type="hidden" name="idFilm" value="<?php echo $r['idFilm']?>">   
               <form action ></form>
                <button  name='addFilm' onclick="location.href='./ajouterPanier.php?idFilm=<?php echo $idFilm?>'" >Ajouter Au panier</button>             
              
                
            </div>

        </div>

<?php 

include '../../includes/footer.php';
?>