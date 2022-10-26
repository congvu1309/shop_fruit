<?php
    $sql_lietke = "SELECT * FROM customer ORDER BY customer_id DESC";
    $query_lietke = mysqli_query($conn,$sql_lietke);
?>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên khách hàng</th>
                    <th>SĐT</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Chức năng</th>
                </tr>
            </thead>
            <?php
                $i = 0;
                while($row = mysqli_fetch_array($query_lietke)){
                $i++;
            ?>
            <tbody>
                <tr>
                    <td width="5%" align="center"><?php echo $i; ?></td>
                    <td width="20%" align="center"><?php echo $row['customer_name']; ?></td>
                    <td width="12%" align="center"><?php echo $row['customer_phone']; ?></td>
                    <td width="30%" align="center"><?php echo $row['customer_address']; ?></td>
                    <td width="18%" align="center"><?php echo $row['customer_email']; ?></td>
                    <td width="15%">
                        <div class="function_click">
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
                                            <a href="customer/xuly.php?idkhachhang=<?php echo $row['customer_id'] ?>" class="function_click-delete">Xóa</a>
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