<?php
session_start(); // Bắt đầu hoặc tiếp tục phiên làm việc
if (isset($_SESSION['name'])) {
    session_destroy(); // Hủy phiên làm việc
    header("Location: Login.php"); // Chuyển hướng về trang đăng nhập
    exit();
} else {
    // Nếu người dùng chưa đăng nhập, chuyển hướng về trang đăng nhập
    header("Location: Login.php");
    exit();
}
?>