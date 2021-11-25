<?php
    class Film{
        public $idFilm;
        public $titre;
        public $duree;
        public $langue;
        public $date ;
        public $montant;
        public $photo;
        public  $idCategories;
        public $idRealisateurs;
        public $description;

public function __construct($idFilm, $titre , $duree, $langue,$date,$montant,$photo,$idCategories,$idrealisateurs,$description)
  {
    $this->idFilm = $idFilm;
    $this->titre = $titre;
    $this->duree = $duree;
    $this->langue = $langue;
    $this->date = $date;
    $this->montant = $montant;
    $this->photo = $photo;
    $this->idCategories = $idCategories;
    $this->idrealisateurs = $idrealisateurs;
    $this->description = $description;
  }
}
?>