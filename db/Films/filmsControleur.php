<?php
require_once("../connexion.inc.php");
require_once("../modeles.inc.php");
$resJSON = array();

function enregistrer(){
   global $resJSON;
   $titre = $_POST['inputTitre'];
   $date = $_POST['inputDate'];
   $langue = $_POST['langue'];
   $montant = $_POST['inputCout'];
   $duree = $_POST['inputDure'];
   $photo = "";
   $idCategories = array(1,2);
   $idRealisateurs = array(1,2);
   $description = $_POST['descriptionText'];

   try{
    $requete="INSERT INTO films VALUES(0,?,?,?,?)";		
    $filmModel = new filmsModele($requete,array($titre , $duree, $langue,$date,$montant,$photo,$description));
    $stmt=$filmModel->executer();
    $resJSON['action']="enregistrer";
    $resJSON['msg'] = "Film bien eregistré";
   }
catch(Exception $e){

}
  
}


function listerFilms(){
    global $resJSON;
    $resJSON['action']="lister";
    $requete="SELECT * FROM films";
    try{
         $filmModel=new filmsModele($requete,array());
         $stmt=$filmModel->executer();
         $resJSON['listeFilms']=array();
         while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
            $resJSON['listeFilms'][]=$ligne;
        }
    }catch(Exception $e){
   
}
}
listerFilms();

echo json_encode($resJSON);

?>