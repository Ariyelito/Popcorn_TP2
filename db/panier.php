<?php
 class Panier{
    public $idPanier;
    public $idMembre;
    public $films;
   

    public function __construct($idPanier,$idMembre,$films)
    {
        $this->idPanier = $idPanier;
        $this->idMembre = $idMembre;
        $this->films = $films;
        
    }
   
}
?>