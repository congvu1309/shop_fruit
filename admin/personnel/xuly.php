<?php include("../../database/connect.php"); ?>

<?php 
    $tendaydu=$_POST['tendaydu'];
    //xu ly hinh anh
    $hinhanh =$_FILES['hinhanh']['name'];
    $hinhanh_tmp =$_FILES['hinhanh']['tmp_name'];
    $hinhanh=time().'_'.$hinhanh;
    $gioitinh=$_POST['gioitinh'];
    $sdt=$_POST['sdt'];
    $email=$_POST['email'];
    $diachi=$_POST['diachi'];
    $vitri=$_POST['vitri'];
    $cuahang=$_POST['cuahang'];

    //them
    if(isset($_POST['themnhansu'])) {
	    $sql_them="INSERT INTO personnel(personnel_name,personnel_img,personnel_sex,personnel_phone,personnel_address,personnel_email,personnel_location,personnel_branch) 
            VALUES ('".$tendaydu."','".$hinhanh."','".$gioitinh."','".$sdt."','".$diachi."','".$email."','".$vitri."','".$cuahang."')";
        move_uploaded_file($hinhanh_tmp,'../../img/uploads/'.$hinhanh);
        mysqli_query($conn,$sql_them);
		header("Location:../index.php?action=quanlynhansu&query=lietke&msg=Thêm thành công!");
    //sua
    }elseif(isset($_POST['suanhansu'])) {
        if($hinhanh_tmp!="") {
            move_uploaded_file($hinhanh_tmp,'../../img/uploads/'.$hinhanh);
            $sql_sua="UPDATE personnel SET personnel_name ='".$tendaydu."',personnel_img ='".$hinhanh."',personnel_sex ='".$gioitinh."',personnel_phone ='".$sdt."',personnel_address ='".$diachi."',personnel_email ='".$email."',personnel_location ='".$vitri."',personnel_branch='".$cuahang."'
                WHERE personnel_id ='$_GET[idnhansu]'";
            $sql="SELECT * FROM personnel WHERE personnel_id = '$_GET[idnhansu]' LIMIT 1";
            $query=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_array($query)) {
                unlink('../../img/uploads/'.$row['personnel_img']);
            }
        }else{
            $sql_sua="UPDATE personnel SET personnel_name ='".$tendaydu."',personnel_sex ='".$gioitinh."',personnel_phone ='".$sdt."',personnel_address ='".$diachi."',personnel_email ='".$email."',personnel_location ='".$vitri."',personnel_branch='".$cuahang."'
                WHERE personnel_id ='$_GET[idnhansu]'";
        }
		mysqli_query($conn,$sql_sua);
        header("Location:../index.php?action=quanlynhansu&query=lietke&msg=Thay đổi thành công!");
    //xoa
    }else {
        $id=$_GET['idnhansu'];
        $sql="SELECT * FROM personnel WHERE personnel_id = '$id' LIMIT 1";
        $query=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($query)) {
            unlink('../../img/uploads/'.$row['personnel_img']);
        }
        $sql_xoa="DELETE FROM personnel WHERE personnel_id ='".$id."'";
		mysqli_query($conn,$sql_xoa);
        header("Location:../index.php?action=quanlynhansu&query=lietke&msg=Xóa thành công!");
    }
?>