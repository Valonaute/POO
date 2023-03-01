<?php
// Une classe abstraite est une classe qui ne peux être instancé.
// Une classe abstraite sert uniquement de modèle à une autre classe
Abstract class Animal {
    public function manger(){
        return "je mange";
    }
    public function dormir(){
        return "Je dors";
    }
}

class Chien extends Animal {
    // On redéfinit completement la méthode manger 
    public function manger (){
        return "Je mange des croquettes pour chien";
    }

}
class Chat extends Animal {
    // Le mot clé parent fait référence à la classe mère, on va récupérer le contenu de la méthode manger de la classe mère.
    public function manger(){
        $manger = parent::manger();
        return $manger." de la patée et des croquettes pour chat";
    }
}

$Tobbie = new Chien();
echo $Tobbie->manger();
echo "<br>";
$Tigrou = new Chat();
echo $Tigrou->manger();