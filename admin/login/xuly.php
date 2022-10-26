<?php

    session_start();
    include("../../database/connect.php");

    if(isset($_POST['username']) && isset($_POST['password'])) {
        function validate($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $uname = validate($_POST['username']);
        $pass = validate($_POST['password']);
        if(empty($uname)) {
            header("Location:login.php?error=Bạn chưa nhập tên đăng nhập!");
            exit();
        }else if(empty($pass)) {
            header("Location:login.php?error=Bạn chưa nhập mật khẩu!");
            exit();
        }else {
            $sql = "SELECT * FROM admin WHERE admin_username = '$uname' AND admin_password = '$pass'";
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if($row['admin_username'] === $uname && $row['admin_password'] === $pass) {
                    $_SESSION['admin_username'] = $row['admin_username'];
                    $_SESSION['phanquyen'] = $row['admin_username'];
                    $_SESSION['admin_name'] = $row['admin_name'];
                    $_SESSION['admin_id'] = $row['admin_id'];
                    header("Location:../index.php");
                    exit();
                }else {
                    header("Location:login.php?error=Sai tên đăng nhập hoặc mật khẩu!");
                    exit();
                }
            }else {
                header("Location:login.php?error=Sai tên đăng nhập hoặc mật khẩu!");
                exit();
            }
        }
    }else {
        header('Location:login.php');
        exit();
    }