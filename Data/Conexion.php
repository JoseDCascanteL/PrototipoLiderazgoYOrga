<?php 
class Conexion{	 
    public $server;
    public $user;
    public $password;
    public $db;
    public $connection;
    public $isActive;
    
    public function Conexion(){
        $this->isActive = false;
        $this->server = "btskp2tdhoa28ryhwg40-mysql.services.clever-cloud.com:3306";
        $this->user = "ubtskyngtgevxzgy";
        $this->password = "FjKj2k5F79aJrH1TURYy";
        $this->db = "btskp2tdhoa28ryhwg40";
    }

}
?>