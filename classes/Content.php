<?php

// error_reporting(E_ALL);
include_once "Parents.php";
class Content extends Parents
{
  public function showContent()
  {
    $query = "SELECT * FROM content ORDER BY id DESC";
    $result = $this->db->select($query);
    return $result;
  }

  //   // test purpose
  // public function test(){
  //   $result = 'I am from Content.php';
  //   return $result;
  // }
  public function addContent($data, $file)
  {

    try {
      $title = $data['title'];
      // $dep = $data['image'];
      $read_time = $data['read_time'];
      $description = $data['description'];
      $category_id = $data['category_id'];
      $tag_id = $data['tag_id'];

      $permited = array('jpg', 'jpeg', 'png', 'gif');
      $file_name = $file['image']['name'];
      $file_size = $file['image']['size'];
      $file_temp = $file['image']['tmp_name'];

      $div = explode('.', $file_name);

      $file_ext = strtolower(end($div));

      $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
      $upload_image = "uploads/" . $unique_image;

      if (empty($title) || empty($read_time) || empty($description) || empty($category_id) || empty($tag_id)) {
        $msg = "Filds Must Not Be empty";
        //  $_SESSION['flash_message'] = "Filds Must Not Be empty";
        echo Flash::warning($msg);
        return $msg;
      }
      if ($file_size > 1048567) {
        $msg = "File size must be less than 1 MB";
        echo Flash::warning($msg);
        return $msg;
      } elseif (in_array($file_ext, $permited) == false) {
        $msg = "You Can upload only" . implode(', ', $permited);
        echo Flash::warning($msg);
        return $msg;
      } else {

        move_uploaded_file($file_temp, $upload_image);

        $query = "INSERT INTO content (`title`, `image`, `read_time`,
        `description`, `category_id`, `tag_id`) VALUES ('$title','$upload_image', '$read_time','$description','$category_id','$tag_id')";

        $result = $this->db->insert($query);

        if ($result == true) {
          $msg = "Create Successfull";
          $_SESSION['flash_message'] = "Adding Successfull";
          header("Location: index.php");
          exit();
        } else {
          $msg = "Failed";
          // return $msg;
          echo Flash::error($msg);
        }
      }
    } catch (\Throwable $th) {
      // throw $th;
      $msg = 'Text must not be any qoutes';
      echo Flash::error($msg);
    }
  }
  public function allStudent()
  {
    $query = "SELECT * FROM tbl_student ORDER BY id DESC";
    $result = $this->db->select($query);
    return $result;
  }
  public function contentCount()
  {
    $query = "SELECT COUNT(*) as count FROM content";
    // $query = "SELECT * FROM content ORDER BY id DESC";
    $result = $this->db->select($query);
    return $result;


    if ($result) {
        $row = $result->fetch_assoc();
        // return $row['count'];
        echo $row['count'];
    } else {
      
        return false;
    }
  }

  public function getContentById($id)
  {
    $query = "SELECT * FROM content WHERE id = '$id'";
    $result = $this->db->select($query);
    return $result;
  }

  public function updateContent($data, $file, $id)
  {
    try {
      $title = $data['title'];
    // $dep = $data['image'];
    $read_time = $data['read_time'];
    $description = $data['description'];
    $category_id = $data['category_id'];
    $tag_id = $data['tag_id'];

    $permited = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $file['image']['name'];
    $file_size = $file['image']['size'];
    $file_temp = $file['image']['tmp_name'];


    $div = explode('.', $file_name);

    $file_ext = strtolower(end($div));

    $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
    $upload_image = "uploads/" . $unique_image;
    // update with remain image
    if (!empty($file_name)) {
      if ($file_size > 1048567) {
        $ms = "File size must be less than 1 MB";
        $_SESSION['flash_message'] = "File size must be less than 1 MB";
        return $ms;
      } elseif (in_array($file_ext, $permited) == false) {
        $msg = "You Can upload only" . implode(', ', $permited);
        // return $msg;
        $_SESSION['flash_message'] = "You Can upload only" . implode(', ', $permited);
      } else {
        // Delete previous photo
        $img_query = "SELECT * FROM content WHERE id = '$id'";
        $img_res = $this->db->select($img_query);
        if ($img_res) {
          while ($row = mysqli_fetch_assoc($img_res)) {
            $photo = $row['image'];
            unlink($photo);
          }
        }

        move_uploaded_file($file_temp, $upload_image);

        $query = "UPDATE  content SET title = '$title',  image ='$upload_image', read_time='$read_time', description = '$description', category_id = '$category_id', tag_id='$tag_id' WHERE id ='$id'";

        $result = $this->db->insert($query);

        if ($result == true) {
          $_SESSION['flash_message'] = "Update Successfull";
          header("Location: index.php");
          exit();
          // return $msg;
        } else {
          $msg = "Update Failed";
          echo Flash::error($msg);
          return $msg;
        }

      }
    } else {
      // or update without adding photo
      $query = "UPDATE  `content` SET 
      `title`       = '$title', 
      `read_time`   ='$read_time' ,
      `description` = '$description', 
      `category_id` = '$category_id', 
      `tag_id`      = '$tag_id' 
      WHERE id      = '$id'
      
      ";
      $result = $this->db->insert($query);

      if ($result) {
        $msg = "Update Successfull";
        $_SESSION['flash_message'] = "Update Successfull";
        header("Location: index.php");
        exit();
        // echo self::Flash($msg);
        // echo $msg ;
        // return $msg;
      } else {
        $msg = "Failed";
        $_SESSION['flash_message'] = "Update Successfull";
        header("Location: index.php");
        // exit();
        // return $msg;
      }

    }

      // ###########################
    } catch (\Throwable $th) {
      // throw $th;
      $msg = 'Text must not be any single qoutes';
      echo Flash::error($msg);
    }
    

  }
  public function delContent($id)
  {
    $img_query = "SELECT * FROM `content` WHERE id = '$id'";
    $img_res = $this->db->select($img_query);
    if ($img_res) {
      while ($row = mysqli_fetch_assoc($img_res)) {
        $photo = $row['image'];
        unlink($photo);

      }
    }

    $del_query = "DELETE FROM `content` WHERE id = '$id'";
    $del = $this->db->delete($del_query);
    if ($del == true) {
      $msg = 'Delete Susscessfull';
      $_SESSION['flash_message'] = "Deleted successfully";
      header("Location: index.php");
      exit();
    } else {
      $msg = 'Delete Failed';
      return $msg;
    }
  }

}
?>