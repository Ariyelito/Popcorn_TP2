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
   
    public function chargerFilmsHTML(){
        $r =  $this->getMovies()->fetchAll();      
        $rep="";
       foreach($r as $row){
           $rep.= ' <div class="col mt-3">
           <div class="card">';
           $rep.= "<img src=\"".$row['photo']."\"class=\"card-img-top\" alt=\"...\">
           <div class=\"card-body description\">";
           $rep.=' <h5 class="card-title">'.$row['titre'].'</h5>';
           $rep.='<p class="card-text">'.$row['montant'].' </p>
           </div>
       </div>
   </div>'; 
       }
       return $rep;
    }

}
