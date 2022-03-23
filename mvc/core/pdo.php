<?php

class dtb {

    public $con;
    public $server = 'localhost';
    public $username = 'root';
    public $password = '';
    public $dbname = 'duanmau';

    function __construct()
    {
        $this->con = mysqli_connect($this->server, $this->username, $this->password, $this->dbname);
        $this->con->set_charset("utf8");
    }

}

?>