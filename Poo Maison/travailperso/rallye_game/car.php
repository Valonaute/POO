<?php

class car {
        public $_pilot;
        public $_model; 
        public $_color;  
        public $_energy;
        public $_max_speed;

        public function __construct($pilot,$model,$color, $energy,$max_speed)
        {
            $this->setpilot($pilot);
            $this->setmodel($model);
            $this->setcolor($color);
            $this->setenergy($energy);
            $this->setmax_speed($max_speed);
        }
        // --------------------- Setters ---------------------
        public function setpilot($value){
            $this->_pilot = $value;}
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