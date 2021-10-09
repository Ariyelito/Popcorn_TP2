<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PopcornTV - <?php echo $title ?> </title>
    <link rel="stylesheet" href="client/public/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


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
                <a id="btnAdmin" href="#" class="nav-item nav-link">Accueil</a>
                <a id="btnAjouter" href="#" class="nav-item nav-link">Ajouter un film</a>
                <a id="btnLister" href="#" class="nav-item nav-link">Lister</a>
                <a id="btnHome" href="index.php" class="nav-item nav-link">Deconnexion</a>

            </div>
        </div>

    </nav>
    <div id="container" class="container mt-4">