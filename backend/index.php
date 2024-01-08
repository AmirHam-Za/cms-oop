<?php
require_once '../vendor/autoload.php';
// session_start();
include '../Session.php';
Session::checkSession();
include 'layout/header.php';
// use Parents;
// use classes\Tag;
// use classes\Content;
// use classes\Category;
// include '../classes/Content.php';
// include '../classes/Category.php';
// include '../classes/Tag.php';
$cntnt = new classes\Content;
$cat = new classes\Category;
$tags = new classes\Tag;

$allCntnt = $cntnt->showContent();
?>
<div class="flex flex-col">
  <div class="">
    <?php include 'layout/nav.php'; ?>
  </div>

  <div class="flex">
    <div class="">
      <!-- **********SIDEBAR*********** -->
      <?php include 'layout/sidebar.php'; ?>
      <!-- **********SIDEBAR*********** -->
    </div>
    <div class="p-2 ml-64  w-full">

      <body class="bg-gray-200">

        <div
          class="p-4 mt-4 rounded-md shadow-md bg-gradient-to-r from-blue-100 via-red-100 to-green-100 border  border-gray-300">

          <div class="">
            <div class=" my-4 border-2 border-indigo-300 rounded-3xl p-2 inline">
              <a href="create.php"
                class="border border-blue-500 rounded-3xl text-gray-600 px-4 py-1 hover:bg-blue-500 transition hover:text-gray-100  text-center">
                Create New Content</a href="create.php">
            </div>
          </div>

          <div class="">
            <?php
            if (isset($_SESSION['flash_message'])) {
              echo Flash::success($_SESSION['flash_message']);
              unset($_SESSION['flash_message']);
            }
            ?>
            <div class="">
            </div>
          </div>
          <div class="w-full">
            <?php
            if ($allCntnt):
              ?>
              <!-- *******************CONTENT DATA TABLE*************************** -->
              <table class="w-full mt-4 text-left rtl:text-right text-gray-500 ">
                <thead class="text-center text-sm bg-indigo-200 rounded text-gray-700 uppercase  dark:bg-gray-700 ">
                  <tr>
                    <th scope="col" class="px-6 py-3">
                      Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Read Time
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Tag
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Action
                    </th>
                  </tr>
                </thead>
                <?php while ($row = $allCntnt->fetch_assoc()): ?>
                  <tbody>
                    <tr
                      class="bg-white bg-gradient-to-r from-blue-100 via-red-100 to-green-100 border  p-4 rounded-md shadow-md dark:bg-gray-800 border-b text-center border-indigo-400 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <span class="ml-2 mb-2 font-semibold  text-gray-600">
                          <?php echo $row["title"]; ?>
                        </span>
                      </td>
                      <td class="px-6 py-4">
                        <span class="ml-2 mb-2 font-semibold  text-gray-600">
                          <?php echo $row["read_time"]; ?><br>
                        </span>
                      </td>
                      <td class="px-6 py-4">
                        <span class="ml-2 mb-2 font-semibold   text-gray-600">
                          <?php echo $row["description"]; ?><br>
                        </span>
                      </td>
                      <td class="px-6 py-4">
                        <?php
                        // Query to fetch category details
                        // $categoryId = $row['category_id'];
                        // $sqlCategory = "SELECT name FROM categories WHERE id = $categoryId";
                        // $resultCategory = $conn->query($sqlCategory);
                        // $category = $resultCategory->fetch_assoc();
                    
                        // OOP
                        $categoryId = $row['category_id'];
                        $catByCatId = $cat->getCategoryById($categoryId);
                        $category = $catByCatId->fetch_assoc();
                        // echo '==================>'. $category['name'];
                    
                        // Display category
                        ?>
                        <span class="ml-2 mb-2 font-semibold  text-gray-600">
                          <?php echo $category['name']; ?><br>
                        </span>
                        <!-- echo "<p>Category: {$category['name']}</p>"; -->
                      </td>
                      <td class="px-6 py-4">
                        <?php
                        // Query to fetch tag details
                        // $tagId = $row['tag_id'];
                        // $sqlTag = "SELECT name FROM tags WHERE id = $tagId";
                        // $resultTag = $conn->query($sqlTag);
                        // $tag = $resultTag->fetch_assoc();
                    
                        // echo '==================>'. $tag['name'];
                    
                        // OOP
                        $tagId = $row['tag_id'];
                        $tagByTagId = $tags->getTagById($tagId);
                        $tag = $tagByTagId->fetch_assoc();
                        // $tag = mysqli_fetch_assoc($tagByTagId);
                    
                        // Display tag
                        ?>

                        <span class="ml-2 mb-2 font-semibold  text-gray-600">
                          <?php echo $tag['name']; ?><br>
                        </span>
                        <!-- echo "<p>Tag: {$tag['name']}</p>"; -->
                      </td>
                      <td class="">
                        <div class="w-16 h-16">
                          <img class="" src="<?php echo $row["image"]; ?>" alt="">
                        </div>
                      </td>
                      <td class="px-6 py-4 text-right">
                        <div class="">
                          <!-- EditUser Button -->
                          <button>
                            <a href="edit_user.php?id=<?php echo $row['id']; ?>"
                              class="ml-2 text-center border border-yellow-500 rounded-3xl text-gray-600 px-4 py-1 hover:bg-yellow-500 transition hover:text-gray-100 flex items-center mb-2">Edit
                            </a>
                          </button>

                          <!-- OOP DELETE BUTTON -->

                          <?php
                          if (isset($_GET['del'])) {
                            $id = base64_decode($_GET['del']);
                            $delContent = $cntnt->delContent($id);
                          }
                          ?>
                          <a class="ml-2 text-center border border-red-500 rounded-3xl text-gray-600 px-4 py-1 hover:bg-red-500 transition hover:text-gray-100"
                            href="?del=<?= base64_encode($row['id']) ?>"
                            onclick="return confirm('Are you sure to delete?')">Delete</a>

                          <!-- Delete Content Button -->

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
      </body>
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