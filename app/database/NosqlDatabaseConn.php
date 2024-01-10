<?php

// define('DB_HOST', 'localhost');
// define('DB_NAME', 'aaa_oop');
// define('DB_USER', 'root');
// define('DB_PASS', '');

// define('HOST', 'localhost');
// define('USER', 'root');
// define('PASSWORD', '');
// define('DATABASE', 'my_cms_db');
 

namespace App\database ;
class NosqlDatabaseConn implements DbConnectionInterface{
    // public function __construct(){
    //     $this->DbConn();
    // }
    public function DbConn(){
        // echo 'I am Nosqli';
        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASSWORD', '');
        define('DATABASE', 'cms_db');
    }
}
?>