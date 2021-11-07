<?php
/*
$result = $crudMembre->getMembreByIdM($_SESSION['idMembre']);
echo $result['nom'];
echo $result['prenom'];
echo $result['email'];
echo $result['sexe'];
echo $result['date'];
echo $result['photo'];*/

$idMembre = $_SESSION["idMembre"];
$nom = $_POST['inputNom'];
$prenom = $_POST['inputPrenom'];
$email = $_POST['inputEmail'];
$sexe = $_POST['inputSexe'];
$date = $_POST['inputBd'];
$photo = "";
$motDePasse = $_POST['inputPassword'];


$membre  = new Membre($idMembre,$nom,$prenom,$email,$sexe,$date,$photo,$motDePasse,1,"M");

$crudMembre->UpdateMembre();
?>




<?php 

include  $root.'includes/footer.php';
?>