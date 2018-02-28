<?php 
$dossier = '../Contenu/img/';
$fichier = basename($_FILES['portfolio']['name']);
$taille_maxi = 1000000; $taille = filesize($_FILES['portfolio']['tmp_name']); 
$extensions = array('.png', '.gif', '.jpg', '.jpeg', '.JPG'); 
$extension = strrchr($_FILES['portfolio']['name'], '.');

$categorie = $_POST['categorie'];
$titre = $_POST['titre'];
//Début des vérifications de sécurité... 
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau 
{ 
    $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc...'; 
} 
if($taille>$taille_maxi) { 
    $erreur = 'Le fichier est trop gros...'; 
    
} 
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload 
{ 
//    //On formate le nom du fichier ici... 
//    $fichier = strtr($fichier, 'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'); 
//    $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
    $fichier = uniqid().$extension;
    if(move_uploaded_file($_FILES['portfolio']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné... 
    { 
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=simple_blog;charset=utf8', 'root', 'root');
            
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
            
        }
        $chemin = './Contenu/img/';
        $lien = $chemin.$fichier;
        $req = $bdd->prepare('INSERT INTO portfolio(titre, categorie, lien, date_ajout) VALUES(?, ?, ?, NOW())');
        $req->execute (array($titre, $categorie, $lien));
        echo 'Upload effectué avec succès !';
      
    } else //Sinon (la fonction renvoie FALSE). 
    { 
        echo 'Echec de l\'upload !'; 
        
    } 
} else {
    echo $erreur; 
    
}







?>
