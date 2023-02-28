<?php
require "car.php";
$pdo = new PDO ("mysql:host=localhost;dbname=rallye", 'root' ,'');

// --------------- Liste des requetes MySQL -----------------
/*
// CREATE INSERT into database : 

$pdo->prepare("INSERT INTO race (id_car, speed, cap, tyreshealth) VALUES (null, ?, ?, ?)")->execute($Rallye_Car_Valentin->_speed, $Rallye_Car_Valentin->_cap, $Rallye_Car_Valentin->_tyreshealth);

// UPDATE from database : 

$requete = $pdo->prepare("SELECT * FROM race WHERE id_car = ?");
$requete->execute([$_GET['id_car']]);
$car = $requete->fetch(PDO::FETCH_ASSOC);

// DELETE from database : 

$requete = $pdo->prepare('SELECT * FROM race WHERE id_car = ?');
$requete->execute([$_GET['id_car']]);
$car = $requete->fetch(PDO::FETCH_ASSOC);
$pdo->prepare('DELETE FROM race WHERE id_car = ?')->execute([$_GET['id_car']]);

// READ SELECT from datase : 
$requete = $pdo->query("SELECT * FROM race");
$cars = $requete->fetchAll(PDO::FETCH_ASSOC);
*/
?>

<?php
// ------------------ Début de la course, mise en place de la ligne de départ ----------------------
class rallye_car extends car 
{  
public $_pilot;
public $_speed = 0;
public $_tyreshealth = 100;
public $_cap = 0;
public function connection(){
    $pdo = new PDO ("mysql:host=localhost;dbname=rallye", 'root' ,'');
    return $pdo ;
}
public function __construct($pilot, $speed, $tyreshealth, $cap)
{
    $this->setpilot($pilot);
    $this->setspeed($speed);
    $this->settyreshealth($tyreshealth);
    $this->setcap($cap);
}
// ------------------ Les setters -------------------------
public function setspeed($value){
    $this->_speed = (int)$value;}
public function setpilot($value){
    $this->_pilot = $value;}
public function settyreshealth($value){
    $this->_tyreshealth = $value;}
public function setcap($value){
    $this->_cap = (int)$value;}
// public function setpilot($value){
//     $this->_pilote = $value;}
// ------------- Fin des setters ---------------
// --------------- Les getters ---------------
public function getspeed(){
    return $this->_speed;}
public function getcap(){
    return $this->_cap;}
// --------------- Fin des getters ----------------
public function start(){
    $this->connection();
    $this->_speed = $this->_speed + 20;
    $this->connection()->prepare("INSERT INTO race (id_car, speed, cap, tyreshealth) VALUES (null, ?, ?, ?)")->execute($this->_speed, $this->_cap, $this->_tyreshealth);
    return $this->_speed;}

public function accelerate($time){
    $new_speed = $this->_speed *(1+(0.10*$time));
    return $new_speed;}
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
        $this->_tyreshealth -= 10; 
    }
    if ($this->_speed > 120){
        $this->_tyreshealth -= 20; 
    }
    if ($this->_speed > 180){
        $this->_tyreshealth -= 40; 
    }
    return "You had turn, your cap is now ".$this->_cap." and your tires health is ".$this->_tyreshealth;}
public function turnLeft(){
    $this->_cap -= 10;
    if ($this->_speed > 60){
        $this->_tyreshealth -= 10; 
    }
    if ($this->_speed > 120){
        $this->_tyreshealth -= 20; 
    }
    if ($this->_speed > 180){
        $this->_tyreshealth -= 40; 
    }
    return "You had turn, your cap is now ".$this->_cap." and your tires health is ".$this->_tyreshealth;}

}
$Rallye_Car_Valentin = new rallye_car ("Valentin", 0, 100, 0);

// ------------------- début de la course ligne droite fond de 6 -----------
echo "5, 4, 3, 2, 1, Go !";
echo "<br> The race started ! <br><br>";
$Rallye_Car_Valentin->connection();

?>

<form action="#" method="get">
    <fieldset>What do you want to do ?
    <input type='radio' name="action" value='start'> Start </input>
    <input type='radio' name="action" value='accelerate'>Accelerate </input>
    <input type='radio' name="action" value='brake'>Brake </input>
    <input type='radio' name="action" value='right'>Turn Right </input>
    <input type='radio' name="action" value='left'> Turn Left  </input>
    <input type='radio' name="action" value='stop'> Stop Car </input>
    <input type='radio' name="action" value='print'> Print data car (+30sec) </input>
    <input type='submit' name="validate" value='Go !'> validate </input>
</fieldset>
</form> 

<p> You selected <?= $_GET["action"] ?></p>
<?php 
    if (!empty($_GET)){
        if ($_GET["action"] == 'start'){
            $Rallye_Car_Valentin->start();
            echo "Your car just started, your speed is ".$Rallye_Car_Valentin->_speed." MPH";
        }
        if ($_GET["action"] == 'accelerate'){
            $Rallye_Car_Valentin->accelerate(1);
            echo "You just increased your speed, now you're driving at ".$Rallye_Car_Valentin->_speed." MPH";
        }
        if ($_GET["action"] == 'brake'){
            $Rallye_Car_Valentin->brake(1);
            echo "You just decreased your speed, now you're driving at ".$Rallye_Car_Valentin->_speed." MPH";
        }
        if ($_GET["action"] == 'right'){
            $Rallye_Car_Valentin->turnRight();
            echo "You just turned right, you're now driving to cap n° ".$Rallye_Car_Valentin->_cap;
        }
        if ($_GET["action"] == 'left'){
            $Rallye_Car_Valentin->turnLeft();
            echo "You just turned Left, you're now driving to cap n° ".$Rallye_Car_Valentin->_cap;
        }
        if ($_GET["action"] == 'stop'){
            $Rallye_Car_Valentin->stop();
            echo "You just stopped you're car ";
        }
        if ($_GET["action"] == 'print'){
            echo "<pre";
            print_r($Rallye_Car_Valentin);
            echo "<pre>";
            echo "By checking your car, You lost 30 sec in the race";
        }
    }
?>
<!-- <img src='damier.png' width='30%'>"; -->