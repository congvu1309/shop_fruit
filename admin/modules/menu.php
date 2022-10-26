<div class="container-fluid">
    <div class="row">
        <?php 
            if(isset($_GET['action']) && $_GET['query']){
                $hienthi = $_GET['action'];
                $query = $_GET['query'];
            }else{
                $hienthi = "";
                $query = "";
            }

            //danh muc
            if($hienthi=='quanlydanhmuc' && $query=='lietke'){
                include("category/category.php");
            }elseif($hienthi=='quanlydanhmuc' && $query=='them'){
                include("category/them.php");
            }elseif($hienthi=='quanlydanhmuc' && $query=='sua'){
                include("category/sua.php");
            }//san pham
            elseif($hienthi=='quanlysanpham' && $query=='lietke'){
                include("product/product.php");
            }elseif($hienthi=='quanlysanpham' && $query=='them'){
                include("product/them.php");
            }elseif($hienthi=='quanlysanpham' && $query=='sua'){
                include("product/sua.php");
            }elseif($hienthi=='quanlysanpham' && $query=='xem'){
                include("product/xem.php");
            }//khach hang
            elseif($hienthi=='quanlykhachhang' && $query=='lietke'){
                include("customer/customer.php");
            }//lienhe
            elseif($hienthi=='quanlylienhe' && $query=='lietke'){
                include("contact/contact.php");
            }elseif($hienthi=='quanlylienhe' && $query=='xem'){
                include("contact/xem.php");
            }//baii viet
            elseif($hienthi=='quanlybaiviet' && $query=='lietke'){
                include("post/post.php");
            }elseif($hienthi=='quanlybaiviet' && $query=='them'){
                include("post/them.php");
            }elseif($hienthi=='quanlybaiviet' && $query=='sua'){
                include("post/sua.php");
            }elseif($hienthi=='quanlybaiviet' && $query=='xem'){
                include("post/xem.php");
            }//nhan su
            elseif($hienthi=='quanlynhansu' && $query=='lietke'){
                include("personnel/personnel.php");
            }elseif($hienthi=='quanlynhansu' && $query=='them'){
                include("personnel/them.php");
            }elseif($hienthi=='quanlynhansu' && $query=='sua'){
                include("personnel/sua.php");
            }elseif($hienthi=='quanlynhansu' && $query=='xem'){
                include("personnel/xem.php");
            }//admin
            elseif($hienthi=='quanlyadmin' && $query=='lietke'){
                include("admin/admin.php");
            }elseif($hienthi=='quanlyadmin' && $query=='them'){
                include("admin/them.php");
            }elseif($hienthi=='quanlyadmin' && $query=='sua'){
                include("admin/sua.php");
            }elseif($hienthi=='quanlyadmin' && $query=='xem'){
                include("admin/xem.php");
            }//order
            elseif($hienthi=='quanlydonhang' && $query=='lietke'){
                include("order/order.php");
            }elseif($hienthi=='quanlydonhang' && $query=='xem'){
                include("order/xem.php");
            }//profile
            elseif($hienthi=='quanlycanhan' && $query=='lietke'){
                include("profile/profile.php");
            }elseif($hienthi=='quanlycanhan' && $query=='sua'){
                include("profile/sua.php");
            }elseif($hienthi=='quanlycanhan' && $query=='xem'){
                include("profile/xem.php");
            }
            
            else{
                include('modules/content.php');
            }
        ?>
    </div>
</div>