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
            $sql = "INSERT INTO films (titre,duree,langue,date,montant,photo,description)
                    VALUES(:titre,:duree,:langue,:date,:montant,:photo,:description)";
            // prepare the sql statement for execution
            $stmt = $this->db->prepare($sql);
            // bind all placeholders to the actual values
            $stmt->bindparam(':titre', $film->titre);
            $stmt->bindparam(':duree', $film->duree);
            $stmt->bindparam(':langue', $film->langue);
            $stmt->bindparam(':date', $film->date);
            $stmt->bindparam(':montant', $film->montant);
            $stmt->bindparam(':photo', $film->photo);
            $stmt->bindparam(':description', $film->description);

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

    public function addActor($nom){
        try{
         
            $sql = " INSERT INTO `actors` (`nom`) VALUES (\"$nom\")";
            $this->db->query($sql);
            return true;
        } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
    }
    public function actorExiste($nom){
        try{
            $sql = "SELECT * FROM actors WHERE nom=\"$nom\"";
            $result = $this->db->query($sql);
            $nb=  $result->rowCount();
      
            if($nb==0){
                return false;
            }else 
            {   
               return true;}
        }
            
        catch (PDOException $e) {
        echo $e->getMessage();
        return false;

    }
    }

    public function getActorId($nom){
        try {
            $sql = "SELECT * FROM `actors` where nom=\"$nom\"";
            $result = $this->db->query($sql)->fetch();
            return $result['idActor'];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function addActorsPourFilm($idFilm,$actors){
        
        try {
            
            $sql = "INSERT INTO `filmsactors` (`idFilm`, `idActor`) VALUES ";
           
           foreach($actors as $id){
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
    public function addRealisateur($nom){
        try{
         
            $sql = " INSERT INTO `realisateurs` (`nom`) VALUES (\"$nom\")";
            $this->db->query($sql);
            return true;
        } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }
    }
    public function realisateurExiste($nom){
        try{
            $sql = "SELECT * FROM realisateurs WHERE nom='$nom'";
            $result = $this->db->query($sql);
            $nb=  $result->rowCount();
      
            if($nb==0){
                return false;
            }else 
            {   
               return true;}
        }
            
        catch (PDOException $e) {
        echo $e->getMessage();
        return false;

    }
    }
    public function getRealisateurId($nom){
        try {
            $sql = "SELECT * FROM `realisateurs` where nom=\"$nom\"";
            $result = $this->db->query($sql)->fetch();
            return $result['idRealisateur'];
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
    public function getAllCategories(){
        try {
            $sql = "SELECT * FROM `categories`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function addCategorie($nom){
        try{
         
            $sql = " INSERT INTO `categories` (`nomCategorie`) VALUES (\"$nom\")";
            $this->db->query($sql);
            return true;
        } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }

    }
    public function getIdCategorie($nom){
        try {
            $sql = "SELECT * FROM `categories` where nomCategorie=\"$nom\"";
            $result = $this->db->query($sql)->fetch();
            return $result['idCategorie'];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function categorieExiste($nom){
        try{
            $sql = "SELECT * FROM categories WHERE nomCategorie='$nom'";
            $result = $this->db->query($sql);
            $nb=  $result->rowCount();
      
            if($nb==0){
                return false;
            }else 
            {   
               return true;}
        }
            
        catch (PDOException $e) {
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
         
        try{
         
                $sql = " INSERT INTO `paniers` (`idMembre`) VALUES ($panier->idMembre)";
                $this->db->query($sql);
                return true;
            } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
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

    public function getPanier($idPanier){
      
        try{
            $sql = "SELECT * FROM paniersfilms p WHERE p.idPanier = $idPanier";
            $result = $this->db->query($sql);         
            
            return $result;               
        } 
        catch (PDOException $e) {
        echo $e->getMessage();
        return false;

         }

    }

    public function addFilmDansLePanier($idPanier, $idFilm ){
 
      if(!$this->filmExisteDansPanier($idPanier, $idFilm)){
        try {
            
            $sql =  "INSERT INTO paniersfilms (idPanier,idFilm) VALUES($idPanier, $idFilm)";
            $this->db->query($sql);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
      }
       else return false;
     }

     public function retirerUnfilmDuPanier($idMembre,$idFilm){
        $idPanier = $this->getPanierParIdMembre($idMembre)->fetch()['idPanier'];

        try {
            $stmt = $this->db->prepare("DELETE FROM paniersfilms WHERE idPanier = $idPanier AND idFilm = $idFilm ");
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }


     }
     public function getPanierParIdMembre($idMembre){
        try {
            $sql = "SELECT * FROM `paniers` where idMembre=$idMembre";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
     }
     public function getPanierParIdPanier($idPanier){
        try {
            $sql = "SELECT * FROM `paniers` where idPanier=$idPanier";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function payer($idMembre ,$idPanier, $carts){

        try {
          
            $montant = $this->calculerMontant($idPanier,$carts);
                  
            $sql =  "INSERT INTO paiments (montant, date,idMembre) VALUES($montant, NOW(),$idMembre)";
            $this->db->query($sql);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function calculerMontant($idPanier,$carts){
    
        $objects = $this->getIdFilmsDansPanier($idPanier); //idFilms
        
         $montant = 0 ; 
   
        foreach($objects as $films){
            foreach($films as $idFilm){
                
                 $film = $this->getFilmById($idFilm)->fetch();
                 $nbJour = $carts[$film['idFilm']];

                 $prix = $this->getPrixPourUnFilm($nbJour);
                 $montant += $film['montant']  * $prix;
            }
           
        }

     return $montant;
    }

  private function ajouterFilmsPayments($idPaiment,$idPanier){
    // try {
         
    //     $sql =  "INSERT INTO paimentsFilms (idPaiment,idFilm) VALUES($idPaiment, $idFilm)";
    //     $this->db->query($sql);
    //     return true;
    // } catch (PDOException $e) {
    //     echo $e->getMessage();
    //     return false;
    // }
  }
    public function filmExisteDansPanier($idPanier,$idFilm){
        try {
            $sql = "SELECT * FROM `paniersfilms` where idFilm=$idFilm and idPanier=$idPanier ";
            $result = $this->db->query($sql);
            if($result->fetch())
            return true;
            else 
            return false;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getNombreFilmsDansPanier($idPanier){
        try {
            $sql = "SELECT count(*) FROM `paniersfilms` where idPanier=$idPanier";
            $result = $this->db->query($sql);
            $count = $result->fetchColumn();
            return $count;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    public function getIdFilmsDansPanier($idPanier){
        try {
            $stmt = $this->db->prepare("SELECT idFilm FROM `paniersfilms` where idPanier=$idPanier");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function louerFilms($idMembre,$idFilm,$nbJour){

    }
  
  
  

    public function viderPanier($idPanier){
        try {

            $stmt = $this->db->prepare( "DELETE FROM paniersfilms WHERE idPanier =$idPanier" );
            $stmt->execute();

            return true;
            
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
    }


    //pleur pas hakam j'ajoute qlq chose<

    public function getLesNbDeJourDeLocation(){
      
        try {
            $sql = "SELECT nbJour, montant FROM prix";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getPrixPourUnFilm($nbJour){
      
        try {
            $sql = "SELECT * FROM prix WHERE nbJour=$nbJour";
            $result = $this->db->query($sql)->fetch();
            return $result['montant'];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    
    


}