<?php

require_once 'Modele/Portfolio.php';
require_once 'Vue/Vue.php';

class ControleurPortfolio{
    
    private $photos;
    
    public function __construct() {
    $this->portfolio = new Portfolio();
  }
  
     // Affiche le portfolio
  public function portfolio() {
    session_start();
    $photos = $this->portfolio->getPortfolio();
    $vue = new Vue("Portfolio");
    $vue->generer(array('photos' => $photos));
  }
  
  public function updatePortfolio($titre, $categorie, $lien) {
      $this->portfolio->insertPortfolio($titre, $categorie, $lien);
      $this->portfolio();
//    $dossier = './Contenu/img/';
//    $fichier = basename($_FILES['portfolio']['name']);
//    $taille_maxi = 2000000;
//    $taille = filesize($_FILES['portfolio']['tmp_name']); 
//    $extensions = array('.png', '.gif', '.jpg', '.jpeg', '.JPG'); 
//    $extension = strrchr($_FILES['portfolio']['name'], '.');
//    $chemin = './Contenu/img/';
//
//    //Début des vérifications de sécurité... 
//    if(!in_array($extension, $extensions)) { 
//         //Si l'extension n'est pas dans le tableau 
//        $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...'; 
//    }
//    
//    if($taille>$taille_maxi) { 
//        $erreur = 'Le fichier est trop gros...'; 
//    }
//    
//    if(!isset($erreur)) {
//        //S'il n'y a pas d'erreur, on upload 
//        $fichier = uniqid().$extension;
//         $lien = $chemin.$fichier;
//        if(move_uploaded_file($_FILES['portfolio']['tmp_name'], $dossier . $fichier)) { 
//            //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
//            $this->portfolio->insertPortfolio($titre, $categorie, $lien);
//            $this->portfolio();
//        } 
//        //Sinon (la fonction renvoie FALSE). 
//        else { 
//            echo 'Echec de l\'upload !'; 
//            }
//        
//        } else {
//        echo $erreur; 
//        }
//      
  }
  
  
}
