<?php
    $sql_sua = "SELECT * FROM personnel WHERE personnel_id = '$_GET[idnhansu]' LIMIT 1";
    $query_sua = mysqli_query($conn,$sql_sua);
?>

<div class="card-body">
    <div class="table-responsive">
        <?php while($row = mysqli_fetch_array($query_sua)) { ?>
            <table class="table table-add-edit" id="dataTable" width="100%" cellspacing="0">
                <form method="post" action="personnel/xuly.php?idnhansu=<?php echo $row['personnel_id'] ?>" enctype="multipart/form-data" autocomplete="off">
                    <thead>
                        <tr>
                            <td>Họ tên</td>
                            <td><input type="text" name="tendaydu" value="<?php echo $row['personnel_name'] ?>" class="add-edit-input"></td>
                        </tr>
                        <tr>
                            <td>Hình ảnh</td>
                            <td>
                                <img src="../img/uploads/<?php echo $row['personnel_img']; ?>" width="150px">
                                <input type="file" name="hinhanh">
                            </td>
                        </tr>
                        <tr>
                            <td>Giới tính</td>
                            <td>
                                <select name="gioitinh" class="add-edit-select">
                                    <?php 
                                        if($row['personnel_sex']==1) { ?>
                                        <option value="1" select>Nữ</option>
                                        <option value="0">Nam</option>
                                    <?php }else { ?>
                                        <option value="1">Nữ</option>
                                        <option value="0" select>Nam</option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>SĐT</td>
                            <td><input type="text" name="sdt" value="<?php echo $row['personnel_phone'] ?>" class="add-edit-input"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" value="<?php echo $row['personnel_email'] ?>" class="add-edit-input"></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><input type="text" name="diachi" value="<?php echo $row['personnel_address'] ?>" class="add-edit-input"></td>
                        </tr>
                        <tr>
                            <td>Vị trí</td>
                            <td>
                                <select name="vitri">
                                    <?php 
                                        if($row['personnel_location']==1) { ?>
                                            <option value="1" select>Nhân viên thử việc</option>
                                            <option value="0">Nhân viên chính thức</option>
                                    <?php }else { ?>
                                            <option value="1">Nhân viên thử việc</option>
                                            <option value="0" select>Nhân viên chính thức</option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Cửa hàng</td>
                            <td>
                                <select name="cuahang" class="add-edit-select">
                                    <?php 
                                        if($row['personnel_location']==1) { ?>
                                            <option value="1" select>Cơ sở 1</option>
                                            <option value="0">Cơ sở 2</option>
                                    <?php }else { ?>
                                            <option value="1">Cơ sở 1</option>
                                            <option value="0" select>Cơ sở 2</option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="function_click">
                                    <input type="submit" name="suanhansu" value="Cập nhập" class="add-edit-submit">
                                    <a href="index.php?action=quanlynhansu&query=lietke" class="function_click-back">
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