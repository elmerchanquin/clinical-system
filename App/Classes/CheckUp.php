<?php
class CheckUp {
    /*
     * @desc this class will hold functions for people table
     * examples include age(), gender(), academic()
     * @author Alejandro Chanquín chanquin921@gmail.com
     * @required Connection.php
    */
    // Properties
    private $code;
    private $personCode;
    public $pacientName;
    public $date;
    public $pacientSD; /* Pacient Subjective Data */
    public $medicSD; /* Medic Subjective Data */
    public $weight;
    public $height;
    public $cardiacFreq; /* Cardiac Frequency */
    public $respiratoryRate;
    public $temperature;
    public $bloodPress; /* Blood Pressure */
    public $pulse;
    public $OxSat; /* Oxigen Saturation */
    public $newData;
    public $diagnosis;
    public $treatment;
    public $comments;
    public $observations;

    // Insert customer data into customer table
		public function insertData($post)
		{
			$personCode = $this->con->$_POST['personCode'];
			$date = $this->con->$_POST['date'];
			$pacientSD = $this->con->$_POST['pacientSD'];
            $medicSD = $this->con->$_POST['medicSD'];
            $weight = $this->con->$_POST['weight'];
            $height = $this->con->$_POST['height'];
            $cardiacFreq = $this->con->$_POST['cardiacFreq'];
            $respiratoryRate = $this->con->$_POST['respiratoryRate'];
            $temperature = $this->con->$_POST['temperature'];
            $bloodPress = $this->con->$_POST['bloodPress'];
            $pulse = $this->con->$_POST['pulse'];
            $OxSat = $this->con->$_POST['OxSat'];
            $newData = $this->con->$_POST['newData'];
            $diagnosis = $this->con->$_POST['diagnosis'];
            $treatment = $this->con->$_POST['treatment'];
            $comments = $this->con->$_POST['comments'];
            $observations = $this->con->$_POST['observations'];
			$query="INSERT INTO CheckUp(personCode, date, pacientSD, medicSD, weight, height,
            cardiacFreq, respiratoryRate, temperature, bloodPress, pulse, OxSat,
            newData, diagnosis, treatment, comments, observations) 
            VALUES('$personCode','$date','$pacientSD','$medicSD', '$weight', '$height', '$cardiacFreq',
            '$respiratoryRate', '$temperature', '$bloodPress', '$pulse', '$OxSat', '$newData', '$diagnosis',
            '$treatment', '$comments', '$observations')";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:/");
			}else{
			    echo "Registration failed try again!";
			}
		}

		// Fetch customer records for show listing
		public function displayData()
		{
		    $query = "SELECT * FROM CheckUp";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
		    $data = array();
		    while ($row = $result->fetch_assoc()) {
		           $data[] = $row;
		    }
			 return $data;
		    }else{
			 echo "No found records";
		    }
		}

		// Fetch single data for edit from customer table
		public function displyaRecordById($code)
		{
		    $query = "SELECT * FROM CheckUp WHERE code = '$code'";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "Record not found";
		    }
		}

		// Update customer data into customer table
		public function updateRecord($postData)
		{
		    $name = $this->con->real_escape_string($_POST['uname']);
		    $email = $this->con->real_escape_string($_POST['uemail']);
		    $username = $this->con->real_escape_string($_POST['upname']);
		    $id = $this->con->real_escape_string($_POST['id']);
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE customers SET name = '$name', email = '$email', username = '$username' WHERE id = '$id'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:index.php?msg2=update");
			}else{
			    echo "Registration updated failed try again!";
			}
		    }
			
		}


		// Delete customer data from customer table
		public function deleteRecord($id)
		{
		    $query = "DELETE FROM customers WHERE id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:index.php?msg3=delete");
		}else{
			echo "Record does not delete try again";
		    }
		}
}
