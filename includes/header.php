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

<body id="body" class=" bg-light bg-gradient">

    

<!-- Menu de navigation Membre-->
<nav id="myNav" class="topnav navbar fixed-top navbar-expand-sm navbar-dark bg-danger bg-gradient">
            
  <a class="topnav logo navbar-brand" href="index.php">Popcorn TV</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <div class="navbar-nav"> 

<!-- nav si membre connecter-->
      <?php 
        session_start();
        if (isset($_SESSION['idMembre'])) { 
      ?>                        
      <a id="btnHome" href="<?php echo $root?>membrePage.php" class="nav-item nav-link">Accueil</a>
      <a href="<?php echo $root?>server/pages/listerPanier.php" class="nav-item nav-link ">Panier <span class="badge bg-secondary">4</span></a>
    </div> 
                            
    <div class="navbar-nav navItemRight" >
      <a href="<?php echo $root?>server/pages/deconnection.php" class="nav-item nav-link">Se déconnecter</a>
    </div>

<!-- nav si membre nonconnecter-->
      <?php }else{ ?>

    <a id="btnHome" href="<?php echo $root?>index.php" class="nav-item nav-link">Accueil</a>
    <a id="btnReg" href="<?php echo $root?>index.php?idContenu=1" class="nav-item nav-link">Devenir membre</a>
                       
    </div>  

    <div class="navbar-nav navItemRight" >                          
    <a id="btnLogIn" href="<?php echo $root?>index.php?idContenu=2" class="nav-item nav-link ms-auto">Se connecter</a>                         
    </div>
                      
                      
    <?php } ?>
              
  </div>

</nav>
<!-- Menu de navigation Membre -->


<?php 
  if (isset($_SESSION['idAdmin'])) { 
?>  
      
      
<nav id="myNav" class="topnav navbar fixed-top navbar-expand-sm navbar-dark bg-danger bg-gradient">

   <a id="btnPopCorn" class="topnav logo navbar-brand" href="<?php echo $root ?>admin.php">Popcorn TV</a>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
     aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
 <div class="collapse navbar-collapse" id="navbarNav">
    <div class="navbar-nav">
         <a id="btnAdmin" href="<?php echo $root ?>admin.php" class="nav-item nav-link">Accueil</a>
       
         <a id="btnAjouter" href="<?php echo $root?>server/pages/listerFilms.php" class="nav-item nav-link">Films</a>
         <a id="btnLister" href="<?php echo $root?>server/pages/lister.php" class="nav-item nav-link">Membres</a>
        
    </div>    
    <div class="navbar-nav navItemRight">
         <a href="<?php echo $root?>server/pages/deconnection.php" class="nav-item nav-link float-end">Se déconnecter</a>
     </div>
 </div>
</nav>






<?php } ?>

<div id="container" class="container mt-4">



