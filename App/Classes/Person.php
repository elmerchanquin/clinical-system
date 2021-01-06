<?php
namespace Html\Table;
use mysqli;

/*
  * @desc this class will hold functions for people table
  * examples include age(), gender(), academic()
  * @author Alejandro Chanquín chanquin921@gmail.com
  * @required Connection.php
*/

class Person{

  // Properties
  public $code;
  public $name;
  public $countryId;
  public $mainPhone;
  public $address;
  public $country;
  public $department;
  public $municipality;
  public $gender;
  public $academic;
  public $born;
  public $maritalStatus;
  public $ocupation;
  public $medicalHistory;
  public $traumaticHistory;
  public $surgicalHistory;
  public $alergicHistory;
  public $gyneHistory; /*  Gynecological Obstetric History  */
  private $lastUpdate;

  private $servername = '127.0.0.1';
  private $username = 'root';
  private $password = '';
  private $database = 'clinkreh_esperanza';
  public $con;
  public function __construct()
  {
      $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
      if(mysqli_connect_error()) {
     trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
      }else{
    return $this->con;
      }
      } 
  // Methods
  /* public function __construct($code, $name, $countryId, $mainPhone, $address, $country, $department, $municipality,
  $gender, $academic, $born, $maritalStatus, $ocupation, $medicalHistory, $traumaticHistory, $surgicalHistory,
  $alergicHistory, $gyneHistory, $lastUpdate){
    $this->code = $code;
    $this->name = $name;
    $this->countryId = $countryId;
    $this->mainPhone = $mainPhone;
    $this->address = $address;
    $this->country = $country;
    $this->department = $department;
    $this->municipality = $municipality;
    $this->gender = $gender;
    $this->academic = $academic;
    $this->born = $born;
    $this->maritalStatus = $maritalStatus;
    $this->ocupation = $ocupation;
    $this->medicalHistory = $medicalHistory;
    $this->traumaticHistory = $traumaticHistory;
    $this->surgicalHistory = $surgicalHistory;
    $this->alergicHistory = $alergicHistory;
    $this->gyneHistory = $gyneHistory;
    $this->lastUpdate = $lastUpdate;

  }
  public function __destruct()
  {
    $this->code;
    $this->name;
    $this->countryId;
    $this->mainPhone;
    $this->address;
    $this->country;
    $this->department;
    $this->municipality;
    $this->gender;
    $this->academic;
    $this->born;
    $this->maritalStatus;
    $this->ocupation;
    $this->medicalHistory;
    $this->traumaticHistory;
    $this->surgicalHistory;
    $this->alergicHistory;
    $this->gyneHistory;
    $this->lastUpdate;

  } */
  public function createPerson (){

  }
  public function age (){
    /*
     * @desc Find the age of the person
     * @param string $born - born day of the person
     * @return string - with the age and a message if is his birth day
    */
    $born= $this->born;
    $birthdayMessage = '¡Feliz cumpleaños!';
    $bornArray = explode('-', $born);
    $bornYear = $bornArray['0'];
    $bornMonth = $bornArray['1'];
    $bornDay = $bornArray['2'];

      $actualYear = date('Y');
      $age = $actualYear - $bornYear;

      $actualMonth = date('M');
  
      $months =  $actualMonth - $bornMonth;
      if ($months < 0) {
          print($age-1);
      } elseif ($months > 0) {
          print($age);
      } elseif ($months == 0) {
          $bornDay;
          $actualDay = date('D');
          $days =  $actualDay - $bornDay;
          if ($days == 0) {
              print($birthdayMessage . $age);
          } elseif ($days < 0) {
              print($age-1);
          } elseif ($days > 0) {
              print($age);
          }
      }
  }
  public function genderGet(){
    /* 
     * @desc show the descriptive value of the normalize value of gender
     * @param int @gender - gender of the person in normalize version
     * @return string - with the gender
    */
    $gender = $this->gender;
    $womanMsg = 'Femenino';
    $manMsg = 'Masculino';
    if ($gender == '2' ) {
      return $womanMsg;
  } elseif ($gender == '1'){
      return $manMsg;
  }
  }
  public function academic(){
    $academic = $this->academic;
    if ($academic == 1 ) {
      return 'Ninguno';
   } elseif ($academic == 2 ) {
      return 'Primaria';
    } elseif ($academic == 3 ) {
      return 'Básicos';
    } elseif ($academic == 4 ) {
      return 'Diversificado';
    } elseif ($academic == 5 ) {
      return 'Universidad';
   } elseif ($academic == 6 ) {
      return 'Universidad Superior';
  }
  }
  public function maritalStatus(){
    /* 
     * @desc show the descriptive value of the normalize value of marital status
     * @param string $maritalStatus and int @gender - marital status and gender of the person in normalize version
     * @return string - with the marital status
    */
    $maritalStatus = $this->maritalStatus;
    $gender = $this->gender;
    if ($maritalStatus == 1 ) {
      if ($maritalStatus == 'f') {
          return 'Soltera';
      } else {
          return 'Soltero';
      }
  } elseif ($maritalStatus == 2) {
      if ($gender == 'f') {
          return 'Casada';
      } else {
          return 'Casado';
      }
  } elseif ($maritalStatus == 3) {
      if ($gender == 'f') {
          return 'Divorciada';
      } else {
          return 'Divorciado';
      }
  }
  }
  // Fetch customer records for show listing
  public function displayPerson()
  {
      $query = "SELECT * FROM persona";
      $result = $this->con->query($query);
  if ($result->num_rows > 0) {
      $data = array();
      while ($row = $result->fetch_assoc()) {
             $data[] = $row;
      }
     return $data;
      } else{
     echo "No found records";
      }
  }
}
