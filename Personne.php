<?php

class Personne {

    public $nom;
    public $prenom;
    public $sexe;

    public function manger(){
        return 'je mange';
    }
    public function dormir(){
        return 'je dors';
    }
}

$personne = new Personne();
$personne->nom = "Ndaw";
$personne->prenom = "Laurent";
$personne->sexe = "M";

// Le mot clé extends permet d'utiliser l'héritage 
class Employe extends Personne {
    public $metier ;
    public $nom; 
    public $prenom;
    public $sexe;
    public $salaire; 
}

$employe = new Employe();
$employe->nom = "Térieur";
$employe->prenom = "Alain";
$employe->sexe = "M";
$employe->salaire = 1300;
$employe->metier = "comptable";

echo "<br>";echo "<br>";
var_dump($employe);
echo "<br>";echo "<br>";

// la class client est la classe fille (sous-classe), elle hérite des attributs de la mère (SUPER - CLASSE)
class Client extends Personne {
    public $numero_client; 
    public $email; 
    public $motdepasse; 
    public $anniversaire; 
}

$client = new Client();
$client->nom = "Térieur"; 
$client->prenom = "Alex";
$client->sexe = "F";
$client->numero_client = 4444719;
$client->email = "alexterieur@gmail.com";
$client->motdepasse = "654654564564";
$client->anniversaire = "01/04/1980";
echo $client->manger();
echo $client->dormir();

var_dump($client);

echo "<pre>";
print_r($client);
print_r($employe);
echo "</pre>";


?>