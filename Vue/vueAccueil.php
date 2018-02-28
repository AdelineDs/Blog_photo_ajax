<?php $this->titre = 'Mon blog photo'; ?> <!-- définition de l'élément spécifique $titre -->
<div data-am-fadeshow="next-prev-navigation quick-nav prev-next-nav slide-counter autoplay ken-burns">

		<!-- Radio -->
		<input type="radio" name="css-fadeshow" id="slide-1" />
		<input type="radio" name="css-fadeshow" id="slide-2" />
		<input type="radio" name="css-fadeshow" id="slide-3" />

		<!-- Slides -->
		<div class="fs-slides">
			<div class="fs-slide" style="background-image: url(./Contenu/img/01.jpg);">
				<!-- Add content to images (sample) -->
				<div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-family: sans-serif; text-align: center; text-shadow: 0 0 20px rgba(0,0,0,0.5);">
					<h1 style="margin-top: 0; margin-bottom: 0.8vw; font-size: 5vw; font-weight: bold;">Bienvenue</h1>
					<p style="font-size: 2vw; font-weight: 100; margin-top: 0;">sur mon blog photos !</p>
				</div>
			</div>
			<div class="fs-slide" style="background-image: url(./Contenu/img/DSC_08101.jpg);"></div>
			<div class="fs-slide" style="background-image: url(./Contenu/img/DSC_0331.jpg);"></div>
		</div>

		<!-- Quick Navigation -->
		<div class="fs-quick-nav">
			<label class="fs-quick-btn" for="slide-1"></label>
			<label class="fs-quick-btn" for="slide-2"></label>
			<label class="fs-quick-btn" for="slide-3"></label>
		</div>
		
		<!-- Prev Navigation -->
		<div class="fs-prev-nav">
			<label class="fs-prev-btn" for="slide-1"></label>
			<label class="fs-prev-btn" for="slide-2"></label>
			<label class="fs-prev-btn" for="slide-3"></label>
		</div>
		
		<!-- Next Navigation -->
		<div class="fs-next-nav">
			<label class="fs-next-btn" for="slide-1"></label>
			<label class="fs-next-btn" for="slide-2"></label>
			<label class="fs-next-btn" for="slide-3"></label>
		</div>

	</div>
        <div class="col-xs-12 articles">
            <div class="">
                <div class="col-xs-12">
                    <h2>Mes derniers articles</h2>
                </div>
            </div>
            <div class="">
                <div class="col-xs-offset-5 col-xs-2">
                    <hr/>
                </div>
            </div>
            <div class="col-xs-12 listeArticles">
                <div class="col-xs-12 clearfix carrousel">
                    <?php foreach ($billets as $billet): ?> <!-- génère les balises HTML article associées aux billets du blog.
                    Le flux HTML créé est mis en tampon -->
                    <div class="col-xs-offset-2 col-xs-8 col-sm-offset-3 col-sm-6 derniersArticles">
                                <h2><?= strip_tags($billet['titre']); ?></h2>
                                <p>
                                    <?= nl2br(strip_tags($billet['resume'])); ?>
                                </p>
                                <p><a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">Lire la suite ...</a></p>
                            </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

