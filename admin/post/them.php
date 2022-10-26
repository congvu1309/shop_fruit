<div class="card-body">
    <div class="table-responsive">
        <table class="table table-add-edit" id="dataTable" width="100%" cellspacing="0">
            <form method="post" action="post/xuly.php"  enctype="multipart/form-data" autocomplete="off">
                <thead>
                    <tr>
                        <td>Tiêu đề</td>
                        <td><textarea name="tieude" cols="99" rows="2" required></textarea></td>
                    </tr> 
                    <tr>
                        <td>Hình ảnh</td>
                        <td><input type="file" name="hinhanh" required></td>
                    </tr> 
                    <tr>
                        <td>Nội dung</td>
                        <td><textarea name="noidung" cols="50" rows="10"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="function_click">
                                <input type="submit" name="thembaiviet" value="Thêm mới" class="add-edit-submit">
                                <a href="index.php?action=quanlybaiviet&query=lietke" class="function_click-back">
                                    <i class="fas fa-fw fa-arrow-left"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                </thead>
            </form>
        </table>
    </div>
</div>