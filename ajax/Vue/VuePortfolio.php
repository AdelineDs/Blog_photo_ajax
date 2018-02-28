<?php foreach ($photos as $portfolio): ?>

    <div class="image gallery_product col-sm-3 col-xs-6 filter <?= strip_tags($portfolio['categorie']); ?>" id="<?= strip_tags($portfolio['id']); ?>">
        <a class="fancybox" rel="ligthbox" href="<?= strip_tags($portfolio['lien']); ?>">
        <img class="img-responsive" alt="" src="<?= strip_tags($portfolio['lien']); ?>" />
        <div class='img-info'>
            <h4><?= strip_tags($portfolio['titre']); ?></h4>
        </div>
        </a>
    </div>
<?php endforeach; ?>
<script src="./Contenu/script.js"></script>