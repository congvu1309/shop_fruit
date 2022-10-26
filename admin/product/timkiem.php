<?php
    if (isset($_GET['trang'])){
        $page = $_GET['trang'];
    }else{
        $page = '';
    }
    if ($page == '' || $page == 1){
        $begin = 0;
    }else {
        $begin = ($page*10)-10;
    }

    $sql_lietke = "SELECT * FROM product,category WHERE product.category_id=category.category_id ORDER BY product_id DESC LIMIT $begin,10";
    $query_lietke = mysqli_query($conn,$sql_lietke);
?>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên quả</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Danh mục</th>
                    <th>Trạng thái</th>
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
                    <td width="20%" align="center"><?php echo $row['product_name']; ?></td>    
                    <td width="10%"><img src="../img/uploads/<?php echo $row['product_img']; ?>" style="width:100%; padding: 5px;"></td>
                    <td width="15%" align="center"><?php echo number_format($row['product_price'],0,',','.').'vnđ' ?></td>
                    <td width="15%" align="center"><?php echo $row['category_name']; ?></td>
                    <td width="20%" align="center">
                        <?php if($row['product_status'] == 1) {
                            echo "<img src='../img/img_admin/onl.jpg' border='0'> Hoạt động";
                            }else {
                                echo "<img src='../img/img_admin/off.jpg' border='0'> Đang ẩn";
                            }
                        ?>
                    </td>
                    <td width="15%">
                        <div class="function_click">
                            <a href="?action=quanlysanpham&query=xem&idsanpham=<?php echo $row['product_id'] ?>" class="function_click-see">
                                <i class="fas fa-fw fa-eye"></i>
                            </a>
                            <a href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['product_id'] ?>" class="function_click-edit">
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
                                            <a href="product/xuly.php?idsanpham=<?php echo $row['product_id'] ?>" class="function_click-delete">Xóa</a>
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
        <?php
            $sql_product ="SELECT * FROM product ORDER BY product_id";
            $sosanpham = mysqli_query($conn,$sql_product);
            $row_sanpham = mysqli_num_rows($sosanpham);
            $trang = ceil($row_sanpham/10);
        ?>
        <?php
            for($i=1;$i<=$trang;$i++) { ?>
            <ul class="phan_trang">
                <li class="">
                    <a href="?action=quanlysanpham&query=lietke&trang=<?php echo $i ?>"><?php echo $i ?></a>
                </li>
            </ul>

        <?php } ?>
        </nav>
    </div>
</div>

