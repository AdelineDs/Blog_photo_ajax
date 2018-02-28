<?php

require_once 'Modele/Modele.php';

class Portfolio extends Modele {
    
    //Méthode qui recupere les photos
        public function getPortfolio()
    {
        $sql = 'SELECT id, titre, categorie, lien FROM portfolio ORDER BY date_ajout DESC LIMIT 12 OFFSET 0';
        $listephotos = $this->executerRequete($sql);
        return $listephotos;
    }
    
    public function getPortfolioImagesFrom($id)
    {
        $sql = 'SELECT id, titre, categorie, lien FROM portfolio ORDER BY date_ajout DESC LIMIT 12 OFFSET '. $id;
        $listephotos = $this->executerRequete($sql);
        return $listephotos;
                
    }
    
    public function insertPortfolio($titre, $categorie, $lien){
        $sql = 'INSERT INTO portfolio(titre, categorie, lien, date_ajout) VALUES(?, ?, ?, NOW())';
        $this->executerRequete($sql, array($titre, $categorie, $lien));
    }
    
    public function getNumberOfImages() {
        $sql = 'SELECT COUNT(id) AS numFotos FROM portfolio ';
        $listephotos = $this->executerRequete($sql);
        return $listephotos;
        
    }
}
