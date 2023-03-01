<?php
require "Habitation.php";
require "traits/traitHabitation.php";
class Caravane extends Habitation {
    use traitHabitation;
}

$raphael = new Caravane;
$raphael->deplacer();
echo $raphael->deplacer();
?>