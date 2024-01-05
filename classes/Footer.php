<?php
include_once "Parents.php";
// include_once "../DB.php";
class Footer extends Parents
{
  public $db;

  public function __construct()
  {
    $this->db = new DB();
  }

  public function test()
  {
    $result = 'I am from Footer.php';
    return $result;

  }
  public function showFooter()
  {
    // $query = "SELECT * FROM header_footer LIMIT 1";
    $query = "SELECT * FROM header_footer";
    $result = $this->db->select($query);
    return $result;
  }

  public function addFooter($data, $file)
  {
    // $image = $data['image'];
    $name = $data['name'];

    $permited = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['image']['name'];
    $file_size = $file['image']['size'];
    $file_temp = $file['image']['tmp_name'];

    $div = explode('.', $file_name);

    $file_ext = strtolower(end($div));

    $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $upload_image = "uploads/" . $unique_image;

    if (empty($name)) {
      $msg = "Filds Must Not Be empty";
      echo Flash::warning($msg);

      return $msg;
    }
    if ($file_size > 1048567) {
      $msg = "File size must be less than 1 MB";
      $_SESSION['flash_message'] = "File size must be less than 1 MB";

      return $msg;
    } elseif (in_array($file_ext, $permited) == false) {
      $msg = "You Can upload only" . implode(', ', $permited);
      echo Flash::warning($msg);
      return $msg;
    } else {

      move_uploaded_file($file_temp, $upload_image);

      $query = "INSERT INTO header_footer (`name`, `logo_path`) VALUES ('$name','$upload_image')";

      $result = $this->db->insert($query);

      if ($result == true) {
        $_SESSION['flash_message'] = "Adding Successfull";
        header("Location: header_footer.php");
        exit();
      } else {
        $msg = "Failed";
        // return $msg;
        echo '<div class="absolute text-3xl text-red-600">Failed</div>';
      }
    }
  }
  public function allStudent()
  {
    $query = "SELECT * FROM tbl_student ORDER BY id DESC";
    $result = $this->db->select($query);
    return $result;
  }

  public function getFooterById($id)
  {
    $query = "SELECT * FROM header_footer WHERE id = '$id'";
    $result = $this->db->select($query);
    return $result;
  }

  public function updateFooter($data, $file, $id)
  {
    $name = $data['name'];

    $permited = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['logo_path']['name'];
    $file_size = $file['logo_path']['size'];
    $file_temp = $file['logo_path']['tmp_name'];


    $div = explode('.', $file_name);

    $file_ext = strtolower(end($div));

    $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $upload_image = "uploads/" . $unique_image;

    if (!empty($file_name)) {
      if ($file_size > 1048567) {
        $msg = "File size must be less than 1 MB";
        // return $msg;
        echo Flash::warning($msg);
      } elseif (in_array($file_ext, $permited) == false) {
        $msg = "You Can upload only" . implode(', ', $permited);
        echo Flash::warning($msg);
        return $msg;
      } else {
        // Delete previous photo
        $img_query = "SELECT * FROM header_footer WHERE id = '$id'";
        $img_res = $this->db->select($img_query);
        if ($img_res) {
          while ($row = mysqli_fetch_assoc($img_res)) {
            $photo = $row['logo_path'];
            unlink($photo);
          }
        }

        move_uploaded_file($file_temp, $upload_image);

        $query = "UPDATE  header_footer SET name = '$name', logo_path ='$upload_image' WHERE id ='$id'";

        $result = $this->db->update($query);

        if ($result == true) {
          $msg = "Update Successfull";
          $_SESSION['flash_message'] = "Update Successfull";
          header("Location: header_footer.php");
          exit;
          // return $msg;
          // echo $msg ;
        } else {
          $msg = "Update Failed";
          echo Flash::error($msg);
          echo $msg;
          return $msg;
        }

      }
    } else {
      // or update without adding photo
      $query = "UPDATE  `header_footer` SET 
      `name`       = '$name' 
       WHERE id      = '$id'
      ";

      $result = $this->db->update($query);

      if ($result) {
        $_SESSION['flash_message'] = "Update Successfull";
        header("Location: header_footer.php");
        exit();
      } else {
        $msg = "Failed";
        return $msg;
      }
    }
  }
  public function delFooter($id)
  {
    $img_query = "SELECT * FROM `header_footer` WHERE id = '$id'";
    $img_res = $this->db->select($img_query);
    // // or
    if ($img_res) {
      while ($row = mysqli_fetch_assoc($img_res)) {
        $photo = $row['logo_path'];
        unlink($photo);

      }
    }

    $del_query = "DELETE FROM `header_footer` WHERE id = '$id'";
    $del = $this->db->delete($del_query);
    if ($del == true) {
      $_SESSION['flash_message'] = "Delete Successfully";
      header("Location: header_footer.php");
      exit();
    } else {
      $msg = 'Delete Failed';
      echo Flash::error($msg);
      return $msg;
    }
  }

}
?>