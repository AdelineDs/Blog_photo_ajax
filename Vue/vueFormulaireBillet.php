<?php $this->titre = "Mon blog photo";
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
    {
?>
<div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10 messageAdmin">
    <h2>Bonjour <?php echo  $_SESSION['pseudo'] ?> !</h2>
    <h3> Vous pouvez <?php if(isset($billet['id']) AND $billet['id']) {?> modifier votre billet.<?php } else {;?> rédiger un nouveau billet !<?php }?></h3>
</div>
<?php
    }
?>
<div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10 updatePortfolio">
    <h2>Mettre à jour le portfolio :</h2>
    <form method="post" action="index.php?action=updatePortfolio" enctype="multipart/form-data" class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6">
        <div class="form-group">
            <label for="portfolio">Choisir une photo (max. 1 Mo) :</label>
            <input type="hidden" name="MAX-FILE-SIZE" value="1048576"/>
            <input type="file" name="portfolio" class="parcourir" required=""/>
        </div>
        <div class="form-group">
            <label for="titre">Titre de la photo (max. 50 caractères) :</label>
            <input type="text" name="titre" placeholder="Titre de la photo" id="titre" required=""/>
        </div>
        <div class="form-group">
            <label for="titre">Choisir une catégorie pour la photo :</label>
            <select name="categorie">
                <option value="nature">Nature</option>
                <option value="paysages">Paysages</option>
                <option value="autres">Autres</option>
            </select>
        </div>
        <input type="submit" name="submit" value="Envoyer" class="envoi"/>
    </form>
</div>
<div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10 newArticle">
    <h2>Ecrire un nouveau billet</h2>
        <?php
        if(isset($insert_erreur) AND $insert_erreur) :
            ?>
    <p><strong>Veuillez renseigner tout les champs, merci !</strong></p>
        <?php                            endif;?>
    <form <?php if(isset($billet['id']) AND $billet['id']) {?> action="index.php?action=enregistrerModif&amp;id=<?= $billet['id'] ?>"<?php } else {;?> action="index.php?action=ecrireBillet" <?php }?>method="post" class="col-xs-offset-1 col-xs-10 col-sm-offset-2 col-sm-8">
        <div class="form-group">
            <label for="titre">Titre : 
                    <input name="titre" id="titre" type=text <?php if(isset($billet['id']) AND $billet['id']) :?> value="<?= strip_tags($billet['titre']);?>"<?php endif;?> required="">
            </label>
        </div>
        <div class="form-group">
            <label for="resume">Résumé : 
                <textarea name="resume" id="resume" required="" value="<?php if(isset($billet['id']) AND $billet['id']) :?><?= nl2br(strip_tags($billet['resume']));?><?php endif;?>" maxlength="250" placeholder="250 caratères max !"><?php if(isset($billet['id']) AND $billet['id']) :?><?= strip_tags($billet['resume']);?><?php endif;?></textarea>
            </label>
        </div>
        <div class="form-group">
            <label for="contenu">Contenu : 
                <textarea name="contenu" id="contenu"><?php if(isset($billet['id']) AND $billet['id']) :?><?= $billet['contenu'];?><?php endif;?></textarea>
            </label>
        </div>
        <div class="form-group">
            <label for="auteur">Auteur: 
                <input name="auteur" id="auteur" type=text <?php if(isset($billet['id']) AND $billet['id']) :?> value="<?= strip_tags($billet['auteur']);?>"<?php endif;?> required=""/>
            </label>
        </div>
        <div class="form-group">
            <label for="statut">Statut du billet :</label>
                <select name="statut" id="statut">
                    <option value="publie">Publié</option>
                    <option value="brouillon">Brouillon</option>
                </select>
        </div>
        <input type="submit" value="Enregistrer le billet" class="envoi"/>
    </form>
</div>

<!-- TinyMCE -->
<script src="./Contenu/tinymce/js/tinymce/tinymce.min.js"></script>
<script src="./Contenu/tinymce/js/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript">
  tinyMCE.init({
    selector : "#contenu", 
    height: 500,
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste imagetools wordcount"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    // imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
    ]
  });
</script>





