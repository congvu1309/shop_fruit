<?php

    $sql_chitiet = "SELECT * FROM admin WHERE admin_id = '$_GET[idprofile]' LIMIT 1";
    $query_chitiet = mysqli_query($conn,$sql_chitiet);

    while($row_chitiet = mysqli_fetch_array($query_chitiet)) { ?>

    <div class="xem">
        <span class="profile_title">Thông tin cá nhân</span>
        <div class="chitiet">
            <div class="chitiet_sanpham">
                <p>Họ tên: <?php echo $row_chitiet['admin_name'] ?></p>
                <p>SĐT: <?php echo $row_chitiet['admin_phone'] ?></p>
                <p>Địa chỉ: <?php echo $row_chitiet['admin_address'] ?></p>
                <p>Email: <?php echo $row_chitiet['admin_email'] ?></p>
                <p>Tên đăng nhập: <?php echo $row_chitiet['admin_username'] ?></p>
            </div>
        </div>
        <div class="function_click">    
            <a href="?action=quanlycanhan&query=sua&idprofile=<?php echo $row_chitiet['admin_id'] ?>" class="function_click-edit">
                <i class="fas fa-fw fa-pen"></i>
            </a>
            <a href="index.php" class="function_click-back">
                <i class="fas fa-fw fa-arrow-left"></i>
            </a>
        </div>
    </div>
<?php } ?>