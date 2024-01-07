<?php
namespace classes;

use Flash;
use Parents;
include_once "Parents.php";
include_once "Interface.php";


class Comment extends Parents implements CommentInterface
{
  public function showComment($postId)
  {
    $query = "SELECT * FROM comments WHERE post_id = $postId";
    $result = $this->db->select($query);
    return $result;
  }
  public function showAllComments()
  {
    $query = "SELECT * FROM comments";
    $result = $this->db->select($query);
    return $result;
  }
  public function getCommentId($id)
  {
    $query = "SELECT * FROM comments WHERE id = '$id'";
    $result = $this->db->select($query);
    return $result;
  }
  public function getCommentById($id)
  {
    $query = "SELECT * FROM content WHERE id = '$id'";
    $result = $this->db->select($query);
    return $result;
  }

  public function commentCount()
  {
    $query = "SELECT COUNT(*) as count FROM comments";
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
  public function addComment($data, $id)
  {




    $name = $this->form->validation($data['name']);
    $comment = $this->form->validation($data['comment']);
    $post_id = $this->form->validation($data['post_id']);
    $id = $this->form->validation($data['id']);
    if (empty($name) || empty($comment)) {
      $error = "Filds Must Not Be empty";
      echo Flash::warning($error);
      return $error;
    } else {


      $e_query = "INSERT INTO comments (name, comment, post_id) VALUES ('$name', '$comment', '$post_id')";
      $result = $this->db->insert($e_query);

    }

    if ($result == true) {

      $_SESSION['flash_message'] = "Ceate Successful";
      header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . $id . "#specificDiv");
      exit();
    } else {
      echo "Apni Fail Korechen";

    }
  }

  public function updateComment($data, $id)
  {
    $name = $data['name'];
    $comment = $data['comment'];
    $post_id = $data['post_id'];

    if (empty($name) || empty($comment) || empty($post_id)) {
      $msg = "Filds Must Not Be empty";
      return $msg;

    }

    $query = "UPDATE  comments SET 
    name     = '$name',  
    comment  ='$comment', 
    post_id  ='$post_id'
    WHERE id ='$id'";

    $result = $this->db->update($query);

    if ($result == true) {
      $_SESSION['flash_message'] = "Update Successfully";
      header("Location: comment.php");
      exit();

    } else {
      $msg = "Update Failed";
      echo $msg;
      return $msg;
    }

  }
  public function delComment($id)
  {
    $del_query = "DELETE FROM `comments` WHERE id = '$id'";
    $del = $this->db->delete($del_query);
    if ($del == true) {
      $_SESSION['flash_message'] = "Deleted successfully";
      // echo Flash::success($_SESSION['flash_message']);
      // unset($_SESSION['flash_message']);
      // header('Location: ' . $_SERVER['HTTP_REFERER']);
      header('Location: comment.php ');
      exit();
    } else {
      $msg = 'Delete Failed';
      return $msg;
    }
  }

}
?>