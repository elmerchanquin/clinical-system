<?php 
class Appointment {
    //Properties
    public $code;
    public $name;
    public $phone;
    public $secondPhone;
    public $mail;
    public $date;
    public $time;
    public $status;
    private $timeStamp;

    //Methods
    public function __construct($code, $name, $phone, $secondPhone, $mail, $date, $time, $status, $timeStamp)
    {
        $this->code = $code;
        $this->name = $name;
        $this->phone = $phone;
        $this->secondPhone = $secondPhone;
        $this->mail = $mail;
        $this->date = $date;
        $this->time = $time;
        $this->status = $status;
        $this->timeStamp = $timeStamp;
    }

    public function createAppointment($post)
		{
			$code = $this->con->$_POST['code'];
            $name = $this->con->$_POST['name'];
            $phone = $this->con->$_POST['phone'];
            $secondPhone = $this->con->$_POST['secondPhone'];
            $date = $this->con->$_POST['date'];
            $time = $this->con->$_POST['time'];
            $status = $this->con->$_POST['status'];
            $timeStamp = $this->con->$_POST['timeStamp'];
			$query="INSERT INTO checkUp(code, name, phone, secondPhone, date, time, status, timeStamp) 
            VALUES('$code','$name','$phone','$secondPhone', '$date', '$time', '$status',
            '$timeStamp')";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:/appointments/");
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
		public function updateCheckUp($post)
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
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE checkUp SET date = '$date', pacienteSD = '$pacientSD', medicSD = '$medicSD',
			weight = '$weight', height = '$height', cardiacFreq = '$cardiacFreq', respiratoryRate = '$respiratoryRate',
			temperature = '$temperature', bloodPress = '$bloodPress', pulse = '$pulse', OxSat = '$OxSat',
			newData = '$newData', diagnosis = '$diagnosis', treatment = '$treatment', comments = '$comments',
			observations = '$observations' WHERE personCode = '$personCode'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:/");
			}else{
			    echo "Registration updated failed try again!";
			}
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