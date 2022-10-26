<div class="card-body">
    <div class="table-responsive">
        <table class="table table-add-edit" id="dataTable" width="100%" cellspacing="0">
            <form method="post" action="category/xuly.php" autocomplete="off">
                <thead>
                    <tr>
                        <td>Tên danh mục</td>
                        <td><input type="text" name="tendanhmuc" placeholder="Nhập để thêm" class="category-input" required></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="function_click">
                                <input type="submit" name="themdanhmuc" value="Thêm mới" class="add-edit-submit">
                                <a href="index.php?action=quanlydanhmuc&query=lietke" class="function_click-back">
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