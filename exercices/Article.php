<?php
// -------------- 1 ------------------
class Article {
    private $_Reference ;
    private $_Nom ;
    private $_PrixHT ;
    public static $_TauxTVA = 0.20;
// ------------------- 2 ------------------
    public function __construct ($Reference, $Nom, $PrixHT){
        $this->setReference($Reference);
        $this->setnom($Nom);
        $this->setPrixHT($PrixHT);
    }
    // ---------- Mise en place des setters 1 ------------
    public function setReference($value){
        $this->_Reference = $value;}
    public function setNom($value){
        $this->_Nom = $value;}
    public function setPrixHT($value){
        $this->_PrixHT = $value;}
    // public function setTauxTVA($value){
    //     $this->_TauxTVA = $value;}

    // ------------- Fin des setters -------------------
    // ------------- Mise en place des getters 1 ---------
    public function getReference(){
        return $this->_Reference;}
    public function getNom(){
        return $this->_Nom;}
    public function getPrixHT(){
        return $this->_PrixHT;}
    // public function getTauxTVA(){
    //     return $this->_TauxTVA;}
    // ------------ Mise en place fonctions classe -----
    // ---------------- 3 ( tx TVA = 0.20 !) -----------
    public function CalculerPrixTTC(){
        $this->getPrixHT();
        $PrixTTC = $this->_PrixHT += $this->_PrixHT*self::$_TauxTVA;
        return $PrixTTC ;
    }
    // --------------- 4 Méthode afficher article -------
    public function AfficherArticle(){
        echo $this->getReference(); 
        echo $this->getNom();
        echo $this->getPrixHT();
    }
    }
// --------------- Sortie de la classe ---------------
// --------------- Programme de test 5 ---------------
$chaussures = new Article(0626250, "Converse Bleues", 50);
$chaussettes = new Article(0612676, "Domyos sport", 8.90);
$short = new Article(7665849, "Adidas noir", 32);

$chaussures->AfficherArticle();
echo "<br><br><br>";
echo $chaussures->CalculerPrixTTC();
?>