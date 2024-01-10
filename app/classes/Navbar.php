<?php

namespace App\classes;

class Navbar extends Parents
{
  public function showNav()
  {
    $query = "SELECT * FROM header_footer LIMIT 1";
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
