<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PopcornTV - <?php echo $title ?> </title>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo $root ?>client/public/css/styles.css">

</head>
<?php
   if(isset($_GET['id'])){
	$id = $_GET['id'];
	$msg = $_GET['msg'];
	
   }else {
	   $id = "-1";
	   $msg = " ";
   }
?>
<body onLoad="initialiser(<?php echo $id;?>,<?php echo "'".$msg."'";?>);" id="body" class=" bg-light bg-gradient">


    <!-- Menu de navigation -->
    <nav id="myNav" class="topnav navbar navbar-expand-sm navbar-dark bg-danger bg-gradient">

        <a id="btnPopCorn" class="topnav logo navbar-brand" href="<?php echo $root ?>admin.php">Popcorn TV</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <a id="btnAdmin" href="<?php echo $root ?>admin.php" class="nav-item nav-link">Accueil</a>
                <a id="btnAjouter" href="#" class="nav-item nav-link">Ajouter un film</a>
                <a id="btnLister" href="#" class="nav-item nav-link">Lister Membres</a>
                <a id="btnHome" href="index.php" class="nav-item nav-link">Deconnexion</a>
            </div>
        </div>
    </nav>
    <div id="container" class="container mt-4">