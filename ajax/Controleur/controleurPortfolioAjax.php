<?php
/**
 * Created by PhpStorm.
 * User: aurelienantonio
 * Date: 20/02/2018
 * Time: 20:50
 */
include( "Modele/Portfolio.php");


class ControleurPortfolioAjax {

    private $portfolio;

    public function __construct() {
            $this->portfolio = new Portfolio();
    }

    public function portfolio() {

                $photos = $this->portfolio->getPortfolio();
                require_once 'ajax/Vue/VuePortfolio.php';

    }
    public function getNextImages($last) {

            $photos = $this->portfolio->getPortfolioImagesFrom($last);
            require_once 'ajax/Vue/VuePortfolio.php';

    }
    
    public function getMaxImages() {
        
         $photos = $this->portfolio->getNumberOfImages();
         foreach ($photos as $photo){
             echo $photo['numFotos'];
         }
  
    }

}
