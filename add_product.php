<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

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
    <link href="public/css/site.css" rel="stylesheet">
</head>

<body>
    <?php
    require_once("entities/product.class.php");
    require_once("entities/category.class.php");
    ?>

    <div class="addsp" style='padding: 30px'>
        <?php
        if (isset($_POST["btnSubmit"])) {
            $productName = $_POST["txtName"];
            $cateID = $_POST["txtCateID"];
            $price = $_POST["txtprice"];
            $quantity = $_POST["txtquantity"];
            $description = $_POST["txtdesc"];
            $picture = $_FILES["myFile"];
          
            $newProduct = new Product($productName, $cateID, $price, $quantity, $description, $picture);
            $result = $newProduct->save();
           
            if (!$result) {
                echo "<h2>Thêm sản phẩm that bai</h2>";
            } else {
                // header("Location: add_product.php?inserted");
                echo "<h2>Thêm sản phẩm thành công</h2>";
            }
        }
        ?>
        <?php include_once("header.php"); ?>



        <form enctype="multipart/form-data" method="POST">
            <div>
                <div>
                    <label>Tên sản phẩm</label>
                    <input type="text" name="txtName" value="<?php echo isset($_POST["txtName"]) ? $_POST["txtName"] : ""; ?>" />
                </div>
            </div>

            <div>
                <div>
                    <label>Mô tả sản phẩm</label>
                </div>
                <div>
                    <textarea name="txtdesc" cols="21" rows="10" value="<?php echo isset($_POST["txtdesc"]) ? $_POST["txtdesc"] : ""; ?>"> </textarea>
                </div>
            </div>

            <div>
                <div>
                    <label>Số lượng sản phẩm</label><br>
                    <input name="txtquantity" value="<?php echo isset($_POST["txtquantity"]) ? $_POST["txtquantity"] : ""; ?>"> </textarea>
                </div>
            </div>

            <div>
                <div class="lbltitle">
                    <label>Giá sản phẩm</label> <br>
                    <input name="txtprice" value="<?php echo isset($_POST["txtprice"]) ? $_POST["txtprice"] : ""; ?>"> </textarea>
                </div>
            </div>

            <div>
                <div>
                    <label>Loại sản phẩm</label>
                </div>
                <div>

                    <select name="txtCateID">
                        <option value="" selected>--Loại sản phẩm</option>
                        <?php
                        $categories = Product::list_category();
                        foreach ($categories as $item) {
                            echo '<option value= "' . $item["CateID"] . '" >' . $item['CategoryName'] . '</option>';
                        } ?>
                    </select>
                </div>
            </div>

            <div>
                <div>
                    <label>Hình ảnh sản phẩm</label>
                </div>
                <div>
                    <input type="file" name="myFile" accept=".PNG,.GIF,.JPG">
                </div>
            </div>

            <br>
            <div>
                <div>
                    <input type="submit" name="btnSubmit" />
                </div>
            </div>


        </form>
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