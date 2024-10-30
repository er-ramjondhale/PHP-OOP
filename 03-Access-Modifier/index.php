<title>Access Modifier</title>
<pre>

<?php
class AccessModifier
{
    public $userName;
    protected $userEmail;
    private $userPass;
    public $functionname;

    public function __construct($username, $useremail, $userpass)
    {
        $this->userName = $username;
        $this->userEmail = $useremail;
        $this->userPass = $userpass;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    protected function getUserEmail()
    {
        return $this->userEmail;
    }

    private function getUserPassword()
    {
        return $this->userPass;
    }
}

$obj = new AccessModifier('ramj', 'ram@gmail.com', 'password');
echo $obj->getUserName();
// echo $obj->getUserEmail(); // Fatal Error - Call Protected Method
// echo $obj->getUserPassword(); // Fatal Error - Call Privates Method