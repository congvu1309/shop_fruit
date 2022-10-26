<?php
    $sql_sua = "SELECT * FROM admin WHERE admin_id = '$_GET[idadmin]' LIMIT 1";
    $query_sua = mysqli_query($conn,$sql_sua);
?>

<div class="card-body">
    <div class="table-responsive">
        <?php while($row = mysqli_fetch_array($query_sua)) { ?>
            <table class="table table-add-edit" id="dataTable" width="100%" cellspacing="0">
                <form method="post" action="admin/xuly.php?idadmin=<?php echo $row['admin_id'] ?>" autocomplete="off">
                    <thead>
                        <tr>
                            <td>Họ tên</td>
                            <td><input type="text" name="tendaydu" value="<?php echo $row['admin_name']; ?>" class="add-edit-input"></td>
                        </tr>
                        <tr>
                            <td>SĐT</td>
                            <td><input type="text" name="sdt" value="<?php echo $row['admin_phone']; ?>" class="add-edit-input"></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><input type="text" name="diachi" value="<?php echo $row['admin_address']; ?>" class="add-edit-input"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" value="<?php echo $row['admin_email']; ?>" class="add-edit-input"></td>
                        </tr>
                        <tr>
                            <td>Tên đăng nhập</td>
                            <td><?php echo $row['admin_username']; ?></td>
                        </tr>
                        <tr>
                            <td>Mật khẩu</td>
                            <td><input type="text" name="matkhau" class="add-edit-input" required></td>
                        </tr>
                        <tr>
                            <td>Nhập lại mật khẩu</td>
                            <td><input type="text" name="rmatkhau" class="add-edit-input"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="function_click">
                                    <input type="submit" name="suaadmin" value="Cập nhập" class="add-edit-submit">
                                    <a href="index.php?action=quanlyadmin&query=lietke" class="function_click-back">
                                        <i class="fas fa-fw fa-arrow-left"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </thead>
                    <input type="hidden" name="idadmin" value="<?php echo $_GET['idadmin']; ?>"/>
                </form>
            </table>
        <?php } ?>
    </div>
</div>