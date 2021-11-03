<!-- Container cards -->

<div id="contCards" class="container">
    <h3 class="h3 mb-3 mt-2">Films sur demande</h3>
    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-3 row-cols-sm-2">

        <?php
       /* if(isset($_GET['idMembre'])) {
        $idMembre = $_GET['idMembre']; 
       }else {
           $idMembre = -1;
       }*/

        while($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>

        <div class="col mt-3">
            <div id="cardFilm" class="card" onclick="location.href='./server/pages/afficherFilm.php?idFilm=<?php echo $r['idFilm']?>'">
                <img src="<?php echo $r['photo'] ?>" class="card-img-top" alt="poster officiel du film">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $r['titre'] ?></h5>
                    <p class="card-text">
                    <?php echo $r['montant'] ?> </br>
                    <?php echo $r['date'] ?> </br>
                    <?php echo $r['langue'] ?>
                    <!-- add realisateur bd connection (use .card-subtitle) -->
                    </p>
                </div>
                <?php if($connected){ ?>
                    <div class="btn-group">
                        <!-- <a href="server/pages/afficherFilm.php?idFilm=<?php echo $r['idFilm']?>">Details</a> -->
                        <a class="btn bg-gradient btn-danger btnCard" href="./server/pages/ajouterPanier.php?idFilm=<?php echo $r['idFilm']?>">Ajouter au panier</a>
                    </div>
                <?php } ?>
                
                <input type="hidden" name="idFilm" value="<?php echo $r['idFilm']?>">                
               
            </div>
        </div>
        <?php } ?>

    </div>
</div>
<!-- fin cards container -->