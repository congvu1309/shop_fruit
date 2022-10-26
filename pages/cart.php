<?php
    include("../database/connect.php");
    $users = (isset($_SESSION['customers'])) ? $_SESSION['customers'] : [];
    $user_id = $_SESSION['customers']['customer_id'];

    if (isset($_POST['update_update_btn'])) {
        $update_value = $_POST['update_quantity'];
        $update_id = $_POST['update_quantity_id'];
        $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quanity = '$update_value' WHERE cart_id = '$update_id'");
        if ($update_quantity_query) {
            header('location:cart.php');
            exit();
        };
    };


    if (isset($_GET['remove'])) {
        $remove_id = $_GET['remove'];
        mysqli_query($conn, "DELETE FROM `cart` WHERE cart_id = '$remove_id'");
        header('location:cart.php');
        exit();
    };

    if (isset($_GET['delete_all'])) {
        mysqli_query($conn, "DELETE FROM `cart`");
        header('location:cart.php');
        exit();
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
    <link rel="stylesheet" href="../../css/cart.css">
</head>

<body>

    <?php include ("./header.php") ?>

    <!-- ---Cart------- -->
    <div class="head_cart">
        <div class="cart_img"></div>
        <div class="cart_text">
            <h1>MY CART</h1>
            <p>My shopping cart</p>
        </div>
    </div>

    <!-- ---List_cart---- -->
    <div class="table_cart">
        <table class="table">
            <thead class="text_center_cart">
                <tr>
                <th>STT</th>
                <th>Hình ảnh</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th></th>
                </tr>
            </thead>

            <tbody class="text_center">
                <?php
                    $sql_cart = "SELECT * FROM cart WHERE customer_id = '$user_id'";
                    $select_cart = mysqli_query($conn, $sql_cart);
                    $total_money = 0;
                    $i = 1; 

                    if (mysqli_num_rows($select_cart) > 0) {
                        while ($fetch_cart = mysqli_fetch_array($select_cart)) { ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td class="product_img">
                            <img src="../img/uploads/<?php echo $fetch_cart['product_img']; ?>" alt="">
                        </td>
                        <td class="product_name">
                            <h5><?php echo $fetch_cart['product_name']; ?></h5>
                        </td>
                        <td class="product_price"><?php echo number_format($fetch_cart['product_price'],0,',','.').'vnđ' ?></td>
                        <td class="product_quanity">
                            <form action="" method="post">
                                <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['cart_id']; ?>">
                                <input type="number" name="update_quantity" min="1" max="10" value="<?php echo $fetch_cart['quanity']; ?>">
                                <input type="submit" value="Update" name="update_update_btn">
                            </form>
                        </td>
                        <td class="procduct_total"><?php echo $sub_total = number_format($fetch_cart['product_price'] * $fetch_cart['quanity'],0,',','.').'vnđ' ?></td>
                        <td class="product_remove"><a href="cart.php?remove=<?php echo $fetch_cart['cart_id']; ?>"><i class="bi bi-x-lg"></i></a></td>
                    </tr>

                    <?php $total_money += $sub_total; } ?>
                    
                    <tr class="total_money">
                        <th colspan="5">Tổng</th>
                        <th><?php echo number_format($total_money,3,'.','.').'vnđ' ?></th>
                        <th></th>
                    </tr>
                    <?php } else { ?>
                        <tr class="total_money">
                            <th colspan="6">Hiện tại giỏ hàng đang trống</th>
                        <th></th>
                    </tr>
                    <?php } ?>

            </tbody>
        </table>
    </div>

    <div class="button_cart">
        <a href="cart.php?delete_all"> Xóa toàn bộ khỏi giỏ hàng</a>
        <a href="../pages/search.php"> Thêm sản phẩm vào giỏ hàng</a>
        <a href="../pages/pay.php"> Thanh toán</a>
    </div>

    <?php include("./footer.php"); ?>

</body>
</html>