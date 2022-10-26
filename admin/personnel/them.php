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
                <form method="post" action="personnel/xuly.php" enctype="multipart/form-data" autocomplete="off">
                    <thead>
                        <tr>
                            <td>Họ tên</td>
                            <td><input type="text" name="tendaydu" class="add-edit-input" required></td>
                        </tr>
                        <tr>
                            <td>Hình ảnh</td>
                            <td><input type="file" name="hinhanh" required></td>
                        </tr>
                        <tr>
                            <td>Giới tính</td>
                            <td>
                                <select name="gioitinh" class="add-edit-select">
                                    <option value="1">Nữ</option>
                                    <option value="0">Nam</option>
                                </select>
                            </td>
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
                            <td>Vị trí</td>
                            <td>
                                <select name="vitri">
                                    <option value="1">Nhân viên thử việc</option>
                                    <option value="0">Nhân viên chính thức</option>
                                </select>
                            </td>
                        </tr> 
                        <tr>
                            <td>Cửa hàng</td>
                            <td>
                                <select name="cuahang" class="add-edit-select">
                                    <option value="1">Cơ sở 1</option>
                                    <option value="0">Cơ sở 2</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="function_click">
                                    <input type="submit" name="themnhansu" value="Thêm mới" class="add-edit-submit">
                                    <a href="index.php?action=quanlynhansu&query=lietke" class="function_click-back">
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
