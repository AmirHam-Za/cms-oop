<!-- *************HEADER*********** -->
<?php include 'layout/header.php'; ?>
<!-- *************HEADER*********** -->
<?php
require '../../vendor/autoload.php';

use App\classes\Flash;
use App\classes\Footer;
use App\classes\Session;
Session::checkSession();
?>

<div class="flex flex-col">
  <div class="">
    <?php include 'layout/nav.php'; ?>
  </div>

  <div class="flex">
    <div class="">
      <?php include 'layout/sidebar.php'; ?>
    </div>

    <body class="bg-gray-100 min-h-screen">
      <main class="w-full p-2 ml-64 ">
        <div
          class="p-4 bg-gradient-to-r from-blue-100 via-red-100 to-green-100 rounded-md shadow-md border border-gray-300  justify-between">
          <div class="mx-48 mt-4 p-4 rounded-md shadow-md bg-gray-200 border border-gray-300  justify-between">

            <div class=" my-4 border-2 border-indigo-300 rounded-3xl p-2 inline">
              <a href="create_header_footer.php"
                class="border border-indigo-400 rounded-3xl text-gray-600 px-4 py-1 hover:bg-indigo-400 transition hover:text-gray-100">
                Create Footer</a>
            </div>

            <div class="">
              <!-- **********Show flash message from insert_data.php*********** -->
              <?php
              if (isset($_SESSION['flash_message'])) {
                echo Flash::success($_SESSION['flash_message']);
                unset($_SESSION['flash_message']);

              }
              ?>
              <div class="">
              </div>
            </div>

            <?php
            $footer = new Footer();
            $result = $footer->showFooter();
            if ($result->num_rows > 0): ?>
              <!-- echo '==================>'; -->

              <!-- *******************CONTENT DATA PART*************************** -->

              <table class="w-full mt-4 text-center rtl:text-right text-gray-500 rounded ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 ">
                  <tr>
                    <th scope="col" class="px-6 py-3">
                      Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Image
                    </th>

                    <th scope="col" class="px-6 py-3">
                      Action
                    </th>
                  </tr>
                </thead>
                <?php while ($row = $result->fetch_assoc()): ?>
                  <tbody>
                    <tr
                      class="p-4 bg-gradient-to-r from-blue-100 via-red-100 to-green-100 rounded-md shadow-md border border-gray-300   dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600 ">
                      <th scope="row"
                        class=" text-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex justify-center">
                        <span class="ml-2 mb-2 font-semibold  text-gray-600">
                          <?php echo $row["name"]; ?>
                        </span>
                      </th>
                      <td class="px-6 py-4">
                        <div class="w-16 h-16 flex justify-center">
                          <!-- <img src="<?php echo $row['logo_path'] ; ?>" alt=""> -->
                          <?php
                          echo "<img src='" . $row['logo_path'] . "' >";
                          ?>
                        </div>
                      </td>


                      <td class="px-6 py-4 text-right">
                        <!-- Edit User Button -->
                        <div class="flex gap-2 mt-4 justify-center">
                          <!-- Edit User Button -->
                          <a href="edit_header_footer.php?id=<?php echo $row['id']; ?>"
                            class=" h-8 border border-yellow-500 rounded-3xl text-gray-600 px-4 py-[6px] hover:bg-yellow-500 transition hover:text-gray-100">Edit
                            Footer</a>

                          <!-- OOP DELETE BUTTON -->

                          <?php
                          if (isset($_GET['del'])) {
                            $id = base64_decode($_GET['del']);
                            $delContent = $footer->delFooter($id);
                          }
                          ?>
                          <a class="ml-2 text-center border border-red-500 rounded-3xl text-gray-600 px-4 py-1 hover:bg-red-500 transition hover:text-gray-100"
                            href="?del=<?= base64_encode($row['id']) ?>"
                            onclick="return confirm('Are you sure to delete?')">Delete</a>
                        </div>
                      </td>
                    </tr>

                  </tbody>
                <?php endwhile; ?>
              <?php else: ?>
                <p>No data found</p>
              <?php endif; ?>

            </table>
          </div>
        </div>
  </div>
  <script>
    function showDetails(userId) {
      window.location.href = 'user_details.php?id=' + userId;
    }
  </script>
</div>
</div>
</main>

<?php




// $conn->close();

?>
</div>
</div>
</div>

</body>
<script src="dashboard/custom.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


</html>