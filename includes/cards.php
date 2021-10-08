<!-- Container cards -->

<div id="contCards" class="container">
    <h3 class="h3 mb-3 mt-2">Films sur demande</h3>
    <div class="row row-cols-1 row-cols-lg-4 row-cols-md-3 row-cols-sm-2">

        <?php
        while($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>

        <div class="col mt-3">
            <div class="card">
                <img src="<?php echo $r['photo'] ?>" class="card-img-top" alt="poster officiel du film">
                <div class="card-body description">
                    <h5 class="card-title"><?php echo $r['titre'] ?></h5>
                    <p class="card-text">
                    <?php echo $r['montant'] ?> </br>
                    <?php echo $r['date'] ?> </br>
                    <?php echo $r['langue'] ?>
                    </p>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>
</div>
<!-- fin cards container -->