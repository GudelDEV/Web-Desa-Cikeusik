<?php  
include 'conection.php';

if($_GET['id']){
    $id = $_GET['id'];
    $sql = "SELECT * FROM produk WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belanja</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../node_modules/AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../node_modules/AdminLTE/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Style/belanja.css">
</head>





<body>
    <!-- Navbar-Start -->
    <?php 
        include "./Navbar.php"
    ?>
    <!-- Navbar-End -->
    <!-- Main Start -->
    <main class="container mt-5">
        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none"><?php echo $row['judul_produk'] ?></h3>
                        <div class="col-12">
                            <img src="../produk/<?php echo $row['image_produk']?>" class="product-image"
                                alt="Product Image">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            <div class="product-image-thumb active"><img
                                    src="../produk/<?php echo $row['image_produk']?>" alt="Product Image"></div>
                            <div class="product-image-thumb"><img src="../produk/<?php echo $row['image_produk']?>"
                                    alt="Product Image">
                            </div>
                            <div class="product-image-thumb"><img src="../produk/<?php echo $row['image_produk']?>"
                                    alt="Product Image">
                            </div>
                            <div class="product-image-thumb"><img src="../produk/<?php echo $row['image_produk']?>"
                                    alt="Product Image">
                            </div>
                            <div class="product-image-thumb"><img src="../produk/<?php echo $row['image_produk']?>"
                                    alt="Product Image">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3"><?php echo $row['judul_produk'] ?></h3>
                        <p><?php echo htmlspecialchars(substr($row['deskripsi_produk'], 0, 100)) ?>
                        </p>

                        <hr>
                        <h4>Available Colors</h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-default text-center active">
                                <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                                Green
                                <br>
                                <i class="fas fa-circle fa-2x text-green"></i>
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                                Blue
                                <br>
                                <i class="fas fa-circle fa-2x text-blue"></i>
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
                                Purple
                                <br>
                                <i class="fas fa-circle fa-2x text-purple"></i>
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                                Red
                                <br>
                                <i class="fas fa-circle fa-2x text-red"></i>
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_a5" autocomplete="off">
                                Orange
                                <br>
                                <i class="fas fa-circle fa-2x text-orange"></i>
                            </label>
                        </div>

                        <h4 class="mt-3">Size <small>Please select one</small></h4>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                                <span class="text-xl">S</span>
                                <br>
                                Small
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                                <span class="text-xl">M</span>
                                <br>
                                Medium
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                                <span class="text-xl">L</span>
                                <br>
                                Large
                            </label>
                            <label class="btn btn-default text-center">
                                <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">
                                <span class="text-xl">XL</span>
                                <br>
                                Xtra-Large
                            </label>
                        </div>

                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                                Rp<?php  echo $row['harga_produk'] ?>
                            </h2>
                            <h4 class="mt-0">
                                <small>Ex Tax: Rp2000 </small>
                            </h4>
                        </div>

                        <div class="mt-4">
                            <div class="btn btn-primary btn-lg btn-flat">
                                <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                Add to Cart
                            </div>

                            <div class="btn btn-default btn-lg btn-flat">
                                <i class="fas fa-heart fa-lg mr-2"></i>
                                Add to Wishlist
                            </div>
                        </div>

                        <div class="mt-4 product-share">
                            <a href="#" class="text-gray">
                                <i class="fab fa-facebook-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fab fa-twitter-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fas fa-envelope-square fa-2x"></i>
                            </a>
                            <a href="#" class="text-gray">
                                <i class="fas fa-rss-square fa-2x"></i>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="row mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                                href="#product-desc" role="tab" aria-controls="product-desc"
                                aria-selected="true">Description</a>
                            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                                href="#product-comments" role="tab" aria-controls="product-comments"
                                aria-selected="false">Comments</a>
                            <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab"
                                href="#product-rating" role="tab" aria-controls="product-rating"
                                aria-selected="false">Rating</a>
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                            aria-labelledby="product-desc-tab"><?php echo $row['deskripsi_produk'] ?></div>
                        <div class="tab-pane fade" id="product-comments" role="tabpanel"
                            aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed
                            condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut
                            commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla
                            turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar
                            mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex
                            elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a
                            sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel
                            id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
                        <div class="tab-pane fade" id="product-rating" role="tabpanel"
                            aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit.
                            In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur
                            vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus
                            aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat.
                            Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia
                            lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in
                            vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum
                            a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci
                            et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at
                            semper posuere. Integer finibus orci vitae vehicula placerat. </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </main>
    <!-- Main-End -->
    <!-- Footer-Start -->
    <?php include
      "./Footer.php"?>
    <!-- Footer-End -->
    <script src="../node_modules/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../node_modules/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../node_modules/AdminLTE/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../node_modules/AdminLTE/dist/js/demo.js"></script>
    <script>
    $(document).ready(function() {
        $('.product-image-thumb').on('click', function() {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
    </script>
</body>

</html>