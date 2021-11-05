

<?php
$title = "Votre panier";
$root = "../../";
$panier = true;
require_once '../../includes/header01.php';
require_once '../../db/connexion.inc.php';



    if (!isset($_SESSION['idMembre'])) { 
     echo "Erreur, Vous devez vous connecter ou crée un Compte avant d'ajouter un film à votre panier.";  
   
     exit;
 }
?>

<h1 class="h1 text-center mt-5">Votre panier</h2>
<div id="contListMembre" class="container mt-3">
    <table class="table table-striped table-hover table-borderless">
        <thead class="table-danger">
            <th scope="col">img</th> 
            <th scope="col">Titre</th>  
            <th scope="col">langue</th>
            <th scope="col">Nombre de jour pour la location</th>
            <th scope="col">Montant a changer</th>
            <th scope="col">Retirer</th>
           
        </thead>
        <tbody>
<?php
    

    $idMembre = $_SESSION['idMembre'];
    $panier  = $crud->getPanierParIdMembre($idMembre)->fetch();
    $idPanier= $panier['idPanier'];

    $result = $crud->getPanier( $idPanier);
       // donne l'id des film
    while($r = $result->fetch(PDO::FETCH_ASSOC)) { 
        
        $unFilm= $crud->getFilmById($r['idFilm'])->fetch();
        
        ?>
    <!-- interface du panier -->


            <tr>                       
                <td><?php echo $r['idFilm']?></td>              
                <td><?php echo $unFilm['titre']?></td> 
                <td><?php echo $unFilm['langue']?></td>    
                <td><input  type="number"  placeholder="entrer la duree de location(jours)"></td>    
                <td><?php echo $unFilm['montant']?></td> 
                <td><a onclick="return confirm('Are you sure want to delete this record?')" 
                            href="retirerUnfilmDuPanier.php?idFilm=<?php echo $r['idFilm']?> " class="btn bg-gradient btn-outline-danger">Delete
                        </a></td> 
               
               
            </tr>

            <?php } 
          
            
            ?>

            <tr><td>Total:</td>
            <td>Le total Est</td>
        </tr> 
        </tbody>
    </table>
   
</div>






<?php
function calculerMontant($idFilm,$nbjour){
    



}
include '../../includes/footer.php';
?>