/*Carrousel Derniers articles*/
$(document).ready(function(){

    var $carrousel = $('.carrousel'), // on cible le bloc du carrousel
        $articles = $('.derniersArticles'), // on cible les images contenues dans le carrousel
        indexArt = $articles.length - 1, // on définit l'index du dernier élément
        i = 0, // on initialise un compteur
        $currentArt = $articles.eq(i); // enfin, on cible l'image courante, qui possède l'index i (0 pour l'instant)

    $articles.css('display', 'none'); // on cache les images
    $currentArt.css('display', 'block'); // on affiche seulement l'image courante

/*
    $carrousel.append('<div class="col-xs-12 controls">\n\
        <span class="col-sm-offset-2 col-sm-2 col-xs-1 col-lg-offset-1 col-lg-2 prev"><<<</span> \n\
        <span class="col-sm-offset-4 col-sm-2 col-xs-offset-9 col-xs-1 col-lg-offset-6 col-lg-2 next">>>></span> \n\
        </div>');

    $('.next').click(function(){ // image suivante

        i++; // on incrémente le compteur

        if( i <= indexArt ){
            $articles.css('display', 'none'); // on cache les images
            $currentArt = $articles.eq(i); // on définit la nouvelle image
            $currentArt.fadeIn(1000);
            $currentArt.css('display', 'block'); // puis on l'affiche
        }
        else{
            i = indexArt;
        }

    });

    $('.prev').click(function(){ // image précédente

        i--; // on décrémente le compteur, puis on réalise la même chose que pour la fonction "suivante"

        if( i >= 0 ){
            $articles.css('display', 'none');
            $currentArt = $articles.eq(i);
            $currentArt.fadeIn(1000);
            $currentArt.css('display', 'block');
        }
        else{
            i = 0;
        }

    });
    
    */

    function slideImg(){
        setTimeout(function(){ // on utilise une fonction anonyme

            if(i < indexArt){ // si le compteur est inférieur au dernier index
                i++; // on l'incrémente
            }
            else{ // sinon, on le remet à 0 (première image)
                i = 0;
            }

            $articles.css('display', 'none');

            $currentArt = $articles.eq(i);
            $currentArt.fadeIn(1000);
            $currentArt.css('display', 'block');

            slideImg(); // on oublie pas de relancer la fonction à la fin

        }, 5000); // on définit l'intervalle à 7000 millisecondes (7s)
    }

    slideImg(); // enfin, on lance la fonction une première fois


});

/*gallery */
$(document).ready(function () {

    $(".filter-button").click(function () {
        var value = $(this).attr('data-filter');

        if (value == "all") {
            $('.filter').show('1000');
        } else {
            $(".filter").not('.' + value).hide('3000');
            $('.filter').filter('.' + value).show('3000');

        }

        if ($(".filter-button").removeClass("active")) {
            $(this).removeClass("active");
        }
        $(this).addClass("active");
    });
});
/*	end gallery */

$(document).ready(function () {
    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
});

//BACK TO TOP SCROLL

$(document).ready(function(){

$(function(){
 
    $(document).on( 'scroll', function(){
 
    	if ($(window).scrollTop() > 100) {
			$('.scroll-top-wrapper').addClass('show');
		} else {
			$('.scroll-top-wrapper').removeClass('show');
		}
	});
 
	$('.scroll-top-wrapper').on('click', scrollToTop);
});
 
function scrollToTop() {
	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = $('body');
	offset = element.offset();
	offsetTop = offset.top;
	$('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}

});


