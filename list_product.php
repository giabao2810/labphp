<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="public/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="public/lib/animate/animate.min.css" rel="stylesheet">
    <link href="public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="public/css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    require_once("entities/product.class.php");
    require_once("entities/category.class.php");
    ?>

    <?php
    include_once("header.php");
    if (!isset($_GET["cateid"])) {
        $prods = Product::list_product();
    } else {
        $cateid = $_GET["cateid"];
        $prods = Product::list_product_by_cateId($cateid);
    }
    $cates = Category::list_category();
    ?>


    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Featured Products</span></h2>
        <div class="d-flex flex-row">
            <div class="row">
                <div >Danh Mục</div>
                <div class="list-group">
                    <?php 
                        foreach($cates as $item){
                          echo"<a 
                          href=list_product.php?cateid=".$item["CateID"]."
                          class='list-group-item list-group-item-action'>".$item["CategoryName"]."</a>";  
                        }
                    ?>
                </div>
            </div>
            <div class="row ml-5">
                <div class="list-group list-group-horizontal">
                    <?php
                    include_once("header.php");
                    // $prods = Product::list_product();
                    foreach ($prods as $item) { ?>

                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <?php echo " <img style='width:250px; height: 200px;'  src=" . $item["Picture"] . " >"; ?>

                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href="shopping_cart.php?id=<?php echo $item["ProductID"]; ?>""><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href="product_detail.php?id=<?php echo $item["ProductID"]; ?>"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <?php echo "<h3> " .$item["ProductName"] . " </h3>"; ?>
                                <div>
                                    <?php echo "<h5> Giá: " .$item["Price"] . "</h5>";
                                    echo "<h6> Số lượng: " .$item["Quantity"] . "</h6>";
                                    echo "<p> Mô tả: " . $item["Description"] . " </p>"; ?>

                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <br>
                </div>
            </div>
        </div>

    </div>


    <?php
    include_once("footer.php");
    ?>



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="public/liblib/easing/easing.min.js"></script>
    <script src="public/liblib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="public/libmail/jqBootstrapValidation.min.js"></script>
    <script src="public/libmail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="public/libjs/main.js"></script>
</body>

</html>