<?php
require '../../vendor/autoload.php';

use App\classes\Flash;
use App\classes\Footer;
use App\classes\Session;
Session::checkSession();
?>
<?php


include 'layout/header.php';
// include 'db_connection.php';
?>
<div class="flex flex-col">
  <div class="">
    <?php include 'layout/nav.php'; ?>
  </div>
  <div class="flex">
    <div class="">
      <?php include 'layout/sidebar.php'; ?>
    </div>
    <div class="w-full p-2 ml-64">

      <body class="bg-gray-100">
        <!--*******************************************
            page's main contents 
            ********************************************** -->
        <?php
        ?>
        <div class="w-full">
          <?php
          if (isset($_SESSION['flash_message'])) {
            echo Flash::success($_SESSION['flash_message']);
            unset($_SESSION['flash_message']);

          }
          ?>
        </div>
        <div class="bg-gradient-to-r from-blue-100 via-red-100 to-green-100 p-4 rounded-md shadow-md">
          <div class=" mx-48 bg-gray-100 p-4 rounded-md shadow-md">
            <div class="mt-2  bg-indigo-200  rounded-md shadow-md mb-1 text-center">
              <h2 class="text-2xl font-bold text-center text-slate-500">Edit Footer</h2>
            </div>


            <?php
            $footer = new Footer();
            // $result = $footer->showFooter();
            if (isset($_GET['id'])) {
              $id = ($_GET['id']);
            }
            // echo $id ;
            
            // 3. get all requested form data and send it to the update method 
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $updateFooter = $footer->updateFooter($_POST, $_FILES, $id);
            }
            $getCategoryId = $footer->getFooterById($id);
            if ($getCategoryId != null) {
              while ($footerData = mysqli_fetch_assoc($getCategoryId)) {


                // }}
            
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="">
                    <div class="mb-4 bg-gray-200 rounded p-2">
                      <label class="block text-lg text-gray-600 font-bold mb-2 pl-2" for="name">Name:</label>
                      <input type="text" id="name" name="name" value="<?php echo $footerData['name']; ?>"
                        class="p-2 border rounded w-full" required>
                    </div>

                    <div class="mb-4 bg-gray-200 rounded p-2">
                      <label class="block text-lg text-gray-600 font-bold mb-2 pl-2" for="id">Id(hidden):</label>
                      <input type="number" id="id" name="id" value="<?php echo $footerData['id']; ?>"
                        class="p-2 border rounded w-full" readonly>
                    </div>

                    <div class="mb-4 bg-gray-200 rounded p-2">
                      <label class="block text-lg text-gray-600 font-bold mb-2 pl-2" for="current_logo_path">Current Logo
                        Path(hidden):</label>
                      <input type="text" name="current_logo_path" id="logo" accept="image/*"
                        value="<?php echo $footerData['logo_path']; ?>" class="p-2 border rounded w-full" required readonly>
                    </div>

                    <div class="mb-4 bg-gray-200 rounded p-2">
                      <label class="block text-lg text-gray-600 font-bold mb-2 pl-2" for="logo">Logo:</label>
                      <input type="file" name="logo_path" id="logo" accept="image/*" class="p-2 border rounded w-full">
                    </div>

                    <button type="submit"
                      class="border border-indigo-400 rounded-3xl text-gray-600 px-4 py-1 hover:bg-indigo-400 transition hover:text-gray-100">
                      Update
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <?php
              }
            }
            // $conn->close();
            ?>
    </div>
  </div>
</div>
</body>
<script src="dashboard/custom.js"></script>

</html>