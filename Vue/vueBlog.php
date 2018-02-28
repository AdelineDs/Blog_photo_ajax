<?php $this->titre = 'Mon blog photo'; ?> <!-- définition de l'élément spécifique $titre -->
<?php
if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
  {
?>
<div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10 messageAdmin">
    <h2>Bonjour <?=  $_SESSION['pseudo'] ?> !</h2>
    <h3> Vous pouvez gérer le billet de votre choix ! </h3>
</div>
<?php
  }
foreach ($blog as $billet): ?> 
        <div class="col-lg-offset-3 col-lg-6 col-xs-offset-1 col-xs-10 article">
            <h2><?= strip_tags($billet['titre']); ?></h2>
<!--            <h6><strong><?= strip_tags($billet['auteur']); ?> </strong>Le <em><?= $billet['date_publication_fr']; ?> </em></h6>-->
            <p class="resume">
                <?= nl2br($billet['resume']); ?>
            </p>
            <p class="suite">
                <span><a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">Lire L'article</a></span>
            </p>
            <?php
            if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
            {?>
            <div class="gestionAdmin">
                <p>
                    <strong>Gestion du billet :</strong>
                    <span><a href="<?= "index.php?action=modifierBillet&id=" . $billet['id'] ?>">Modifier</a></span> /
                    <span><a href="<?= "index.php?action=supprimerBillet&id=" . $billet['id'] ?>">Supprimer</a></span>
               </p> 
               <p>
                   <strong>Gestion des commentaires :</strong>
                   <span><a href="<?= "index.php?action=gererCom&id=" . $billet['id'] ?>">Gestion des commentaires</a></span>
               </p>
            </div>
            <?php
             }
            ?>
        </div>
<?php endforeach; ?>

