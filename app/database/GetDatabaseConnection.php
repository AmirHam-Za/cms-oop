<?php
namespace App\Database;
 require '../../vendor/autoload.php';
class GetDatabaseConnection{
    public $conn;
    public function __construct(DbConnectionInterface $obj){
        $this->conn =$obj;
    }

    public function getDbConnection(){
        $this->conn->DbConn();
    }
}
