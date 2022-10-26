<?php include("../../database/connect.php"); ?>

<?php 
    $tendanhmuc=$_POST['tendanhmuc'];
    //them
    if(isset($_POST['themdanhmuc'])) {
        $strSQL="SELECT COUNT(*) FROM category WHERE category_name='{$tendanhmuc}'";
		$category=mysqli_query($conn,$strSQL);
		$row=mysqli_fetch_array($category);
		if($row[0]>0){
            header("Location:../index.php?action=quanlydanhmuc&query=them&msg=Tên danh mục đã tồn tại vui lòng chọn tên khác!");
            exit();
        }else{
            $sql_them="INSERT INTO category(category_name) VALUES ('".$tendanhmuc."')";
        }
		mysqli_query($conn,$sql_them);
		header("Location:../index.php?action=quanlydanhmuc&query=lietke&msg=Thêm thành công!");
    //sua
    }elseif(isset($_POST['suadanhmuc'])) {
        $strSQL="SELECT COUNT(*) FROM category WHERE category_name='{$tendanhmuc}'";
		$category=mysqli_query($conn,$strSQL);
		$row=mysqli_fetch_array($category);
		if($row[0]>0){
            header("Location:../index.php?action=quanlydanhmuc&query=lietke&msg=Tên danh mục đã tồn tại vui lòng chọn tên khác!");
            exit();
        }else{
            $sql_sua="UPDATE category SET category_name ='".$tendanhmuc."' WHERE category_id='$_GET[iddanhmuc]'";
        }
		mysqli_query($conn,$sql_sua);
		header("Location:../index.php?action=quanlydanhmuc&query=lietke&msg=Thay đổi thành công!");
    //xoa
    }else {
        $id = $_GET['iddanhmuc'];
        $strSQL="SELECT COUNT(*) FROM product WHERE category_id = '".$id."'";
        $product=mysqli_query($conn,$strSQL);
        $row=mysqli_fetch_array($product);
        if($row[0]>0) {
            header("Location:../index.php?action=quanlydanhmuc&query=lietke&msg=Không thể xóa danh mục đã có sản phẩm!");
            exit();
        }else {
            $sql_xoa="DELETE FROM category WHERE category_id ='".$id."'"; 
        }
		mysqli_query($conn,$sql_xoa);
        header("Location:../index.php?action=quanlydanhmuc&query=lietke&msg=Xóa thành công!");
    }
?>
