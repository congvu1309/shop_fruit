<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    if($_SESSION['phanquyen']!='admin') { ?>
        <p class="thongbao-phanquyen">
            <span>Bạn Không Đủ Quyền Quản Lý Mục Này</span><br>
            <span><a href="index.php">Bấm Vào Đậy Để Quay Lại Trang Chủ!</a></span>
        </p>
    <?php }else { ?>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-add-edit" id="dataTable" width="100%" cellspacing="0">
                <?php if(isset($_GET['msg'])) { ?>
                    <?php echo $_GET['msg']; ?>
                <?php } ?>
                <form method="post" action="admin/xuly.php" enctype="multipart/form-data" autocomplete="off">
                    <thead>
                        <tr>
                            <td>Họ tên</td>
                            <td><input type="text" name="tendaydu" class="add-edit-input" required></td>
                        </tr>
                        <tr>
                            <td>SĐT</td>
                            <td><input type="text" name="sdt" class="add-edit-input" required></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><input type="text" name="diachi" class="add-edit-input" required></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" class="add-edit-input" required></td>
                        </tr>
                        <tr>
                            <td>Tên đăng nhập</td>
                            <td><input type="text" name="tendangnhap" class="add-edit-input" required></td>
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
                                    <input type="submit" name="themadmin" value="Thêm mới" class="add-edit-submit">
                                    <a href="index.php?action=quanlyprofile&query=lietke" class="function_click-back">
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
<?php } ?>
