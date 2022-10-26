<?php include("../../database/connect.php"); ?>

<?php 
    $tendanhmuc=$_POST['tendanhmuc'];
    //them
    if(isset($_POST['themdanhmuc'])) {
	    // $sql_them="INSERT INTO category(category_name) VALUES ('".$tendanhmuc."')";
		// mysqli_query($conn,$sql_them);
		// header("Location:../index.php?action=quanlydanhmuc&query=lietke");
    //sua
    }elseif(isset($_POST['suadanhmuc'])) {
        // $sql_sua="UPDATE category SET category_name ='".$tendanhmuc."' WHERE category_id='$_GET[iddanhmuc]'";
		// mysqli_query($conn,$sql_sua);
		// header("Location:../index.php?action=quanlydanhmuc&query=lietke");
    //xoa
    }else {
        $id = $_GET['idkhachhang'];
        $strSQL="SELECT COUNT(*) FROM cart WHERE customer_id = '".$id."'";
        $cart=mysqli_query($conn,$strSQL);
        $row=mysqli_fetch_array($cart);
        if($row[0]>0) {
            header("Location:../index.php?action=quanlykhachhang&query=lietke&msg=Không thể xóa khách hàng đã có đơn đặt hàng!");
            exit();
        }else {
            $sql_xoa="DELETE FROM customer WHERE customer_id ='".$id."'"; 
        }
		mysqli_query($conn,$sql_xoa);
        header("Location:../index.php?action=quanlykhachhang&query=lietke&msg=Xóa thành công!");
    }
?>