<?php
/*
  * @desc this class will hold functions for people table
  * examples include age(), gender(), academic()
  * @author Alejandro Chanquín chanquin921@gmail.com
  * @required ...
*/
class Person {
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


  // Methods
  function __construct($code, $name, $countryId, $mainPhone, $address, $country, $department, $municipality,
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
  function __destruct()
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

  }
  function age ($born){
    /*
     * @desc Find the age of the person
     * @param string $born - born day of the person
     * @return string - with the age and a message if is his birth day
    */
    $birthdayMessage = '¡Feliz cumpleaños!';
    $this->born = explode('-', $born);
    $bornYear = $this->born['0'];
    $bornMonth = $this->born['1'];
    $bornDay = $this->born['2'];

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
  function genderGet($gender){
    /* 
     * @desc show the descriptive value of the normalize value of gender
     * @param int @gender - gender of the person in normalize version
     * @return string - with the gender
    */
    $womanMsg = 'Femenino';
    $manMsg = 'Masculino';
    if ($gender == '2' ) {
      return $womanMsg;
  } elseif ($gender == '1'){
      return $manMsg;
  }
  }
  function academic($academic){
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
  function maritalStatus($maritalStatus, $gender){
    /* 
     * @desc show the descriptive value of the normalize value of marital status
     * @param string $maritalStatus and int @gender - marital status and gender of the person in normalize version
     * @return string - with the marital status
    */
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
}
?>