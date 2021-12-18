<?php

class dtb {

    public $con;
    public $server = 'localhost';
    public $username = 'root';
    public $password = '';
    public $dbname = 'duanmau';

    function __construct()
    {
        $this->con = mysqli_connect($this->server, $this->username, $this->password);
        mysqli_select_db($this->con, $this->dbname);
        mysqli_query($this->con, "SET NAME 'utf8");
    }

}

?>