<?php

chargerJSONFilm();

function chargerJSONFilm(){
  
     require_once 'connexion.inc.php';

    $file = file_get_contents("bdfilms.json");

    $json = json_decode($file,true);
    
    
    
   $categories = $json['genres'];
   $films = $json['movies'];

  foreach($categories as $value){
      if(!$crud->categorieExiste($value)){
        $crud->addCategorie($value);
      }
  }
 
   
    foreach($films as $value){
     $idCategories = array();
     $idRealisateurs =array();
    // $idactors;
    //  foreach($value['actors'] as $actor){

    // }

     $realisateurs = explode(",",$value['director']);
     foreach($realisateurs as $r){
         if(!$crud->realisateurExiste($r)){
            $crud->addRealisateur($r);
             }
         $idRealisateurs[]=$crud->getRealisateurId($r);
         echo $crud->getRealisateurId($r).";".$r. "<br/> <br/>";
       
     }
     foreach($value['genres'] as $categorie){
        $idCategories[] = $crud->getIdCategorie($categorie);

    }
    
     $film = new Film(0,$value['title'],$value['runtime'],"Anglais",$value['year']."-01-01",rand(10,50),$value['posterUrl'],$idCategories,$idRealisateurs,$value['plot']);

  

     $crud->addFilm($film);
     $film->idFilm = $pdo->lastInsertId();
     $crud->addCategoriesPourFilm($film->idFilm,$idCategories);
     $crud->addRealisateursPourFilm($film->idFilm,$idRealisateurs);

 }
 
 }

?>