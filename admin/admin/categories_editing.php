<?php
include 'header.php';
if (!empty($_SESSION['current_user'])) {
    ?>
    <div class="main-content">
        <h1><?= !empty($_GET['id']) ? ((!empty($_GET['task']) && $_GET['task'] == "copy") ? "Copy tin tức " : "Sửa tin tức ") : "Thêm tin tức " ?></h1>
        <div id="content-box">
            <?php
            if (isset($_GET['action']) && ($_GET['action'] == 'add' || $_GET['action'] == 'edit')) {
                if (isset($_POST['name']) && !empty($_POST['name'])) {
                    if (empty($_POST['name'])) {
                        $error = "Bạn phải nhập tin tức ";
                    } elseif (empty($_POST['content'])) {
                        $error = "Bạn phải mô tả tin tức ";
                    }
				if (isset($_FILES['image']) && !empty($_FILES['image']['name'][0])) {
                        $uploadedFiles = $_FILES['image'];
                        $result = uploadFiles($uploadedFiles);
                        if (!empty($result['errors'])) {
                            $error = "Bạn chưa chọn ảnh vui lòng chọn lại";
                        } else {
                            $image = $result['path'];
                        }
                    }
					
                    if (!isset($image) && !empty($_POST['image'])) {
                        $image = $_POST['image'];
                    }
					else if(empty($_FILES['image']['name'])){
						$image = '';
					}
                    if (!isset($error)) {
                        if ($_GET['action'] == 'edit' && !empty($_GET['id'])) { //Cập nhật lại sản phẩm
                            $result = mysqli_query($con, "UPDATE `categories_".$_SESSION['current_user']['username']."` SET `name` = '" . $_POST['name'] . "',`image` =  '" . $image . "', `content` = '" . $_POST['content'] . "', `last_updated` = " . time() . " WHERE `categories`.`id_categories` = " . $_GET['id']);
                        } else { //Thêm sản phẩm
                            $result = mysqli_query($con, "INSERT INTO `categories_".$_SESSION['current_user']['username']."` (`id_categories`, `name`, `image`, `content`, `created_time`, `last_updated`) VALUES (NULL, '" . $_POST['name'] . "','" .$image. "','" . $_POST['content'] . "', " . time() . ", " . time() . ");");
                        }
                        if (!$result) { //Nếu có lỗi xảy ra
                            $error = "Có lỗi xảy ra trong quá trình thực hiện.";
                        }
                    }
                } else {
                    $error = "Bạn chưa nhập tên kỉ niệm đáng nhớ.";
                }
                ?>
                <div class = "container">
                    <div class = "error"><?= isset($error) ? $error : "Cập nhật thành công" ?></div>
                    <a href = "categories_listing.php">Quay lại danh sách kỉ niệm đáng nhớ </a>
                </div>
                <?php
            } else {
				 if (!empty($_GET['id'])) {
                    $result = mysqli_query($con, "SELECT * FROM `categories` WHERE `id_categories` = " . $_GET['id']);
                    $categories = $result->fetch_assoc();
                    
                        while ($row = mysqli_fetch_array($result)) {
                            $categories[0] = array(
                                'id_categories' => $row['id']
                            );
                        }
                    
                }


                ?>
                <form id="product-form" method="POST" action="<?= (!empty($categories) && !isset($_GET['task'])) ? "?action=edit&id=" . $_GET['id'] : "?action=add" ?>"  enctype="multipart/form-data">
                    <input type="submit" title="Lưu tin " value="" />
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Tên tin tức :</label>
                        <input type="text" name="name" value="<?= (!empty($categories) ? $categories['name'] : "") ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Ảnh tin tức :</label>
                        <div class="right-wrap-field">
        						<?php if (!empty($categories['image'])) { ?>
                                <img src="../<?= $categories['image']; ?>" /><br/>
                                <input type="hidden" name="image" value="<?= $categories['image']; ?>" />
        						<?php } ?>
                            <input type="file" name="image" />
                        </div>
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Nội dung: </label>
                        <textarea name="content" id="product-content"><?= (!empty($categories) ? $categories['content'] : "") ?></textarea>
                        <div class="clear-both"></div>
                    </div>
                </form>
                <div class="clear-both"></div>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    
                </script>
    <?php } ?>
        </div>
    </div>

    <?php
}
include 'footer.php';
?>