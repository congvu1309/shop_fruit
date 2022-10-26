<?php
    $sql_sua = "SELECT * FROM category WHERE category_id = '$_GET[iddanhmuc]' LIMIT 1";
    $query_sua = mysqli_query($conn,$sql_sua);
?>
<div class="card-body">
    <div class="table-responsive">
        <?php while($row = mysqli_fetch_array($query_sua)) { ?>
            <table class="table table-add-edit" id="dataTable" width="100%" cellspacing="0">
                <form method="post" action="category/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc'] ?>" autocomplete="off">
                    <thead>
                        <tr>
                            <td>Tên danh mục</td>
                            <td><input type="text" name="tendanhmuc" value="<?php echo $row['category_name'] ?>" class="add-edit-input"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="function_click">
                                    <input type="submit" name="suadanhmuc" value="Cập nhập" class="add-edit-submit">
                                    <a href="index.php?action=quanlydanhmuc&query=lietke" class="function_click-back">
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