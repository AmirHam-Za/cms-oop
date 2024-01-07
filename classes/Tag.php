<?php
namespace classes;

use Parents;
include_once "Parents.php";
include_once "Interface.php";


class Tag extends Parents implements TagInterface
 {
   
    public function showTag() : object
    {
        $query = "SELECT * FROM tags";
        $result = $this->db->select($query);
      // $query = "SELECT * FROM categories ORDER BY id DESC";
      // $result = $conn->query($sql);
      return $result;
    }
    public function showCategoryID($catId) : object
    {
      $query = "SELECT * FROM tags WHERE id = $catId";
      $result = $this->db->select($query);
      // $query = "SELECT * FROM categories ORDER BY id DESC";
      // $result = $conn->query($sql);
      return $result;
    }

 

    public function tagForSelect() 
  {
    $sql = "SELECT id, name FROM tags";
    $result  = $this->db->select($sql);

    return $result;
  }
    // public function getCategoryById($id)
    // {
    //   $query = "SELECT * FROM comments WHERE id = '$id'";
    //   $result = $this->db->select($query);
    //   return $result;
    // }


    public function tagCount()
    {
      $query = "SELECT COUNT(*) as count FROM tags";
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
    public function addCategory($data)
    {
      $name = $this->form->validation($data['name']);
      
      if (empty($name)) {
        $error = "Fields must not be empty !";
        echo Flash::warning($error);
        // echo $error;
        return $error;
      }else{
        
      $e_query = "INSERT INTO tags (name) VALUES ('$name')";
      $result = $this->db->insert($e_query);
      if ($result == true) {
        $msg = "Tag Created Succcessfully";
        // echo Flash::success($msg);
    
        $_SESSION['flash_message'] = "Create Successful";
        header("Location: tags.php");
        exit();  
        // echo $msg;
        // return $msg;

      }else{
        // echo"Apni Fail Korechen";
        $_SESSION['flash_message'] = "Failed";
        header("Location: " . $_SERVER['PHP_SELF'] . "");
        exit();
            
       }
      } 
}
    public function getTagById($categoryId)
    {
        $query = "SELECT * FROM tags WHERE id = '$categoryId'";
        $result = $this->db->select($query);
        // $query = "SELECT * FROM categories ORDER BY id DESC";
        // $result = $conn->query($sql);
        return $result;
    }
    public function getContentByTagId($categoryId)
    {
        
        $query = "SELECT * FROM content WHERE tag_id = $categoryId";
        $result = $this->db->select($query);
        // $query = "SELECT * FROM categories ORDER BY id DESC";
        // $result = $conn->query($sql);
        return $result;
    }
 
    public function updateTag($data, $id) : bool
    {
  $name = $data['name'];
  
    if (empty($name))
    {
      // $msg = "Filds Must Not Be empty";
      // return $msg;
      $_SESSION['flash_message'] = " Empty field not allowed" ;
    }
  
      $query   = "UPDATE  tags SET 
      name     = '$name'
      WHERE id ='$id'";

      $result = $this->db->update($query);

      if ($result == true) {
        // $msg = "Update Successfull";
        // echo Flash::success($msg);
        // echo $msg ;
        // $_SESSION['flash_message'] = "Updated successfully";
        // return $msg;
        $_SESSION['flash_message'] = "Update Successfully" ;
          header("Location: tags.php");
        exit();
        
        // header("Location: category.php");
        // exit();
        
      } else {
        $msg = "Update Failed";
        echo $msg ;
        return $msg;
      }
      
    }
    
    
    public function delTag($id) : void
    {
      $sqlDeleteContent = "DELETE FROM content WHERE tag_id = $id";
      $delcon = $this->db->delete($sqlDeleteContent);

      $del_query = "DELETE FROM `tags` WHERE id = '$id'";
      $del = $this->db->delete($del_query);
      if ($del == true && $del == $delcon) {       
        $_SESSION['flash_message'] = "Deleted successfully";
        header("Location: tags.php");
        exit();
      } else {
        // $msg = 'Delete Failed';
        // return $msg;
        $_SESSION['flash_message'] = "Delete Failed";
        header("Location: tags.php");
        exit();
      }
    }
    // public function delCategory($categoryId)
    // {
    //   global $db;


    //   //transaction
    //   $db->begin_transaction();
  
    //   try {
    //       $sqlDeleteContent = "DELETE FROM content WHERE category_id = $categoryId";
    //       $db->query($sqlDeleteContent);
  
    //       $sqlDeleteCategory = "DELETE FROM categories WHERE id = $categoryId";
    //       $db->query($sqlDeleteCategory);
  
    //       $db->commit();
  
    //       return true;
    //   } catch (Exception $e) {
    //       $db->rollback();
  
    //       return false;
    //   }
    // }
 
 }
?>