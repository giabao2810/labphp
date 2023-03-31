<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online</title>
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
    if (!isset($_GET["id"])) {
        header('Location: not_found.php');
    } else {
        $id = $_GET["id"];
        $prod = reset(Product::get_product($id));
        $prods_relate = Product::list_product_relate($prod["CateID"], $id);
    }
    $cates = Category::list_category();
    ?>

    <div class="container text-center">
        <div class="col-sm-3 panel panel-danger">
            <div class="panel-heading">
                Danh Mục
            </div>
            <ul class="list-group">
                <?php
                foreach ($cates as $item) {
                    echo "<li class='list-group-item'>
                        <a href=list_product.php?cateid=" . $item["CateID"] . ">
                        " . $item["CategoryName"] . "
                        </a>
                        </li>";
                }
                ?>
            </ul>
        </div>

        <div class="col-sm-9 panel panel-info">
            <div class="panel-heading">
                Chi tiết sản phẩm
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <img src="<?php echo "/" . $prod["Picture"]; ?>" class="img-responsive" style="width: 100%;" alt="Image">
                </div>
                <div class="col-sm-6">
                    <div style="padding-left: 10px;">
                        <div class="text-info">
                            <?php echo $prod["ProductName"]; ?>
                        </div>
                        <p>
                            Giá: <?php echo $prod["Price"]; ?>
                        </p>
                        <p>
                            Mô tả: <?php echo $prod["Description"]; ?>
                        </p>
                        <p>
                            <button type="button" class="btn btn-danger">Mua Hàng</button>
                        </p>
                    </div>
                </div>

                <div>
                    <h3 class="panel-heading">Sản phẩm liên quan</h3>
                    <div class="row">
                        <?php
                        foreach ($prods_relate as $item) {
                        ?>
                            <div class="col-sm-4">
                                <a href="product_detail.php?id=<?php echo $item["ProductID"]; ?>">
                                    <img src="<?php echo "/" . $item["Picture"]; ?>" alt="Image">
                                </a>
                                <p class="text-danger">
                                    Giá: <?php echo $item["ProductName"]; ?>
                                </p>
                                <p class="text-info">
                                    Mô tả: <?php echo $item["Price"]; ?>
                                </p>
                                <p>
                                    <button type="button" class="btn btn-primary">Mua Hàng</button>
                                </p>
                            </div>
                        <?php } ?>
                    </div>
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