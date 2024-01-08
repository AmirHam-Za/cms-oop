<?php
include '../DB.php';

$db = new DB();
// include 'db_connection.php';
include 'excerpt.php';
include '../classes/Content.php';
$cntnt = new classes\Content;

?>
<!-- **************HEADER*************** -->
<?php include "layout/head.php"; ?>


<!-- **************HEADER*************** -->

<body class="bg-gray-200 w-screen p-0 m-0">

  <!-- **************NAV BAR*************** -->
  <?php include "layout/nav_bar.php"; ?>
  <!-- **************NAV BAR*************** -->

  <main class="w-full mt-16 ">

    <div class=" container mx-auto flex">


      <div class="sidebarrrrr w-9/12 ml-4">
        <div class="rounded-md shadow-md bg-gray-100 border border-gray-300 mt-2 ">
          <div class="flex flex-wrap">
            <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
            <?php
            $i = 0;

            $allCntnt = $cntnt->showContent();
            if ($allCntnt) {
              while ($ro = mysqli_fetch_assoc($allCntnt)) {
                $i++;

                // $i = 0;
                // foreach ($student->readAll() as $key => $value) {
                //   $i++;
                ?>
                <div class="p-4 --mb-4 w-1/3">
                  <div class="content-item rounded bg-indigo-50 p-2 border border-gray-300 shadow"
                    data-category-id="<?php echo $ro['category_id']; ?>">
                    <div class="flex">
                      <!-- <span class="font-bold">Title:</span> -->
                      <span class="h-8 mb-3 border-l-4 border-green-500"></span><p class="ml-2 font-semibold text-xl text-gray-600">
                        
                        <?php echo $ro["title"]; ?>
                      </p><br>
                    </div>

                    <!-- <span class="font-bold">Image:</span><br> -->
                    <!-- <img class=" h-40 w-full border border-gray-400  rounded " src="<?php echo $ro["image"]; ?>" alt=""> -->
                    <?php echo '<img class="h-40 w-full border border-gray-400  rounded" src="../backend/' . $ro['image'] . '" alt="Logo">'; ?>


                    <div class="flex justify-between border-b border-gray-400 py-2">
                      <div class="flex gap-6 w-full">
                        <div class="font-semibold">
                          <span class="font-semibold text-gray-600 text-sm"><i
                              class="fa-regular fa-calendar-days"></i></span>
                          <span class="text-gray-600 text-sm">
                            <?php
                            $updatedAt = strtotime($ro["updated_at"]);
                            echo date("F j, Y", $updatedAt);
                            ?>
                          </span>
                          <br>
                        </div>
                        <div class="text-gray-600">
                          <span class="text-sm text-gray-600"><i class="fa-solid fa-clock"></i></span>
                          <span class="font-semibold text-sm">
                            <?php echo $ro["read_time"]; ?>
                          </span>
                          <span class="font-semibold text-sm ">min read</span>
                        </div>
                      </div>
                    </div>

                    <!-- ***********Description with excerpt*********** -->
                    <div class=" border-gray-400 py-2 text-gray-800 text-lg text-semibold">
                      <?php
                      $excerpt = generateExcerpt($ro["description"]);
                      echo $excerpt;

                      ?>
                    </div>
                    <!-- oop edit/show -->
                    <!-- oop delete -->
                    <!-- <a href="?hello=<?= base64_encode($row['id']) ?>" onclick="return confirm('Are you sure to delete?')">Show Details</a> -->
                    <!-- <a href="?hello=<?= base64_encode($row['id']) ?>" onclick="return confirm('Are you sure to delete?')">Delete</a> -->
                    <div class="flex mt-4 justify-end">
                      <!-- Show Details Button -->
                      <!-- <button onclick="showDetails(<?php echo $ro['id']; ?>)"
  class="border border-indigo-400 rounded-3xl text-gray-600 px-4 py-1 hover:bg-indigo-400 transition hover:text-gray-100">Show
  Details</button> -->
                      <!-- OOP -->
                      <a class="border border-indigo-400 rounded-3xl text-gray-600 px-4 py-1 hover:bg-indigo-400 transition hover:text-gray-100"
                        href="user_details.php?id=<?= base64_encode($ro['id']) ?>">Show Details</a>
                      <!-- Edit Content Button -->
                    </div>
                    <script>
                      function showDetails(contentId) {
                        // Redirect to user_details.php with the content ID
                        window.location.href = 'user_details.php?id=' + contentId;
                      }
                    </script>
                  </div>
                </div>
                <?php
                //  }
            
              }
            }
            ?>

            <!-- @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ -->
          </div>
        </div>
      </div>




      <!-- **************SIDEBAR*************** -->
      <?php include "layout/sidebar.php"; ?>
      <!-- **************SIDEBAR*************** -->

    </div>


  </main>

  <!-- ************FOOTER************** -->
  <?php include "layout/footer.php"; ?>
  <!-- ************FOOTER************** -->
</body>

</html>