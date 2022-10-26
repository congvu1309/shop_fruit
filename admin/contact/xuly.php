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
        $id = $_GET['idlienhe'];
        $sql_xoa="DELETE FROM contact WHERE contact_id ='".$id."'"; 
		mysqli_query($conn,$sql_xoa);
        header("Location:../index.php?action=quanlylienhe&query=lietke&msg=Xóa thành công!");
    }
?>