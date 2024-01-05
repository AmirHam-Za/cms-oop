<?php include 'layout/header.php'; ?>

<?php
include '../Session.php';
Session::checkSession();
include '../classes/Tag.php';

// include '../classes/Message.php';
// Message::flash();
$category = new Tag();
$allCategory = $category->showTag();
?>


<div class="flex flex-col">
  <div class="">
    <?php include 'layout/nav.php'; ?>
  </div>

  <div class="flex">
    <div class="">
      <?php include 'layout/sidebar.php'; ?>
    </div>
    <main class="w-full p-2 ml-64">
      <div
        class="p-4 bg-gradient-to-r from-blue-100 via-red-100 to-green-100 rounded-md shadow-md border border-gray-300  justify-between">
        <div class="p-4 mx-48 rounded-md shadow-md bg-gray-200 border border-gray-300 justify-between mt-2 ">
          <?php
          ?>

          <body class="bg-gray-100">
            <div class="my-4 border-2 border-indigo-300 rounded-3xl p-2 inline">
              <a href="create_tag.php"
                class="border border-indigo-400 rounded-3xl text-gray-600 px-4 py-1 hover:bg-indigo-400 transition hover:text-gray-100">
                Create Tag</a>
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
            <div class="w-full mt-4">
              <?php
              // $sql = "SELECT * FROM categories";
              // $result = $conn->query($sql);
              
              if ($allCategory): ?>
                <!-- *******************CONTENT DATA PART*************************** -->
                <table class="w-full  text-center rtl:text-right text-gray-500 ">
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
                        class="bg-gradient-to-r from-blue-100 via-red-100 to-green-100 border border-gray-400 p-4 rounded-md shadow-md dark:hover:bg-gray-600 bg-white border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          <span class="ml-2 mb-2 font-semibold  text-gray-600">
                            <?php echo $row["name"]; ?>
                          </span>
                        </th>
                        <td class="px-6 py-4 text-right">

                          <!-- Edit User Button -->
                          <div class="flex gap-2 mt-4 justify-center flex-wrap">
                            <a href="edit_tag.php?id=<?php echo $row['id']; ?>"
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
                              $delCategory = $category->delTag($id);
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

              <div class="mb-4">

                <div class="mb-4">
                </div>
              </div>


              <!-- Details container -->
              <div id="details-container" class="hidden mt-4">
                <!-- Details will be shown here using JavaScript -->
              </div>
              <script>
                function showDetails(userId) {
                  // Redirect to user_details.php with the user ID
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
    
    ?>


  </div>
</div>
</div>
</body>
<script src="dashboard/custom.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


</html>