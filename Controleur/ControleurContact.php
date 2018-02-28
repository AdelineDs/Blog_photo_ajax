<?php

require_once 'Vue/Vue.php';

class ControleurContact {

  // Affiche la page de contact
  public function vue() {
    if (!isset($_SESSION['id']) AND !isset($_SESSION['pseudo'])){
    session_start();}
    $vue = new Vue("Contact");
    $vue->generer(array (null));
  }

}