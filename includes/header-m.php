<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PopcornTV - <?php echo $title ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $root ?>client/public/css/styles.css">


</head>

<body id="body" class=" bg-light bg-gradient">


    <!-- Menu de navigation -->
    <nav id="myNav" class="topnav navbar navbar-expand-sm navbar-dark bg-danger bg-gradient">

        <a class="topnav logo navbar-brand" href="membre.php">Popcorn TV</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <a href="membre.php" class="nav-item nav-link">Accueil</a>
                <a href="server/pages/listerPanier.php" class="nav-item nav-link ">Panier <span class="badge bg-secondary">4</span></a>
            </div>
            <div class="navbar-nav navItemRight">
                <a id="btnLogIn" href="index.php" class="nav-item nav-link">Se déconnecter</a>
            </div>
        </div>
    </nav>
    <div id="container" class="container mt-4">