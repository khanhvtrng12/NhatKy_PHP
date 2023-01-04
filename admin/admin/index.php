<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Admin -  STEAMVN</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<link rel="stylesheet" href="../../assets/css/bootstrap-4.3.1-dist/css/bootstrap.css">
		<link rel="stylesheet" href="../../assets/font/fontawesome-free-6.1.1-web/css/all.css" >
		<link rel="stylesheet" href="assets/css/notify.css">
    </head>
    <body>
        <?php
        session_start();
        include '../../serverconnect.php';
        $error = false;
        if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
            $result = mysqli_query($con, "Select `id`,`username`,`fullname`,`birthday` from `user` WHERE (`username` ='" . $_POST['username'] . "' AND `password` = '" . $_POST['password'] . "')");
            if (!$result) {
                $error = mysqli_error($con);
            } else {
			?>
				<div class="col-sm-12">
								<div class="alert fade alert-simple alert-success alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show">
								  <button type="button" class="close font__size-18" data-dismiss="alert">
															<span aria-hidden="true"><a>
											<i class="fa fa-times greencross"></i>
											</a></span>
															<span class="sr-only">Close</span> 
														</button>
								  <i class="start-icon far fa-check-circle faa-tada animated"></i>
								  <strong class="font__weight-semibold">Đăng Nhập thành công!</strong>
								</div>
							  </div>
			<?php
				
                $user = mysqli_fetch_assoc($result);
                $_SESSION['current_user'] = $user;
            }
            mysqli_close($con);
            if ($error !== false || $result->num_rows == 0) {
                ?>
                <div id="login-notify" class="login-box txt-center">
                    <h1 class="fn-white">Thông báo</h1>
                    <h4 class="fn-white"><?= !empty($error) ? $error : "Thông tin đăng nhập không chính xác" ?></h4>
                    <a class="fx-square fn-white" href="./index.php">Quay lại</a>
                </div>
                <?php
                exit;
            }
            ?>
        <?php } ?>
        <?php if (empty($_SESSION['current_user'])) { ?>
            <div class="login-box">
			  <h2>Login</h2>
			   <form action="./index.php" method="Post" autocomplete="off" class="frmlogin">
				<div class="user-box">
				  <input type="text" class="txt_username"  name="username" required/>
				  <label>Username</label>
				</div>
				<div class="user-box">
				  <input type="password" name="password" required/>
				  <label>Password</label>
				</div>
				<button type="submit">
				   <a>
					  <span></span>
					  <span></span>
					  <span></span>
					  <span></span>
						Đăng Nhập
					</a>
				</button>
				
			  </form>
			</div>
            <?php
        } else {
            $currentUser = $_SESSION['current_user'];
            ?>
            <div id="login-notify" class="login-box txt-center">
                <font color="#03e9f4">Xin chào <?= $currentUser['fullname'] ?></font><br/>
                <a class="fx-square" href="../../index.php"><font color="#FFFFFF">Trang Chủ</font>	</a><br/>
				<a class="fx-square" href="categories_listing.php"><font color="#FFFFFF">Quản lý nhật ký</font>	</a><br/>
                <a class="fx-square" href="edit.php"><font color="#FFFFFF">Đổi mật khẩu</font></a><br/>
                <a class="fx-square" href="./logout.php"><font color="#FFFFFF">Đăng xuất</font></a>
            </div>
        <?php } ?>
		<script src="assets/js/app.js"></script>
    </body>
</html>