<?php

require '../../vendor/autoload.php';
use App\classes\Navbar;
use App\classes\Session;
$nav = new Navbar();
$showNav = $nav->showNav();

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
}
?>
<body class="mt-16">
  <div class="nav bg-indigo-300 flex justify-between items-center fixed w-full top-0 ">
    <div class="w-full relative  backdrop-blur-md bg-black/30">
      <div class="w-full flex items-center justify-between">
        <div class=" ml-10">
          <?php
          if ($showNav->num_rows > 0) {
            $data = $showNav->fetch_assoc();
            ?>
            <a href="dashboard.php">
              <img class="rounded-full w-[60px] h-[60px] my-[2px]" src="<?php echo '' . $data['logo_path']; ?>" alt="LOGO">
            </a>

            <?php
          }
          ?>

        </div>
        <div class="flex">
          <?php

          $id = Session::get("id");
          $userlogin = Session::get("login");
          if ($userlogin == "true") {
            ?>

            <?php
            if (isset($_GET['action']) && $_GET['action'] == 'logout') {
              Session::destroy();
              header('Location: ../../');
              // exit();
            }
            ?>
            <div class="text-right font-bold mr-10 "><a
                class="border border-indigo-300 rounded-3xl text-gray-200 px-4 py-1 hover:bg-indigo-300 transition hover:text-gray-500"
                href="?action=logout">Logout</a>
            </div>
          <?php

          } else { ?>
            <div class="text-right font-bold mr-10 "><a
                class="border border-green-500 rounded-3xl text-gray-600 px-4 py-1 hover:bg-green-500 transition hover:text-gray-100"
                href="login.php">Login</a>
            </div>
            <div class="text-right font-bold mr-10 "><a
                class="border border-green-500 rounded-3xl text-gray-600 px-4 py-1 hover:bg-green-500 transition hover:text-gray-100"
                href="register.php">Registration</a>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</body>
<style>
  .nav {
    background-image: url("../../public/imgs/bgNav.png");
    background-color: #cccccc;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>