<?php

include( "ajax/Controleur/controleurPortfolioAjax.php" );

$portfolio = new ControleurPortfolioAjax();
switch ($_GET['request']){
    case 'loadImages' :
        if (isset($_GET["last"])){
            $last = (int)$_GET["last"];
            if($last > 0){
                    $portfolio->getNextImages($_GET["last"]);
                    
            }else{
                echo "Error";        
            }          
  
       }
       break;
    case 'getMaxImages' :
        $portfolio->getMaxImages();
        break;
    
       default:
           echo "rien";
           break;
}

?>

