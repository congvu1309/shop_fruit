
<?php include("../../database/connect.php"); ?>

<?php 
    $tendaydu = $_POST['tendaydu'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];
    $email = $_POST['email'];
    $tendangnhap = $_POST['tendangnhap'];
    $matkhau = $_POST['matkhau'];
    $rmatkhau = $_POST['rmatkhau'];

    //them
    if(isset($_POST['themadmin'])) {
        if ($matkhau != $rmatkhau) {
            header("Location:../index.php?action=quanlyadmin&query=them&msg=Mật khẩu không trùng nhau!");
            exit();
        }
        $sql_them="INSERT INTO admin(admin_name,admin_phone,admin_address,admin_email,admin_username,admin_password) VALUES ('$tendaydu','$sdt','$diachi','$email','$tendangnhap','$matkhau')";
		mysqli_query($conn,$sql_them);
		header("Location:../index.php?action=quanlyadmin&query=lietke&msg=Thêm thành công!");
    //sua
    }elseif(isset($_POST['suaadmin'])) {
        if ($matkhau != $rmatkhau) {
            header("Location:../index.php?action=quanlyadmin&query=lietke&msg=Mật khẩu không trùng nhau!");
            exit();
        }
        $sql_sua="UPDATE admin SET admin_name='".$tendaydu."',admin_phone='".$sdt."',admin_address='".$diachi."',admin_email='".$email."',admin_password='".$matkhau."' WHERE admin_id = '$_GET[idadmin]'";
        mysqli_query($conn,$sql_sua);
        header("Location:../index.php?action=quanlyadmin&query=lietke&msg=Thay đổi thành công!");
    }else {
        $id = $_GET['idadmin'];   
        if($id=='1') {
            header("Location:../index.php?action=quanlyadmin&query=lietke&msg=Không thể xóa Admin!");
            exit();
        }else {
            $sql_xoa="DELETE FROM admin WHERE admin_id ='".$id."'"; 
        }
		mysqli_query($conn,$sql_xoa);
        header("Location:../index.php?action=quanlyadmin&query=lietke&msg=Xóa thành công!");
    }
?>