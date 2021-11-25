<?php
 
class crudMembre
{
    // private database object
    private $db;

    //constructor to initialize private variable to the database connection
    public function __construct($conn)
    {
        $this->db = $conn;
    }
    public function ajouterMembre(Membre $membre)
    {
        try {
            // define sql statement to be executed
            $sql = "INSERT INTO membres (nom,prenom,email,sexe,date,photo)
                    VALUES(:lastName,:firstName,:email,:sexe,:date,:photo)";
            // prepare the sql statement for execution
            $stmt = $this->db->prepare($sql);
            // bind all placeholders to the actual values
            $stmt->bindparam(':lastName', $membre->lastName);
            $stmt->bindparam(':firstName', $membre->firstName);
            $stmt->bindparam(':email', $membre->email);
            $stmt->bindparam(':sexe', $membre->sexe);
            $stmt->bindparam(':date', $membre->date);
            $stmt->bindparam(':photo', $membre->photo);

            // execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function ajouterConnexion(Membre $membre){
        try {
            
            // define sql statement to be executed
            $sql = "INSERT INTO connexion (email,password,statue,role,idMembre)
                    VALUES(:email,:password,:statue,:role,:idMembre)";
            // prepare the sql statement for execution
            $stmt = $this->db->prepare($sql);
            // bind all placeholders to the actual values
            $stmt->bindparam(':email', $membre->email);
            $stmt->bindparam(':password', $membre->password);
            $stmt->bindparam(':statue', $membre->statue);
            $stmt->bindparam(':role', $membre->role);
            $stmt->bindparam(':idMembre', $membre->idMembre);
          

            // execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getMembreByEmail($email) {
        try {
            $sql = "SELECT * FROM `connexion` WHERE email = '$email'";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getAllMembres(){
        try {
            $sql = "SELECT * FROM `membres`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getMembreConnexion($email) {
        try {
            $sql = "SELECT * FROM `connexion` WHERE email = '$email'";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function deleteMembre($id){
        try {

            $stmt = $this->db->prepare( "DELETE FROM membres WHERE idMembre =:id" );
            $stmt->bindParam(':id', $id);
            $stmt->execute();
    
            
            // if(  $stmt->rowCount() ) {
            //     return $id;
            // }
            return $stmt;
            
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
    }
}
