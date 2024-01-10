<?php
namespace App\classes;

use App\helper\Format;
ob_start();

// ******PARENT CLASS**********//
class Parents
{
  public $db;
  public $form;
  public function __construct(){
    $this->db = new DB();
    $this->form = new Format();
    // $this->ms = $msg;
  }

  public static function Flash($msg){
    $notification ="<div id=\"myMessage\"  class='mb-4  px-4 py-2 text-xl text-red-600 bg-indigo-200 rounded border-l-8 border-red-400 '> $msg;
    
    <script>
           function deleteMessage() {
            var messageDiv = document.getElementById('myMessage');
            if (messageDiv) {
                messageDiv.style.display = 'none';
            }
        }
    
        // Set a timeout to call the deleteMessage function after 3 seconds
        setTimeout(deleteMessage, 3000);
    </script>
    </div> " ;
    return $notification ;
  }

}
?>