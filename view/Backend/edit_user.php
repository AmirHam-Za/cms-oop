<?php
require '../../vendor/autoload.php';

use App\classes\Tag;
use App\classes\Category;
use App\classes\Content;
use App\classes\Session;

Session::checkSession();


?>
<?php include 'layout/header.php'; ?>


<div class="flex flex-col">
  <div class="">
    <?php include 'layout/nav.php'; ?>
  </div>

  <div class="flex">
    <div class="">
      <?php include 'layout/sidebar.php'; ?>
    </div>
    <div class="w-full p-2 ml-64">

      <div class="bg-gray-100">
        <!-- *********************************************
    page's main contents 
    ********************************************** -->
        <?php
        // include '../classes/Content.php';
        $content = new Content();

        //1. get id in url sent from create.php edit button
        if (isset($_GET['id'])) {
          $id = ($_GET['id']);
        }
        // echo $id ;
        // 3. get all requested form data and send it to the update method 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $contentData = $content->updateContent($_POST, $_FILES, $id);
        }
        // echo $contentData;
        ?>
        <div
          class="mx-auto bg-gradient-to-r from-blue-100 via-red-100 to-green-100 border border-gray-400 p-4 rounded-md shadow-md">

          <div class="mx-20 bg-gray-50 p-2 rounded">
            <?php
            //2. function make query to catch all data by the gotten id and show it in the form
            $getContent = $content->getContentById($id);
            if ($getContent != null) {
              while ($contentDetail = mysqli_fetch_assoc($getContent)) {
                ?>
                <div class="m-2 bg-indigo-200  rounded-md shadow-md text-center">
                  <h2 class="text-2xl font-bold text-center  text-slate-500">Edit Content</h2>
                </div>
                <div class="mx-auto  p-4 rounded-md shadow mt-3">
                  <form action="" method="post" enctype="multipart/form-data">
                    <div
                      class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600 bg-gradient-to-r from-blue-100 via-red-100 to-green-100 border border-gray-400 p-4 rounded-md shadow-md">
                      <div class="flex w-full justify-start gap-4">
                        <div class="w-1/2 mb-4  rounded p-2">
                          <label class="block  text-gray-600 font-semibold mb-1 pl-2" for="id">ID(hidden)</label>
                          <input class="h-8 rounded" type="text" id="id" name="id"
                            value="<?php echo $contentDetail['id']; ?>" class="p-2 border rounded w-full">
                        </div>

                        <div class="w-1/2 mb-4  rounded p-2">
                          <label class="block  text-gray-600 font-semibold mb-1 pl-2" for="currentLogo">Current logo
                            path(hidden)</label>
                          <input class="h-8 rounded" type="text" id="currentLogo" name="current_logo_path"
                            value="<?php echo $contentDetail['image']; ?>" readonly class="p-2 border rounded w-full">
                        </div>
                      </div>

                      <div class="flex w-full justify-start gap-4">
                        <div class="w-1/2 mb-4  rounded p-2">
                          <label class="block  text-gray-600 font-semibold mb-1 pl-2" for="title">Title:</label>
                          <input class="h-8 rounded" type="text" id="title" name="title"
                            value="<?php echo $contentDetail['title']; ?>" class="p-2 border rounded w-full" required>
                        </div>
                        <div class="w-1/2 mb-4  rounded p-2">
                          <label class="block  text-gray-600 font-semibold mb-1 pl-2" for="readTime">Reading Time:</label>
                          <input class="h-8 rounded" type="number" id="readTime" name="read_time"
                            value="<?php echo $contentDetail['read_time']; ?>" class="p-2 border rounded w-full" required>
                        </div>
                      </div>

                      <div class="mb-4  rounded p-2">
                        <label class="block  text-gray-600 font-semibold mb-1 pl-2" for="img">Image:</label>
                        <input class="h-8" type="file" id="img" name="image" accept="image/*"
                          class="p-2 border rounded w-full">
                      </div>



                      <div class="mb-4  rounded p-2">
                        <label class="block  text-gray-600 font-semibold mb-1 pl-2" for="description">Description:</label>
                        <textarea class="w-full rounded" name="description" id="description" cols="30" rows="1"
                          value=""><?php echo $contentDetail['description']; ?></textarea>
                      </div>

                      <div class="flex w-full justify-start gap-4">
                        <div class="relative z-0 w-full mb-5 group bg-white rounded p-2 flex gap-1 flex-wrap">
                          <div class="">
                            <!--************  Fetch tag from the "categories" table*********************-->
                            <?php
                            // include 'db_connection.php';
                            // $sqlCategories = "SELECT id, name FROM categories";
                            // $resultCategories = $conn->query($sqlCategories);
                            $category = new Category();
                            $resultCategories = $category->getCategoryIdName();
                            ?>

                            <!--************ Select Option for category table*********************-->
                            <label class="block  text-gray-600 font-semibold mb-1 pl-2" for="selectCategory">Select
                              Category:</label>
                            <select class=" p-2 border rounded w-full" id="selectCategory"
                              onchange="displaySelectedCategory()">
                              <option value="">Select Category</option>
                              <?php while ($category = $resultCategories->fetch_assoc()): ?>
                                <option value="<?php echo $category['id']; ?>">
                                  <?php echo $category['name']; ?>
                                </option>
                              <?php endwhile; ?>
                            </select>
                          </div>
                          <div class="">
                            <!--************ textarea Field to Display Selected Category*********************-->
                            <div class="">
                              <label class="block  text-gray-600 font-semibold mb-1 pl-2" for="selectedCategory">Selected
                                Category:</label>
                              <input class=" p-2 border rounded w-full" name="category_id" type="text"
                                id="selectedCategory" value="<?php echo $contentDetail['category_id']; ?>" readonly>
                            </div>
                            <!--************ JS function for Category selection*********************-->
                            <script>
                              function displaySelectedCategory() {
                                var selectedCategoryId = document.getElementById('selectCategory').value;

                                document.getElementById('selectedCategory').value = selectedCategoryId;
                              }
                            </script>
                          </div>
                        </div>
                        <!-- ############ -->

                        <div class="relative z-0 w-full mb-5 group bg-white rounded p-2 flex gap-1 flex-wrap">
                          <div class="">
                            <!--************  Fetch tag from the "tags" table*********************-->
                            <?php
                            // $sqlTags = "SELECT id, name FROM tags";
                            // $resultTags = $conn->query($sqlTags);
                            $tag = new Tag();
                            $resultTags = $tag->getTagIdName();
                            ?>

                            <!--************ Select Option for tag table*********************-->
                            <label class="block  text-gray-600 font-semibold mb-1 pl-2" for="selectTag">Select Tag:</label>
                            <select class="p-2 border rounded w-full" id="selectTag" onchange="displaySelectedTag()">
                              <option value="">Select Tag</option>
                              <?php while ($tag = $resultTags->fetch_assoc()): ?>
                                <option value="<?php echo $tag['id']; ?>">
                                  <?php echo $tag['name']; ?>
                                </option>
                              <?php endwhile; ?>
                            </select>
                          </div>
                          <!--************ Input Field to Display Selected Category*********************-->
                          <div class="">
                            <label class="block  text-gray-600 font-semibold mb-1 pl-2" for="selectedTag">Selected
                              Tag:</label>
                            <input class=" p-2 border rounded w-full" name="tag_id" type="text" id="selectedTag"
                              value="<?php echo $contentDetail['tag_id']; ?>" readonly>

                            <!--************ JS function for Category selection*********************-->

                            <script>
                              function displaySelectedTag() {
                                var selectedTagId = document.getElementById('selectTag').value;
                                document.getElementById('selectedTag').value = selectedTagId;
                              }
                            </script>
                          </div>
                        </div>

                      </div>

                      <button type="submit"
                        class="border border-indigo-400 rounded-3xl text-gray-600 px-4 py-1 hover:bg-indigo-400 transition hover:text-gray-100">Update</button>
                    </div>
                  </form>
                </div>
                <?php
              }
            }
            ?>
          </div>
        </div>
        <?php

        // $conn->close();
        ?>
      </div>
    </div>
  </div>
</div>
<script src="dashboard/custom.js"></script>

</html>