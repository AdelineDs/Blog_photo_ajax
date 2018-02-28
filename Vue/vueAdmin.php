<?php $this->titre = 'Mon blog photo'; ?> 
<div class="vueAdmin">
            <?php
            if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
            { ?>
            <div class="col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10 accueilConnectAdmin"> 
                <h1>Bonjour <?=  $_SESSION['pseudo'] ?> ! Que voulez vous faire ?</h1>         
                <br/>
                <a href="index.php?action=formulaireBillet">Ecrire un nouveau billet</a>
                <br/>
                <a href="index.php?action=blog">Gestion des billets existants</a>
                <br/>
                <a href="index.php?action=blog">Gestion des commentaires</a>
                <br/>
                <form action="index.php?action=deconnexion" method="post">
                    <input type="submit" value="Déconnexion" name="Deconnexion" class="disconnectAdmin"/>
                </form>
            </div>
            <?php
             }
             else {
             ?>
            
            <div class="col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10 accueilAdmin">
                <h1>Administration</h1>
                    <?php
                    if(isset($insert_erreur) AND $insert_erreur) :
                    ?>
                <p><strong style="color: red">Veuillez vérifier tout les champs, merci !</strong></p>
                <?php                            endif;?>
                <p>Pour vous connecter à votre espace d'administration, veuillez compléter ce formulaire :</p>
                <form action="index.php?action=gestionAdmin" method="post">
                    <p><label for="pseudo">Entrez votre pseudo : <input name="pseudo" id="pseudo" type=text></label></p>
                    <p><label for="pass">Entrez votre mot de passe : <input name="pass" id="pass" type=password></label></p>
                    <input type="submit" value="Se connecter" class="connectAdmin">
                </form>
            </div>
            <?php 
             }
             ?>
</div>