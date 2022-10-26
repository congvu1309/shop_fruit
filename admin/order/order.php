<?php 
    include("../database/connect.php");
    $sql_lietke = "SELECT * FROM cart,customer WHERE cart.customer_id=customer.customer_id LIMIT 1";
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
                    <th>Thời gian đặt hàng</th>
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
                    <td width="5%"  align="center"><?php echo $i; ?></td>
                    <td width="30%" align="center"><?php echo $row['customer_name']; ?></td>  
                    <td width="25%" align="center"><?php echo $row['customer_phone']; ?></td>  
                    <td width="25%" align="center"><?php echo $row['date_submitted']; ?></td>
                    <td width="15%">
                        <div class="function_click">
                            <a href="?action=quanlydonhang&query=xem&iddonhang=<?php echo $row['customer_id'] ?>" class="function_click-see">
                                <i class="fas fa-fw fa-bars"></i>
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
                                            <a href="order/xuly.php?iddonhang=<?php echo $row['cart_id'] ?>" class="function_click-delete">Xóa</a>
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

