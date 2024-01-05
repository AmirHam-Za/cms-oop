
<?php
echo "hi";
include_once 'Session.php';
Session::init();

include_once 'DB.php';
$db = new DB();

if (isset($_GET['token'])) {

  $token = $_GET['token'];
  $query = "SELECT v_token, v_status FROM users WHERE v_token='$token'";
  $result = $db->select($query);

  if ($result != false) {

    $row = mysqli_fetch_assoc($result);
    if ($row['v_status'] == 0) {

      $click_token = $row['v_token'];
      $update_status = "UPDATE users SET v_status= '1' WHERE v_token='$click_token'";
      $update_result = $db->update($update_status);


      if ($update_result) {
        $_SESSION['status'] = "Your Account Has been varified Successfully";
        header('location:login.php');

      } else {
        $_SESSION['status'] = "Varification Filed!";
        header('location:login.php');
      }

    } else {
      $_SESSION['status'] = "This Email Is Already Varified Please Login";
      header('location: login.php');
    }

  } else {
    $_SESSION['status'] = "This Token Does Not Exists!";
    header('location: login.php');

  }

} else {
  $_SESSION['status'] = "Not Allowed";
  header('location: loging.php');
}

?>