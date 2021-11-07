<?php
$title = "dfs";

include 'includes/header.php';
require_once 'db/connexion.inc.php';
?>
<br><br>

<?php
$file = 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTUwODE3MDE0MV5BMl5BanBnXkFtZTgwNTk1MjI4MzE@._V1_SX300.jpg';
$file_headers = @get_headers($file);
if(!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
    $exists = false;
    echo"11";
}
else {
    $exists = true;
    echo"2";
}

echo $exists;
?>

<?php 
$root = "";
include 'includes/footer.php';
?>