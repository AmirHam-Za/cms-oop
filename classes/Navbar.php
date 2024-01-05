<?php

// include "DB.php";
include_once '../DB.php';
include_once "Parents.php";
class Navbar extends Parents
{

  public function showNav()
  {
    $query = "SELECT * FROM header_footer LIMIT 1";
    $result = $this->db->select($query);
    // $query = "SELECT * FROM categories ORDER BY id DESC";
    // $result = $conn->query($sql);
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