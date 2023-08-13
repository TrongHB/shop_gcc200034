<!DOCTYPE html>
<html>

<head>
   <title>My Shop Homepage</title>
   <link rel="stylesheet" type="text/css" href="style.css">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
   <?php
   require_once('header.php');
   ?>
   <div class="container-fluid">
      <header>
         <!-- Background image -->
         <div class="p-5 text-center bg-image" style="
      background-image: url(Image/home.jpg);
      height: 845px; background-size: 100% 130%;">
            <div class="mask mt-5 m-5 p-5" style="background-color: rgba(0, 0, 0, 0.6);">
               <div class=" mt-5 d-flex justify-content-center align-items-center h-100">
                  <div class="text-white">
                     <h2 class="mb-3">WELLCOME TO</h2>
                     <h1 class="mb-3" id="home"><span>BT CENTER</span></h1>
                     <h4 class="mb-3">Jewellery isn't really my thing, but I've always got my eye on people's watches.</h4>
                     <a class="btn btn-outline-light btn-lg" href="?page=content" role="button">SHOP NOW</a>
                  </div>
               </div>
            </div>
         </div>
         <!-- Background image -->
      </header>

      <br>

      <!--Brands-->
      <section id="brand" class="container-fluid">
         <div class="row">
            <img class="img-fluid col-lg-2 col-md-4 col-6" src="Image/brand1.png" alt="brand1">
            <img class="img-fluid col-lg-2 col-md-4 col-6" src="Image/bra2.png" alt="brand2">
            <img class="img-fluid col-lg-2 col-md-4 col-6" src="Image/bra3.png" alt="brand3">
            <img class="img-fluid col-lg-2 col-md-4 col-6" src="Image/bra4.png" alt="brand4">
            <img class="img-fluid col-lg-2 col-md-4 col-6" src="Image/bra5.png" alt="brand5">
            <img class="img-fluid col-lg-2 col-md-4 col-6" src="Image/bra6.png" alt="brand6">
         </div>
      </section>
      <br>

      <!--Poppular products-->
      <section id="featured" class="my-5 pb-5">
         <div class="container text-center mt-5 py-5">
            <h5>Hot Watch</h5>
         </div>
         <div class="row mx-auto container-fluid">
            <?php
            require_once('connect.php');
            $sql = "SELECT * FROM `product` ORDER BY pdate DESC LIMIT 4";
            $c = new Connect();
            $dblink = $c->connectToMySQL();
            $re = $dblink->query($sql);
            if ($re->num_rows > 0) {
               $no = 1;
               while ($row = $re->fetch_array()) {
            ?>
                  <div class="product text-center col-lg-3 col-md-4 col-12">
                     <img class="img-fluid mb-3" src="Image/<?php echo $row['pimage'] ?>" height="450" width="300">
                     <div class="star">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                     </div>
                     <b>
                        <h8 class="p-name"><?php echo $row['pname'] ?>
                     </b></h8><br>
                     <h7 class="p-price"><?php echo $row['pprice'] ?>$</h7><br>
                     <div>
                        <a href=""> <button class="buy-btn">View Details</button></a>
                     </div>

                  </div>
            <?php
                  $no++;
               }
            }
            ?>
         </div>
      </section>



      <!--Boostrap-->
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</body>
</div>
</body>