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

// $mysqlDb = new MysqlDb();
// $NosqlDb = new NosqlDb();
// $getDbConnection = new GetDbConnection($mysqlDb);
// $getDbConnection->getDbConnection();









// interface DbConnectionInterface{
//     public function DbConn() ;
// }

// class GetDbConnection{
//     public $conn;
//     public function __construct(DbConnectionInterface $obj){
//         $this->conn =$obj;
//     }

//     public function getDbConnection(){
//         $this->conn->DbConn();
//     }
// }

// class MysqlDb implements DbConnectionInterface{
//     //     public $dbconn ;
//     // public function __construct(){
//     //     $this->DbConn();
//     // }
//     public function DbConn(){
//         // echo 'I am Mysqli';
//         define('HOST', 'localhost');
//         define('USER', 'root');
//         define('PASSWORD', '');
//         define('DATABASE', 'my_cms_db');
        
//     }
// }
// class NosqlDb implements DbConnectionInterface{
//     // public function __construct(){
//     //     $this->DbConn();
//     // }
//     public function DbConn(){
//         // echo 'I am Nosqli';
//         define('HOST', 'localhost');
//         define('USER', 'root');
//         define('PASSWORD', '');
//         define('DATABASE', 'my_cms_db');
//     }
// }

// $mysqlDb = new MysqlDb();
// $NosqlDb = new NosqlDb();
// $getDbConnection = new GetDbConnection($NosqlDb);
// $getDbConnection->getDbConnection();


        // define('HOST', 'localhost');
        // define('USER', 'root');
        // define('PASSWORD', '');
        // define('DATABASE', 'my_cms_db');