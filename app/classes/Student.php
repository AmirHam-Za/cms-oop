<?php
namespace App\classes;
// error_reporting(E_ALL);
include_once "DB.php";
// include "header.php";

class Student
{
  public $db;

  public function __construct(){
    $this->db = new DB();
  }

  // private $table = 'tbl_student';

  public function readAll()
  {
    // $sql = "SELECT * FROM $this->table";
    // // echo $sql;
    // $stmt = DB::prepare($sql);
    // $stmt->execute();
    // return $stmt->fetchAll();
  }


  public function add($data, $file)
  {
    $name = $data['name'];
    $dep = $data['dep'];
    $age = $data['age'];

    $permited = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['image']['name'];
    $file_size = $file['image']['size'];
    $file_temp = $file['image']['tmp_name'];

// $file_name = isset($file['image']['name']) ? $file['image']['name'] : null;

    $div = explode('.', $file_name);

    $file_ext = strtolower(end($div));

    $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $upload_image = "upload/" . $unique_image;

    if (empty($name) || empty($dep) || empty($age) || empty($file_name)) {
      $msg = "Filds Must Not Be empty";
      return $msg;

    } elseif ($file_size > 1048567) {
      $msg = "File size must be less than 1 MB";
      return $msg;
    } elseif (in_array($file_ext, $permited) == false) {
      $msg = "You Can upload only" . implode(', ', $permited);
      return $msg;
    } else {
      move_uploaded_file($file_temp, $upload_image);

      $query = "INSERT INTO `tbl_student` (`name`, `dep`, `age`,
      `image`) VALUES ('$name', '$dep', '$age',
      '$upload_image')";

      $result = $this->db->insert($query);

      if ($result) {
        echo"Adding Successfull";
        $_SESSION['flash_message'] = "Adding Successfull";
        header('Location: index.php ');
        exit();
        // return $msg;
      } else {
        $msg = "Failed";
        return $msg;
      }

    }
  }



  public function allStudent()
  {
    $query = "SELECT * FROM tbl_student ORDER BY id DESC";
    $result = $this->db->select($query);
    return $result;
  }
  public function getStdById($id)
  {
    $query = "SELECT * FROM tbl_student WHERE id = '$id'";
    $result = $this->db->select($query);
    return $result;
  }

  public function updateStudent($data, $file, $id)
  {
    $name = $data['name'];
    $dep = $data['dep'];
    $age = $data['age'];

    $permited = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['image']['name'];
    $file_size = $file['image']['size'];
    $file_temp = $file['image']['tmp_name'];

    $div = explode('.', $file_name);

    $file_ext = strtolower(end($div));

    $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $upload_image = "upload/" . $unique_image;

    if (empty($name) || empty($dep) || empty($age))  {
      $msg = "Filds Must Not Be empty";
      return $msg;
// update with remain image
    }if (!empty($file_name)){
      if($file_size > 1048567) {
        $msg = "File size must be less than 1 MB";
        return $msg;
      } elseif (in_array($file_ext, $permited) == false) {
        $msg = "You Can upload only" . implode(', ', $permited);
        return $msg;
      } else {
// Delete previous photo
        $img_query = "SELECT * FROM tbl_student WHERE id = '$id'";
        $img_res = $this->db->select($img_query);
        if ($img_res) {
          while ($row = mysqli_fetch_assoc($img_res)) {
            $photo = $row['image'];
            unlink($photo);
          }
        }

        move_uploaded_file($file_temp, $upload_image);
        
        $query = "UPDATE `tbl_student` SET `name`='$name', `dep`='$dep', `age`='$age', `image`='$upload_image' WHERE id = '$id'";
        

        $result = $this->db->insert($query);
  
        if ($result) {
          $msg = "Update Successfull";
          return $msg;
        } else {
          $msg = "Failed";
          return $msg;
        }
  
      }
    }else{
      // or update without adding photo
      $query = "UPDATE tbl_student SET name='$name', dep='$dep', age ='$age' WHERE id ='$id'";
      

      $result = $this->db->insert($query);

      if ($result) {
        $msg = "Update Successfull";
        return $msg;
      } else {
        $msg = "Failed";
        return $msg;
      }
    } 

  }


  

  public function delStudent($id)
  {
    $img_query = "SELECT * FROM `tbl_student` WHERE id = '$id'";
    $img_res = $this->db->select($img_query);

    //     if ($img_res && $row = mysqli_fetch_assoc($img_res)) {
    //     $photo = $row['image'];
    //     if (file_exists($photo)) {
    //         unlink($photo);
    //     }
    // }
    // // or

    if ($img_res) {
      while ($row = mysqli_fetch_assoc($img_res)) {
        $photo = $row['image'];
        unlink($photo);

      }
    }

    $del_query = "DELETE FROM `tbl_student` WHERE id = '$id'";
    $del = $this->db->delete($del_query);
    if ($del == true) {
      // $msg = 'Student Delete Susscessfull';
      // return $msg;
      echo " Delete Susscessfull	";
     
      $_SESSION['flash_message'] = "Deleted successfully";
      // header('Location: ' . $_SERVER['HTTP_REFERER']);
      header('Location: index.php ');
      exit();
    } else {
      $msg = 'Delete Failed';
      return $msg;
    }
  }

}





?>