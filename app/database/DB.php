<?php
namespace App\database;
require '../../vendor/autoload.php';
use mysqli;
// ******************************
// define('HOST', 'localhost');
// define('USER', 'root');
// define('PASSWORD', '');
// define('DATABASE', 'my_cms_db');

//OR
$mysqlDb = new MysqlDatabaseConn();
$NosqlDb = new NosqlDatabaseConn();
$getDbConnection = new GetDatabaseConnection($mysqlDb);
// $getDbConnection = new GetDatabaseConnection($NosqlDb);
$getDbConnection->getDbConnection();
// ********************************************
class DB 
{
  public $host = HOST;
  public $user = USER;
  public $password = PASSWORD;
  public $database = DATABASE;

  public $link;
  public $error;
  private $conn;

  // database connection setup goes here
  public function __construct()
  {
    $this->dbConnect();
  }
  public function escape($value)
  {
    return mysqli_real_escape_string($this->conn, $value);
  }
  public function dbConnect()
  {
    $this->link = new mysqli(
      $this->host,
      $this->user,
      $this->password,
      $this->database
    );
    // Check connection
    if ($this->link->connect_error) {
        die("Connection failed: " . $this->link->connect_error);
    }
    if (!$this->link) {
      $this->error = "Database Connection Failed";

      return false;
    }
  }
  public function select($query)
  {
    $result = mysqli_query($this->link, $query);
    if (!$result) {
      // Log the error or handle it in a way that suits your application
      echo "Error: " . mysqli_error($this->link);
      return false;
    }

    if (mysqli_num_rows($result) > 0) {
      return $result;
    } else {
      return false;
    }
  }

  public function insert($query)
  {
    $result = mysqli_query($this->link, $query) or die($this->link->error . __LINE__);
    if ($result) {
      return $result;
    } else {
      return false;
    }
  }


  //  update
  public function update($query)
  {
    $result = mysqli_query($this->link, $query) or die($this->link->error . __LINE__);
    if ($result) {
      return $result;
    } else {
      return false;
    }
  }

  // delete
  public function delete($query)
  {
    $result = mysqli_query($this->link, $query) or die($this->link->error . __LINE__);
    if ($result) {
      return $result;
    } else {
      return false;
    }
  }
}
?>