<?php
include 'header.php';
if (!empty($_SESSION['current_user'])) {
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    $totalRecords1 = mysqli_query($con, "SELECT * FROM `categories_".$_SESSION['current_user']['username']."`");
    $totalRecords1 = $totalRecords1->num_rows;
    $totalPages = ceil($totalRecords1 / $item_per_page);
    $categories = mysqli_query($con, "SELECT * FROM `categories_".$_SESSION['current_user']['username']."` ORDER BY `id_categories` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    mysqli_close($con);
    ?>
    <div class="main-content">
        <h1>Danh sách tin tức </h1>
        <div class="product-items">
            <div class="buttons">
                <a href="categories_editing.php">Thêm khoảnh khắc hoặc kỉ niệm đáng nhớ</a>
            </div>
            <ul>
                <li class="product-item-heading">
                    <div class="product-prop product-img w_110">Ảnh</div>
                    <div class="product-prop product-name" style="width:193px;">Khoảnh khắc</div>
					<div class="product-prop product-time" style="width:110px;">Ngày Tạo</div>
                    <div class="product-prop product-time" style="width:107px;">Ngày cập nhật</div>
                    <div class="product-prop product-button justify-center">
                        Xóa
                    </div>
                    <div class="product-prop product-button justify-center">
                        Sửa
                    </div>
                    <div class="product-prop product-button justify-center">
                        Copy
                    </div>
					
                    <div class="clear-both"></div>
                </li>
                <?php
				if( ! mysqli_num_rows($categories) ) {
						echo 'Bạn chưa có khoảnh khắc hoặc kỉ niệm đáng nhớ. Vui lòng thêm khoảnh khắc hoặc kỉ niệm đáng nhớ !';
				}else{
                	while ($row = mysqli_fetch_array($categories)) {
                    ?>
                    <li>
                        <div class="product-prop product-img">
							<?php if(!empty($row['image'])){
							?>
							<img src="../<?= $row['image']; ?>" alt=""/>
							<?php }else{
							?>
							<img src="../../assets/images/no-image.png" alt=""/>
							<?php }
							?>
						</div>
                        <div class="product-prop product-name"><p><?= $row['name'] ?></p></div>
                        <div class="product-prop product-button justify-center">
                            <a href="categories_delete.php?id=<?= $row['id_categories'] ?>">Xóa</a>
                        </div>
                        <div class="product-prop product-button justify-center">
                            <a href="categories_editing.php?id=<?= $row['id_categories'] ?>">Sửa</a>
                        </div>
                        <div class="product-prop product-button justify-center">
                            <a href="categories_editing.php?id=<?= $row['id_categories'] ?>&task=copy">Copy</a>
                        </div>
						
						<div class="product-prop product-time"><?= date('d/m/Y H:i', $row['created_time']) ?></div>
                        <div class="product-prop product-time"><?= date('d/m/Y H:i', $row['last_updated']) ?></div>
                        <div class="clear-both"></div>
                    </li>
                <?php }} ?>
            </ul>
            <?php
            include 'pagination.php';
            ?>
            <div class="clear-both"></div>
        </div>
    </div>
    <?php
}
include 'footer.php';
?>