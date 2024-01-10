<?php
namespace App\database;
class  MysqlDatabaseConn implements DbConnectionInterface
{
    public function DbConn()
    {
        // echo 'I am Mysqli';
        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASSWORD', '');
        define('DATABASE', 'my_cms_db');
    }
}
?>