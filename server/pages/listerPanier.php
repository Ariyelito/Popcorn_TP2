<?php
$title = "Votre panier";
$root = "../../";
$panier = true;
require_once '../../includes/header.php';
require_once '../../db/connexion.inc.php';




    if (!isset($_SESSION['idMembre'])) { 
     echo "Erreur, Vous devez vous connecter ou crée un Compte avant d'ajouter un film à votre panier.";  
   
     exit;
 }
 
    
 unset( $_SESSION["total"]);


 $_SESSION["total"]=0;
?>

<h1 class="h1 text-center mt-5">Votre panier</h1>
<div id="contListPanier" class="container mt-3">
    <table class="table table-striped table-hover table-borderless">
        <thead class="table-danger">
            <th scope="col">img</th>
            <th scope="col">Titre</th>
            <th scope="col">langue</th>
            <th scope="col">Nombre de jour pour la location</th>
            <th scope="col">Montant</th>
            <th scope="col">Retirer</th>
        </thead>
        <tbody>
            <?php
            $idMembre = $_SESSION['idMembre'];
            $panier  = $crud->getPanierParIdMembre($idMembre)->fetch();
           if(!$panier){
                echo "<h2>Panier vide</h2>";
                exit;
           } else{          
            $idPanier= $panier['idPanier'];
        }

            $result = $crud->getPanier($idPanier);

        
            while($r = $result->fetch(PDO::FETCH_ASSOC)) { 
                
                $unFilm= $crud->getFilmById($r['idFilm'])->fetch();
                ?>
                        <!-- interface du panier -->
                <tr>
                    <td><?php echo $r['idFilm']?></td>
                    <td><?php echo $unFilm['titre']?></td>
                    <td><?php echo $unFilm['langue']?></td>
                    <td>
                        <!-- listerPanier.php?journee=7 -->
                        <form action='' id='formPanier<?php echo $r['idFilm']?>' method="POST">
                            <?php echo optionDejour($r['idFilm'],$unFilm['montant'])?>

                        </form>
                    </td>
                    <td> 
                        <a onclick="return confirm('Are you sure want to delete this record?')"
                            href="retirerUnfilmDuPanier.php?idFilm=<?php echo $r['idFilm']?>"
                            class="btn bg-gradient btn-outline-danger">Delete
                        </a>
                    </td>


                </tr>
            <?php } ?>
                <tr>
                    <td>Total:</td>
                    <td>Le total Est <?php echo $_SESSION["total"] ?></td>
                </tr>
        </tbody>
    </table>
    <a id="btnRetourPanier" class="btn btn-danger bg-gradient" href="../../membrePage.php">Retour</a>
     <a id="btnPayPanier" class="btn btn-success bg-gradient" data-bs-toggle="modal" data-bs-target="#payerModal" >Payer</a>
            
    


</div>




    <!-- option de jour-->
    <?php 
function optionDejour($idFilmP,$prixFilm){  
    global $crud;
 
    
    if(!isset($_SESSION["Cart"][$idFilmP])  ){
        $_SESSION["Cart"][$idFilmP] = 1;
     
    }


        if(isset($_POST['nbJourSelect'.$idFilmP])) {
        $_SESSION["Cart"][$idFilmP]= $_POST['nbJourSelect'.$idFilmP]; 
      
         }

    $journee = $_SESSION["Cart"][$idFilmP];

     $result = $crud->getLesNbDeJourDeLocation();  

    
    $rep = "<select class='form-select' name='nbJourSelect".$idFilmP."' onchange='this.form.submit()'>";
  //$rep .= '<input type="hidden" id="nbJourHidden" name="nbJourHidden'.$idFilmP.'" value="'. $option.'">';
    while($r = $result->fetch(PDO::FETCH_ASSOC)) {       
       $jour= $r["nbJour"];  
      
     
       if($jour == $journee) {           
            $rep.= "<option value='".$jour."' selected>".$jour."</option>";
        }else {
            $rep.= "<option value='".$jour."'>".$jour."</option>";

        }
   }       
        $rep .= "</select> "; 

        $rep .= "<td>";
        
        
        $prixJour = $crud->getPrixPourUnFilm($journee);
      
        $prix=  $prixJour*$prixFilm;
        $rep .= $prix;
        $_SESSION["total"] += $prix;
        $rep .= "</td>"; 
    
return $rep;
}
?>


<div class="modal" id="payerModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger bg-gradient">
        <h5 id="logInText" class="modal-title ">Se connecter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="myForm" class="row mt-1" action="/payer.php" >

<div class="form-group col-12">

    <label for="email" class="form-label">Carte de credit</label>
    <input type="text" class="form-control" id="email" name="email" placeholder="">
    <div class="valid-feedback">
      
    </div>
</div>

<div class="form-group col-12">
    <label for="mdp" class="form-label">CVC</label>
    <input type="password" class="form-control" id="mdp" name="mdp" placeholder="">
    <div class="valid-feedback">
        Looks good!
    </div>
</div>



</form>
      </div>
      <div class="modal-footer">
      
        <a type="button" class="btn btn-danger bg-gradient" href="payer.php">Payer</a>
      </div>
    </div>
  </div>
</div>
<?php
include '../../includes/footer.php';
?>