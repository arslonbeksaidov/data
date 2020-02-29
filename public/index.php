<?php require '../admin/app/Post.php'; ?>
<?php
$getThreePost = new Post();
$result = $getThreePost->getLatestPost();


?>
<!DOCTYPE html>
<html>
<?php require_once 'resours/head.php';?>
<body class="appear-animate">

<!-- Page Loader -->
<!--<div class="page-loader">-->
<!--    <div class="loader">Loading...</div>-->
<!--</div>-->
<!-- End Page Loader -->

<!-- Page Wrap -->
<div class="page" id="top">

    <!-- Home Section -->
    <?php require_once 'resours/home.php';?>
    <!-- End Home Section -->


    <!-- Navigation panel -->
<?php require_once 'resours/navbar.php';?>
    <!-- End Navigation panel -->


    <!-- About Section -->
<?php  require_once 'resours/about.php';?>
    <!-- End About Section -->

    <!-- Divider -->
    <hr class="mt-0 mb-0 "/>
    <!-- End Divider -->

    <!-- Services Section -->
    <?php require_once 'resours/services.php';?>
    <!-- End Services Section -->


    <!-- Call Action Section -->
   <?php require_once 'resours/callAction.php';?>
    <!-- End Call Action Section -->


    <!-- Portfolio Section -->
 <?php require_once 'resours/portfolio.php'; ?>
    <!-- End Portfolio Section -->



    <!-- Features Section -->
   <?php require_once 'resours/features.php';?>
    <!-- End Features Section -->


    <!-- Testimonials Section -->
    <?php require_once 'resours/quotes.php';?>
    <!-- End Testimonials Section -->


    <!-- Blog Section -->
   <?php require_once 'resours/blog.php';?>
    <!-- End Blog Section -->





    <!-- Contact Section -->
    <?php require_once 'resours/contact.php';?>
    <!-- End Contact Section -->


    <!-- Google Map -->
  <?php require_once 'resours/map.php';?>
    <!-- End Google Map -->


    <!-- Foter -->
    <?php require_once 'resours/footer.php';?>
    <!-- End Foter -->


</div>
<!-- End Page Wrap -->


<?php require_once 'resours/jsScript.php'; ?>

</body>
</html>
