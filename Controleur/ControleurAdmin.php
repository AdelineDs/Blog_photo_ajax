<?php

require_once 'Vue/Vue.php';
require_once 'Modele/Admin.php';

class ControleurAdmin {

    private $pass_hache;
    private $pseudo;
    
    public function __construct() {
        $this->admin = new Admin();
  }
    
  //affiche la page d'administration
    public function vue() {
      session_start();
      $vue = new Vue("Admin");
      $vue->generer(array (null));
  }

  //connexion a l'administration
  public function gestionAdmin($pseudo, $pass){
      // Hachage du mot de passe
      $pass_hache = sha1($pass);
      $pseudo = strip_tags($pseudo);
      
      $admin = $this->admin->getAdmin($pseudo, $pass_hache);

      if (!$admin)
      {
          //on indique que tout les champs ne sont pas remplis ou une erreur
          $insert_erreur = true;
      }
      else
      {
         session_start();
         $_SESSION['id'] = $admin;
         $_SESSION['pseudo'] = $pseudo;
         $vue = new Vue("Admin");
         $vue->generer(array(null));
      }
  }
}


