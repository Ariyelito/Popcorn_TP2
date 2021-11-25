<!-- Container cards -->

<div id="contCards" class="container">
    <h3 class="h2 mt-5 text-center">Films sur demande</h3>
    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-3 row-cols-sm-2">

        <?php
       /* if(isset($_GET['idMembre'])) {
        $idMembre = $_GET['idMembre']; 
       }else {
           $idMembre = -1;
       }*
/*<!-- onclick="location.href='./server/pages/afficherFilm.php?idFilm=<?php echo $r['idFilm']?>'"  -->*/ 
        while($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>

        <div class="col mt-3">
            <div id="cardFilm" class="card"  >
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
                <?php //if($member){ }?>
                    <div class="btn-group">
                        <a class="btn bg-gradient btn-danger btnCard" 
                        <?php if($member){ ?> href="./server/pages/ajouterPanier.php?idFilm=<?php echo $r['idFilm']?>"
                        <?php } else { ?> href="#" data-bs-toggle="modal" data-bs-target="#LogInModal" <?php } ?> >Ajouter au panier</a>
                    </div>
                <input type="hidden" name="idFilm" value="<?php echo $r['idFilm']?>">                
               
            </div>
        </div>
        <?php } ?>

    </div>
</div>
<!-- fin cards container -->