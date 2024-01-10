<?php
namespace App\database ;
class NosqlDatabaseConn implements DbConnectionInterface{
    public function DbConn()
    {
        // echo 'I am Nosqli';
        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASSWORD', '');
        define('DATABASE', 'cms_db');
    }
}
?>