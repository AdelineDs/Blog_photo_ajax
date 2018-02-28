<?php $this->titre = "SimpleBlog";
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
    {
?>
<div class="vueModifCom">
    <div class="col-lg-offset-3 col-lg-6 col-xs-offset-1 col-xs-10 messageAdmin">
        <h2>Bonjour <?=  $_SESSION['pseudo'] ?> !</h2>
        <h3> Vous pouvez modérer ce commentaire ! </h3>
    </div>

    <?php
        }
    ?>
    <div class="col-lg-offset-3 col-lg-6 col-xs-offset-1 col-xs-10 newCom">
        <h2>Moderer le commentaire</h2>
            <?php
            if(isset($insert_erreur) AND $insert_erreur) :
                ?>
        <p><strong>Veuillez vérifier tout les champs, merci !</strong></p>
            <?php                            endif;?>
        <form action="index.php?action=modifierCom" method="post" class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6">
            <input type="hidden" value="<?= $commentaire['id']?>" name="id_com"/>
            <div class="form-group">
                <label for="auteur">Nom ou pseudo:</label> 
                <input name="auteur" id="auteur" type=text value="<?= $commentaire['auteur'];?>">
            </div>
            <div class="form-group">
                <label for="commentaire">Modifier le commentaire :</label> 
                <textarea name="commentaire" id="commentaire"><?= $commentaire['commentaire'];?></textarea>
            </div>
            <input type="submit" value="Enregistrer les modifications du commentaire">
        </form>
    </div>
</div>
