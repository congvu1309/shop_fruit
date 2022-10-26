<?php

    include("../database/connect.php");

    $users = (isset($_SESSION['customers'])) ? $_SESSION['customers'] : [];
    $user_id = $_SESSION['customers']['customer_id'];

    if (isset($_GET['payment_confirmation'])) {
        $query = mysqli_query($conn, "SELECT * FROM `cart`");
        if ($query) {
            $message = '<div class="alert alert-success d-flex align-items-center" role="alert">
                            Đặt hàng thành công !!!!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700;900&family=Roboto:ital,wght@0,100;0,300;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/index.css">
</head>

<body>

    <?php include ("./header.php") ?>

    <!-- --Communications--- -->
    <div class="communications">
        <div class="container_comm">
            <div class="container">
                <div class="container_right">
                    <div class="container_text">
                        <p>Xác nhận thanh toán</p>
                    </div>
                    <div class="pay_info">
                        <div class="pay_customer">
                            <?php 
                                $sql_customer = "SELECT * FROM customer WHERE customer_id = '$user_id'";
                                $select_customer = mysqli_query($conn, $sql_customer);
                                $i = 1; 

                                if (mysqli_num_rows($select_customer) > 0) {
                                    while ($fetch_customer = mysqli_fetch_array($select_customer)) { ?>
                                <div> 
                                    <p>Tên khách hàng: <?php echo $fetch_customer['customer_name']; ?></p>
                                    <p>SĐT: <?php echo $fetch_customer['customer_phone']; ?></p>
                                    <p>Địa chỉ: <?php echo $fetch_customer['customer_address']; ?></p>
                                </div>
                            <?php } }?>
                        </div>
                        <table class="table_pay">
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $sql_cart = "SELECT * FROM cart WHERE customer_id = '$user_id'";
                                    $select_cart = mysqli_query($conn, $sql_cart);
                                    $total_money = 0;
                                    $i = 1; 

                                    if (mysqli_num_rows($select_cart) > 0) {
                                        while ($fetch_cart = mysqli_fetch_array($select_cart)) { ?>
                                    <tr>
                                        <td><?php echo $fetch_cart['product_name']; ?></td>
                                        <td><?php echo number_format($fetch_cart['product_price'],0,'.','.').'vnđ' ?></td>
                                        <td><?php echo $fetch_cart['quanity']; ?></td>
                                        <td><?php echo $sub_total = number_format($fetch_cart['product_price'] * $fetch_cart['quanity'],0,'.','.'); ?>vnđ</td>
                                    </tr>

                                    <?php $total_money += $sub_total; }; }; ?>
                                    
                                    <tr class="total_money-pay">
                                        <th colspan="3">Tổng</th>
                                        <th><?php echo number_format($total_money,3,'.','.').'vnđ' ?></th>
                                        <th></th>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="container_text">
                        <div class="discount_code">
                            <div class="btn_code">
                                Mã giảm giá:
                                <input type="text"> 
                                <button>Áp dụng</button>
                            </div>
                        </div>
                        <div class="payment_methods">
                            <div class="payment_methods_text">
                                <div>Phương thức thanh toán:</div>
                                <form action="" class="payment">
                                    <input type="radio" name="fav_language" id="cod" value="cod">
                                    <label for="cod">Thanh toán khi nhận hàng (COD)</label><br>
                                    <input type="radio" name="fav_language" id="account" value="account">
                                    <label for="account">Thanh toán qua tài khoản ngân hàng</label><br>
                                </form>   
                            </div>
                        </div>
                    </div>
                    <div class="button_cart">
                        <a href="pay.php?payment_confirmation">Xác nhận</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include("./footer.php"); ?>

</body>
</html>