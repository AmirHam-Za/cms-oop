<!-- **************HEADER*************** -->
<?php include_once '../frontend/layout/head.php'; ?>
<!-- **************HEADER*************** -->

<?php
require '../../vendor/autoload.php';
use App\classes\Session;
Session::loginCheck();
$lgn = new App\auth\AdminLogin();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    
    $chkLogin = $lgn->LoginUser($email, $password);
}
?>
<?php
if(isset( $usrLogin)){
    echo $usrLogin;
}
?>

<!-- checkLogin -->
<?php
if(isset($chkLogin)){

?>
  <div class="ms-3 text-sm font-medium">
    <?=$chkLogin ?>
  </div>
<?php } ?>




<body>

  <div class="w-full min-h-screen flex justify-center items-center  flex justify-center items-center h-full bg-gradient-to-r from-blue-200 via-red-300 to-green-200 ">
    <div class="bg-indigo-200 p-8 border border-gary-400 rounded-xl shadow-2xl">
      <div class="my-2">
      </div>
      <h2 class="text-2xl text-gray-600 font-bold px-2 border-l-4 border-green-500 mb-8">Login Form </h2>
      <form class="border border-gray-400 p-4 rounded-xl" method="post" action="">
        <label class="tet-gry-600 font-semibold " for="email">Email:<span class="italic text-gray-500">&nbsp;admin@gmail.com</span></label><br>
        <input class="h-8 rounded" type="email" name="email" required>
        <br>
        <label class="tet-gry-600 font-semibold"  for=" password">Password:<span class="italic text-gray-500">&nbsp;@admin123</span></label><br>
        <input class="h-8 rounded" type="password" name="password" required>
        <br>

        <div class=" p-4 mt-4 w-full ">
          <input
            class="w-full font-semibold hover:bg-gray-200 border border-indigo-300 rounded-3xl hover:text-gray-600 px-4 py-1 bg-indigo-300 transition text-gray-200  "
            type="submit" value="Login">
        </div>
    
      <div class="mt-2 w-full text-end ">
        <a class="text-gray-600 hover:text-indigo-500" href="register.php">Register Now</a>
      </div>
      </form>



      <?php if (isset($_SESSION['flash_message'])) {
        echo "<div id='myMessage'  class='animate__slow animate__animated  animate__rubberBand  absolute top-16 left-1/3   mb-4  bg-red-100  px-4  text-lg  text-gray-600 rounded border-b-4 border-t-4 border-red-400  '>Invalid username or password!</div>";

        unset($_SESSION['flash_message']);
        echo '<script>
                setTimeout(function() {
                    document.getElementById("flashMessage").style.display = "none";
                }, 2500);
            </script>';
      }
      ?>

      
    </div>
  </div>
</body>

</html>