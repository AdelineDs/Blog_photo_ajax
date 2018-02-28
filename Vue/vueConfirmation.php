<?php
$this->titre = "Mon blog photo";
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
    {
?>
<div class="vueConfirmation">
    <div class="col-lg-offset-3 col-lg-6 col-xs-offset-1 col-xs-10 messageAdmin">
        <h2>Etes-vous sûre <?=  $_SESSION['pseudo'] ?> de vouloir supprimer ce <?php if(isset($billet['id']) AND $billet['id']) {?> billet<?php } elseif(isset($commentaire['id']) AND $commentaire['id']) {;?> commentaire<?php }?> ?</h2>
            <?php
            if(isset($insert_erreur) AND $insert_erreur) :
                ?>
        <p><strong>Une erreur c'est produite !</strong></p>
            <?php                            endif;?>
    </div>

    <div class="col-lg-offset-3 col-lg-6 col-xs-offset-1 col-xs-10 articleBlog">
        <?php if(isset($billet['id']) AND $billet['id']) {?>
        <h2><?= strip_tags($billet['titre']); ?></h2>
        <p>
            <?= $billet['contenu']; ?>
        </p>
        <h5> Le <em><?= $billet['date_publication_fr']; ?></em>  Par <em><?= strip_tags($billet['auteur']); ?></em></h5>
        <?php } elseif(isset($commentaire['id']) AND $commentaire['id']) {;?>
        <h4> Le <em><?= $commentaire['date_commentaire_fr']; ?></em>  Par <em><?= strip_tags($commentaire['auteur']); ?></em></h4>
        <p>
            <?= nl2br(strip_tags($commentaire['commentaire'])); ?>
        </p>
        <?php } ?>
    </div>
        <div class="col-lg-offset-3 col-lg-6 col-xs-offset-1 col-xs-10 messageAdmin">
            <?php if(isset($billet['id']) AND $billet['id']) {?>
            <form action="index.php?action=confirmer" method="post">
                <input type="hidden" value="<?= $billet['id']?>" name="id_billet"/>
                <input  class="confirmer" type="submit" value="OUI">
            </form>
             <?php } elseif(isset($commentaire['id']) AND $commentaire['id']) {;?>
            <form action="index.php?action=confirmerCom" method="post">
                <input type="hidden" value="<?= $commentaire['id']?>" name="id_com"/>
                <input  class="confirmer" type="submit" value="OUI">
            </form>
        <?php } ?>
            <form action="index.php?action=blog" method="post">
                <input  class="confirmer" type="submit" value="NON">
            </form>
        </div>
</div>
 <?php
    }
?>
