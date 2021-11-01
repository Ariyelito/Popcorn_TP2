<?php
class crud
{
    // private database object
    private $db;

    //constructor to initialize private variable to the database connection
    public function __construct($conn)
    {
        $this->db = $conn;
    }

    // function to insert a new record into the attendee database
    public function getMovies() {
        try {
            $sql = "SELECT * FROM `films` f ";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function addFilm(Film $film ){
        try {
            // define sql statement to be executed
            $sql = "INSERT INTO films (titre,duree,langue,date,montant,photo)
                    VALUES(:titre,:duree,:langue,:date,:montant,:photo)";
            // prepare the sql statement for execution
            $stmt = $this->db->prepare($sql);
            // bind all placeholders to the actual values
            $stmt->bindparam(':titre', $film->titre);
            $stmt->bindparam(':duree', $film->duree);
            $stmt->bindparam(':langue', $film->langue);
            $stmt->bindparam(':date', $film->date);
            $stmt->bindparam(':montant', $film->montant);
            $stmt->bindparam(':photo', $film->photo);

            // execute statement
            $stmt->execute();
          
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function addRealisateursPourFilm($idFilm, $realisateurs){
      


        try {
            
            $sql = "INSERT INTO `filmsrealisateurs` (`idFilm`, `idRealisateur`) VALUES ";
           
           foreach($realisateurs as $id){
            $sql.="($idFilm,$id),";
           }
           $sql = substr($sql, 0, -1);

            $stmt = $this->db->prepare($sql);
            // execute statement
            $stmt->execute();
          
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function addCategoriesPourFilm($idFilm, $categories){
      


        try {
            
            $sql = "INSERT INTO `filmcategorie` (`idFilm`, `idCategorie`) VALUES ";
           
           foreach($categories as $id){
            $sql.="($idFilm,$id),";
           }
           $sql = substr($sql, 0, -1);
            $stmt = $this->db->prepare($sql);
            // execute statement
            $stmt->execute();
          
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getFilmById($id){
        try {
            $sql = "SELECT * FROM `films` where idFilm=$id";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
  

    public function addPanier(panier $panier ){
       
     
        if($this->panierExiste($panier->idMembre)){
           $this->addFilmDansLePanier($panier);
            return true;
        }else{
          
        try{
         
                $sql = " INSERT INTO `paniers` (`idMembre`) VALUES ($panier->idMembre)";
                $result = $this->db->query($sql);
              //  $this->addFilmDansLePanier($panier);
                return true;
            } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    }
   
    public function panierExiste($idMembre){
      
       
        try{
            $sql = "SELECT * FROM paniers p WHERE p.idMembre = $idMembre";
            $result = $this->db->query($sql);
            $nb=  $result->rowCount();
      
            if($nb>0){
             
                return true;
               
            }else 
            {
            
                return false;}
            
        }
            
        catch (PDOException $e) {
        echo $e->getMessage();
        return false;

    }
    }

    public function getPanier($idMembre){
        $idMembre = getIdPAnier($idMembre);
        try{
            $sql = "SELECT * FROM paniersfilms p WHERE p.idMembre = $idMembre";
            $result = $this->db->query($sql);         
            
            return $result;               
        }
            
        catch (PDOException $e) {
        echo $e->getMessage();
        return false;

         }

    }

    public function getIdPAnier($idMembre){
        try{
            $sql = "SELECT idPanier FROM paniers p WHERE p.idMembre = $idMembre";
            $result = $this->db->query($sql);         
            
            return $result;               
        }
            
        catch (PDOException $e) {
        echo $e->getMessage();
        return false;

         }
    }


    public function addFilmDansLePanier(Panier $panier ){
     
      /*
        try {
          echo $panier->films;
             $sql =  "INSERT INTO paniersfilms (idPanier,idFilm) VALUES($panier->idPanier, $panier->films)";
             $result = $this->db->query($sql);
           
             return true;
         } catch (PDOException $e) {
             echo $e->getMessage();
             return false;
         }*/
     }



}