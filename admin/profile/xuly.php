
<?php include("../../database/connect.php"); ?>

<?php 
    $matkhau = $_POST['matkhau'];
    $rmatkhau = $_POST['rmatkhau'];

    $sql_chitiet = "SELECT * FROM admin WHERE admin_id ='$_GET[idprofile]' LIMIT 1";
    $query_chitiet = mysqli_query($conn,$sql_chitiet);
    //kiem tra mat khau trung nnhau
    if ($matkhau != $rmatkhau) {
        header("Location:../index.php?action=quanlycanhan&query=xem&msg=Mật khẩu không trùng nhau!");
        exit();
    }

    if(isset($_POST['idprofile'])) {  
        $sql_sua="UPDATE admin SET admin_password='".$matkhau."' WHERE admin_id = '$_GET[idprofile]'";
        mysqli_query($conn,$sql_sua);
        header("Location:../index.php?action=quanlycanhan&query=xem&msg=Thay đổi mật khẩu thành công!");
    }
    
?>