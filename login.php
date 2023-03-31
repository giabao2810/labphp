<?php include_once("header.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập</title>
</head>
<body>
	<h2>Đăng nhập</h2>
	<form action="login.php" method="post">
		<label for="username">Tên đăng nhập:</label>
		<input type="text" id="username" name="username"><br><br>
		<label for="password">Mật khẩu:</label>
		<input type="password" id="password" name="password"><br><br>
		<input type="submit" value="Đăng nhập">
	</form>
</body>
</html>

<?php
// Kiểm tra nếu người dùng đã đăng nhập, chuyển hướng đến trang chính
if(isset($_SESSION["username"])) {
    header('Location: index.php');
    exit;
}

// Kiểm tra nếu người dùng đã gửi thông tin đăng nhập
if(isset($_POST['submit'])){
    $userName = $_POST['username'];
    $password = $_POST['password'];

    // Kiểm tra thông tin đăng nhập
    if($username == "Admin" && $password == "12345") {
        // Lưu thông tin đăng nhập vào session
        $_SESSION["username"] = $userName;
        // Chuyển hướng đến trang chính
        header('Location: index.php');
        exit;
    } else {
        // Hiển thị thông báo lỗi nếu thông tin đăng nhập không chính xác
        $error = "Tên đăng nhập hoặc mật khẩu không chính xác.";
    }
}
?>
<?php include_once("footer.php"); ?>
