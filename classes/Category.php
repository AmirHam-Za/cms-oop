<?php
ob_start();
include_once "Parents.php";
include_once 'interface.php';


class Category extends Parents implements CategoryInterface
{


  public function showCategory() :object
  {
    $query = "SELECT * FROM categories";
    $result = $this->db->select($query);
    return $result;
  }
  public function showCategoryID($catId)
  {
    $query = "SELECT * FROM categories WHERE id = $catId";
    $result = $this->db->select($query);
    return $result;
  }

  public function categoryCount()
  {
    $query = "SELECT COUNT(*) as count FROM categories";
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

  public function CategoryForSelect() 
  {
    $sql = "SELECT id, name FROM categories";
    $result  = $this->db->select($sql);

    return $result;
  }

  public function addCategory($data) 
  {
    $name = $this->form->validation($data['name']);


    if (empty($name)) {
      $error = "Empty field not allowed!";
      echo Flash::warning($error);
      return $error;
    } else {
      $query = "INSERT INTO categories (name) VALUES ('$name')";
      $result = $this->db->insert($query);
      if ($result == true) {

        $_SESSION['flash_message'] = "Ceate Successful";
        header("Location: categories.php");
        exit();
      } else {
        $_SESSION['flash_message'] = "Failed";
        // echo"Apni Fail Korechen"; 

      }
    }
  }
  public function getCategoryById($categoryId) :object
  {
    $query = "SELECT * FROM categories WHERE id = '$categoryId'";
    $result = $this->db->select($query);
    return $result;
  }
  public function getContentByCategoryId($categoryId)
  {

    $query = "SELECT * FROM content WHERE category_id = $categoryId";
    $result = $this->db->select($query);
    return $result;
  }

  public function updateCategory($data, $id) 
  {
    $name = $data['name'];


    if (empty($name)) {
      $_SESSION['flash_message'] = " Empty field not allowed";
    }
    $query = "UPDATE  categories SET 
    name     = '$name'
    WHERE id ='$id'";

    $result = $this->db->update($query);

    if ($result == true) {
      $_SESSION['flash_message'] = "Update Successfully";
      header("Location: categories.php");
      exit();

    } else {
      $msg = "Update Failed";
      //   echo $msg ;
      //   return $msg;
      header("Location: edit_category.php");
      exit();
    }


  }

  public function delCategory($id)
  {

    $sqlDeleteContent = "DELETE FROM content WHERE category_id = $id";
    $delcon = $this->db->delete($sqlDeleteContent);

    $del_query = "DELETE FROM `categories` WHERE id = '$id'";
    $del = $this->db->delete($del_query);
    if ($del == true && $del == $delcon) {

      $_SESSION['flash_message'] = "Deleted successfully";

      header("Location: categories.php");
      exit();
    } else {

      $_SESSION['flash_message'] = "Delete Failed";
      header("Location: categories.php");
      exit();
    }

  }
}
?>