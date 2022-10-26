<?php
    $sql_lietke = "SELECT * FROM contact ORDER BY contact_id DESC";
    $query_lietke = mysqli_query($conn,$sql_lietke);
?>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Họ tên</th>
                    <th>SĐT</th>
                    <th>Mã liên hệ</th>
                    <th>Ngày gửi</th>
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
                    <td width="25%" align="center"><?php echo $row['contact_name']; ?></td>
                    <td width="20%" align="center"><?php echo $row['contact_phone']; ?></td>
                    <td width="15%" align="center"><?php echo $row['contact_id']; ?></td>
                    <td width="20%" align="center"><?php echo $row['date_submitted']; ?></td>
                    <td width="15%">
                        <div class="function_click">
                            <a href="?action=quanlylienhe&query=xem&idlienhe=<?php echo $row['contact_id'] ?>" class="function_click-see">
                                <i class="fas fa-fw fa-eye"></i>
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
                                            <a href="contact/xuly.php?idlienhe=<?php echo $row['contact_id'] ?>" class="function_click-delete">Xóa</a>
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