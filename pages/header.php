<?php
    include('../database/connect.php');
    $users = (isset($_SESSION['customers'])) ? $_SESSION['customers'] : [];
    $customer = $_SESSION['customers'];
    $user_id = $_SESSION['customers']['customer_id'];

    $is_login = false;
    if (isset($_SESSION['customers'])) {
        $is_login = true;
    } else {
        $is_login = false;
    }

    if ($is_login == true) {
        if (isset($_POST['add_to_cart'])) {
            $customer_id = $customer['customer_id'];
            $product_id = $_POST['id'];
            $cart_id = $_POST['cart_id'];
            $product_img = $_POST['product_img'];
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_quanity = $_POST['quanity'];

            $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE customer_id = '$customer_id' AND product_id = '$product_id'");

            if (mysqli_num_rows($select_cart) > 0) {
                $row = $select_cart->fetch_array();
                $new_quanity = $product_quanity + $row['quanity'];
                // var_dump($new_quanity);
                $sql = "UPDATE cart SET quanity ='$new_quanity' WHERE customer_id = '$customer_id' AND product_id = '$product_id'";
                $query = mysqli_query($conn, $sql);
                $message = '<div class="alert alert-success d-flex align-items-center" role="alert">
                    Thêm sản phẩm vào giỏ hàng thành công!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            } else {
                $sql = "INSERT INTO cart (customer_id,product_id,product_img, product_name, product_price, quanity) VALUES ('$customer_id','$product_id','$product_img','$product_name','$product_price','$product_quanity')";
                $query = mysqli_query($conn, $sql);
                $message = '<div class="alert alert-success d-flex align-items-center" role="alert">
                    Thêm sản phẩm vào giỏ hàng thành công!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
    }

?>

<!DOCTYPE html>
<html>

<head>
    <title>Shop Fruit</title>
    <link rel="stylesheet" href="../css/all_product.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
</head>

<body>

    <?php
        if (isset($message)) {
            echo $message;
        };
    ?>

    <header>
        <div class="nav_bar">
            <img src="../../img/logo.jpg" alt="" class="logo">
            <ul id="ul_nav">
                <li><a href="../index.php">Trang chủ</a></li>
                <li><a href="../pages/store_info.php">Về chúng tôi</a></li>
                <li><a href="../pages/search.php">Sản phẩm</a></li>
                <li><a href="../pages/contactUs.php">Liên hệ</a></li>
                <li><a href="../pages/post.php">Tin tức</a></li>
            </ul>

            <form action="../pages/search.php" method="post" autocomplete="off">
                <div class="container-content">
                    <div class="container-search">
                        <div class="container-wrap">
                            <input type="text" name="tukhoa" id="tukhoa" placeholder="Nhập để tìm kiếm" class="container-input" />
                            <button type="submit" name="search" class="container-btn">
                                <input type="hidden" name="query" value="lietke">
                                <i class="bi-search" id="search_icon"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="header_customer">
                <div class="icon">
                    <i class="bi bi-heart love"></i>
                    <?php
                    if ($is_login == true) {
                        echo '<a href="../../pages/cart.php"><i class="bi bi-cart2 cart margin_icon"></i></a>';
                    } elseif ($is_login == false) {
                        echo '<a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-cart2 cart margin_icon"></i></a>
      
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Thông báo</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">Bạn phải đăng nhập để thêm giỏ hàng</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                            <a type="button" class="btn btn-primary" href="../../pages/login.php" style="background-color: #82ae46;">Đăng nhập</a>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                    }
                    ?>

                    <?php if (isset($_SESSION['customers'])) { ?>

                        <div class="dropdown">
                            <i class="bi bi-person-circle user" id="user"><span><?php echo $_SESSION['customer_name'] ?></span></i>
                            <div class="drop_menu" id="drop_menu">
                                <li><a href="../../pages/logout.php">Đăng xuất</a></li>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="dropdown">
                            <i class="bi bi-person-circle user" id="user"></i>
                            <div class="drop_menu" id="drop_menu">
                                <li><a href="../pages/login.php">Đăng nhập</a></li>
                                <li><a href="../pages/register.php">Đăng kí</a></li>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="list_icon">
                <i class="bi bi-list"></i>
            </div>
        </div>
    </header>

    <script src="../../js/user.js"></script>

</body>

</html>