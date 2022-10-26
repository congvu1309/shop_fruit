<?php
    $sql_sua = "SELECT * FROM product WHERE product_id = '$_GET[idsanpham]' LIMIT 1";
    $query_sua = mysqli_query($conn,$sql_sua);
?>

<div class="card-body">
    <div class="table-responsive">
        <?php while($row = mysqli_fetch_array($query_sua)) { ?>
            <table class="table table-add-edit" id="dataTable" width="100%" cellspacing="0">
                <form method="post" action="product/xuly.php?idsanpham=<?php echo $row['product_id'] ?>" enctype="multipart/form-data" autocomplete="off">
                    <thead>
                        <tr>
                            <td>Tên sản phẩm</td>
                            <td><input type="text" name="tensanpham" value="<?php echo $row['product_name']; ?>" class="add-edit-input"></td>
                        </tr>
                        <tr>
                            <td>Hình ảnh</td>
                            <td>
                                <img src="../img/uploads/<?php echo $row['product_img']; ?>" width="150px">
                                <input type="file" name="hinhanh">
                            </td>
                        </tr>
                        <tr>
                            <td>Danh mục</td>
                            <td>
                                <select name="thuocloai" class="add-edit-select">
                                    <?php 
                                        $sql_danhmuc = "SELECT * FROM category ORDER BY category_id DESC";
                                        $query = mysqli_query($conn,$sql_danhmuc);
                                        while($row_danhmuc = mysqli_fetch_array($query)) {
                                            if($row_danhmuc['category_id']==$row['category_id']) { ?>
                                                <option selected value="<?php echo $row_danhmuc['category_id']; ?>">
                                                    <?php echo $row_danhmuc['category_name']; ?>
                                                </option>
                                            <?php }else { ?>
                                                <option value="<?php echo $row_danhmuc['category_id']; ?>">
                                                    <?php echo $row_danhmuc['category_name']; ?>
                                                </option>
                                        <?php }?>
                                    <?php   } ?>   
                                </select>
                            </td>
                        </tr> 
                        <tr>
                            <td>Giá</td>
                            <td><input type="text" name="gia" value="<?php echo $row['product_price']; ?>" class="add-edit-input"></td>
                        </tr>
                        <tr>
                            <td>Mô tả</td>
                            <td><textarea name="mota" cols="95" rows="2"><?php echo $row['product_info']; ?></textarea></td>
                        </tr>
                        <tr>
                            <td>Nội dung</td>
                            <td><textarea name="noidung" cols="50" rows="10"><?php echo $row['product_content']; ?></textarea></td>
                        </tr>
                        <tr>
                            <td>Trạng thái</td>
                            <td>
                                <select name="trangthai" class="add-edit-select">
                                    <?php 
                                        if($row['product_status']==1) { 
                                    ?>
                                        <option value="1" select>Hoạt động</option>
                                        <option value="0">Ẩn</option>
                                    <?php }else {
                                    ?>
                                        <option value="1">Hoạt động</option>
                                        <option value="0" select>Ẩn</option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="function_click">
                                    <input type="submit" name="suasanpham" value="Cập nhập" class="add-edit-submit">
                                    <a href="index.php?action=quanlysanpham&query=lietke" class="function_click-delete">
                                        <i class="fas fa-fw fa-arrow-left"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </thead>
                </form>
            </table>
        <?php } ?>
    </div>
</div>