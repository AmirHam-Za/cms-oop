<?php
// session_start();
// if (!isset($_SESSION['user_id'])) {
//   header('Location: ../login.php');
//   exit();
// }
use classes\Tag;
use classes\Content;
use classes\Category;
include '../Session.php';
include '../classes/Content.php';
include '../classes/Category.php';
include '../classes/Tag.php';
Session::checkSession();
?>
<?php include 'layout/header.php'; ?>


<body>
  <div class="flex flex-col">
    <div class="">
      <?php include 'layout/nav.php'; ?>
    </div>

    <div class="flex">
      <div class="">
        <?php include 'layout/sidebar.php'; ?>
      </div>
      <div class="p-2 ml-64 w-full">
        <?php
        // OOP
        
        $content = new Content();

        // $test = $content->test();
// echo $test;
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $contentData = $content->addContent($_POST, $_FILES);
        }



        // include 'db_connection.php';
        ?>

        <body class="bg-gray-100">
          <!-- *****************BODY CONTENT AREA********************** -->
          <div class="bg-gradient-to-r from-blue-100 via-red-100 to-green-100 p-4 rounded-md shadow-md">
            <div class=" mx-48 bg-gray-100 p-4 rounded-md shadow-md">
              <div class="mt-2  bg-indigo-200  rounded-md shadow-md mb-1 text-center">
                <h2 class="text-2xl font-bold text-center text-slate-500">Create New Content</h2>
              </div>

              <div class="mx-auto bg-gray-200 p-4 rounded-md shadow mt-3">
                <!-- Create User Form -->

                <form action="" method="POST" enctype="multipart/form-data">
                  <div
                    class="my-1 dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600 bg-gradient-to-r from-blue-100 via-red-100 to-green-100 border border-gray-400 p-4 rounded-md shadow-md flex w-full justify-start gap-4">

                    <div class="">
                      <label class="text-gray-600 text-sm font-semibold" for="title">Title:</label><br>
                      <input class="h-8 rounded mb-2" type="text" name="title" id="title"><br>
                    </div>

                    <div class="">
                      <label class="text-gray-600 text-sm font-semibold" for="read_time">Read Time:</label><br>
                      <input class="h-8 rounded mb-2" type="text" name="read_time" id="read_time"><br>
                    </div>

                  </div>

                  <div
                    class=" dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600 bg-gradient-to-r from-blue-100 via-red-100 to-green-100 border border-gray-400 p-4 rounded-md shadow-md">
                    <label class="text-gray-600 text-sm font-semibold" for="description">Description:</label><br>
                    <textarea class="w-full rounded" name="description" id="description" cols="30" rows="1"></textarea>
                    <!-- <input class="h-8 rounded mb-2" type="text" name="description" id="description" ><br> -->
                  </div>



                  <div
                    class="mt-4  bg-gradient-to-r from-blue-100 via-red-100 to-green-100 border border-gray-400 p-4 rounded-md shadow-md">
                    <label class="text-gray-600 text-sm font-semibold" for="image">Image:</label><br>
                    <div class=" w-full px-2 my-2 rounded">
                      <input class="h-8 rounded my-2" type="file" name="image" id="image"><br>
                    </div>
                  </div>

                  <div
                    class="flex w-full my-1 justify-start gap-4 border border-gray-400 p-4 rounded-md shadow-md bg-gradient-to-r from-blue-100 via-red-100 to-green-100">
                    <div class="relative z-0 w-full mb-5 group  rounded p-2 flex gap-1 flex-wrap">
                      <div class="">
                        <!--************  Fetch tag from the "categories" table*********************-->
                        <?php
                        $category = new Category();
                        $resultCategories = $category->CategoryForSelect();

                        // $sqlCategories = "SELECT id, name FROM categories";
                        // $resultCategories = $conn->query($sqlCategories);
                        ?>

                        <!--************ Select Option for category table*********************-->
                        <label class="text-gray-600 text-sm font-semibold" for="selectCategory">Select
                          Category:</label><br>
                        <select class="h-8 rounded" id="selectCategory" onchange="displaySelectedCategory()">
                          <option class="h-8 rounded mb-2" value="">Select Category</option>
                          <?php while ($category = $resultCategories->fetch_assoc()): ?>
                            <option class="h-8 rounded mb-2" value="<?php echo $category['id']; ?>">
                              <?php echo $category['name']; ?>
                            </option>
                          <?php endwhile; ?>
                        </select>
                      </div>

                      <div class="">
                        <!--************ Input Field to Display Selected Category*********************-->
                        <div>
                          <label class="text-gray-600 text-sm font-semibold" for="selectedCategory">Selected
                            Category:</label><br>
                          <input class="h-8 rounded mb-2" type="text" name="category_id" id="selectedCategory"
                            readonly><br>
                        </div>
                        <!--************ JS function for Category selection*********************-->
                        <script>
                          function displaySelectedCategory() {
                            // Get the selected category ID
                            var selectedCategoryId = document.getElementById('selectCategory').value;

                            // Display the selected category name in the input field
                            document.getElementById('selectedCategory').value = selectedCategoryId;
                          }
                        </script>
                      </div>
                    </div>


                    <div class="relative z-0 w-full mb-5 group  rounded p-2 flex gap-1 flex-wrap">

                      <div class="">
                        <!--************  Fetch tag from the "tags" table*********************-->
                        <?php
                        $tag = new Tag();
                        $resultTags = $tag->tagForSelect();
                        ?>

                        <!--************ Select Option for tag table*********************-->
                        <label class="text-gray-600 text-sm font-semibold" for="selectTag">Select
                          Tag:</label><br>
                        <select class="h-8 rounded" id="selectTag" onchange="displaySelectedTag()">
                          <option class="h-8 rounded mb-2" value="">Select Tag</option>
                          <?php while ($tag = $resultTags->fetch_assoc()): ?>
                            <option class="h-8 rounded mb-2" value="<?php echo $tag['id']; ?>">
                              <?php echo $tag['name']; ?>
                            </option>
                          <?php endwhile; ?>
                        </select>
                      </div>
                      <div class="">

                        <!--************ Input Field to Display Selected Category*********************-->
                        <div>
                          <label class="text-gray-600 text-sm font-semibold" for="selectedTag">Selected
                            Tag:</label><br>
                          <input class="h-8 rounded mb-2" type="text" name="tag_id" id="selectedTag" readonly><br>

                        </div>
                        <!--************ JS function for Category selection*********************-->

                        <script>
                          function displaySelectedTag() {
                            // Get the selected tag ID
                            var selectedTagId = document.getElementById('selectTag').value;

                            // Display the selected tag name in the input field
                            document.getElementById('selectedTag').value = selectedTagId;
                          }
                        </script>
                      </div>
                    </div>

                  </div>

                  <button type="submit" name="user" value="Submit"
                    class="border border-indigo-400 rounded-3xl text-gray-600 px-4 py-1 hover:bg-indigo-400 transition hover:text-gray-100">
                    Create
                  </button>
                </form>
              </div>
            </div>

          </div>

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

</html>