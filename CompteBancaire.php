<?php
// Pour créer une classe vous devez prendre le meme nom que le dossier 
class CompteBancaire
{

    // Ajout des attributs ou des propriétés 
    // Un attribut permet de décrire la classe 
    // Le visibilité publique permet d'acceder aux attributs et methodes dans la classe et à l'exétrieur de la class.


    public $nCompteBancaire;

    public $dateOuverture;

    public $typeCompte;

    public $solde;

    // Ajout des méthodes / fonctions  : 

    // Les méthodes représentent ce que peut faire l'objet, les actions, ce sont des fonction 

    public function ouvrir($solde){
        // Sur le compte il faut un minimum de 100 € à l'ouverture
        if ($solde < 100){
            return "Le solde déposé à l'ouverture n'est pas suffisant. 100€ Requis.";
        } elseif (!is_int($solde)){
            return "le solde doit être numérique.";
        } else {
            $this->depot($solde);
            echo "Le compte a bien été ouvert. Le solde est de $solde";
        }}

    public function fermer($nCompteBancaire){
        // Pour fermer le compte le solde doit être à 0.
        // Si le solde est débiteur, faire un depot. 
        // Si le solde est créditeur, faire un retrait. 
        if ($this->solde > 0)
        {
            echo "Votre solde est créditeur, vous devez faire un retrait";

            $this->retrait($this->solde);

        } elseif ($this->solde < 0) 
        {
            echo "Votre solde est débiteur, vous devez faire un dépot";
            // Abs retourne la valeure absolue d'un nombre 
            $this->depot(abs($this->solde));
        } else {
            return "Le compte $nCompteBancaire a bien été fermé";
        }
    } 
    public function depot($depot){
        // On vérifire que c'est bien un nombre qui est tapé 
        // Le montant du dépot doit etre supérieur à 0
        if (!is_int($depot)){
            return "Le dépot doit être un nombre !";
        } else if ($depot < 0){
            return "Le montant du dépot doit être supérieur à 0.";
        } else {
            // Je fais mon dépot 
            $this->solde += $depot ; 
            // $this représente l'objet qui appelle la methode (si paul > paul, si alice > alice )
            echo "Votre dépot de $depot a bien été effectué.";
        }

    } 
    public function retrait($retrait){
        if(!(is_int($retrait))){
            return "le retrait doit être un nombre";
        } else if ($retrait < 0){
            return "Veuillez tape un nombre positif";
        } else  if ($retrait >$this->solde){
            return "Vous ne pouvez pas dépasser le montant du solde";
        } else {
            $this->solde -= $retrait ; 
            echo "Le retrait de $retrait a bien été effectué";
        }
    }
}

// L'instanciation est la création de l'objet 
$comptedejean = new CompteBancaire();

$comptedejean->nCompteBancaire = "A7652";
$comptedejean->dateOuverture = "05/03/2000";
$comptedejean->typeCompte = "Courant";
$comptedejean->ouvrir(500); 

$comptedepaul = new CompteBancaire();

$comptedepaul->nCompteBancaire = "B2564";
$comptedepaul->dateOuverture = "15/09/2020";
$comptedepaul->typeCompte = "Courant";
$comptedepaul->ouvrir(200); 

$comptedealice = new CompteBancaire();

$comptedealice->nCompteBancaire = "A5678";
$comptedealice->dateOuverture = "07/12/2001";
$comptedealice->typeCompte = "Courant";
$comptedealice->ouvrir(300); 




?>