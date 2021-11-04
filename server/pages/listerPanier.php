

<?php
$title = "Votre panier";
$root = "../../";
require_once '../../includes/header-m.php';
require_once '../../db/connexion.inc.php';


session_start(); 
    if (!isset($_SESSION['idMembre'])) { 
     echo "Erreur, Vous devez vous connecter ou crée un Compte avant d'ajouter un film à votre panier.";  
   
     exit;
 }
?>

<h1 class="h1 text-center mt-5">Liste des membres</h2>
<div id="contListMembre" class="container mt-3">
    <table class="table table-striped table-hover table-borderless">
        <thead class="table-danger">
            <th scope="col">img</th> 
            <th scope="col">Titre</th> 
            <th scope="col">Montant</th>
            <th scope="col">langue</th>
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
                <td><?php echo $unFilm['montant']?></td> 
                <td><?php echo $unFilm['langue']?></td> 
            </tr>

            <?php } ?>


        </tbody>
    </table>
   
</div>


<?php
include '../../includes/footer.php';
?>