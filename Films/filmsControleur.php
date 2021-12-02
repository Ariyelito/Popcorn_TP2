<?php

require_once("../db/connexion.inc.php");
require_once("../db/modeles.inc.php");
$resJSON = array();

function ajouter(){
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
    $requete="INSERT INTO films VALUES(0,?,?,?,?,?,?,?)";	    
    $filmModel = new filmsModele($requete,array($titre , $duree, $langue,$date,$montant,$photo,$description));  
    
    $stmt=$filmModel->executer();
    $resJSON['action']="ajouter";
    $resJSON['msg'] = "Film bien eregistré";
   }
    catch(Exception $e){
        $resJSON['msg'] = $e;
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
    }catch(Exception $e)
    {
   
    }
}

function delete(){

    $idFilm =$_POST['idFilm'];
   
    global $resJSON;
    $resJSON['action']="delete";
    $requete= "DELETE FROM films WHERE idFilm = $idFilm";
    try {
        $filmModel = new filmsModele($requete,array());
        $stmt=$filmModel->executer();      
        $resJSON['msg'] = "Film a ete delete";

          
        } catch (PDOException $e) {
            echo $e->getMessage();
            $resJSON['msg'] = " ertr Film a ete delete";
        }

}



$action = $_POST['action'];

	switch($action){
		case "ajouter" :
           
			ajouter();
		break;
		case "lister" :
          
			listerFilms();
		break;
		case "delete" :
			delete();
		break;
		case "fiche" :
			fiche();
		break;
		case "update" :
			update();
		break;
	}


//listerFilms();

echo json_encode($resJSON);

?>