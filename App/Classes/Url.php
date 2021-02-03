<?php
require_once 'Connection.php';
/*
  * @desc this class will hold functions for url managment
  * examples include giveAcces(), CloseSession()
  * @author Alejandro Chanquín chanquin921@gmail.com
  * @required Connection.php
*/

class Url extends Connection
{
    //Properties
    private $code;
    public $page;
    public $include;
    public $counter;

    //Methods
    public function urlIncluder($page)
    {
        $this->page = $page;
        $query = 'SELECT * FROM url';
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                if ($row['page'] == $this->page) {
                    $url = $row['page'];
                    $include = $row['include'];
                    break;
                } elseif ($row['alternative'] == $this->page) {
                    header("Location:".$row['page']);
                }
            }
            if (isset($url)) {
                include "../View/$include";
            } else {
                include "../Views/error404.php";
            }
        }
    }
}
