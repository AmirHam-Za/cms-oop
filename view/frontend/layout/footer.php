<?php
use App\classes\Footer;
require '../../vendor/autoload.php';

$nav = new Footer();
$showNav = $nav->showFooter();
?>
<footer class="bg-indigo-300 h-10 my-2">
  <div class="flex items-center h-full justify-center">
    <p>Copyright &copy;
      <span>
        <?php
        $currentYear = date('Y');
        echo $currentYear;
        ?> -
      </span>
      <span class="font-semibold text-indigo-600">

        <?php 
        foreach ($showNav as $footer) {
          echo '<h1 class="font-semibold text-indigo-600">' . $footer['name'] . '</h1>';

        }
        
        ?>
        
      </span>
    </p>
  </div>
</footer>