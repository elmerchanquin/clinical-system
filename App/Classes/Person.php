<?php
require_once 'Connection.php';
/*
  * @desc this class will hold functions for people table
  * examples include age(), gender(), academic()
  * @author Alejandro Chanquín chanquin921@gmail.com
  * @required Connection.php
*/

class Person extends Connection
{

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

    public function createPerson()
    {
    }
    public function age()
    {
        /*
     * @desc Find the age of the person
     * @param string $born - born day of the person
     * @return string - with the age and a message if is his birth day
    */
        $born = $this->born;
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
            print($age - 1);
        } elseif ($months > 0) {
            print($age);
        } elseif ($months == 0) {
            $bornDay;
            $actualDay = date('D');
            $days =  $actualDay - $bornDay;
            if ($days == 0) {
                print($birthdayMessage . $age);
            } elseif ($days < 0) {
                print($age - 1);
            } elseif ($days > 0) {
                print($age);
            }
        }
    }
    public function genderGet()
    {
        /* 
     * @desc show the descriptive value of the normalize value of gender
     * @param int @gender - gender of the person in normalize version
     * @return string - with the gender
    */
        $gender = $this->gender;
        $womanMsg = 'Femenino';
        $manMsg = 'Masculino';
        if ($gender == '2') {
            return $womanMsg;
        } elseif ($gender == '1') {
            return $manMsg;
        }
    }
    public function academic()
    {
        $academic = $this->academic;
        if ($academic == 1) {
            return 'Ninguno';
        } elseif ($academic == 2) {
            return 'Primaria';
        } elseif ($academic == 3) {
            return 'Básicos';
        } elseif ($academic == 4) {
            return 'Diversificado';
        } elseif ($academic == 5) {
            return 'Universidad';
        } elseif ($academic == 6) {
            return 'Universidad Superior';
        }
    }
    public function maritalStatus()
    {
        /* 
     * @desc show the descriptive value of the normalize value of marital status
     * @param string $maritalStatus and int @gender - marital status and gender of the person in normalize version
     * @return string - with the marital status
    */
        $maritalStatus = $this->maritalStatus;
        $gender = $this->gender;
        if ($maritalStatus == 1) {
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
        $query = "SELECT * FROM person";
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No found records";
        }
    }
    public function updatePerson($postData)
    {
        $code = $this->con->$_POST['code'];
        $name = $this->con->$_POST['name'];
        $countryId = $this->con->$_POST['countryId'];
        $phone = $this->con->$_POST['phone'];
        $address = $this->con->$_POST['address'];
        $country = $this->con->$_POST['country'];
        $department = $this->con->$_POST['department'];
        $municipality = $this->con->$_POST['municipality'];
        $gender = $this->con->$_POST['gender'];
        $academic = $this->con->$_POST['academic'];
        $born = $this->con->$_POST['born'];
        $maritalStatus = $this->con->$_POST['maritalStatus'];
        $ocupation = $this->con->$_POST['ocupation'];
        $medicalHistory = $this->con->$_POST['medicalHistory'];
        $traumaticHistory = $this->con->$_POST['traumaticHistory'];
        $surgicalHistory = $this->con->$_POST['surgicalHistory'];
        $alergicHistory = $this->con->$_POST['alergicHistory'];
        $gyneHistory = $this->con->$_POST['gyneHistory'];
        if (!empty($code) && !empty($postData)) {
            $query = "UPDATE person SET codigo = '$code', name = '$name', $countryId = 'countryId', phone = '$phone',
      address = '$address', country = '$country', department = '$department', municipality = '$municipality',
      gender = '$gender', academic = '$academic', born = '$born', maritalStatus = '$maritalStatus',
      ocupation = '$ocupation', lastUpdate = TIMESTAMP, medicalHistory = '$medicalHistory',
      traumaticHistory = '$traumaticHistory', surgicalHistory = '$surgicalHistory', 
      alergicHistory = '$alergicHistory', gyneHistory = '$gyneHistory' WHERE codigo = '$code'";
            $sql = $this->con->query($query);
            if ($sql == true) {
                header("Location:/#$code");
            } else {
                echo "Registration updated failed try again!";
            }
        }
    }
    public function edad($anoNacimiento, $mesNacimiento, $diaN)
    {

        $anoNacimiento;
        $anoActual = 2020;
        $edad = $anoActual - $anoNacimiento;
        /* MESES */

        $mesNacimiento;
        $mesActual = 2;

        $meses =  $mesActual - $mesNacimiento;
        if ($meses < 0) {
            print($edad - 1);
        } elseif ($meses > 0) {
            print($edad);
        } elseif ($meses == 0) {
            $diaN;
            $diaA = 22;
            $dias =  $diaA - $diaN;
            if ($dias == 0) {
                print('Felíz Cumpleaños, ya tienes ' . $edad);
            } elseif ($dias < 0) {
                print($edad - 1);
            } elseif ($dias > 0) {
                print($edad);
            }
        }
    }
    public function displaySiglePerson($code)
    {
        $this->code = $code;
        /* Database is using "codigo" as person code */
        $query = "SELECT * FROM person WHERE codigo=$this->code";
        $sql = $this->con->query($query);
        $result = mysqli_fetch_array($sql);
        return $result;
    }
}
