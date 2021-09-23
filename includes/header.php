<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PopcornTV - <?php echo $title ?> </title>
    <link rel="stylesheet" href="client/public/css/styles.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


</head>

<body id="body" class=" bg-light bg-gradient">

    

        <!-- Menu de navigation -->
        <nav id="myNav" class="topnav navbar navbar-expand-sm navbar-dark bg-danger bg-gradient">

            <a class="logo navbar-brand" href="index.php">Popcorn TV</a>
            <button id="toggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span id="toggler" class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav">
                    <a id="btnHome" href="#" class="nav-item nav-link">Accueil</a>
                    <a id="btnReg" href="#" class="nav-item nav-link">Devenir membre</a>
                    <a id="btnLogIn" href="#" class="nav-item nav-link">Se connecter</a>
                    <a id="btnLister" href="#" class="nav-item nav-link">Lister</a>

                    <!-- $('#btnReg').hide();
                         $('#btnLogIn').hide();
                -->
                </div>
            </div>

        </nav>
        <div id="container" class="container mt-4">