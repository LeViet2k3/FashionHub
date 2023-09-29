<?php
$server = "localhost"; // Tên máy chủ MySQL (mặc định là localhost)
$username = "root";    // Tên đăng nhập MySQL
$password = "";        // Mật khẩu MySQL (nếu bạn có mật khẩu)
$database = "demo";    // Tên cơ sở dữ liệu MySQL

// Kết nối tới cơ sở dữ liệu
$conn = mysqli_connect($server, $username, $password, $database);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

// Dữ liệu bạn muốn chèn
$email = $_POST['email'];
$password = $_POST['password'];


// Câu lệnh SQL để chèn dữ liệu
// $sql = "delete from sinh_vien where id = 3";
$sql = "INSERT INTO website (email, password) VALUES ('$email', '$password')";
// Thực thi câu lệnh SQL
if (mysqli_query($conn, $sql)) {
    header("Location: http://localhost:8282/website/HTML/success.html");
    exit; // Đảm bảo rằng mã không tiếp tục chạy sau khi chuyển hướng
} else {
    echo "Lỗi khi thêm dữ liệu vào bảng: " . mysqli_error($conn);
}

// Đóng kết nối
mysqli_close($conn);
