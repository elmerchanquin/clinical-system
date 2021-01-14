<?php
require_once 'Connection.php';
/*
  * @desc this class will hold functions for log in
  * examples include giveAcces(), CloseSession()
  * @author Alejandro Chanquín chanquin921@gmail.com
  * @required Connection.php
*/

class Login extends Connection
{
    // Properties
    private $code;
    public $user;
    private $password;

    // Methods
    public function giveAccess($user, $password)
    {
        
            $this->user = $user;
            $this->password = $password;
            $query = "SELECT user, password FROM user WHERE user = '" . $user . "'";
            $sql = $this->con->query($query);          
            if ($result = $sql -> fetch_assoc()) {
                $dbUser = $result['user'];
                $dbPass = $result['password'];
                if ($dbPass == $password) {
                    session_start();
                    header("Location:/");
                    return $_SESSION['user'] = $dbUser;
                } else {
                    return "Password doesn't match with the user";
                }
            } else {
                return "User or password doesn't match";
            }
        
        
    }
    public function CloseSession()
    {
        session_start();
        session_destroy();
        header("Location:/");


    }
    public function RedirectIfIsLogged(){
        session_start();
        if (isset($_SESSION['user'])){
            header('Location:/');
        }
    }
}
