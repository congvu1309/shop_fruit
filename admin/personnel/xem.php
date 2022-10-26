<?php
    $sql_chitiet = "SELECT * FROM personnel WHERE personnel_id = '$_GET[idnhansu]' LIMIT 1";
    $query_chitiet = mysqli_query($conn,$sql_chitiet);
    while($row_chitiet = mysqli_fetch_array($query_chitiet)) { ?>

    <div class="xem">
        <div class="chitiet">
            <div class="hinhanh_sanpham">
                <img src="../img/uploads/<?php echo $row_chitiet['personnel_img']; ?>" class="img_chitiet">
            </div>
            <div class="chitiet_sanpham">
                <p>Họ tên: <?php echo $row_chitiet['personnel_name'] ?></p>
                <p>Giới tính: 
                    <?php if($row_chitiet['personnel_sex'] == 1) {
                        echo "Nữ";
                        }else {
                            echo "Nam";
                        }
                    ?>
                </p>
                <p>SĐT: <?php echo $row_chitiet['personnel_phone'] ?></p>
                <p>Địa chỉ: <?php echo $row_chitiet['personnel_address'] ?></p>
                <p>Email: <?php echo $row_chitiet['personnel_email'] ?></p>
                <p>Vị trí: 
                    <?php if($row_chitiet['personnel_location'] == 1) {
                            echo "Nhân viên thử việc";
                        }else {
                            echo "Nhân viên chính thức";
                        }
                    ?>
                </p>
                <p>Cửa hàng: 
                    <?php if($row_chitiet['personnel_branch'] == 1) {
                            echo "Cơ sở 1";
                        }else {
                            echo "Cơ sở 2";
                        }
                    ?>
                </p>
            </div>
        </div>
        <div class="function_click">
            <a href="?action=quanlynhansu&query=sua&idnhansu=<?php echo $row_chitiet['personnel_id'] ?>" class="function_click-edit"> 
                <i class="fas fa-fw fa-pen"></i>
            </a>
            <a href="index.php?action=quanlynhansu&query=lietke" class="function_click-back">
                <i class="fas fa-fw fa-arrow-left"></i>
            </a>
        </div>
    </div>
<?php } ?>