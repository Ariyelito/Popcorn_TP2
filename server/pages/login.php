<?php
$title = "Membre";
include '../../includes/header-m.php';

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
    if(!$result)
    echo "Not found";
    else {
        if($passwordEntree == $result['password']){
        echo "<h3>Vous êtes connecté ($emailEntree)</h3>";
      
         if($result['role']=='M')
         {
         header('Location: ../../membrePage.php');
         }
        else if($result['role'] =='A')
        {
            header('Location: ../../admin.php');
        }
    
        }else{
            echo "password ne pas bon";
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
