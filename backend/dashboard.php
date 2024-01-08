<?php
include '../Session.php';
Session::checkSession();

?>
<?php

use classes\Tag;
use classes\Comment;
use classes\Content;
use classes\Category;
include 'layout/header.php';
?>
<div class="flex flex-col">
  <div class="">
    <?php
    include 'layout/nav.php';
    ?>
  </div>

  <div class="flex w-100%   ">
    <div class="">
      <?php include 'layout/sidebar.php'; ?>
    </div>
    <!-- DASHBOARD CONTENT START -->

    <div class="ml-64 w-10/12  mr-2 my-2  border border-indigo-400 rounded bg-gradient-to-r from-blue-100 via-red-100 to-green-100 min-h-[446px]  xl:min-h-[546px] 2xl:min-h-[858px]">
      



      <div
        class="mx-48 border mt-4 ">

        <div class="mb-2 ">
        <div class="mx-48 bg-indigo-200  rounded-md shadow-md text-center">
        <h1 class="text-2xl py-2 font-bold text-center  text-slate-500">
          Welcome to CMS Dashboard
        </h1>
        </div>
      </div>

        <div class="mb-2 ">
        <div class="flex justify-center">
        <h1 id="live-time" class="text-2xl py-2 font-bold text-center  text-red-600 bg-gray-800 px-2 rounded inline-block border-x-4 border-red-600 font-mono font-">
          
        </h1>
        <script>
            function updateLiveTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('live-time').textContent = `${hours}:${minutes}:${seconds}`;
          }

          setInterval(updateLiveTime, 1000);
          updateLiveTime(); // Initial call to display time immediately

          </script>
        </div>
      </div>

       <div class="flex justify-center gap-4">
         <!-- ************************** -->
         <div
          class="w-48 my-4 bg-blue-300  rounded-xl flex  justify-center border-y-8 border-gray-400 bg-gradient-to-t from-indigo-300 via-blue-300 to-purple-200 2xl:w-64">
          <div class=" ">
            <div class="rounded-full  mt-2 flex justify-center items-center">
              <div class="w-20 h-20 border rounded-full flex justify-center items-center">
                <p class="text-3xl text-gray-600 font-semibold py-2 px-4">
                  <?php
                  include '../classes/Content.php';
                  $content = new Content();
                  $contentCount = $content->contentCount();
                  if ($row = $contentCount->fetch_assoc()) {
                    echo $row['count'];
                  }
                  ?>
                </p>
              </div>
            </div>
            <div class="mb-2 border rounded-xl mt-4 flex justify-center items-end">
              <p class="text-xl text-gray-600 font-semibold py-2 px-4">Total Contents </p>
            </div>
          </div>
        </div>
        <!-- ************************** -->
        <div
          class="w-48 my-4 bg-blue-300  rounded-xl flex  justify-center border-y-8 border-gray-400 bg-gradient-to-t from-indigo-300 via-blue-300 to-purple-200 2xl:w-64">
          <div class=" ">
            <div class="rounded-full  mt-2 flex justify-center items-center">
              <div class="w-20 h-20 border rounded-full flex justify-center items-center">
                <p class="text-3xl text-gray-600 font-semibold py-2 px-4">
                  <?php
                  include '../classes/Comment.php';
                  $content = new Comment();
                  $contentCount = $content->commentCount();
                  if ($row = $contentCount->fetch_assoc()) {
                    echo $row['count'];
                  }
                  ?>
                </p>
              </div>
            </div>
            <div class="mb-2 border rounded-xl mt-4 flex justify-center items-end">
              <p class="text-xl text-gray-600 font-semibold py-2 px-4">Total Comments </p>
            </div>
          </div>
        </div>
        <!-- ************************** -->

        <div
          class="w-48 my-4 bg-blue-300  rounded-xl flex  justify-center border-y-8 border-gray-400 bg-gradient-to-t from-indigo-300 via-blue-300 to-purple-200 2xl:w-64">
          <div class=" ">
            <div class="rounded-full  mt-2 flex justify-center items-center">
              <div class="w-20 h-20 border rounded-full flex justify-center items-center">
                <p class="text-3xl text-gray-600 font-semibold py-2 px-4">
                  <?php
                  include '../classes/Category.php';
                  $content = new Category();
                  $contentCount = $content->categoryCount();
                  if ($row = $contentCount->fetch_assoc()) {
                    echo $row['count'];
                  }
                  ?>
                </p>
              </div>
            </div>
            <div class="mb-2 border rounded-xl mt-4 flex justify-center items-end">
              <p class="text-xl text-gray-600 font-semibold py-2 px-4">Total Categories </p>
            </div>
          </div>
        </div>

        <!-- ************************** -->
        <div
          class="w-48 my-4 bg-blue-300  rounded-xl flex  justify-center border-y-8 border-gray-400 bg-gradient-to-t from-indigo-300 via-blue-300 to-purple-200 2xl:w-64">
          <div class=" ">
            <div class="rounded-full  mt-2 flex justify-center items-center">
              <div class="w-20 h-20 border rounded-full flex justify-center items-center">
                <p class="text-3xl text-gray-600 font-semibold py-2 px-4">
                  <?php
                  include '../classes/Tag.php';
                  $content = new Tag();
                  $contentCount = $content->tagCount();
                  if ($row = $contentCount->fetch_assoc()) {
                    echo $row['count'];
                  }
                  ?>
                </p>
              </div>
            </div>
            <div class="mb-2 border rounded-xl mt-4 flex justify-center items-end">
              <p class="text-xl text-gray-600 font-semibold py-2 px-4">Total Tags </p>
            </div>
          </div>
        </div>
        <!-- ************************** -->

       </div>
     
      </div>
      <!--  -->
      <?php

      // echo $_SESSION['userId'];
// echo $_SESSION['username'];
      ?>
    </div>
  </div>
  <!-- DASHBOARD CONTENT END -->


</div>
<!-- <?php $conn->close(); ?> -->
<script src="dashboard/custom.js"></script>

</html>