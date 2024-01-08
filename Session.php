<?php
// ob_start();
// namespace Session;
class Session
{
  // public static function init()
  // {
  //   if (version_compare(phpversion(), '5.4.0', '<')) {
  //     if (session_id() == '') {
  //       session_start();

  //     } else {
  //       if (session_status() == PHP_SESSION_NONE) {
  //         session_start();
  //       }
  //     }
  //   }
  // }
  public static function init()
  {
    session_start();
  }
  public static function set($key, $value)
  {
    $_SESSION[$key] = $value;
  }
  public static function get($key)
  {
    if (isset($_SESSION[$key])) {
      return $_SESSION[$key];
    } else {
      return false;
    }
  }

  public static function loginCheck()
  {
    self::init();
    if (self::get('login') == true) {
      header('Location:backend/dashboard.php');
    }
    // header('Location: login.php');

  }
  public static function checkSession()
  {
    self::init();
    if (self::get('login') == false) {
      self::destroy();
      header('location:../login.php');
    }
  }

  public static function destroy()
  {
    session_destroy();
    header('location:login.php');

  }

  // public static function userId()
  // {
  //   self::init();
  //   if (self::get('login') == true) {
  //     // header('Location:backend/dashboard.php');
  //     echo '<pre>';
  //     print_r($_SESSION);
  //     echo '</pre>';
  //     
  //   }
  // }
}
?>