<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    if($_SESSION['phanquyen']!='admin') { ?>
        <p class="thongbao-phanquyen">
            <span>Bạn Không Đủ Quyền Quản Lý Mục Này</span><br>
            <span><a href="index.php">Bấm Vào Đậy Để Quay Lại Trang Chủ!</a></span>
        </p>
        <?php }else {
        $sql_lietke = "SELECT * FROM admin ORDER BY admin_id DESC";
        $query_lietke = mysqli_query($conn,$sql_lietke);
    ?>

    <div class="card-body">
        <div class="table-responsive">
            <div class="container-add-right">
                <div class="container-add">
                    <a href="index.php?action=quanlyadmin&query=them" class="container-add-click">Thêm mới</a>
                </div>
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ tên</th>
                        <th>Tên đăng nhập</th>
                        <th>Quyền hạn</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <?php
                    $i = 0;
                    while($row = mysqli_fetch_array($query_lietke)) {
                    $i++;
                ?>
                <tbody>
                    <tr>
                        <td width="5%" align="center"><?php echo $i; ?></td>
                        <td width="30%" align="center"><?php echo $row['admin_name']; ?></td>
                        <td align="center"><?php echo $row['admin_username']; ?></td>
                        <td align="center"> 
                            <?php if($row['admin_id'] == 1) {
                                echo "Admin";
                                }else {
                                    echo "Quản trị viên";
                                }
                            ?>
                        </td>
                        <td width="15%">
                            <div class="function_click">
                                <a href="?action=quanlyadmin&query=xem&idadmin=<?php echo $row['admin_id'] ?>" class="function_click-see">
                                    <i class="fas fa-fw fa-eye"></i>
                                </a>
                                <a href="?action=quanlyadmin&query=sua&idadmin=<?php echo $row['admin_id'] ?>"class="function_click-edit">
                                    <i class="fas fa-fw fa-pen"></i>
                                </a>                          
                                <!-- Button trigger modal -->
                                <button type="button" data-toggle="modal" data-target="#exampleModal" class="function_click-delete">
                                    <i class="fas fa-fw fa-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có thực sự muốn xóa không?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <a href="admin/xuly.php?idadmin=<?php echo $row['admin_id'] ?>" class="function_click-delete">Xóa</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <?php } ?>
            </table>
        </div>
    </div>
<?php } ?>

