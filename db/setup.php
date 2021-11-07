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
     $idactors = array();
   
    $actors = explode(",",$value['actors']);
    foreach($actors as $a){
        if(!$crud->actorExiste($a)){
           $crud->addActor($a);
            }
        $idactors[]=$crud->getActorId($a);
        
      
    }
     $realisateurs = explode(",",$value['director']);
     foreach($realisateurs as $r){
         if(!$crud->realisateurExiste($r)){
            $crud->addRealisateur($r);
             }
         $idRealisateurs[]=$crud->getRealisateurId($r);
        
       
     }
     foreach($value['genres'] as $categorie){
        $idCategories[] = $crud->getIdCategorie($categorie);

    }

$image;
 $url = $value['posterUrl'];
  
// Getting page header data
 $array = @get_headers($url);
  
// Storing value at 1st position because
// that is only what we need to check
 $string = $array[0];
  
// 404 for error, 200 for no error
if(strpos($string, "200")) {
   $image = $value['posterUrl'];
} 
else {
   $image = 'client/public/images/default.jpg';
}
    
     $film = new Film(0,$value['title'],$value['runtime'],"Anglais",$value['year']."-01-01",rand(10,50),$image,$idCategories,$idRealisateurs,$value['plot']);

  

     $crud->addFilm($film);
     $film->idFilm = $pdo->lastInsertId();
     $crud->addCategoriesPourFilm($film->idFilm,$idCategories);
     $crud->addRealisateursPourFilm($film->idFilm,$idRealisateurs);
     $crud->addActorsPourFilm($film->idFilm,$idactors);
 }
 
 }

?>