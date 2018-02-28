<?php $this->titre = 'Mon blog photo'; ?> 
        <section class="portfolio" id="portfolio">
                <div class="col-xs-12 headerGalerie">
                <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="gallery-title">Portfolio</h1>
                </div>

                <div align="center">
                    <button class="filter-button" data-filter="all">Toutes</button>
                    <button class="filter-button" data-filter="nature">Nature</button>
                    <button class="filter-button" data-filter="paysages">Paysages</button>
                    <button class="filter-button" data-filter="autres">Autres</button>
                </div>
            </div>
                <br/>
                <?php
                foreach ($photos as $portfolio): ?> 
                
                <div class="image gallery_product col-sm-3 col-xs-6 filter <?= strip_tags($portfolio['categorie']); ?>" id="<?= strip_tags($portfolio['id']); ?>"> 
                    <a class="fancybox" rel="ligthbox" href="<?= strip_tags($portfolio['lien']); ?>">
                        <img class="img-responsive" alt="" src="<?= strip_tags($portfolio['lien']); ?>" />
                        <div class='img-info'>
                            <h4><?= strip_tags($portfolio['titre']); ?></h4>
                        </div>
                </a>
                </div>
                <?php endforeach; ?>
        </section>
<div class="col-xs-12">
    <form action="" method="post">
        <input type="button" name="bouton" id="bouton" value="Voir plus de photos !" />
    </form>
</div>

