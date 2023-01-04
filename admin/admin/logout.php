<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Đăng xuất tài khoản</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       	<link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <?php
        session_start();
        unset($_SESSION['current_user']);
        ?>
		<div id="login-notify" class="login-box txt-center">
                <font color="#03e9f4" style="line-height: 50px;">Đăng xuất tài khoản thành công</font><br/>
                <a class="fx-square" href="../../index.php"><font color="#FFFFFF">Đăng nhập lại</font>	</a><br/>
        </div>
    </body>
</html>
