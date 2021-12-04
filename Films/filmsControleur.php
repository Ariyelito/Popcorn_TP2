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
   $resJSON['action']="ajouter";
   try{
    $requete="INSERT INTO films VALUES(0,?,?,?,?,?,?,?)";	    
    $filmModel = new filmsModele($requete,array($titre , $duree, $langue,$date,$montant,$photo,$description));  
    
    $stmt=$filmModel->executer();  
    $resJSON['msg'] = "Film bien eregistré";
   }
    catch(Exception $e){
        $resJSON['msg'] = $e;
    }
  
}

function updateFilmShow(){
   
    $idFilm = $_POST['idFilm'];
    global $resJSON;

    $resJSON['action']="updateFilmShow";
    $requete="SELECT * FROM films WHERE idFilm=?";
    try{
         $filmModel=new filmsModele($requete,array($idFilm));
         $stmt=$filmModel->executer();
         $resJSON['film']= $stmt->fetch(PDO::FETCH_OBJ);        
    }catch(Exception $e)
    {
   
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
   if(!$idFilm){
    $resJSON['msg'] = "erreur lors de la supression";
    return;
   }
    global $resJSON;
    $resJSON['action']="delete";
    $requete= "DELETE FROM films WHERE idFilm=?";
    try {
        $filmModel = new filmsModele($requete,array($idFilm));
        $stmt=$filmModel->executer();      
        $resJSON['msg'] = "Film a ete delete";

          
        } catch (PDOException $e) {
            echo $e->getMessage();
            $resJSON['msg'] = " ertr Film a ete delete";
        }

}

function update(){

    $idFilm =$_POST['idFilm'];

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
    $resJSON['action']="update";
    try{      

     $requete="UPDATE  films SET titre = ?, duree = ?, langue = ?, date = ?, montant = ?, photo= ?, description=?  WHERE idFilm=?";
     $filmModel = new filmsModele($requete,array($titre , $duree, $langue,$date,$montant,$photo,$description, $idFilm));       
     $stmt=$filmModel->executer();
 
     $resJSON['msg'] = "Film bien modifier";   
     }
     catch(Exception $e){      
        echo $e->getMessage(); 
         $resJSON['msg'] = $e. " erreur dans la modification";
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
		case "updateFilmShow" :
			updateFilmShow();
		break;
		case "update" :         
			update();
		break;
	}



echo json_encode($resJSON);

?>