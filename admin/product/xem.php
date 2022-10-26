<?php
    $sql_chitiet = "SELECT * FROM product WHERE product_id = '$_GET[idsanpham]' LIMIT 1";
    $query_chitiet = mysqli_query($conn,$sql_chitiet);
    while($row_chitiet = mysqli_fetch_array($query_chitiet)) { ?>

    <div class="xem">
        <div class="chitiet">
            <div class="hinhanh_sanpham">
                <img src="../img/uploads/<?php echo $row_chitiet['product_img']; ?>" class="img_chitiet">
            </div>
            <div class="chitiet_sanpham">
                <h3>Tên sản phẩm: <?php echo $row_chitiet['product_name']; ?></h3>
                <p>Mã sản phẩm: <?php echo $row_chitiet['product_id']; ?></p>
                <p>Danh mục: 
                    <?php 
                        $sql_danhmuc = "SELECT * FROM category ORDER BY category_id DESC";
                        $query = mysqli_query($conn,$sql_danhmuc);
                        while($row_danhmuc = mysqli_fetch_array($query)) {
                            if($row_danhmuc['category_id']==$row_chitiet['category_id']) { ?>
                                <?php echo $row_danhmuc['category_name']; ?>
                            <?php } ?>   
                    <?php } ?>
                </p>
                <p>Giá: <?php echo number_format($row_chitiet['product_price'],0,',','.').'vnđ' ?></p>
                <p>Trạng thái:
                    <?php if($row_chitiet['product_status'] == 1) {
                        echo "<img src='../img/img_admin/onl.jpg' border='0'> Hoạt động";
                        }else {
                            echo "<img src='../img/img_admin/off.jpg' border='0'> Đang ẩn";
                        }
                    ?>
                </p>
            </div>
        </div>
        <div class="gioithieu_sanpham">
            <p>Mô tả: <?php echo $row_chitiet['product_info']; ?></p>
            <p>Nội dung: <?php echo $row_chitiet['product_content']; ?></p>
        </div>
        <div class="function_click">
            <a href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row_chitiet['product_id'] ?>" class="function_click-edit">
                <i class="fas fa-fw fa-pen"></i>
            </a>
            <a href="index.php?action=quanlysanpham&query=lietke" class="function_click-back">
                <i class="fas fa-fw fa-arrow-left"></i>
            </a>
        </div>
    </div>

<?php } ?>