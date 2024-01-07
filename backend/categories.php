<?php include 'layout/header.php'; ?>
<?php
include '../Session.php';
Session::checkSession();
include '../classes/Category.php';

// include '../classes/Message.php';
// Message::flash();
$category = new Category();
$allCategory = $category->showCategory();

?>
<div class="flex flex-col">
  <div class="">
    <?php include 'layout/nav.php'; ?>
  </div>

  <div class="flex w-full">
    <div class="">
      <?php include 'layout/sidebar.php'; ?>
    </div>
    <main class="w-full p-2 ml-64">
      <div
        class=" p-4 bg-gradient-to-r from-blue-100 via-red-100 to-green-100 rounded-md shadow-md border border-gray-300 justify-between mt-2 ">

        <!-- **********Show flash message*********** -->
        <?php
        // Custom Flash message work properly
        if (isset($_SESSION['flash_message'])) {
          echo Flash::success($_SESSION['flash_message']);
          unset($_SESSION['flash_message']);
        }

        ?>
        <div class="mx-48 p-4 bg-gray-200 rounded-md shadow-md border border-gray-300 justify-between mt-2 ">
          <?php
          ?>

          <body class="bg-gray-100">

            <div class="my-4 border-2 border-indigo-300 rounded-3xl p-2 inline">
              <a href="create_category.php"
                class="border border-indigo-400 rounded-3xl font-semibold text-gray-600 px-4 py-1 hover:bg-indigo-400 transition hover:text-gray-100">
                Create Categoty</a>
            </div>
            <div class="">
              <div class="">
              </div>
            </div>
            <div class="w-full">

              <!-- *******************CONTENT DATA PART*************************** -->
              <?php
              if ($allCategory): ?>
                <table class="w-full mt-4 text-center rtl:text-right text-gray-500 ">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 ">
                    <tr>
                      <th scope="col" class="px-6 py-3">
                        Name
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Action
                      </th>
                    </tr>
                  </thead>
                  <?php while ($row = $allCategory->fetch_assoc()): ?>
                    <tbody>
                      <tr
                        class=" bg-gradient-to-r from-blue-100 via-red-100 to-green-100 border border-gray-400 p-4 rounded-md shadow-md dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          <span class="ml-2 mb-2 font-semibold  text-gray-600">
                            <?php echo $row["name"]; ?>
                          </span>
                        </th>
                        <td class="px-6 py-4 text-right">

                          <!-- Edit User Button -->
                          <div class="flex justify-center">
                            <div class="flex gap-2 mt-4">
                              <a href="edit_category.php?id=<?php echo $row['id']; ?>"
                                class=" h-8 border border-yellow-500 rounded-3xl text-gray-600 px-4 py-[6px] hover:bg-yellow-500 transition hover:text-gray-100">Edit
                              </a>
                              <!-- Delete Content Button -->
                              <!-- <button onclick="deleteCategoryJs(<?php echo $row['id']; ?>)"
                                  class=" h-8 border border-red-400 rounded-3xl text-gray-600 px-4 hover:bg-red-400 transition hover:text-gray-100">Delete
                                  </button> -->

                              <!-- OOP DELETE BUTTON -->

                              <?php
                              if (isset($_GET['del'])) {
                                $id = base64_decode($_GET['del']);
                                $delCategory = $category->delCategory($id);
                              }
                              ?>
                              <a class="ml-2 text-center border border-red-500 rounded-3xl text-gray-600 px-4 py-1 hover:bg-red-500 transition hover:text-gray-100"
                                href="?del=<?= base64_encode($row['id']) ?>"
                                onclick="return confirm('Are you sure to delete?')">Delete</a>
                            </div>
                          </div>

                        </td>
                      </tr>

                    </tbody>
                  <?php endwhile; ?>
                <?php else: ?>
                  <p>No data found</p>
                <?php endif; ?>

              </table>
              <div class="">
                <div class="mb-4">
                  <div class="mb-4">
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
    </body>
    <?php
    // Close the connection
    // $conn->close();
    // ob_end_flush();
    ?>
  </div>
</div>
</div>
</body>
<script src="dashboard/custom.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</html>