<?php  
    $prenom = $_POST['inputPrenom'];
    $title = "Bienvenue, $prenom!";
    //$pageEnregistrer
    
    include '../../includes/header-m.php';
 
?>

<!-- to do -->
<div class="container mt-3">
    <?php

        define("FICHER_MEMBRE", "../data/membres.txt");
        define("FICHER_CONNECTION", "../data/connection.txt");

        if (!$fic = fopen(FICHER_MEMBRE, "a+")) {
            echo "Fichier non trouvé";
            exit;
            }

        if (!$fichierConnection = fopen(FICHER_CONNECTION, "a+")) {
                echo "Fichier non trouvé";
                exit;
            }

            $nom = $_POST['inputNom'];
            $prenom = $_POST['inputPrenom'];
            $email = $_POST['inputEmail'];
            $sexe = $_POST['inputSexe'];
            $date = $_POST['inputDate'];
            $motDePasse = $_POST['inputPassword'];

            $ligne = $nom . ";" . $prenom . ";" . $email . ";" . $sexe . ";" . $date . "\n";
            $ligneConnection = $email . ";" . password_hash($motDePasse, PASSWORD_DEFAULT) .";1;M". "\n";

            fputs($fic, $ligne);
            fclose($fic);
          
            fputs($fichierConnection, $ligneConnection);
            fclose($fichierConnection);
          
            echo ("Bienvenue sur PopcornTV.ca, $prenom ($email)");
           
            ?>
</div>

<?php  include '../../includes/footer.php'?>