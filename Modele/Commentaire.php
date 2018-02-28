<?php

require_once 'Modele/Modele.php';

class Commentaire extends Modele {
    
// Renvoie la liste des commentaires associés à un billet
public function getCommentaires($idBillet) {
    $sql = 'SELECT id, id_billet, auteur, commentaire, DATE_FORMAT'
          . '(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM '
          . 'commentaires WHERE id_billet = ? ORDER BY date_commentaire DESC';
    $commentaires= $this->executerRequete($sql, array($idBillet));
    return $commentaires;
}

// fonction qui realise l'insertion du nouveau commentaire dans la base de données
public function ajouterCommentaire($idBillet, $auteur, $commentaire){
    $sql = 'INSERT INTO commentaires(id_billet, auteur, commentaire, date_commentaire) VALUES(?, ?, ?, ?)';
    $date = date(DATE_W3C);
    $this->executerRequete($sql, array($idBillet, $auteur, $commentaire, $date));
}

// renvoie un commentaire 
public function getCommentaire($idCom) {
    $sql = 'SELECT id, id_billet, auteur, commentaire, DATE_FORMAT'
          . '(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM '
          . 'commentaires WHERE id= ? ';
    $commentaire= $this->executerRequete($sql, array($idCom));
    if ($commentaire->rowCount() == 1) {
        return $commentaire->fetch();
    }  // Accès à la première ligne de résultat
    else {
        throw new Exception("Aucun commentaire ne correspond à l'identifiant '$idCom'");
    }
}

//realise la modification de la base de données
public function modifierCommentaire($idCom, $auteur, $commentaire){
    $sql = 'UPDATE commentaires SET auteur= ?, commentaire=?  WHERE id=?';
    $this->executerRequete($sql, array($auteur, $commentaire, $idCom));
}

//realise la suppression d'un commentaire dans la base de données
public function confirmer($idCom) {
    $sql = 'DELETE FROM commentaires WHERE id= ?';
    $this->executerRequete($sql, array($idCom));
}
    
//realise la suppression de tout les commentaires associés à un billet dans la base de données
public function effacerCom($idBillet) {
    $sql = 'DELETE FROM commentaires WHERE id_billet= ?';
    $this->executerRequete($sql, array($idBillet));
}
}