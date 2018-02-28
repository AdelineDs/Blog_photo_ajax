<?php

require_once 'Vue/Vue.php';

function chargerClasse($class) {
      require $class. '.php';
  }
  
spl_autoload_register('chargerClasse');

class Routeur {

  private $ctrlAccueil;
  private $ctrlBillet;
  private $ctrlCommentaire;
  private $ctrlPortfolio;
  private $ctrlContact;
  private $ctrlAdmin;

  public function __construct() {
    $this->ctrlAccueil = new ControleurAccueil();
    $this->ctrlBillet = new ControleurBillet();
    $this->ctrlCommentaire = new ControleurCommentaire;
    $this->ctrlPortfolio = new ControleurPortfolio();
    $this->ctrlContact= new ControleurContact();
    $this->ctrlAdmin= new ControleurAdmin();
  }

  // Traite une requête entrante
  public function routerRequete() {
    try {
        if (isset($_GET['action'])) {
          if ($_GET['action'] == 'billet') {
            $idBillet = intval($this->getParametre($_GET, 'id'));
            if ($idBillet != 0) {
              $this->ctrlBillet->billet($idBillet);
            }
            else{
              throw new Exception("Identifiant de billet non valide");
            }
          }
          elseif ($_GET['action'] == 'commenter') {
              if(!empty($_POST['auteur']) && !empty($_POST['commentaire'])){
                  $auteur = $this->getParametre($_POST, 'auteur');
                  $commentaire = $this->getParametre($_POST, 'commentaire');
                  $idBillet = $this->getParametre($_POST, 'id_billet');
                  $this->ctrlBillet->commenter($idBillet, $auteur, $commentaire);                  
              }
              else{
                  throw new Exception("Tous les champs ne sont pas remplis !");
              }
          }
          elseif ($_GET['action'] == 'blog') {
              $this->ctrlBillet->blog();
           }
           elseif ($_GET['action'] == 'Portfolio') {
               $this->ctrlPortfolio->portfolio();
          }
           elseif ($_GET['action'] == 'Contact') {
               $this->ctrlContact->vue();
          }
           elseif ($_GET['action'] == 'Admin') {
               $this->ctrlAdmin->vue();
          }
          elseif ($_GET['action'] == 'formulaireBillet') {
               $this->ctrlBillet->vue();
          }
          elseif ($_GET['action'] == 'gestionAdmin') {
              if (isset($_POST['pseudo']) && $_POST['pass']) {
                if (!empty($_POST['pseudo']) && !empty($_POST['pass'])) {
                    $this->ctrlAdmin->gestionAdmin($_POST['pseudo'], $_POST['pass']);
                }
                else{
                  throw new Exception("Tous les champs ne sont pas remplis !");
                  
                }
              }
          }
          elseif ($_GET['action'] == 'deconnexion'){
              session_start();
              session_destroy();
              $this->ctrlAdmin->vue();
              }
              
          elseif ($_GET['action'] == 'ecrireBillet') {
              if(!empty($_POST['titre']) && !empty($_POST['resume']) && !empty($_POST['contenu']) && !empty($_POST['auteur'])){
                  $titre = $this->getParametre($_POST, 'titre');
                  $resume = $this->getParametre($_POST, 'resume');
                  $contenu = $this->getParametre($_POST, 'contenu');
                  $auteur = $this->getParametre($_POST, 'auteur');
                  $statut = $this->getParametre($_POST, 'statut');
                  $this->ctrlBillet->ecrireBillet($titre, $resume, $contenu, $auteur, $statut);                
              }
              else{
                  throw new Exception("Tous les champs ne sont pas remplis !");
              }
          }
          
          elseif ($_GET['action'] == 'updatePortfolio') {
              if(!empty($_POST['titre']) && !empty($_POST['categorie'])){
                  $titre = $this->getParametre($_POST, 'titre');
                  $categorie = $this->getParametre($_POST, 'categorie');
                  $dossier = './Contenu/img/';
                  $fichier = basename($_FILES['portfolio']['name']);
                  $taille_maxi = 2000000;
                  $taille = filesize($_FILES['portfolio']['tmp_name']); 
                  $extensions = array('.png', '.gif', '.jpg', '.jpeg', '.JPG'); 
                  $extension = strrchr($_FILES['portfolio']['name'], '.');
                  $chemin = './Contenu/img/';
                  //Début des vérifications de sécurité... 
                  if(in_array($extension, $extensions)) {
                      if($taille<$taille_maxi) {
                         $fichier = uniqid().$extension;
                         $lien = $chemin.$fichier;
                         if(move_uploaded_file($_FILES['portfolio']['tmp_name'], $dossier . $fichier)) { 
                             //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                             $this->ctrlPortfolio->updatePortfolio( $titre, $categorie, $lien);
                         } else {
                             throw new Exception("Echec de l\'upload !"); 
                         }
                      }else{
                          throw new Exception("Le fichier est trop volumineux");
                      }
                  } else {
                      //Si l'extension n'est pas dans le tableau 
                      throw new Exception("Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...");
                  }    
              }
              else{
                  throw new Exception("Tous les champs ne sont pas remplis !");
              }
          }
          
          elseif ($_GET['action'] == 'modifierBillet') {
              $idBillet = intval($this->getParametre($_GET, 'id'));
              if ($idBillet != 0) {
              $this->ctrlBillet->vue($idBillet);
            }
            
             else {
               throw new Exception("Identifiant de billet non valide");
             }
          }
          
          elseif ($_GET['action'] == 'enregistrerModif') {
              $idBillet = intval($this->getParametre($_GET, 'id'));
              if ($idBillet != 0) {
                  if(!empty($_POST['titre']) && !empty($_POST['contenu']) && !empty($_POST['contenu']) && !empty($_POST['auteur'])){
                      $titre = $this->getParametre($_POST, 'titre');
                      $resume = $this->getParametre($_POST, 'resume');
                      $contenu = $this->getParametre($_POST, 'contenu');
                      $auteur = $this->getParametre($_POST, 'auteur');
                      $statut = $this->getParametre($_POST, 'statut');
                      $this->ctrlBillet->modifierBillet($idBillet, $titre, $resume, $contenu, $auteur, $statut);                
                      
                  }
                  else{
                  throw new Exception("Tous les champs ne sont pas remplis !");
                  }
              }
              
              else {
              throw new Exception("Identifiant de billet non valide");
              }
          }
          
          elseif ($_GET['action'] == 'supprimerBillet') {
              $idBillet = intval($this->getParametre($_GET, 'id'));
              if ($idBillet != 0) {
              $this->ctrlBillet->vueConfirmation($idBillet);
            }
            
            else {
              throw new Exception("Identifiant de billet non valide");
            }
          }
          
          elseif ($_GET['action'] == 'confirmer') {
              $idBillet = $this->getParametre($_POST, 'id_billet');
              $this->ctrlBillet->confirmer($idBillet);
          }
          
          elseif ($_GET['action'] == 'gererCom') {
              $idBillet = intval($this->getParametre($_GET, 'id'));
              if ($idBillet != 0) {
                $this->ctrlBillet->billet($idBillet);
            }
            else{
              throw new Exception("Identifiant de billet non valide");
            }
          }
          
          elseif ($_GET['action'] == 'modererCom') {
              $idCom = intval($this->getParametre($_GET, 'id'));
              if ($idCom != 0) {
              $this->ctrlCommentaire->vue($idCom);
            }
            
            else {
              throw new Exception("Identifiant de commentaire non valide");
            }
          }
          
          elseif ($_GET['action'] == 'modifierCom') {
              if(!empty($_POST['auteur']) && !empty($_POST['commentaire'])){
                  $idCom = $this->getParametre($_POST, 'id_com');
                  $auteur = $this->getParametre($_POST, 'auteur');
                  $commentaire = $this->getParametre($_POST, 'commentaire');
                  $this->ctrlCommentaire->moderer($idCom, $auteur, $commentaire);
              }
              else{
                  throw new Exception("Tous les champs ne sont pas remplis !");
               }
               
         }
          
          elseif ($_GET['action'] == 'supprimerCom') {
              $idCom = intval($this->getParametre($_GET, 'id'));
              if ($idCom != 0) {
              $this->ctrlCommentaire->vueConfirmation($idCom);
            }
            
            else {
              throw new Exception("Identifiant de billet non valide");
            }
          }
          
          elseif ($_GET['action'] == 'confirmerCom') {
              $idCom = $this->getParametre($_POST, 'id_com');
              $this->ctrlCommentaire->confirmer($idCom);
          }
              
          else {
            throw new Exception("Action non valide");
        }
        }
        else {  // aucune action définie : affichage de l'accueil
          $this->ctrlAccueil->accueil();
        }
    }
    catch (Exception $e) {
      $this->erreur($e->getMessage());
    }
  }

  // Affiche une erreur
  private function erreur($msgErreur) {
    if (!isset($_SESSION['id']) AND !isset($_SESSION['pseudo'])){
    session_start();}
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }
  
    // Recherche un paramètre dans un tableau
  private function getParametre($tableau, $nom) {
    if (isset($tableau[$nom])) {
      return $tableau[$nom];
    }
    else
      throw new Exception("Paramètre '$nom' absent");
  }
}