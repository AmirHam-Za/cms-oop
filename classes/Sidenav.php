<?php
include_once "../DB.php";

class Sidenav {
    public $db;
    // localhost/cmsOop/frontend/layout/sidebar.php
    public function __construct(){
      $this->db = new DB();
    }
    public function test(){
      $result = 'I am from Sidenav.php';
      return $result;
    
    }
    public function showCat()
    {
      $query = "SELECT * FROM categories";
      $result = $this->db->select($query);
      return $result;
    }

    public function showTag()
    {
      $query = "SELECT * FROM tags";
      $result = $this->db->select($query);
      return $result;
    }
}
?>