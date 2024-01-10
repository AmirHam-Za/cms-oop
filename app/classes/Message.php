<?php
namespace App\classes;




class Message 
 {
    public $db;
    public function __construct(){

    }
    public static function flash()
    {
        if (isset($_SESSION['flash_message'])) {
            echo '<div id="flashMessage" class="flash-message absolute top-4 right-6 px-16 bg-gray-100  text-center rounded border-l-8  border-green-500 z-10 h-12 flex items-center animate__animated animate__tada  animate__slow"><p class="text-xl font-bold text-green-500">' . $_SESSION['flash_message'] . '</p></div>';
            unset($_SESSION['flash_message']);

            // JavaScript to hide the flash message after 5 seconds
            echo '<script>
              setTimeout(function() {
                  document.getElementById("flashMessage").style.display = "none";
              }, 2500);
          </script>';
          }
        
    }
    public static function Success()
    {
        if (isset($_SESSION['flash_message'])) {
            echo '<div id="myMessage" class=animate__slow animate__animated  animate__rubberBand mb-4 bg-red-100  px-4 left-2/4 text-lg text-gray-600 rounded border-b-4 border-t-4 border-red-400> . $_SESSION["flash_message"] . </div>';
            unset($_SESSION['flash_message']);
            // JavaScript to hide the flash message after 5 seconds
            echo '<script>
              setTimeout(function() {
                  document.getElementById("flashMessage").style.display = "none";
              }, 2500);
          </script>';
          }
        
    }
 
}
?>