<?php
$title = "Membre";
$root = "../../";
$panier = false;
include '../../includes/header.php';

?>

<!-- log-in container -->
<div class="container mt-3">
    <?php
    $emailEntree = $_POST['email'];
    $passwordEntree = $_POST['mdp'];

   // $connectionFile = fopen("../data/connection.txt", "r") or exit("Unable to open file!");

    $found = false;
    
    $isMembre;

    require_once '../../db/connexion.inc.php';

    $result = $crudMembre->getMembreByEmail($emailEntree);
    if(!$result) {?>
    <div class="container text-center mt-5">
        <h5 class="h5 text-danger mt-5">Mpd ou email non valide.</h1>
        <a id="btnRetour2" class="btn btn-danger bg-gradient" href="../../index.php">Retour</a>
    </div>
    <?php
    } else {
        if($passwordEntree == $result['password']){
            $idMembre = $result['idMembre'];
  //      echo "<h3>Vous êtes connecté ($emailEntree)</h3>";
        
        // session pour save idMembre
       
           $r =$crudMembre->getMembreStatue($idMembre);

            if($r == 0){
                
                echo "<br><br>Votre Compte à été désactiver";
                exit;
            }



        session_start();
         if($result['role']=='M')
         {
         $_SESSION['idMembre'] =  $idMembre;
         $_SESSION['emailMembre'] =  $emailEntree;
         $_SESSION["Cart"]= array();
         
         header('Location: ../../membrePage.php');
         }
        else if($result['role'] =='A')
        {
            $_SESSION['idAdmin'] =  $idMembre;
            header('Location: ../../admin.php');
        }
    
        }else{
           ?>
              <div class="container text-center">
        <h5 class="h5 text-danger mt-5">Mpd ou email non valide</h1>
        <a id="btnRetour2" class="btn btn-danger bg-gradient" href="../../index.php">Retour</a>
    </div>
    <?php
            
      
        }
    }
    
    ?>
</div>
<?php 
$root = "../../";
include '../../includes/footer.php';
?>
