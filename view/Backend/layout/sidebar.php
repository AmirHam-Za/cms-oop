<div class="sidebar w-64 p-0 fixed top-16 bg-gray-300 bg-opacity-35">
  <div class="w-full p-2 min-h-screen relative  backdrop-blur-md bg-black/30">
    <div class="w-full">
      <div class=" border rounded-xl p-1 mb-2 ">
        <div class="w-full flex justify-center">
          <img class="w-24 h-24 rounded-full" src="https://pbs.twimg.com/media/BhJvvlVIUAAB-dB.png" alt="">
        </div>
        <div class="">
          <?php
          $currentHour = date('G');
          if ($currentHour >= 5 && $currentHour < 12) {
            $greeting = "Good morning";
          } elseif ($currentHour == 12) {
            $greeting = "Good noon";
          } elseif ($currentHour > 12 && $currentHour < 15) {
            $greeting = "Good afternoon";
          } elseif ($currentHour >= 15 && $currentHour < 19) {
            $greeting = "Good evening";
          } else {
            $greeting = "Good night";
          }


          ?>

          <p class="my-1 text-orange-200 font-semibold text-center">
            <?php echo $greeting; ?><br>
            <!-- <?php echo $currentHour; ?> -->
            

          </p>
          <p class="my-1 text-lg text-gray-200 font-semibold text-center">
            Hi,   <?php echo $_SESSION['username']; ?>
          </p>
          

        </div>
      </div>

      <div
        class="mb-1 border-y text-center text-gray-200 px-4 py-1  transition hover:text-orange-300 hover:border-orange-300 border-x-4 border-gray-200 rounded-xl">

        <a class="w-full block" href="dashboard.php"><i class="fa-solid fa-gauge-high"></i> &nbsp; Dashboard</a>
      </div>

      <div
        class="mb-1 border-y text-center text-gray-200 px-4 py-1  transition hover:text-orange-300 hover:border-orange-300 border-x-4 border-gray-200 rounded-xl">

        <a class="w-full block" href="index.php"><i class="fa-solid fa-signs-post"></i>&nbsp;Content</a>
      </div>

      <div
        class="mb-1 border-y text-center text-gray-200 px-4 py-1  transition hover:text-orange-300 hover:border-orange-300 border-x-4 border-gray-200 rounded-xl">

        <a class="w-full block" href="comment.php"><i class="fa-regular fa-comment-dots"></i>&nbsp;Comments</a>
      </div>

      <div
        class="mb-1 border-y text-center text-gray-200 px-4 py-1  transition hover:text-orange-300 hover:border-orange-300 border-x-4 border-gray-200 rounded-xl">

        <a class="w-full block" href="categories.php"><i class="fa-solid fa-layer-group"></i>&nbsp;Category</a>
      </div>

      <div
        class="mb-1 border-y text-center text-gray-200 px-4 py-1  transition hover:text-orange-300 hover:border-orange-300 border-x-4 border-gray-200 rounded-xl">

        <a class="w-full block" href="tags.php"><i class="fa-solid fa-bars-staggered"></i>&nbsp;Tags</a>
      </div>

      <div
        class="mb-1 border-y text-center text-gray-200 px-4 py-1  transition hover:text-orange-300 hover:border-orange-300 border-x-4 border-gray-200 rounded-xl">

        <a class="w-full block" href="header_footer.php"><i class="fa-solid fa-fingerprint"></i>&nbsp;Header &
          Footer</a>
      </div>
    </div>

    <div class=" absolute bottom-20 ">
      <!-- **********FOOTER*********** -->
      <?php include 'footer_part_backend.php'; ?>
      <!-- **********FOOTER*********** -->
    </div>
  </div>

</div>


<style>
  .sidebar {
    background-image: url("../../public/imgs/bg.png");
    background-color: #cccccc;
    height: 500px;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
</style>