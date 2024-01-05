<?php

include_once "Parents.php";
include_once "../DB.php";


class User extends Parents 
{
  
  
  public function getContentById($id)
  {

      $query = "SELECT * FROM content WHERE id = '$id'";
      $result = $this->db->select($query);
      return $result;
  }

  public function getLoggedInUserData($userId) {
    $sql = "SELECT * FROM users WHERE id = ?";
    // $stmt = $this->connect()->prepare($sql);
    $stmt = $this->db->select($sql);


    if ($stmt) {
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        return $user;
    } else {
        die("Error preparing statement: " . $this->db->select()->error);
    }
}
}
?>