<?php include("../../database/connect.php"); ?>

<?php 
    $tendanhmuc=$_POST['tendanhmuc'];
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    //them
    if(isset($_POST['suadanhmuc'])) {
	    // $sql_them="INSERT INTO category(category_name) VALUES ('".$tendanhmuc."')";
		// mysqli_query($conn,$sql_them);
		// header("Location:../index.php?action=quanlydanhmuc&query=lietke");
    //sua
    }elseif(isset($_POST['capnhatdonhang'])) {
        $sql_sua="UPDATE cart SET cart_status ='".$update_value."' WHERE cart_id ='$_GET[iddonhang]'";
    //xoa
    }else {
        $id=$_GET['iddonhang'];
        $sql_xoa="DELETE FROM cart WHERE cart_id ='".$id."'";
		mysqli_query($conn,$sql_xoa);
		header("Location:../index.php?action=quanlydonhang&query=lietke&msg=Xóa thành công!");
    }
?>