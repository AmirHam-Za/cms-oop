<?php
// include 'User.php';
include 'header.php';
include_once 'classes/Registers.php';

$reg = new Registers();
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $addUser = $reg->addUser($_POST);
    
}
?>



<div class="w-full flex flex-col  justify-center ">

<?php   
if(isset($addUser)){
    // echo $addUser ;
?>

<div class="p-4 min-h-screen flex flex-col justify-center items-center">
<div id="alert-1" class=" w-9/12  flex items-center justify-center self-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
  <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
  </svg>
  <span class="sr-only">Info</span>
  <div class="ms-3 text-sm font-medium">
    <?=$addUser?>
  </div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
  </button>
</div>

<?php
}
?>


<script>
  document.addEventListener('DOMContentLoaded', function () {
    const closeButton = document.querySelector('[data-dismiss-target="#alert-1"]');
    const alert = document.getElementById('alert-1');

    closeButton.addEventListener('click', function () {
      alert.style.display = 'none'; 
    });
  });
</script>


<!-- </div>
<form action="" method="POST">
<div class="">
    <label for="name">Name</label>
    <input type="text" id="name" name="name" >
</div>
<div class="">
    <label for="phone">Phone</label>
    <input type="text" id="phone" name="phone" >
</div>
<div class="">
    <label for="email">Email</label>
    <input type="email" id="email" name="email" >
</div>
<div class="">
    <label for="password">Password</label>
    <input type="password" id="password" name="password" >
</div>
<button type="submit">Submit</button>
</form> -->

<div class="w-full flex justify-center items-center min-h-screen w-full flex justify-center items-center h-full bg-gradient-to-r from-blue-200 via-red-300 to-green-200 ">
  <div class="bg-indigo-200 p-8 border border-gary-400 rounded-xl shadow-2xl">
    <h2 class="text-2xl text-gray-600 font-bold px-2 border-l-4 border-green-400 mb-8">Registration Form</h2>
    <form class="border border-gray-400 p-4 rounded-xl" method="post" action="">
      <label class="tet-gry-600 fontsemibold " for="name">Name:</label><br>
      <input class="h-8 rounded" type="text" name="name" id="name" required>
      <br>
      <label class="tet-gry-600 fontsemibold"for="phone">Phone:</label><br>
      <input class="h-8 rounded" type="text" name="phone" id="phone" required>
      <br>
      <label class="tet-gry-600 fontsemibold"for="email">Email:</label><br>
      <input class="h-8 rounded" type="email" name="email" id="email" required>
      <br>
      <label class="tet-gry-600 fontsemibold"for="password">Password:</label><br>
      <input class="h-8 rounded" type="password" name="password" id="password" required>
      <br>

      <div class=" p-4 mt-4 w-full ">
        <input
          class="w-full font-semibold hover:bg-gray-200 border border-indigo-300 rounded-3xl hover:text-gray-600 px-4 py-1 bg-indigo-300 transition text-gray-200"
          type="submit" value="Register">
      </div>
    </form>
    </form>
    <div class="mt-2 w-full text-end ">
      <a class="text-gray-600 hover:text-indigo-500" href="login.php">Back to login</a>
    </div>
  </div>
</div>
</div>

</html>