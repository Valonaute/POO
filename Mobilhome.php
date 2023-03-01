<?php
require "Habitation.php";
require "traits/traitHabitation.php";
class Mobilehome extends Habitation {
    use traitHabitation;
}

$campingalamer = new Mobilehome;
echo $campingalamer->deplacer();

?>