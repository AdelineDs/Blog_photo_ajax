<?php

require_once 'Modele/Modele.php';

class Admin extends Modele {
    
    //recupere le compte admin
    public function getAdmin($pseudo, $pass) {
        $sql = 'SELECT id FROM admin WHERE pseudo= ? AND pass= ? ';
        $admin = $this->executerRequete($sql, array($pseudo, $pass));
        return $admin->fetch();   
    }
    
}