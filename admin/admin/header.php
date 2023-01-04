<!DOCTYPE html>

<html>
    <head>
        <title>Admin - Quản lý nhật ký</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="assets/css/admin_style.css" >
        <script src="../resources/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <?php
        session_start();
        include '../../serverconnect.php';
        include '../../function.php';
        if (!empty($_SESSION['current_user'])) { //Kiểm tra xem đã đăng nhập chưa?
            ?>
            <div id="admin-heading-panel">
                <div class="container">
                    <div class="left-panel">
                        Xin chào <span><?= $_SESSION['current_user']['fullname'] ?></span>
                    </div>
                    <div class="right-panel">
                        <img height="24" src="assets/images/home.png" />
                        <a href="../../index.php">Trang chủ</a>
                        <img height="24" src="assets/images/logout.png" />
                        <a href="logout.php">Đăng xuất</a>
                    </div>
                </div>
            </div>
                <?php } ?>