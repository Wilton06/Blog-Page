<?php
include "base-header.php";
function get_header($head='')
{
 ?>

 <?= get_base_header($head); ?>

 <header>
   <form class="" action="form.php" method="post">
     <div class="container">
       <a class="logo" href="./">
        WILTON BRAND BLOG
       </a>
       <input class="form-input2"type="search" placeholder="Search">
       <nav>
         <input class="button" type="submit" name="" value="New Post">

       </nav>
     </div>
   </form>

 </header>


 <?php
}
  ?>
