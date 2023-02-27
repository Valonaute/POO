<?php
class CompteBancairePlus {

// Cette fois tout est privé, accessible dans la class uniquement ; 

    private $_nCompteBancaire;
    private $_dateOuverture;
    private $_typeCompte;
    private $_solde;

    // Si variable en privée, besoin de Getter et setter pour afficher et acceder à la valeure

    // le getter permet d'afficher 
    public function getNcompteBancaire(){
        return $this->_nCompteBancaire;
    }
    // Le setter permet de modifier ou d'ajouter la valeure d'un atrribut privé 
    public function setNcompteBancaire($value){
        $this->_nCompteBancaire = $value;
    }
}

?>