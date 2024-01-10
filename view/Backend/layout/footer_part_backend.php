<?php

require '../../vendor/autoload.php';
use App\classes\Footer;
$nav = new Footer();
$showNav = $nav->showFooter();
?>
    <footer class=" h-10 mb-2">
    <div class="flex items-center h-full justify-center text-gray-200">
    <p> &copy;
      <span>
        <?php
        $currentYear = date('Y');
        echo $currentYear;
        ?> -
      </span>
      <span class="font-semibold ">

        <?php 
        foreach ($showNav as $footer) {
          echo '<h1 class="font-semibold text-gray-200">' . $footer['name'] . '</h1>';

        }
        
        ?>
        
      </span>
    </p>
  </div>
</footer>