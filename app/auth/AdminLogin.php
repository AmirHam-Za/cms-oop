<?php

namespace App\auth;

require '../../vendor/autoload.php';

use App\database\DB;
use App\helper\Format;
use App\classes\Session;


class AdminLogin
{
  public $db;
  public $form;
  public function __construct()
  {
    $this->db = new DB();
    $this->form = new Format();
  }

  public function LoginUser($email, $password)
  {
    $email = $this->form->validation($email);
    $password = $this->form->validation($password);

    if (empty($email) || empty($password)) {
      $error = "Fields Must not be empty !";
      return $error;
    } else {

      $select = "SELECT * FROM users WHERE email='$email' AND password = '$password'";
      $result = $this->db->select($select);
      // echo $result;

      if ($result) {
      } else {

        $error = "";
        echo "<div id=\"myMessage\"  class='animate__slow animate__animated  animate__rubberBand  absolute  left-[40%] top-[8%]    mb-4  bg-red-100  px-4  text-lg  text-gray-600 rounded border-b-4 border-t-4 border-red-400  '>Invalid username or password!</div>";
        return $error;
      }
    }

    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {

      $row = mysqli_fetch_assoc($result);

        if ($row['v_status'] == 1) {

          Session::set('login', true);

          Session::set('username', $row['username']);
          Session::set('userId', $row['id']);
          header('Location: ../../view/backend/dashboard.php');
        } else {

          $error = "Please first varify your email";
          return $error;
        }
    } else {
      $error = "Invalid Email Or Password";
      return $error;
    }
  }
}
