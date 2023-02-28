<?php
// Création de voitures 
    
class car {
        public $_team; 
        public $_model; 
        public $_color;  
        public $_max_speed;
        public $_energy;
        public $_cap;

        public function __construct($team,$model,$color,$max_speed, $energy, $cap,)
        {
            $this->setteam($team);
            $this->setmodel($model);
            $this->setcolor($color);
            $this->setmax_speed($max_speed);
            $this->setenergy($energy);
            $this->setcap($cap);
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
        public function setcap($value){
            $this->_cap = $value;}

        // --------------- Fin des setters -------------------------       
}
$Lauriane_dream_car = new car ("Peugeot", "308", "Green", 165, "hybrid", 0); 
$Valentin_dream_car = new car ("Ferrari", "California", "Red", 250, "Gasolina", 0);

echo"<pre>";
print_r($Valentin_dream_car);
print_r($Lauriane_dream_car);
echo "<pre>";

// ------------------ Début de la course, ligne de départ ----------------------
class rallye_car extends car 
{  
public $_engine = false;
public $_speed = 0;
public $_tireshealth = 100;
// ------------------ Les setters -------------------------
public function setengine($value){
    $this->_engine = $value;}
public function setspeed($value){
    $this->_speed = $value;}
public function settireshealth($value){
    $this->_tireshealth = $value;}

// ------------- Fin des setters ---------------
// --------------- Les getters ---------------
public function getspeed(){
    return $this->_speed;}
public function getcap(){
    return $this->_cap;}
// --------------- Fin des getters ----------------
public function start(){
    $this->_engine = true ; 
    $this->_speed += 20;
    return "The engine is now on. You're current speed is ".$this->_speed;}
public function accelerate($time){
    $this->_speed += 0.1*$time*$this->_speed;
    if ($this->_speed > $this->_max_speed){
        $this->_speed = $this->_max_speed;
        return "You've your max speed now ! Your actual speed is ".$this->_speed;
    }
    return "You have gained 10% of your past speed. Now your speed is".$this->_speed;}
public function brake($time){
    $this->_speed -= 0.1*$time*$this->_speed;
    return "You have lost 10% of your past speed. Now your speed is".$this->_speed;}
public function stop(){
    if ($this->_speed < 20){
    $this->_engine = false ; 
    $this->_speed = 0;
    return "The engine is now off. You're speed is now ".$this->_speed;
    } else {
        return "You're speed is too high to stop now, please break and then try to stop again";
    }}
public function turnRight(){
    $this->_cap += 10;
    if ($this->_speed > 60){
        $this->_tireshealth -= 10; 
    }
    if ($this->_speed > 120){
        $this->_tireshealth -= 20; 
    }
    if ($this->_speed > 180){
        $this->_tireshealth -= 40; 
    }
    return "You had turn, your cap is now ".$this->_cap." and your tires health is ".$this->_tireshealth;}
public function turnLeft(){
    $this->_cap -= 10;
    if ($this->_speed > 60){
        $this->_tireshealth -= 10; 
    }
    if ($this->_speed > 120){
        $this->_tireshealth -= 20; 
    }
    if ($this->_speed > 180){
        $this->_tireshealth -= 40; 
    }
    return "You had turn, your cap is now ".$this->_cap." and your tires health is ".$this->_tireshealth;}

}
$Rallye_Car_Valentin = new rallye_car ("Toyota", "Corolla", "Purple", 190, "hybrid", 0);
$Rallye_Car_Lauriane = new rallye_car ("Peugeot", "308", "Green", 175, "gasoil", 0);

// ------------------- début de la course ligne droite fond de 6 -----------

echo "<br> La course est lancée ! <br>";

$Rallye_Car_Valentin->start();

$Rallye_Car_Valentin->accelerate(5);

echo $Rallye_Car_Valentin->getspeed();
echo "<br>";
$Rallye_Car_Valentin->accelerate(10);
echo $Rallye_Car_Valentin->getspeed();
echo "<br>";
$Rallye_Car_Valentin->accelerate(30);
echo $Rallye_Car_Valentin->getspeed();
echo "<br>";

// --------------- virage a gauche dans les dunes danger 2, cap 270° -------------
?>