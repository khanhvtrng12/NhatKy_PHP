
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đồ án công nghệ phần mềm - Nhật Ký</title>
	<script src="assets/css/bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="assets/css/bootstrap-4.3.1-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel='shortcut icon' type='image/x-icon' href='/favicon.ico' />
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/font/fontawesome-free-6.1.1-web/css/all.css" >
</head>
<?php 
	
	
	
?>
<body>
<div class="container py-5">
    <!-- For demo purpose -->
	
			 <?php
                    include 'serverconnect.php';
					session_start();
                    if(empty($_SESSION['current_user'])) {
                    ?>
							<div class="grid text-center">
							  <div class="g-col-6 g-col-md-4">
								  <button class="custom-btn btn-14" onClick="location.href='admin/admin/index.php'"><span>Đăng Nhập</span></button>
								  <button class="custom-btn btn-14" onClick="location.href='admin/admin/register.php'"><span>Đăng Ký</span></button>
								</div>
							</div>
                        
                        <?php
                     }else{
                        $user_name = $_SESSION['current_user']['fullname'];
						$search = isset($_GET['search']) ? $_GET['search'] : "";
						if($search){
							$sql1 = mysqli_query($con,"SELECT * FROM `categories_".$_SESSION['current_user']['username']."` WHERE `content` like N'%".$search."%' or `name` like N'%".$search."%'");
						}
						else {

							$sql1 = mysqli_query($con,"SELECT * FROM `categories_".$_SESSION['current_user']['username']."`");
						}
                        ?>
						<div class="container text-right mg-bottom-15">
							<div class="dropdown">
							  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								Welcome! <?= $user_name; ?>
							  </button>
							  <ul class="dropdown-menu left-auto-right-0">
								<li><a class="dropdown-item po-inhe" href="#"><i class="fa-solid fa-user mg-right-10"></i>Thông tin tài khoản</a></li>
								  <li><a class="dropdown-item po-inhe" href="admin/admin/categories_listing.php"><i class="fas fa-vihara mg-right-10"></i>Admin Nhật ký</a></li>
								<li><a class="dropdown-item po-inhe" href="admin/admin/logout.php"><i class="fa-solid fa-right-from-bracket mg-right-10"></i>Đăng Xuất</a></li>
							  </ul>
							</div>
						</div>
                    <?php } ?>
			
    <div class="row text-center text-white mb-5">
		
        <div class="col-lg-8 mx-auto">
			
			<div class="item-header">
            	<h1 class="display-4 multicolortext">Nhật Ký</h1>
            </div>
            </div>
        </div><!-- End -->
		<div class="searchbar">
		<form action="" method="get">
			<input type="search" name="search" required>
			<button type="submit"  name="submit"><i class="fa fa-search"></i></button>
			<a href="javascript:void(0)" id="clear-btn">Clear</a>
		</form>
		</div> <!-- End search bar -->
        <div class="row">
			
            <div class="col-lg-7 mx-auto">
                
                <!-- Timeline -->
                <ul class="timeline">
					<?php if(!empty($_SESSION['current_user'])) {
					 
						while($row =  mysqli_fetch_array($sql1)){
					?>
					<li class='timeline-item bg-white rounded ml-3 p-4 shadow'>
                        <div class='timeline-arrow'></div>
                        <h2 class='h5 mb-0'><?= $row['name']; ?></h2><span class='small text-gray'><?= date('d/m/Y H:i', $row['created_time']) ?><i class='fa fa-clock-o mr-1'></i></span>
                        <p class='text-small mt-2 font-weight-light'><?= $row['content']; ?></p>
						<?php if (!empty($row['image'])) { ?>
                        	<img src="admin/<?= $row['image']; ?>" style='max-width: 100%;max-height: 100%;'/>
						<?php } else; ?>
                    </li>
					<?php } }else{ ?>
  					<li class='timeline-item bg-white rounded ml-3 p-4 shadow'>
                        <div class='timeline-arrow'></div>
                        <h2 class='h5 mb-0 mg-bottom-15'>Bạn chưa đăng Nhập !!</h2>
						<img src="assets/images/GIF/Cry.gif" style='max-width: 100%;max-height: 100%;'>
                    </li>
					<?php } ?>
                </ul>

            </div>
        </div>
    </div>
	
<script src="assets/js/app.js"></script>
<script src="assets/css/bootstrap-4.3.1-dist/js/bootstrap.bundle.js"></script>
	</body>