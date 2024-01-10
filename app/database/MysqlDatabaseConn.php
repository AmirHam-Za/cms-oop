<?php
namespace App\database ;
// define('DB_HOST', 'localhost');
// define('DB_NAME', 'aaa_oop');
// define('DB_USER', 'root');
// define('DB_PASS', '');

// define('HOST', 'localhost');
// define('USER', 'root');
// define('PASSWORD', '');
// define('DATABASE', 'my_cms_db');
 


class  MysqlDatabaseConn implements DbConnectionInterface{
    //     public $dbconn ;
    // public function __construct(){
    //     $this->DbConn();
    // }
    public function DbConn(){
        // echo 'I am Mysqli';
        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASSWORD', '');
        define('DATABASE', 'my_cms_db');
        
    }
}
?>