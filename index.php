<?php
require_once 'config/koneksi.php';
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Fruitables - Vegetable Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

       <?= include "include/style_link.php" ?>
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <?= include "include/navbar.php" ?>


        <?= include "include/modal_search.php" ?>




        <?=  include "include/hero_section.php" ?>     
                           
       


       <?= include "include/featire_section_start.php" ?>



       <?= include "include/shop_start.php"?>



        <?= include "include/BannerSectionStart.php" ?>


       <?= include "include/Bestsaler_product_Start.php"?>


        <?= include "include/fact_start.php"?>


         <?= include "include/tastimonial_start.php"?>




       <?= include "include/FooterStart.php"?>
       


        <?= include "include/copyright_start.php"?>


        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/lib/easing/easing.min.js"></script>
    <script src="assets/lib/waypoints/waypoints.min.js"></script>
    <script src="assets/lib/lightbox/js/lightbox.min.js"></script>
    <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="assets/js/main.js"></script>
    </body>

</html>