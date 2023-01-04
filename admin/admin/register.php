<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng Ký - Nhật ký</title>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="../../assets/css/bootstrap-4.3.1-dist/css/bootstrap.css">
<link rel="stylesheet" href="../../assets/font/fontawesome-free-6.1.1-web/css/all.css" >
<link rel="stylesheet" href="assets/css/notify.css">
</head>

<body>
	<?php 
		session_unset();
		include '../../serverconnect.php';
		$errors = [];
		if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
			$username = $_POST['username'];
			$stmt = $con->prepare("SELECT `username` FROM `user` WHERE `username` = ?");
			$stmt ->bind_param('s',$username);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if ($row){
				?> 
				<div class="col-sm-12">
					<div class="alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert">
					  <button type="button" class="close font__size-18" data-dismiss="alert">
												<span aria-hidden="true">
													<i class="fa fa-times danger "></i>
												</span>
												<span class="sr-only">Close</span>
											</button>
					  <i class="start-icon far fa-times-circle faa-pulse animated"></i>
					  <strong class="font__weight-semibold">Error!</strong> Tên đăng nhập đã tồn tại.
					</div>
				  </div>
			<?php
			}else{
				$sql1= "CREATE TABLE IF NOT EXISTS `categories_".$_POST['username']."` (
						  `id_categories` int NOT NULL AUTO_INCREMENT,
						  `name` varchar(255) NOT NULL,
						  `image` varchar(255) DEFAULT NULL,
						  `content` text NOT NULL,
						  `created_time` int NOT NULL,
						  `last_updated` int NOT NULL,
						  PRIMARY KEY (`id_categories`)
						) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb3;";

					$sql = "INSERT INTO `user` VALUES ('','".$_POST['username']."','".$_POST['fullname']."','".$_POST['password']."','". strtotime($_POST['birthday'])."','".time()."','".time()."')";

					$tables = [$sql, $sql1];

					foreach($tables as $k => $sql){
						$query = @$con->query($sql);   
					}
					if(!$query){
							?> 
								<div class="col-sm-12">
									<div class="alert fade alert-simple alert-danger alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert">
									  <button type="button" class="close font__size-18" data-dismiss="alert">
																<span aria-hidden="true">
																	<i class="fa fa-times danger "></i>
																</span>
																<span class="sr-only">Close</span>
															</button>
									  <i class="start-icon far fa-times-circle faa-pulse animated"></i>
									  <strong class="font__weight-semibold">Error!</strong> Không thể tạo tên người dùng .
									</div>
								  </div>
							<?php
						}
						else{
							mysqli_close($con);
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
								  <strong class="font__weight-semibold">Đăng ký thành công!</strong>Hệ thống sẽ chuyển tới trang đăng nhập.
								</div>
							  </div>
							<script>setTimeout(function() { location.replace("index.php")},2000);</script>
						<?php
						}
					
			}
		}
	?>
	<div class="login-box">
			  <h2>Register</h2>
			   <form action="" method="Post" autocomplete="off" class="frmlogin">
				   
				<div class="user-box">
				  <input type="text" class="txt_username"  name="username" required pattern="^\S+$"/>
				  <label>Username</label>
				</div>
				<div class="user-box">
				  <input type="text" class="txt_username"  name="fullname" required/>
				  <label>Full Name</label>
				</div>
				<div class="user-box">
				   <input type="date" name="birthday" required>
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
						Đăng Ký
					</a>
				</button>
				
			  </form>
			</div>
</body>
</html>