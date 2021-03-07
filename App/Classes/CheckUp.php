<?php
require_once 'Connection.php';
/*
  * @desc this class will hold functions for people table
  * examples include age(), gender(), academic()
  * @author Alejandro Chanquín chanquin921@gmail.com
  * @required Connection.php
*/

class CheckUp extends Connection {
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
    public $oxSat; /* Oxigen Saturation */
    public $newData;
    public $diagnosis;
    public $treatment;
    public $comments;
    public $observations;

    // Insert customer data into customer table
		public function createCheckUp($data)
		{	
			$personCode = $data['personCode'];
			$date = $data['date'];
			$pacientSD = $data['pacientSD'];
            $medicSD = $data['medicSD'];
            $weight = $data['weight'];
            $height = $data['height'];
            $cardiacFreq = $data['cardiacFreq'];
            $respiratoryRate = $data['respiratoryRate'];
			$temperature = $data['temperature'];
            $bloodPress = $data['bloodPress'];
            $pulse = $data['pulse'];
            $oxSat = $data['oxSat'];
            $newData = $data['newData'];
            $diagnosis = $data['diagnosis'];
            $treatment = $data['treatment'];
            $comments = $data['comments'];
            $observations = $data['observations'];
			$query="INSERT INTO checkUp(personCode, date, pacientSD, medicSD, weight, height,
            cardiacFreq, respiratoryRate, temperature, bloodPress, pulse, OxSat,
            newData, diagnosis, treatment, comments, observations) 
            VALUES('$personCode','$date','$pacientSD','$medicSD', '$weight', '$height', '$cardiacFreq',
            '$respiratoryRate', '$temperature', '$bloodPress', '$pulse', '$oxSat', '$newData', '$diagnosis',
            '$treatment', '$comments', '$observations')";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:/");
			}else{
			    echo "Registration failed try again!". $this->con->error;
			}	
		}

		// Fetch customer records for show listing
		public function displayCheckUpHistory($code)
		{
		    $query = "SELECT * FROM checkup where personCode = '$code'";
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
		public function displyaSingleCheckUp($code)
		{
		    $query = "SELECT * FROM checkup WHERE id = '$code'";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "Record not found";
		    }
		}

		// Update customer data into customer table
		public function updateCheckUp($postData)
		{
			$date = $postData['date'];
			$reason = $postData['reason'];
			$pacientSD = $postData['pacientSD'];
            $medicSD = $postData['medicSD'];
            $weight = $postData['weight'];
            $height = $postData['height'];
            $cardiacFreq = $postData['cardiacFreq'];
            $respiratoryRate = $postData['respiratoryRate'];
            $temperature = $postData['temperature'];
            $bloodPress = $postData['bloodPress'];
            $pulse = $postData['pulse'];
            $oxSat = $postData['oxSat'];
            $newData = $postData['newData'];
            $diagnosis = $postData['diagnosis'];
            $treatment = $postData['treatment'];
            $comments = $postData['comments'];
            $observations = $postData['observations'];
			$code = $postData['code'];
			$query = "UPDATE checkup SET reason = '$reason', date = '$date', pacientSD = '$pacientSD', medicSD = '$medicSD',
			weight = '$weight', height = '$height', cardiacFreq = '$cardiacFreq', respiratoryRate = '$respiratoryRate',
			temperature = '$temperature', bloodPress = '$bloodPress', pulse = '$pulse', oxSat = '$oxSat',
			newData = '$newData', diagnosis = '$diagnosis', treatment = '$treatment', comments = '$comments',
			observations = '$observations' WHERE id = '$code'";
			$sql = $this->con->query($query);
			if ($sql==true) {
				print('listo');
			}else{
			    echo "Registration updated failed try again!";
				echo("Error description: " . $sql -> error);
				echo mysqli_error($this->con);
			}
		}


		// Delete customer data from customer table
		public function deleteRecord($code)
		{
		    $query = "DELETE FROM customers WHERE id = '$code'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:/");
		}else{
			echo "Record does not delete try again";
		    }
		}
}
