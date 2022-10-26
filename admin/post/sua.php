<?php
    $sql_sua = "SELECT * FROM post WHERE post_id = '$_GET[idbaiviet]' LIMIT 1";
    $query_sua = mysqli_query($conn,$sql_sua);
?>

<div class="card-body">
    <div class="table-responsive">
        <?php while($row = mysqli_fetch_array($query_sua)) { ?>
            <table class="table table-add-edit" id="dataTable" width="100%" cellspacing="0">
                <form method="post" action="post/xuly.php?idbaiviet=<?php echo $_GET['idbaiviet'] ?>" enctype="multipart/form-data" autocomplete="off">
                    <thead>
                        <tr>
                            <td>Tiêu đề</td>
                            <td><textarea name="tieude" cols="99" rows="2"><?php echo $row['post_name']; ?></textarea></td>
                        </tr> 
                        <tr>
                            <td>Hình ảnh</td>
                            <td>
                                <img src="../img/uploads/<?php echo $row['post_img']; ?>" width="150px">
                                <input type="file" name="hinhanh">
                            </td>
                        </tr> 
                        <tr>
                            <td>Nội dung</td>
                            <td><textarea name="noidung" cols="50" rows="10"><?php echo $row['post_content']; ?></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="function_click">
                                    <input type="submit" name="suabaiviet" value="Cập nhập" class="add-edit-submit">
                                    <a href="index.php?action=quanlybaiviet&query=lietke" class="function_click-back">
                                        <i class="fas fa-fw fa-arrow-left"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </thead>
                </form>
            </table>
        <?php } ?>
    </div>
</div>