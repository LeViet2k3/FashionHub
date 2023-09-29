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

// Câu lệnh SQL để lấy dữ liệu từ bảng sinh_vien
$email = $_POST['email'];
$sql = "SELECT * FROM website where email = '$email'";

// Thực thi câu lệnh SQL
$result = mysqli_query($conn, $sql);

// Kiểm tra kết quả
if (mysqli_num_rows($result) > 0) {
    // while ($row = mysqli_fetch_assoc($result)) {
    //     echo "Email: " . $row["email"] . "<br>";
    //     echo "Password: " . $row["password"] . "<br>";
    // }
    header("Location: http://localhost:8282/website/HTML/web/web.html");
    exit; // Đảm bảo rằng mã không tiếp tục chạy sau khi chuyển hướng
} else {
    echo "Không có dữ liệu trong bảng website.";
}

// Đóng kết nối
mysqli_close($conn);
