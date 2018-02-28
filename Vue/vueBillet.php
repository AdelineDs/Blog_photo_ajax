<?php $this->titre = "Mon blog photo - " . strip_tags($billet['titre']); ?>
<div class="row">
    <div class="col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10 articleBlog">
            <div>
                <h2><?= strip_tags($billet['titre']); ?></h2>
                <p class="contenuArticle">
                    <?= $billet['contenu']; ?>
                </p>
                <h5> Le <em><?= $billet['date_publication_fr']; ?></em>  Par <strong><?= strip_tags($billet['auteur']); ?></strong></h5>
            </div>
        </div>
        <div class="col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10 newCom">
            <div>
                <h1>Ecrire un commentaire</h1>
                    <?php
                    if(isset($insert_erreur) AND $insert_erreur) :
                    ?>
                <p><strong>Veuillez renseigner tout les champs, merci !</strong></p>
                    <?php                            endif;?>
                <form action="index.php?action=commenter" method="post" class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6">
                    <input type="hidden" value="<?= $billet['id']?>" name="id_billet"/>
                    <div class="form-group">
                    <label for="auteur">Nom ou pseudo: </label>
                    <input name="auteur" id="auteur" type=text class="form-control" required="">
                    </div>
                    <div class="form-group">
                    <label for="commentaire">Votre commentaire : </label>
                    <textarea name="commentaire" id="commentaire" class="form-control" rows="5" required=""></textarea>
                    <p class="help-block">Vous pouvez agrandir la zone de texte</p>
                    </div>
                    <input type="submit" value="Enregistrer le commentaire">
                </form>
            </div>
        </div>
        <div class="col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10  listeCom">
            <?php
            foreach($commentaires as $com): ?>
            <div class="commentaire">
                <div>
                    <h3><?= strip_tags($com['auteur']); ?></h3>
                    <h5> Le <em><?= $com['date_commentaire_fr']; ?></em></h5>
                    <p>
                        <?= nl2br(strip_tags($com['commentaire'])); ?>
                    </p>
                    <?php
                    if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
                    {?>
                    <p class="gestionCom">
                        <span><a href="<?= "index.php?action=modererCom&id=" . $com['id'] ?>">Modérer le commentaire</a></span> /
                        <span><a href="<?= "index.php?action=supprimerCom&id=" . $com['id'] ?>">Supprimer le commentaire</a></span>
                    </p> 
                    <?php
                           }
                     ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
