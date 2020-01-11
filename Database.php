<?php

class Database
{
    private $_driver = 'mysql';
    private $_host = 'localhost';
    private $_port = 3306;
    private $_dbname = 'lyre_datatable';
    private $_user = 'root';
    private $_password = 'MySqlPassword';
    public $conn = null;

    public function __construct()
    {
        $dns = $this->_driver . ':host=' . $this->_host . ";port=" . $this->_port . ";dbname=" . $this->_dbname;
        $this->conn = new PDO($dns, $this->_user, $this->_password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}