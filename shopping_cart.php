<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
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

    $cates = Category::list_category();

    session_start();

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    if (isset($_GET["id"])) {
        $prod_id = $_GET["id"];
        $was_found = false;
        $i = 0;

        if (!isset($_SESSION["cart_item"]) || count($_SESSION["cart_item"]) < 1) {
            $_SESSION["cart_item"] = array(
                0 => array("prod_id" => $prod_id, 'quantity' => 1)
            );
        } else {

            foreach ($_SESSION["cart_item"] as $item) {
                $i++;
                foreach ($item as $key => $value) {
                    if ($key == "prod_id" && $value = $prod_id) {
                        array_splice($_SESSION["cart_item"], $i - 1, 1, array(array("prod_id" => $prod_id, 'quantity' => $item["quantity"] + 1)));
                        $was_found = true;
                    }
                }
            }
            if ($was_found == false) {
                array_push($_SESSION["cart_item"], array("prod_id" => $prod_id, 'quantity' => 1));
            }
        }
        header("location: shopping_cart.php");
    }
    ?>

    <?php
    include_once("header.php");
    ?>

    <div class="container text-center">
        <div class="col-sm-3">
            <h3>Danh muc</h3>
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

        <div class="col-sm-9">
            <h3>Thong tin gio hang</h3>
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Ten san pham</th>
                        <th>Hinh anh</th>
                        <th>So luong</th>
                        <th>Don gia</th>
                        <th>Than tien</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total_money = 0;
                    if (isset($_SESSION["cart_item"]) && count($_SESSION["cart_item"]) > 0) {
                        foreach ($_SESSION["cart_item"] as $item) {
                            $id = $item["prod_id"];
                            $product = Product::get_product($id);
                            $prod = reset($product);
                            $total_money += $item["quantity"] * $prod["Price"];
                            echo "<tr>
                                    <td>"
                                . $prod["ProductName"] .
                                "</td>

                                    <td>
                                    <img style='width:90px; height:80px;' src=" . $prod["Picture"] . "/>
                                    </td>

                                    <td>"
                                . $item["quantity"] .
                                "</td>

                                    <td>"
                                . $prod["Price"] .
                                "</td>

                                    <td>"
                                . $prod["Price"] .
                                "</td>

                                </tr>";
                        }

                        echo "<tr><td colspan=5> <p class='text-right text-danger'>Tong tien: " . $total_money . "</p> </td></tr>";
                        echo "<tr><td colspan=3> <p class='text-right'><button type='button' class='btn btn-primary'>Tiep tuc mua hang </button> </p> </td>
                                <td colspan=2><p class='text-right'><button type='button' class='btn btn-success'>Thanh toan</button></p></td>
                            </tr>";
                    } else {
                        echo "Khong co san pham nao trong gio hang";
                    }
                    ?>
                </tbody>
            </table>
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