<?php

    include("../database/connect.php");
    $arr = "";
    $err = [];

    if (isset($_POST['customer_username'])) {
        $customer_username = $_POST['customer_username'];
        $customer_password = $_POST['customer_password'];

        $sql = "SELECT * FROM customer WHERE customer_username = '$customer_username'";
        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($query);

        $check_customer_name = mysqli_num_rows($query);

        if ($check_customer_name == 1) {
            $checkPass = password_verify($customer_password, $data['customer_password']);
            if ($checkPass) {
                $_SESSION['customers'] = $data;
                $_SESSION['customer_name'] = $data['customer_name'];
                header("location:../../../../index.php");
            } else {
                $err['customer_password'] = 'Sai mật khẩu!';
            }
        }
        if ($customer_username == $arr) {
            $err['customer_username'] = 'Bạn chưa nhập tên đăng nhập!';
        } elseif ($check_customer_name != 1) {
            $err['customer_username'] = 'Tên đăng nhập không tồn tại!';
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

    <?php include("./header.php"); ?>

    <div class="login_customer">
        <div class="content_customers">
            <img src="../img/login.jpg" alt="">
        </div>

        <form class="from_login" method="POST" role="form" autocomplete="off">
            <div class="icon_close_login">
                <a href="../index.php">
                    <i class="bi bi-x-lg"></i>
                </a>
            </div>

            <div class="text_login">
                <h2>Đăng nhập</h2>
                <div class="icon_input_login">
                    <div class="user_login">
                        <i class="bi bi-person-circle"></i><input type="text" placeholder="Tên đăng nhập..." name="customer_username">
                        <div class="err_log">
                            <span><?php echo (isset($err['customer_username'])) ? $err['customer_username'] : '' ?></span>
                        </div>
                    </div>
                    <div class="password_login">
                        <i class="bi bi-lock-fill"></i><input type="password" placeholder="Mật khẩu..." name="customer_password">
                        <div class="err_log">
                            <span><?php echo (isset($err['customer_password'])) ? $err['customer_password'] : '' ?></span>
                        </div>
                    </div>
                </div>

                <div class="forgot_password">
                    <a href="#">Quên mật khẩu?</a>
                </div>
            </div>

            <div class="btn_login">
                <button class="register_btn" id="register">
                    <a href="../pages/register.php">Đăng kí</a>
                </button>
                <button class="login_btn">Đăng nhập</button>
            </div>
        </form>
    </div>

    <?php include("./footer.php"); ?>

</body>

</html>