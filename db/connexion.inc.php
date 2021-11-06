<?php 
   require_once 'Membre.php';
   require_once 'Film.php';
   require_once 'Panier.php';
    // connexion a la bd local

    $host = 'localhost';
    $db = 'e21bdfilms';
    //$db = 'try2';
    $user = 'root';
    $pass = '';
    $chartset = 'utf8mb4';

    // remote database connection
    // $host = 'remotemysql.com';
    // $db = 'HRqqazQPhS';
    // $user = 'HRqqazQPhS';
    // $pass = 'hmdyIg29vE';
    // $chartset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;chartset=$chartset";

    try {
        // initialize php data object
        $pdo =new PDO($dsn, $user, $pass);
        // show errors
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       // $connected =  '<h1 class="text-success">Hello Database</h1>';
    } catch(PDOException $e) {
        throw new PDOException($e -> getMessage());
       // echo '<h1 class="text-danger">No Database Found</h1>';

    }

    // initialize CRUD for database operation functions
    require_once 'crud.php';
    $crud = new crud($pdo);
    require_once 'crudMembre.php';
    $crudMembre = new crudMembre($pdo);

?>