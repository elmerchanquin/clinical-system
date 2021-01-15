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
    public function urlIncluder($page, $include)
    {
        $this->page = $page;
        $this->include = $include;

        $query = '';

        while ($a <= 10) {
            # code...
        }
    }
}
