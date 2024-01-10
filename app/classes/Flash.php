<?php
namespace App\classes;
include_once "Parents.php";
class Flash
{

	public $flash;
	// public $msg;
	public function __construct()
	{
		$this->flash = new Flash();

	}
	private static function script()
	{
		$scripts = "<script>
        function deleteMessage() {
         var messageDiv = document.getElementById('myMessage');
         if (messageDiv) {
             messageDiv.style.display = 'none';
         }
     }
 
     // Set a timeout to call the deleteMessage function after 3 seconds
     setTimeout(deleteMessage, 3000);
    </script>";
		echo $scripts;
		return $scripts;
	}
	public static function success($msg)
	{
		$notification = "<div id=\"myMessage\"  class='animate__slow animate__animated  animate__rubberBand  absolute top-16 left-2/4   mb-4  bg-green-100  px-4  text-lg  text-gray-600 rounded border-b-4 border-t-4 border-green-400  '>$msg</div> ";
		self::script();
		// echo $msg ;
		return $notification;
	}


	public static function error($msg)
	{
		$notification = "<div id=\"myMessage\"  class='animate__slow animate__animated  animate__rubberBand absolute mb-4 bg-red-100  px-4   left-2/4 text-lg text-gray-600 rounded border-b-4 border-t-4 border-red-400 '> $msg</div> ";
		self::script();
		return $notification;
	}
	public static function warning($msg)
	{
		$notification = "<div id=\"myMessage\"  class='animate__slow animate__animated  animate__rubberBand  absolute top-16 left-2/4   mb-4  bg-yellow-100  px-4  text-lg  text-gray-600 rounded border-b-4 border-t-4 border-yellow-400 '> $msg</div> ";
		self::script();
		return $notification;
	}
	public static function other($msg)
	{
		$notification = "<div id=\"myMessage\"  class='animate__slow animate__animated  animate__rubberBand  absolute top-16 left-2/4   mb-4  bg-yellow-100  px-4  text-lg  text-gray-600 rounded border-b-4 border-t-4 border-yellow-400 '> $msg</div> ";
		self::script();
		return $notification;




		// if (isset($_SESSION['flash_message'])) {
		//   echo '<div id="flashMessage" class="flash-message absolute top-4 right-6 px-16 bg-gray-100  text-center rounded border-l-8  border-green-500 z-10 h-12 flex items-center animate__animated animate__tada  animate__slow"><p class=" font-bold text-green-500">' . $_SESSION['flash_message'] . '</p></div>';

		//   unset($_SESSION['flash_message']);
		//   echo '<script>
		//     setTimeout(function() {
		//         document.getElementById("flashMessage").style.display = "none";
		//     }, 2500);
		// </script>';
	}
}
?>