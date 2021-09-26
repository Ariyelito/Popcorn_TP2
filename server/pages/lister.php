<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PopcornTV - Liste des membres </title>
    <link rel="stylesheet" href="../../client/public/css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


</head>

<body id="body" class=" bg-light bg-gradient">


    <!-- Menu de navigation -->
    <nav id="myNav" class="topnav navbar navbar-expand-sm navbar-dark bg-danger bg-gradient">

        <a class="logo navbar-brand" href="admin.php">Popcorn TV</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span id="toggler" class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <a id="btnHome" href="admin.php" class="nav-item nav-link">Accueil</a>
                <a id="btnLister" href="#" class="nav-item nav-link">Lister</a>
                <a id="btnHome" href="index.php" class="nav-item nav-link">Deconnexion</a>

            </div>
        </div>

    </nav>
    <div id="container" class="container mt-4">


<?php
echo '<h2 style="text-align:center;color:blue;">LISTE DES MEMBRES</h2>';

define("FICHIER_MEMBRES", "../data/membres.txt");
define("FICHIER_CONNEXION", "../data/connection.txt");

$tabInfos = array();

if (($ficMembres = fopen(FICHIER_MEMBRES, "r")) === null || ($ficConnexion = fopen(FICHIER_CONNEXION, "r")) === null) {
    echo "<p>Nous avons un problème pour créer/ouvrir les fichiers</p>";
    exit;
}

function infosConnexion($courriel)
{
    global $ficConnexion;
    $ligne = fgets($ficConnexion);
    while (!feof($ficConnexion)) {
        $tab = explode(";", $ligne);
        if ($courriel === $tab[0]) {
            $infos = $tab[2] . ";" . $tab[3];
            return $infos;
        } else {
            $ligne = fgets($ficConnexion);
        }
    }

    return "";
}

function detailInfos($tab2)
{

    $statut = $role = null;
    switch ((int) $tab2[0]) {
        case 0:$statut = "Inactif";
            break;
        case 1:$statut = "Actif";
            break;
    }
    $tab2[0] = $statut;

    switch (trim($tab2[1])) {
        case "M":$role = "Membre";
            break;
        case "A":$role = "Administrateur";
            break;
        case "E":$role = "Employé";
            break;
    }
    $tab2[1] = $role;
    return $tab2;
}

function obtenirTableauInfosMembres()
{
    global $tabInfos, $ficMembres, $ficConnexion;
    $ligne = fgets($ficMembres);
    while (!feof($ficMembres)) {
        $tab = explode(";", $ligne);
        $infos = infosConnexion(trim($tab[2]));
        $tab = [$tab[0], $tab[1], $tab[2]];
        $tab2 = explode(";", $infos);
        $tab2 = detailInfos($tab2);

        $tab = array_merge($tab, $tab2);

        $tabInfos[] = $tab;
        $ligne = fgets($ficMembres);

    }

    fclose($ficMembres);
    fclose($ficConnexion);
}

function retournerTableauHTMLMembres()
{
    global $tabInfos;
    obtenirTableauInfosMembres();

    $rep = '<table class="table table-striped">';
    $rep .= '<thead><tr><th scope="col">Prénom</th> <th scope="col">Nom</th>';
    $rep .= '<th scope="col">Courriel</th> <th scope="col">Statut</th>';
    $rep .= '<th scope="col">Rôle</th> </tr></thead>';

    $rep .= "<tbody>";
    foreach ($tabInfos as $unMembre) {
        $rep .= "<tr>";
        foreach ($unMembre as $valeur) {
            $rep .= "<td >" . $valeur . "</td>";
        }
        $rep .= "</tr>";
    }
    unset($tabInfos);
    $rep .= "</tbody></table>";
    echo $rep;
}
retournerTableauHTMLMembres();
?>
    <div class="container mt-5">
        <p>
            <small>
                <?php echo 'Copyright &copy; ' . date("Y") . ' PopcornTV.ca' ?>
            </small>
        </p>
    </div>
        <script src="../../client/public/utilities/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
        </script>
        <script src="../../client/public/js/app.js"></script>

        </body>

        </html>

