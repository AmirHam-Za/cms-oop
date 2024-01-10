<?php

require '../../vendor/autoload.php';
use App\classes\Session;

use App\classes\Comment;
$comment = new Comment();
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

      <?php
      ?>

      <body class="bg-gray-100">
    <!--*******************************************
    page's main contents 
    ********************************************** -->
        <div
          class=" p-4 bg-gradient-to-r from-blue-100 via-red-100 to-green-100 rounded-md shadow-md border border-gray-300 justify-between mt-2 ">
          <div class="mx-48 border border-gray-400 p-4 rounded-md shadow-md">
            <div class=" mt-2  bg-indigo-200  rounded-md shadow-md mb-1 text-center">
              <h2 class="text-3xl font-bold mb-4 text-center text-gray-600">Edit Commennt</h2>
            </div>


            <?php
            if (isset($_GET['id'])) {
              $id = ($_GET['id']);
            }
            // echo $id ;
            
            // 3. get all requested form data and send it to the update method 
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              $updateComment = $comment->updateComment($_POST, $id);
            }
            $getCommentId = $comment->getCommentId($id);
            // echo '=====================>'. $getCommentId;
            if ($getCommentId != null) {
              while ($commentData = mysqli_fetch_assoc($getCommentId)) {




                ?>
                <form method="post">
                  <div class="">
                    <div class="mb-4 bg-gray-200 rounded p-2">
                      <label class="block text-lg text-gray-600 font-bold mb-2 pl-2" for="postId">Post
                        Id:</label>
                      <input type="text" id="postId" name="post_id" value="<?php echo $commentData['post_id']; ?>"
                        class="p-2 border rounded w-full" required>
                    </div>

                    <div class="mb-4 bg-gray-200 rounded p-2">
                      <label class="block text-lg text-gray-600 font-bold mb-2 pl-2" for="name">Name:</label>
                      <input type="text" id="name" name="name" value="<?php echo $commentData['name']; ?>"
                        class="p-2 border rounded w-full" required>
                    </div>

                    <div class="mb-4 bg-gray-200 rounded p-2">
                      <label class="block text-lg text-gray-600 font-bold mb-2 pl-2" for="comment">Comment:</label>
                      <input type="text" id="comment" name="comment" value="<?php echo $commentData['comment']; ?>"
                        class="p-2 border rounded w-full" required>
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

                // $conn->close();
            
              }
            }
            ?>
    </div>
  </div>
</div>
</body>
<script src="dashboard/custom.js"></script>

</html>