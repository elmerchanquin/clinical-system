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
			$query="INSERT INTO appointment(code, name, phone, secondPhone, date, time, status, timeStamp) 
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
		public function displayAppointment()
		{
		    $query = "SELECT * FROM appointment";
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
		public function displayAppointmentById($code)
		{
		    $query = "SELECT * FROM appointment WHERE code = '$code'";
		    $result = $this->con->query($query);
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			return $row;
		    }else{
			echo "Record not found";
		    }
		}

		// Update customer data into customer table
		public function updateAppointment($post)
		{
		    $code = $this->con->$_POST['code'];
            $name = $this->con->$_POST['name'];
            $phone = $this->con->$_POST['phone'];
            $secondPhone = $this->con->$_POST['secondPhone'];
            $date = $this->con->$_POST['date'];
            $time = $this->con->$_POST['time'];
            $status = $this->con->$_POST['status'];
            $timeStamp = $this->con->$_POST['timeStamp'];
		if (!empty($id) && !empty($postData)) {
			$query = "UPDATE appointment SET name = '$name', phone = '$phone', secondPhone = '$secondPhone',
			date = '$date', time = '$time', status = '$status', timeStamp = '$timeStamp' WHERE code = '$code'";
			$sql = $this->con->query($query);
			if ($sql==true) {
			    header("Location:/appointments/");
			}else{
			    echo "Registration updated failed try again!";
			}
		    }
			
		}


		// Delete customer data from customer table
		public function deleteAppointment($code)
		{
		    $query = "DELETE FROM appointment WHERE code = '$code'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:/appointments/");
		}else{
			echo "Record does not delete try again";
		    }
		}
}