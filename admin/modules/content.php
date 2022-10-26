<?php
    include('../../database/connect.php');
?>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
    </div>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="index.php?action=quanlydanhmuc&query=lietke" class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                               Danh mục
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    $sql_category ="SELECT * FROM category ORDER BY category_id";
                                    $sodanhmuc = mysqli_query($conn,$sql_category);
                                    $row_danhmuc = mysqli_num_rows($sodanhmuc);
                                    echo $row_danhmuc;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="index.php?action=quanlysanpham&query=lietke" class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                               Sản phẩm
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    $sql_product ="SELECT * FROM product ORDER BY product_id";
                                    $sosanpham = mysqli_query($conn,$sql_product);
                                    $row_sanpham = mysqli_num_rows($sosanpham);
                                    echo $row_sanpham;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="index.php?action=quanlydonhang&query=lietke" class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Đơn hàng
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php
                                            $sql_order ="SELECT * FROM cart ORDER BY customer_id LIMIT 1";
                                            $sodonhang = mysqli_query($conn,$sql_order);
                                            $row_donhang = mysqli_num_rows($sodonhang);
                                            echo $row_donhang;
                                        ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="index.php?action=quanlybaiviet&query=lietke" class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                               Bài viết
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    $sql_post ="SELECT * FROM post ORDER BY post_id";
                                    $sobaiviet = mysqli_query($conn,$sql_post);
                                    $row_baiviet = mysqli_num_rows($sobaiviet);
                                    echo $row_baiviet;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        
    </div>
</div>