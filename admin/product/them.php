<div class="card-body">
    <div class="table-responsive">
        <table class="table table-add-edit" id="dataTable" width="100%" cellspacing="0">
            <form method="post" action="product/xuly.php" enctype="multipart/form-data" autocomplete="off">
                <thead>
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td><input type="text" name="tensanpham" class="add-edit-input" required></td>
                    </tr>
                    <tr>
                        <td>Hình ảnh</td>
                        <td><input type="file" name="hinhanh" class="add-edit-input" required></td>
                    </tr>
                    <tr>
                        <td>Danh mục</td>
                        <td>
                            <select name="thuocloai" class="add-edit-select">
                                <?php 
                                    $sql_danhmuc = "SELECT * FROM category ORDER BY category_id DESC";
                                    $query = mysqli_query($conn,$sql_danhmuc);
                                    while($row_danhmuc = mysqli_fetch_array($query)) {
                                    ?>
                                    <option value="<?php echo $row_danhmuc['category_id']; ?>">
                                        <?php echo $row_danhmuc['category_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Giá</td>
                        <td><input type="text" name="gia" class="add-edit-input" required></td>
                    </tr>
                    <tr>
                        <td>Mô tả</td>
                        <td><textarea name="mota" cols="95" rows="2"></textarea></td>
                    </tr>
                    <tr>
                        <td>Nội dung</td>
                        <td><textarea name="noidung" cols="50" rows="10"></textarea></td>
                    </tr>
                    <tr>
                        <td>Trạng thái</td>
                        <td>
                            <select name="trangthai" class="add-edit-select">
                                <option value="1">Hoạt động</option>
                                <option value="0">Ẩn</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="function_click">
                                <input type="submit" name="themsanpham" value="Thêm mới" class="add-edit-submit">
                                <a href="index.php?action=quanlysanpham&query=lietke" class="function_click-back">
                                    <i class="fas fa-fw fa-arrow-left"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                </thead>
            </form>
        </table>
    </div>
</div>