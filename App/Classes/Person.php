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

    public function createPerson($postData)
    {
        $countryId = $postData['id'];
        $firstName = $postData['firstName'];
        $secondName = $postData['secondName'];
        $firstLastname = $postData['firstLastname'];
        $secondLastname = $postData['secondLastname'];
        $phone = $postData['phone'];
        $country = $postData['country'];
        $address = $postData['address'];
        $gender = $postData['gender'];
        $maritalStatus = $postData['maritalStatus'];
        $ocupation = $postData['ocupation'];
        $bornDate = $postData['bornDate'];
        $academic = $postData['academic'];
        $query = "INSERT INTO person (name, secondName, firstLastName, secondLastName, countryId, phone, address, country, gender, academic, born, maritalStatus, ocupation, lastUpdate) 
        VALUES ('$firstName', '$secondName', '$firstLastname', '$secondLastname', '$countryId', '$phone', '$address', '$country', '$gender', '$academic', '$bornDate', '$maritalStatus', '$ocupation', CURRENT_TIMESTAMP)";
        $sql = $this->con->query($query);
        if ($sql == true) {
            return true;
        } else {
            echo "Creation failed try again! " . $this->con->error;
        }
    }
    public function age($born)
    {
        /*
     * @desc Find the age of the person
     * @param string $born - born day of the person
     * @return string - with the age and a message if is his birth day
    */
        $this->born = $born;
        $birthdayMessage = '¡Feliz cumpleaños!';
        $bornArray = explode('-', $born);
        $bornYear = (int)$bornArray['0'];
        $bornMonth = (int)$bornArray['1'];
        $bornDay = (int)$bornArray['2'];

        $actualYear = (int)date('Y');
        $age = $actualYear - $bornYear;

        $actualMonth = (int)date('M');

        $months =  $actualMonth - $bornMonth;
        if ($months < 0) {
            return ($age - 1);
        } elseif ($months > 0) {
            return ($age);
        } elseif ($months == 0) {
            $bornDay;
            $actualDay = (int)date('D');
            $days =  $actualDay - $bornDay;
            if ($days == 0) {
                return ($birthdayMessage . $age);
            } elseif ($days < 0) {
                return ($age - 1);
            } elseif ($days > 0) {
                return ($age);
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
    public function academic($academic)
    {
        $this->academic = $academic;
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
    public function maritalStatus($maritalStatus)
    {
        /* 
     * @desc show the descriptive value of the normalize value of marital status
     * @param string $maritalStatus and int @gender - marital status and gender of the person in normalize version
     * @return string - with the marital status
    */
        $this->maritalStatus = $maritalStatus;
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
        $code = $postData['code'];
        $name = $postData['name'];
        $countryId = $postData['countryId'];
        $phone = $postData['phone'];
        $address = $postData['address'];
        $country = $postData['country'];
        $department = $postData['department'];
        $municipality = $postData['municipality'];
        $gender = $postData['gender'];
        $academic = $postData['academic'];
        $born = $postData['born'];
        $maritalStatus = $postData['maritalStatus'];
        $ocupation = $postData['ocupation'];
        $medicalHistory = $postData['medicalHistory'];
        $traumaticHistory = $postData['traumaticHistory'];
        $surgicalHistory = $postData['surgicalHistory'];
        $alergicHistory = $postData['alergicHistory'];
        $gyneHistory = $postData['gyneHistory'];

        $query = "UPDATE person SET codigo = '$code', name = '$name', countryId = '$countryId', phone = '$phone',
      address = '$address', country = '$country', department = '$department', municipality = '$municipality',
      gender = '$gender', academic = '$academic', born = '$born', maritalStatus = '$maritalStatus',
      ocupation = '$ocupation', lastUpdate = CURRENT_TIMESTAMP, medicalHistory = '$medicalHistory',
      traumaticHistory = '$traumaticHistory', surgicalHistory = '$surgicalHistory', 
      alergicHistory = '$alergicHistory', gyneHistory = '$gyneHistory' WHERE codigo = '$code'";
        $sql = $this->con->query($query);
        if ($sql == true) {
            session_start();
            header("Location:/view-person/");
            return $_SESSION['viewPerson'] = $code;
        } else {
            echo "Registration updated failed try again! " . $this->con->error;
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
