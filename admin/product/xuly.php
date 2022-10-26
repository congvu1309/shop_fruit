<?php include("../../database/connect.php"); ?>

<?php 
    $tensanpham=$_POST['tensanpham'];
    //xu ly hinh anh
    $hinhanh =$_FILES['hinhanh']['name'];
    $hinhanh_tmp =$_FILES['hinhanh']['tmp_name'];
    $hinhanh=time().'_'.$hinhanh;
    $thuocloai=$_POST['thuocloai'];
    $gia=$_POST['gia'];
    $mota=$_POST['mota'];
    $noidung=$_POST['noidung'];
    $trangthai=$_POST['trangthai'];

    //them
    if(isset($_POST['themsanpham'])) {
	    $sql_them="INSERT INTO product(product_name,product_img,category_id,product_price,product_info,product_content,product_status) 
            VALUES ('".$tensanpham."','".$hinhanh."','".$thuocloai."','".$gia."','".$mota."','".$noidung."','".$trangthai."')";
        move_uploaded_file($hinhanh_tmp,'../../img/uploads/'.$hinhanh);
		mysqli_query($conn,$sql_them);
		header("Location:../index.php?action=quanlysanpham&query=lietke&msg=Thêm thành công!");
    //sua
    }elseif(isset($_POST['suasanpham'])) {
        if($hinhanh_tmp!="") {
            move_uploaded_file($hinhanh_tmp,'../../img/uploads/'.$hinhanh);
            $sql_sua="UPDATE product SET product_name='".$tensanpham."',product_img='".$hinhanh."',category_id='".$thuocloai."'',product_price='".$gia."',product_info='".$mota."',product_content='".$noidung."',product_status='".$trangthai."' 
                WHERE product_id = '$_GET[idsanpham]'";
            $sql="SELECT * FROM product WHERE product_id = '$_GET[idsanpham]' LIMIT 1";
            $query=mysqli_query($conn,$sql);
            while($rowsua=mysqli_fetch_array($query)) {
                unlink('../../img/uploads/'.$rowsua['product_img']);
            }
        }else{
            $sql_sua="UPDATE product SET product_name='".$tensanpham."',category_id='".$thuocloai."',product_price='".$gia."',product_info='".$mota."',product_content='".$noidung."',product_status='".$trangthai."' 
                WHERE product_id = '$_GET[idsanpham]'";
        }
        mysqli_query($conn,$sql_sua);
		header("Location:../index.php?action=quanlysanpham&query=lietke&msg=Thay đổi thành công!");
    }else {
        $id=$_GET['idsanpham'];
        $sql="SELECT * FROM product WHERE product_id = '$id' LIMIT 1";
        $query=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($query)) {
            unlink('../../img/uploads/'.$row['product_img']);
        }
        $sql_xoa="DELETE FROM product WHERE product_id ='".$id."'";
		mysqli_query($conn,$sql_xoa);
		header("Location:../index.php?action=quanlysanpham&query=lietke&msg=Xóa thành công!");
    }
?>
