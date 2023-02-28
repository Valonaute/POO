<?php
class CompteBancairePlus
{
    // La visibilité privée rend les attributs accessibles dans la classe uniquement
    private $_nCompteBancaire;
    private $_dateOuverture;
    private $_typeDecompte;
    private $_solde;

    // Le constructeur est la première méthode appellé lors de l'instanciation, la création de l'objet

    public function __construct($nCompteBancaire, $dateOuverture, $typeDecompte, $solde)
    {
        // La méthode __construct permet d'initialiser des données. 
        $this->setncomptebancaire($nCompteBancaire);
        $this->setDateOuverture($dateOuverture);
        $this->setTypeDeCompte($typeDecompte);
        $this->setSolde($solde);   
    }

    // Le getter sert à afficher la valeur d'un attribut privée
    public function getNcompteBancaire(){
        return $this->_nCompteBancaire;}
    // Le setter permet de modifier ou d'ajouter la valeur d'un attribut privée
    public function setncomptebancaire($value){
        $this->_nCompteBancaire = $value;}
    public function getDateOuverture(){
        return $this->_dateOuverture;}
    public function setDateOuverture($valeur){
        $this->_dateOuverture = $valeur;}
    public function getTypeDeCompte(){
       return $this->_typeDecompte;}
    public function setTypeDeCompte($valeur){
        $this->_typeDecompte = $valeur;}
    public function getSolde(){
        return $this->_solde;}
    public function setSolde($valeur){
        $this->_solde = $valeur;}
}

$comptedeValentin = new CompteBancairePlus("60269150753","01/01/2000","courant",650);

var_dump($comptedeValentin);


// $compteDeValentin = new CompteBancairePlus();
// $compteDeValentin->setncomptebancaire("60269150753");
// $compteDeValentin->setDateOuverture("01/01/2000");
// $compteDeValentin->setTypeDeCompte("Courant");
// $compteDeValentin->setSolde(650);

