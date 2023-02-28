<?php

class car {
        public $_team; 
        public $_model; 
        public $_color;  
        public $_max_speed;
        public $_energy;
        public $_cap;

        public function __construct($team,$model,$color,$max_speed, $energy,)
        {
            $this->setteam($team);
            $this->setmodel($model);
            $this->setcolor($color);
            $this->setmax_speed($max_speed);
            $this->setenergy($energy);
        }
        // --------------------- Setters ---------------------
        public function setteam($value){
            $this->_team = $value;}
        public function setmodel($value){
            $this->_model = $value;}        
        public function setcolor($value){
            $this->_color = $value;}        
        public function setmax_speed($value){
            $this->_max_speed = $value;}        
        public function setenergy($value){
            $this->_energy = $value;}        

        // --------------- Fin des setters -------------------------       
}

?>