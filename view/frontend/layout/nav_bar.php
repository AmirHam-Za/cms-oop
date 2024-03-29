<?php
require '../../vendor/autoload.php';

use App\classes\Navbar;
$nav = new Navbar();
$showNav = $nav->showNav();

if ($showNav->num_rows > 0) {
  $data = $showNav->fetch_assoc();

  ?>
  <div>
    <nav class=" nav bg-indigo-300 py-1 h-16 flex justify-between items-center fixed w-full top-0 ">
      <div class="w-full p-2  backdrop-blur-md bg-black/30">

        <div class="container mx-auto flex items-center justify-between ">

          <div class="ml-10">

            <a href="index.php">
              <?php echo '<img class="w-[60px] h-[60px] rounded-xl" src="../backend/' . $data['logo_path'] . '" alt="Logo">'; ?>
            </a>
            <?php

            ?>
          </div>


          <div class="navMenu ml-10 w-2/3">
           <div class="w-full flex justify-center gap-4">
            <a href="pages/home.php" class="text-xl text-gray-200 hover:text-orange-400 font-semibold transition ">Home</a>
            <a href="pages/about.php" class="text-xl text-gray-200 hover:text-orange-400 font-semibold transition ">About</a>
            <a href="pages/contact.php" class="text-xl text-gray-200 hover:text-orange-400 font-semibold transition ">Contact</a>
           </div>

          </div>
          <div class="text-right font-bold mr-10 flex gap-4">

            <div class="">
              <a class="border border-indigo-300 rounded-3xl text-gray-200 px-4 py-1 hover:bg-indigo-300 transition hover:text-gray-500"
                href="../auth/login.php">Login
              </a>
            </div>
            <div class="">
              <a class="border border-indigo-300 rounded-3xl text-gray-200 px-4 py-1 hover:bg-indigo-300 transition hover:text-gray-500"
                href="../auth/register.php">Sign Up
              </a>
            </div>

          </div>

        </div>
      </div>
    </nav>

  </div>


  <?php
  // Display the data
  // echo '<h1>' . $row['name'] . '</h1>';
} else {
  // echo "No data found in header_footer table.";
}

?>

<style>
  .nav {
    background-image: url("../../public/imgs/bgNav.png");
    background-color: #cccccc;
    /* height: 500px;  */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;

  }
</style>