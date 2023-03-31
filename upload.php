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
        require_once("entities/upload.class.php");
    ?>

    <?php include_once("header.php"); ?>

    <?php
        if (isset($_POST["submit"])) {
            $title = $_POST["title"];
            // $picture = rand(1000,1000). "-" .$_FILES["img_path"];
            $picture = $_FILES["file"]["name"];

            $newUpload = new Upload($title, $picture);
            $result = $newUpload->save();
            if (!$result) {
                header("Location: upload.php?failure");
            } else {
                header("Location: upload.php?inserted");
                // echo "<h2>Thêm sản phẩm thành công</h2>";
            }
        }
        ?>

    <form method="post" enctype=”multipart/form-data”>
        <label for="">title</label>
        <input type="text" name="title">
        <label for="">File Upload</label>
        <input type="file" name="file">
        <input type="submit" name="submit">
    </form>

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