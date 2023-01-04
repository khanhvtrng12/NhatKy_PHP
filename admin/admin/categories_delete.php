<?php
include 'header.php';
if (!empty($_SESSION['current_user'])) {
    ?>
    <div class="main-content">
        <h1>Xóa kỉ niệm đáng nhớ </h1>
        <div id="content-box">
            <?php
            $error = false;
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                include '../../serverconnect.php';
                $result = mysqli_query($con, "DELETE FROM `categories` WHERE `id_categories` = " . $_GET['id']);
                if (!$result) {
                    $error = "Không thể xóa kỉ niệm đáng nhớ.";
                }
                mysqli_close($con);
                if ($error !== false) {
                    ?>
                    <div id="error-notify" class="box-content">
                        <h2>Thông báo</h2>
                        <h4><?= $error ?></h4>
                        <a href="categories_listing.php">Danh sách kỉ niệm đáng nhớ </a>
                    </div>
        <?php } else { ?>
                    <div id="success-notify" class="box-content">
                        <h2>Xóa kỉ niệm đáng nhớ thành công</h2>
                        <a href="categories_listing.php">Danh sách kỉ niệm đáng nhớ </a>
                    </div>
                <?php } ?>
    <?php } ?>
        </div>
    </div>
    <?php
}
include 'footer.php';
?>