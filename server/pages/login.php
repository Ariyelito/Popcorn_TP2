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
    <div class="container text-center">
        <h5 class="h5 text-danger mt-5">ID de connection non valide. Utilisé un autre email.</h1>
        <a id="btnRetour2" class="btn btn-danger bg-gradient" href="../../index.php">Retour</a>
    </div>
    <?php
    } else {
        if($passwordEntree == $result['password']){
            $idMembre = $result['idMembre'];
        echo "<h3>Vous êtes connecté ($emailEntree)</h3>";
        
        // session pour save idMembre
       
        session_start();
         if($result['role']=='M')
         {
         $_SESSION['idMembre'] =  $idMembre;
         $_SESSION["Cart"]= Array();
         header('Location: ../../membrePage.php');
         }
        else if($result['role'] =='A')
        {
            $_SESSION['idAdmin'] =  $idMembre;
            header('Location: ../../admin.php');
        }
    
        }else{
            // a rediriger
            echo "password n'est pas bon";
        }
    }
     // $r = $result->fetch(PDO::FETCH_ASSOC);
    // echo $r['prenom'];
    // while (!feof($connectionFile) && !$found) {
    //     $ligne = fgets($connectionFile) . "<br />";
    //   //  $tabLigne = explode(";", "$ligne;");
    //   list($mailDB, $hash,$isActive,$isMembre) = explode(";", "$ligne");

    //     if ($emailEntree == $mailDB) {
    //         if (password_verify($passwordEntree, $hash)) {

    //             $found = true;
    //         }
    //     }
    // }


    // if (!$found) {
    //     echo "Verifier le mot de passe ou l'email";
    //     echo "<br /><a href=\"../../index.php\">Accueil</a>";

    // } else {        
    //     echo "<h3>Vous êtes connecté ($emailEntree)</h3>";
      
    //      if($isMembre =='M')
    //      {
    //      header('Location: ../../membrePage.php');
    //      }
    //     else if($isMembre =='A')
    //     {
    //         header('Location: ../../admin.php');
    //     }
    
    // } 
    // fclose($connectionFile);
    ?>
</div>
<?php 
$root = "../../";
include '../../includes/footer.php';
?>
