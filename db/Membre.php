<?php
 class Membre{
    public  $idMembre; 
    public $lastName;
    public $firstName;
    public $email;
    public $sexe;
    public $date;
    public $photo;
    public $password;
    public  $statue;
    public $role;
    

    public function __construct($idMembre,$lastName,$firstName,$email,$sexe,$date,$photo,$password,$statue,$role)
    {
        $this->idMembre = $idMembre;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->email = $email;
        $this->sexe = $sexe;
        $this->date = $date;
        $this->photo = $photo; 
        $this->password = $password;
        $this->statue = $statue;
        $this->role = $role;
    }
   
}
?>