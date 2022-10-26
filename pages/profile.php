<?php

    include("../database/connect.php");
    $err = [];

    if (isset($_POST['customer_username'])) {
        $customer_username = $_POST['customer_username'];
        $customer_password = $_POST['customer_password'];
        $customer_rpassword = $_POST['customer_rpassword'];
        $customer_name = $_POST['customer_name'];
        $customer_phone = $_POST['customer_phone'];
        $customer_email = $_POST['customer_email'];
        $customer_address = $_POST['customer_address'];
  
        if (empty($customer_username)) {
            $err['customer_username'] = 'Bạn chưa nhập tên đăng nhập!';
        }
        if (empty($customer_password)) {
            $err['customer_password'] = 'Bạn chưa nhập mật khẩu!';
        }
        if ($customer_password != $customer_rpassword) {
            $err['customer_rpassword'] = 'Nhập lại mật khẩu không chính xác!';
        }
        if (empty($customer_name)) {
            $err['customer_name'] = 'Bạn chưa nhập họ tên!';
        }
        if (empty($customer_phone)) {
            $err['customer_phone'] = 'Bạn chưa nhập số điện thoại!';
        }
        if (empty($customer_email)) {
            $err['customer_email'] = 'Bạn chưa nhập email!';
        }
        if (empty($customer_address)) {
            $err['customer_address'] = 'Bạn chưa nhập địa chỉ!';
        }

        if (empty($err)) {
            $pass = password_hash($customer_password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO customer(customer_username,customer_password,customer_name,customer_phone,customer_email,customer_address) VALUES ('$customer_username','$pass','$customer_name','$customer_phone','$customer_email','$customer_address')";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                $message = '<div class="alert alert-success d-flex align-items-center" role="alert">
                                Đăng kí thành công !!!!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
            }
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
    <link rel="stylesheet" href="../../css/login.css">
</head>

<body>

    <?php
        if (isset($message)) {
            echo $message;
        };
    ?>

    <?php include("./header.php"); ?>

    <div class="login_customer">
        <div class="content_customers">
            <img src="../img/login.jpg" alt="">
        </div>

        <form class="from_register" method="POST" role="form" autocomplete="off">
            <div class="icon_close_login">
                <a href="../index.php">
                    <i class="bi bi-x-lg"></i>
                </a>
            </div>

            <div class="text_register">
                <h2>Thông tin cá nhân</h2>
                <div class="icon_input_login">
                    <div class="user_register">
                        <i class="bi bi-person-circle"></i><input type="text" placeholder="Tên đăng nhập..." name="customer_username">
                        <div class="has_error">
                            <span><?php echo (isset($err['customer_username'])) ? $err['customer_username'] : '' ?></span>
                        </div>
                    </div>
                    <div class="password_register">
                        <i class="bi bi-lock-fill"></i><input type="password" placeholder="Mật khẩu..." name="customer_password">
                        <div class="has_error">
                            <span><?php echo (isset($err['customer_password'])) ? $err['customer_password'] : '' ?></span>
                        </div>
                    </div>
                    <div class="password_register">
                        <i class="bi bi-lock-fill"></i><input type="password" placeholder="Mật lại mật khẩu..." name="customer_rpassword">
                        <div class="has_error">
                            <span><?php echo (isset($err['customer_rpassword'])) ? $err['customer_rpassword'] : '' ?></span>
                        </div>
                    </div>
                    <div class="name_register">
                        <i class="bi bi-person-circle"></i><input type="text" placeholder="Họ tên..." name="customer_name">
                        <div class="has_error">
                            <span><?php echo (isset($err['customer_name'])) ? $err['customer_name'] : '' ?></span>
                        </div>
                    </div>
                    <div class="email_register">
                        <i class="bi bi-envelope-fill"></i><input type="email" placeholder="Email..." name="customer_email">
                        <div class="has_error">
                            <span><?php echo (isset($err['customer_email'])) ? $err['customer_email'] : '' ?></span>
                        </div>
                    </div>
                    <div class="phone_register">
                        <i class="bi bi-telephone-fill"></i><input type="text" placeholder="SĐT..." name="customer_phone">
                        <div class="has_error">
                            <span><?php echo (isset($err['customer_phone'])) ? $err['customer_phone'] : '' ?></span>
                        </div>
                    </div>
                    <div class="address_register">
                        <i class="bi bi-geo-alt-fill"></i><input type="text" placeholder="Địa chỉ..." name="customer_address">
                        <div class="has_error">
                            <span><?php echo (isset($err['customer_address'])) ? $err['customer_address'] : '' ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn_confirm" id="confirm">
                <button type="submit">Đăng kí</button>
            </div>

            <div class="btn_loginUser">
                <a href="../pages/login.php">Đăng nhập</a>
            </div>
        </form>
    </div>

    <?php include("./footer.php"); ?>
    
</body>
</html>