<?php include 'layout/header.php'; ?>

<?php

use classes\Comment;
include '../Session.php';
Session::checkSession();

include '../classes/Comment.php';

// include '../classes/Message.php';
// Message::flash();
// Message::Success();

if (isset($_SESSION['flash_message'])) {
  echo Flash::success($_SESSION['flash_message']);
  unset($_SESSION['flash_message']);

}


$comment = new Comment();
$allComment = $comment->showAllComments();
?>
<div class="flex flex-col">
  <div class="">
    <?php include 'layout/nav.php'; ?>
  </div>

  <div class="flex">
    <div class="">
      <?php include 'layout/sidebar.php'; ?>
    </div>
    <main class="p-2 ml-64">
      <div
        class="bg-gradient-to-r from-blue-100 via-red-100 to-green-100 border border-gray-400 p-4 rounded-md shadow-md">
        <div class="">

          <body class="bg-gray-100 ">

            <div class="mt-2  bg-indigo-200  rounded-md shadow-md mb-1 text-center">
              <a href="#" class="text-2xl font-bold text-center text-slate-500">
                All Comments
              </a>
            </div>
            <div class="">
              <div class="">
              </div>
            </div>
            <div class="w-full">
              <?php

              if ($allComment->fetch_assoc() > 0): ?>


                <!-- *********CONTENT DATA PART*********** -->
                <table class="w-full  text-left rtl:text-right text-gray-500 ">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 ">
                    <tr>
                      <th scope="col" class="px-6 py-3">
                        Name
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Comment
                      </th>

                      <th scope="col" class="px-6 py-3">
                        Action
                      </th>
                    </tr>
                  </thead>
                  <?php while ($row = $allComment->fetch_assoc()): ?>
                    <tbody>
                      <tr
                        class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600 bg-gradient-to-r from-blue-100 via-red-100 to-green-100 border border-gray-400 p-4 rounded-md shadow-md">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                          <span class="ml-2 mb-2 font-semibold  text-gray-600">
                            <?php echo $row["name"]; ?>
                          </span>
                        </td>
                        <td class="px-6 py-4">
                          <span class="ml-2 mb-2 font-semibold  text-gray-600">
                            <?php echo $row["comment"]; ?><br>
                          </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                          <!-- Edit User Button -->
                          <div class="flex gap-2 mt-4">
                            <a href="edit_comment.php?id=<?php echo $row['id']; ?>"
                              class=" h-8 border border-yellow-500 rounded-3xl text-gray-600 px-4 py-[6px] hover:bg-yellow-500 transition hover:text-gray-100">Edit
                            </a>
                            <!-- Delete Content Button -->
                            <!-- <button onclick="deleteCommentJs(<?php echo $row['id']; ?>)"
                              class=" h-8 border border-red-400 rounded-3xl text-gray-600 px-4 hover:bg-red-400 transition hover:text-gray-100">Delete
                            </button> -->

                            <!-- OOP DELETE BUTTON -->

                            <?php
                            if (isset($_GET['del'])) {
                              $id = base64_decode($_GET['del']);
                              $delContent = $comment->delComment($id);
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
  </div>
  <script>
    function showDetails(commentId) {
      // Redirect to user_details.php with the user ID
      window.location.href = 'user_details.php?id=' + commentId;
    }


  </script>
</div>


</main>
</body>
</div>
</div>
</div>
<div class=" h-8">
  <!-- **********FOOTER*********** -->
  <!-- <?php include 'layout/footer_part_backend.php'; ?> -->
  <!-- **********FOOTER*********** -->
</div>
</body>
<script src="dashboard/custom.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


</html>