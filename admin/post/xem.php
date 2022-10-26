<?php
    $sql_chitiet = "SELECT * FROM post WHERE post_id = '$_GET[idbaiviet]' LIMIT 1";
    $query_chitiet = mysqli_query($conn,$sql_chitiet);
    while($row_chitiet = mysqli_fetch_array($query_chitiet)) { ?>

    <div class="xem">
        <div class="chitiet">
            <div class="hinhanh_sanpham">
                <img src="../img/uploads/<?php echo $row_chitiet['post_img']; ?>" class="img_chitiet">
            </div>
        </div>
        <div class="gioithieu_sanpham">
            <p>Tiêu đề: <?php echo $row_chitiet['post_name']; ?></p>
            <p>Nội dung: <?php echo $row_chitiet['post_content']; ?></p>
        </div>
        <div class="function_click">
            <a href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row_chitiet['post_id'] ?>" class="function_click-edit">
                <i class="fas fa-fw fa-pen"></i>
            </a>
            <a href="index.php?action=quanlybaiviet&query=lietke" class="function_click-back">
                <i class="fas fa-fw fa-arrow-left"></i>
            </a>
        </div>
    </div>

<?php } ?>