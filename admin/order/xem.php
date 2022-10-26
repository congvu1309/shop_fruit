<div class="detail_order">
    <div class="pay_customer">
        <?php 
        $sql_customer = "SELECT * FROM cart,customer WHERE cart.customer_id=customer.customer_id AND cart.customer_id = '$_GET[iddonhang]' LIMIT 1";
        $select_customer = mysqli_query($conn, $sql_customer);
        
        if (mysqli_num_rows($select_customer) > 0) {
            while ($fetch_customer = mysqli_fetch_array($select_customer)) { ?>
            <div> 
                <p>Chi tiết đơn hàng: <?php echo $fetch_customer['cart_id']; ?></p>
                <p>Tên khách hàng: <?php echo $fetch_customer['customer_name']; ?></p>
                <p>SĐT: <?php echo $fetch_customer['customer_phone']; ?></p>
                <p>Địa chỉ: <?php echo $fetch_customer['customer_address']; ?></p>
            </div>
        <?php } } ?>
    </div>
    
    <div class="table_pay">
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
                    $sql_cart = "SELECT * FROM cart WHERE customer_id = '$_GET[iddonhang]'";
                    $select_cart = mysqli_query($conn, $sql_cart);
                    $total_money = 0;
                    $i = 1; 
    
                    if (mysqli_num_rows($select_cart) > 0) {
                        while ($fetch_cart = mysqli_fetch_array($select_cart)) { ?>
                    <tr>
                        <td><?php echo $fetch_cart['product_name']; ?></td>
                        <td><?php echo number_format($fetch_cart['product_price'],0,',','.').'vnđ' ?></td>
                        <td><?php echo $fetch_cart['quanity']; ?></td>
                        <td><?php echo $sub_total = number_format($fetch_cart['product_price'] * $fetch_cart['quanity'],0,',','.').'vnđ'; ?></td>
                    </tr>
    
                    <?php $total_money += $sub_total; } ?>
                    
                    <tr class="total_money-pay">
                        <th colspan="3">Tổng</th>
                        <th><?php echo number_format($total_money,3,'.','.'); ?>vnđ</th>
                        <th></th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="function_click">
            <a href="index.php?action=quanlydonhang&query=lietke" class="function_click-back">
                <i class="fas fa-fw fa-arrow-left"></i>
            </a>
        </div>
    </div>
<?php } ?>
