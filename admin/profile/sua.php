<?php
    $sql_sua = "SELECT * FROM admin WHERE admin_id = '$_GET[idprofile]' LIMIT 1";
    $query_sua = mysqli_query($conn,$sql_sua);
?>

<div class="card-body">
    <div class="table-responsive">
        <?php while($row = mysqli_fetch_array($query_sua)) { ?>
            <table class="table table-add-edit" id="dataTable" width="100%" cellspacing="0">
                <form method="post" action="profile/xuly.php?idprofile=<?php echo $row['admin_id'] ?>" autocomplete="off">
                    <thead>
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
                                    <input type="submit" name="suaprofile" value="Cập nhập" class="add-edit-submit">
                                    <a href="index.php?action=quanlycanhan&query=lietke&idprofile=<?php echo $_SESSION['admin_id'] ?>" class="function_click-delete">
                                        <i class="fas fa-fw fa-arrow-left"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </thead>
                    <input type="hidden" name="idprofile" value="<?php echo $_GET['idprofile']; ?>"/>
                </form>
            </table>
        <?php } ?>
    </div>
</div>