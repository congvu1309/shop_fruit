<?php include("../../database/connect.php"); ?>

<?php 
    $tieude=$_POST['tieude'];
    //xu ly hinh anh
    $hinhanh =$_FILES['hinhanh']['name'];
    $hinhanh_tmp =$_FILES['hinhanh']['tmp_name'];
    $hinhanh=time().'_'.$hinhanh;
    $noidung=$_POST['noidung'];
    //them
    if(isset($_POST['thembaiviet'])) {
	    $sql_them="INSERT INTO post(post_name,post_img,post_content) VALUES ('".$tieude."','".$hinhanh."','".$noidung."')";
        move_uploaded_file($hinhanh_tmp,'../../img/uploads/'.$hinhanh);
        mysqli_query($conn,$sql_them);
		header("Location:../index.php?action=quanlybaiviet&query=lietke&msg=Thêm thành công!");
    //sua
    }elseif(isset($_POST['suabaiviet'])) {
        if($hinhanh_tmp!="") {
            move_uploaded_file($hinhanh_tmp,'../../img/uploads/'.$hinhanh);
            $sql_sua="UPDATE post SET post_name ='".$tieude."',post_img ='".$hinhanh."',post_content ='".$noidung."' WHERE post_id='$_GET[idbaiviet]'";
            $sql="SELECT * FROM post WHERE post_id = '$_GET[idbaiviet]' LIMIT 1";
            $query=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($query)) {
                unlink('../../img/uploads/'.$row['post_img']);
            }
        }else{
            $sql_sua="UPDATE post SET post_name ='".$tieude."',post_content ='".$noidung."' WHERE post_id='$_GET[idbaiviet]'";
        }
        mysqli_query($conn,$sql_sua);
		header("Location:../index.php?action=quanlybaiviet&query=lietke&msg=Thay đổi thành công!");
    //xoa
    }else {
        $id=$_GET['idbaiviet'];
        $sql="SELECT * FROM post WHERE post_id = '$id' LIMIT 1";
        $query=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($query)) {
            unlink('../../img/uploads/'.$row['post_img']);
        }
        $sql_xoa="DELETE FROM post WHERE post_id ='".$id."'";
		mysqli_query($conn,$sql_xoa);
		header("Location:../index.php?action=quanlybaiviet&query=lietke&msg=Xóa thành công!");
    }
?>