<?php

require_once("../db/connexion.inc.php");
require_once("../db/modeles.inc.php");
$resJSON = array();

function getCategories(){
    // a faire svp les amis
    //$resJSON['listeCategories']
}

function ajouter(){
   global $resJSON;
   $titre = $_POST['inputTitle'];
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
        $resJSON['msg'] = "Problem d'enregistrement";
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
    //$requete="SELECT f.*, c.nomCategorie FROM films f join filmcategorie fc on f.idFilm = fc.idFilm join categories c on fc.idCategorie = c.idCategorie";
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
// function getFilmCategories($idFilm){

//     $requete="SELECT c.nomCategorie FROM films f join filmcategorie fc on f.idFilm = fc.idFilm join categories c on fc.idCategorie = c.idCategorie where f.idFilm = ?";
//     try{
//         $filmModel=new filmsModele($requete,array($idFilm));
//         $stmt=$filmModel->executer();
//         $tab = array();
//         while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
//             $tab[] = $ligne;
//        }
//    }catch(Exception $e)
//    {
  
//    }
// }
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
  
    //    global $resJSON;
    // $resJSON['msg'] ="enter";
    // $resJSON['action']="update";

    $idFilm =$_POST['idFilm'];
    global $resJSON;
    $titre = $_POST['inputTitle'];
    $date = $_POST['inputDate'];
    $langue = $_POST['langue'];
    $montant = $_POST['inputCout'];
    $duree = $_POST['inputDure'];
    $photo = "";
         
     
    // integrer dans la requetes svp merci
    $categories = (isset($_POST['inputCat'])) ? $_POST['inputCat'] : array();
    $idCategories = array(1,2);
    $idRealisateurs = array(1,2);
    $description = $_POST['descriptionText'];
    $resJSON['action']="update";
    try{      
    // if($photo === "")
    // $requete="UPDATE  films SET titre = ?, duree = ?, langue = ?, date = ?, montant = ?, description=?  WHERE idFilm=?"; $_FILES['photoFile']
    // $filmModel = new filmsModele($requete,array($titre , $duree, $langue,$date,$montant,$description, $idFilm));  else 
    $requete="UPDATE  films SET titre = ?, duree = ?, langue = ?, date = ?, montant = ?, photo= ?, description=?  WHERE idFilm=?";
    $filmModel = new filmsModele($requete,array($titre , $duree, $langue,$date,$montant,$photo,$description, $idFilm));      
     $stmt=$filmModel->executer();
 
     $resJSON['msg'] = "Film bien modifier";   
     }
     catch(Exception $e){      
       // echo $e->getMessage(); 
         $resJSON['msg'] = $e. " erreur dans la modification";
     }
  
}
function chercherFilmsParCategorie(){
    global $resJSON;

    $resJSON['action']="chercherCat";
    $requete="SELECT * FROM films f join filmcategorie fc on f.idFilm = fc.idFilm WHERE fc.idCategorie = ?";
    $idCategorie = $_POST['idCategorie'];
    try{
         $filmModel=new filmsModele($requete,array($idCategorie));
         $stmt=$filmModel->executer();
         $resJSON['listeFilms']=array();
         while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
            $resJSON['listeFilms'][]=$ligne;
        }
    }catch(Exception $e)
    {
   
    }
}
function  chercherFilmsParTitre(){
    global $resJSON;

    $resJSON['action']="chercherParTitre";
    $titre = $_POST['titre'];
    $requete="SELECT * FROM `films` where titre like '%$titre%'";
   
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

// function getAllCategories(){
//     global $resJSON;

//     $resJSON['action']="getAllCategories";
  
//     $requete="SELECT c.nomCategorie FROM `categories`";
   
//     try{
//          $filmModel=new filmsModele($requete,array());
//          $stmt=$filmModel->executer();
//          $resJSON['listeCategories']=array();
//          while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
//             $resJSON['listeCategories'][]=$ligne;
//         }
//         echo json_encode($resJSON);
//     }catch(Exception $e)
//     {
   
//     }
// }

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
        case "chercherCat" : 
            chercherFilmsParCategorie();
        break;
        case "chercherParTitre" : 
            chercherFilmsParTitre();
        break;
        case "getCategories":
            getCategories();
            break;

	}

echo json_encode($resJSON);
?>