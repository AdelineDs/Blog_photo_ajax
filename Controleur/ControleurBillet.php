<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';

class ControleurBillet {

  private $billet;
  private $commentaire;

  public function __construct() {
    $this->billet = new Billet();
    $this->commentaire = new Commentaire();
  }

  // Affiche les détails sur un billet
  public function billet($idBillet) {
    if (!isset($_SESSION['id']) AND !isset($_SESSION['pseudo'])){
    session_start();}
    $billet = $this->billet->getBillet($idBillet);
    $commentaires = $this->commentaire->getCommentaires($idBillet);
    $vue = new Vue("Billet");
    $vue->generer(array('billet' => $billet, 'commentaires' => $commentaires));
  }
  
    // Ajoute un commentaire à un billet
  public function commenter($idBillet, $auteur, $commentaire) {
    // Sauvegarde du commentaire
    $this->commentaire->ajouterCommentaire($idBillet, $auteur, $commentaire); 
    // Actualisation de l'affichage du billet
    $this->billet($idBillet);
  }
  
   // Affiche la liste de tous les billets du blog
  public function blog() {
    session_start();
    $blog = $this->billet->getBlog();
    $vue = new Vue("Blog");
    $vue->generer(array('blog' => $blog));
  } 
  
  //affiche le formulaire de rédaction/modification d'un billet
  public function vue($params = null) {
    session_start();
    if ($params == null) {
    $vue = new Vue("FormulaireBillet");
    $vue->generer(array (null));
    }    
    else {
    $billet = $this->billet->getBillet($params);
    $vue = new Vue("FormulaireBillet");
    $vue->generer(array('billet' => $billet));
    }
  }
  
  //ajoute un billet
  public function ecrireBillet($titre, $resume, $contenu, $auteur, $statut) {
  
     $this->billet->insertBillet($titre,$resume, $contenu, $auteur, $statut); 
     $this->blog();
}

//modifie un billet
  public function modifierBillet($idBillet, $titre, $resume, $contenu, $auteur, $statut) {
     session_start();
     $this->billet->modifBillet($idBillet, $titre, $resume, $contenu, $auteur, $statut);
     $this->billet($idBillet);
  
}

//affiche la page de confirmation de suppression d'un billet
  public function vueConfirmation($idBillet) {
    session_start();
    $billet = $this->billet->getBillet($idBillet);
    $vue = new Vue("Confirmation");
    $vue->generer(array ('billet' => $billet));
  }
  
  
  //confirme la suppression d'un billet
    public function confirmer($idBillet) {
     $this->commentaire->effacerCom($idBillet);    
    $this->billet->confirmer($idBillet); 
    $this->blog();
  }
  
  
  
}