<?php
$title = "dfs";
$root="";
include 'includes/header.php';
require_once 'db/connexion.inc.php';
?>
<br><br>




<form action="server/pages/test.php"  method="POST">

<label for="formFile" class="form-label">Poster pour le film (image) :</label>
    <input class="form-control" type="file" id="photo" name="photo">
<button type="sumbit">dasd</button>
</form>





<div 
<?php 
$root = "";
include 'includes/footer.php';
?>