<?php
// namespace classes;
include_once 'DB.php';
include_once 'helper/Format.php';

include 'PHPMailer/Exception.php';
include 'PHPMailer/PHPMailer.php';
include 'PHPMailer/SMTP.php';



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Registers
{
  public $db;
  public $form;

  public function __construct()
  {
    $this->db = new DB();
    $this->form = new Format();
  }
  public function addUser($data)
  {
    // function sendemail_verifi($name, $email, $v_token)
    // {
    //   $mail = new PHPMailer(true);
    //   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                    

    //   $mail->isSMTP();
    //   $mail->SMTPAuth = true;

    //   $mail->Host = 'smtp.gmail.com';
    //   $mail->Username = 'hamza.com.bd@gmail.com';
    //   $mail->Password = 'ouzo jcxw bxxu onbq';

    //   $mail->SMTPSecure = 'tls';
    //   $mail->Port = 587;

    //   $mail->setFrom('hamza.com.bd@gmail.com', $name);
    //   $mail->addAddress($email);

    //   $mail->isHTML(true);

    //   $mail->Subject = 'Email Varification From Web Master';
    //   $email_template = "
    //   <h2>You have register with web master</h2>
    //   <h5>Verify your email address to login please click the link
    //   below</h5>
    //   <a href='http://localhost/cmsOop/verifi-email.php?token=$v_token'>Click Here</a>
    // ";

    //   $mail->Body = $email_template;
    //   $mail->send();

    //   // echo "Email has benn sent";

    // }


    $name = $this->form->validation($data['name']);
    $phone = $this->form->validation($data['phone']);
    $email = $this->form->validation($data['email']);
    // $password = $this->form->validation($data['password']);
    $password = $this->form->validation(md5($data['password']));
    $v_token = md5(rand());
    // echo $phone;


    if (empty($name) || empty($phone) || empty($email) || empty($password)) {
      $error = "Filds Must Not Be empty";
      return $error;
    } else {


      $e_query = "SELECT * FROM users WHERE email= '$email'";
      $check_email = $this->db->select($e_query);

      // if (mysqli_num_rows($check_email)>0) {
      // if (($check_email) > 0) {
      if (($check_email)) {
        $error = "Email already exists";
        return $error;
        // The following line will never be executed due to the 'return' statement above.
        // header("Location: register.php");
      } else {
        $insert_query = "INSERT INTO users (username, email, phone,
            password, v_token) VALUES('$name', '$email', '$phone',
            '$password', '$v_token')";

        $insert_row = $this->db->insert($insert_query);

        if ($insert_row) {
          // sendemail_verifi($name, $email, $v_token);
          // $success = "Registration Success. Please Check your email.";
          // $success = "Registration Success. Please Check your email.";
          $success = "Registration Success. <a href='login.php'>Click Here</a> to login.";
          return $success;
          // echo "Registration Success";
        } else { 
          $error = "Registration Failed";
          return $error;
        }

      }
    }
  }
}
?>