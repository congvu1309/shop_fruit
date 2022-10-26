<!DOCTYPE html>
<html>
<head>
    <title>Shop Fruit</title>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700;900&family=Roboto:ital,wght@0,100;0,300;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</head>

<body>
    <!-- slider_img -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../img/img_slider/slider1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../img/img_slider/slider2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../img/img_slider/slider3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="bi bi-arrow-left-circle left_icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="bi bi-arrow-right-circle right_icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- End slider_img -->

    <div class="lines"></div>

    <!-- --Store offers-- -->
    <div class="content_store">
        <div class="text_store">
            <h2>DỊCH VỤ</h2>
            <p>Khách hàng sẽ nhận được nhiều <br> ưu đãi khác nhau</p>
        </div>

        <div class="endows">
            <div class="endow_content">
                <img src="../img/img_endows/free-delivery.jpg" alt="">
                <div class="endow_text">
                    <h5>MIỄN PHÍ VẬN CHUYỂN</h5>
                    <p>Đối với đơn đặt hàng trên $100</p>
                </div>
            </div>
            <div class="endow_content">
                <img src="../img/img_endows/diet.jpg" alt="">
                <div class="endow_text">
                    <h5>HOA QUẢ TƯƠI SẠCH</h5>
                    <p>Quy trình nhập hàng, vận chuyển, <br> bảo quản chuyên nghiệp</p>
                </div>
            </div>
            <div class="endow_content">
                <img src="../img/img_endows/award.jpg" alt="">
                <div class="endow_text">
                    <h5>CHẤT LƯỢNG CAO</h5>
                    <p>Đặt sức khỏe người tiêu dùng <br> lên hàng đầu</p>
                </div>
            </div>
            <div class="endow_content">
                <img src="../img/img_endows/customer-service.jpg" alt="">
                <div class="endow_text">
                    <h5>HỖ TRỢ</h5>
                    <p>24/7</p>
                </div>
            </div>
        </div>
    </div>
    <!-- -- End Store offers-- -->

    <div class="lines"></div>

    <!-- --New_product----- -->
    <div class="content_news">
        <div class="text_news">
            <h2>Sản phẩm mới</h2>
            <p>Sản phẩm mới phù hợp với người dùng</p>
        </div>
        <div class="all_product">
            <div class="list_product">
                <div class="row_product" id="product">
                    <?php
                        $sql_products = "SELECT * FROM product LIMIT 1,4 ";
                        $select_products = mysqli_query($conn, $sql_products);
                        if (mysqli_num_rows($select_products) > 0) {
                            while ($ftech_product = mysqli_fetch_assoc($select_products)) { ?>
                                <form action="" method="POST">
                                    <div class="col_product">
                                        <div class="product_item">
                                            <div class="product_img">
                                                <img src="../img/uploads/<?php echo $ftech_product['product_img'] ?>" alt="">
                                            </div>
                                            <div class="product_text">
                                                <h6><?php echo $ftech_product['product_name'] ?></h6>
                                                <input type="number" name="quanity" min="1" max="10" value="1"> KG
                                                <div class="product_price"><?php echo number_format($ftech_product['product_price'],0,',','.').'vnđ' ?></div>
                                            </div>

                                            <div class="icon_product">
                                                <input type="hidden" name="id" value="<?php echo $ftech_product['product_id'] ?>">
                                                <input type="hidden" name="product_name" value="<?php echo $ftech_product['product_name'] ?>">
                                                <input type="hidden" name="product_price" value="<?php echo $ftech_product['product_price'] ?>">
                                                <input type="hidden" name="product_img" value="<?php echo $ftech_product['product_img'] ?>">
                                                <a href="pages/detail_product.php?idsanpham=<?php echo $ftech_product['product_id'] ?>" class="favorites">Chi tiết</a>
                                                <?php
                                                    if ($is_login == true) {
                                                        echo '<input type="submit" name="add_to_cart" value="Thêm giỏ" class="bi bi-cart-fill cart"> ';
                                                        header("Location:../../../pages/cart.php");
                                                    }elseif ($is_login == false) {
                                                        echo '
                                                        <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <input type="submit" name="add_to_cart" value="Thêm giỏ" class="bi bi-cart-fill cart">
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thông Báo</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">Bạn phải đăng nhập để thêm giỏ hàng</div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                                        <a type="button" class="btn btn-primary" href="../pages/login.php" style="background-color: #82ae46;">Đăng Nhập</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="view_all">
            <button class="btn_all"><a href="../pages/search.php">Xem tất cả </a></button>
        </div>
    </div>
    <!-- --End New_product----- -->

    <div class="lines"></div>

    <!-- ---Vegetable--- -->
    <div class="content_news">
        <div class="text_news">
            <h2>Rau</h2>
            <p>Rau tươi và sạch an toàn vệ sinh thực phẩm</p>
        </div>

        <div class="products">
            <div class="product_item">
                <div class="product_img">
                    <img src="../../img/img_item/item4.jpg" alt="">
                </div>
                <div class="text_product">
                    <h6>BELL PEPPER</h6>
                    <p>perfect</p>
                    <div class="price">$80</div>
                </div>
                <div class="icon_product">
                    <input type="submit" name="addcart" value="Chi tiết" class="bi bi-cart-fill cart" class="bi bi-heart-fill favorites">
                    <input type="submit" name="add_to_cart" value="Thêm giỏ" class="bi bi-cart-fill cart">
                </div>
            </div>

            <div class="product_item">
                <div class="product_img">
                    <img src="../../img/img_item/cachua.jpg" alt="">
                </div>

                <div class="text_product">
                    <h6>BELL PEPPER</h6>
                    <p>perfect</p>
                    <div class="price">$80</div>
                </div>
                <div class="icon_product">
                    <input type="submit" name="addcart" value="Chi tiết" class="bi bi-cart-fill cart" class="bi bi-heart-fill favorites">
                    <input type="submit" name="add_to_cart" value="Thêm giỏ" class="bi bi-cart-fill cart">
                </div>
            </div>

            <div class="product_item">
                <div class="product_img">
                    <img src="../../img/img_item/carot.jpg" alt="">
                </div>
                <div class="text_product">
                    <h6>BELL PEPPER</h6>
                    <p>perfect</p>
                    <div class="price">$80</div>
                </div>
                <div class="icon_product">
                    <input type="submit" name="addcart" value="Chi tiết" class="bi bi-cart-fill cart" class="bi bi-heart-fill favorites">
                    <input type="submit" name="add_to_cart" value="Thêm giỏ" class="bi bi-cart-fill cart">
                </div>
            </div>

            <div class="product_item">
                <div class="product_img">
                    <img src="../../img/img_item/hanh.jpg" alt="">
                </div>
                <div class="text_product">
                    <h6>BELL PEPPER</h6>
                    <p>perfect</p>
                    <div class="price">$80</div>
                </div>
                <div class="icon_product">
                    <input type="submit" name="addcart" value="Chi tiết" class="bi bi-cart-fill cart" class="bi bi-heart-fill favorites">
                    <input type="submit" name="add_to_cart" value="Thêm giỏ" class="bi bi-cart-fill cart">
                </div>
            </div>
        </div>

        <div class="view_all">
            <button class="btn_all"><a href="../pages/search.php">Xem tất cả </a></button>
        </div>
    </div>
    <!-- ---End Vegetable--- -->

    <div class="lines"></div>

    <!-- ---Fruit------ -->
    <div class="content_news">
        <div class="text_news">
            <h2>Trái cây</h2>
            <p>Trái cây sạch và chất lượng cho người dùng</p>
        </div>

        <div class="products">
            <div class="product_item">
                <div class="product_img">
                    <img src="../../img/img_item/ot.jpg" alt="">
                </div>
                <div class="text_product">
                    <h6>BELL PEPPER</h6>
                    <p>perfect</p>
                    <div class="price">$80</div>
                </div>
                <div class="icon_product">
                    <input type="submit" name="addcart" value="Chi tiết" class="bi bi-cart-fill cart" class="bi bi-heart-fill favorites">
                    <input type="submit" name="add_to_cart" value="Thêm giỏ" class="bi bi-cart-fill cart">
                </div>
            </div>

            <div class="product_item">
                <div class="product_img">
                    <img src="../../img/img_item/suplo.jpg" alt="">
                </div>
                <div class="text_product">
                    <h6>BELL PEPPER</h6>
                    <p>perfect</p>
                    <div class="price">$80</div>
                </div>
                <div class="icon_product">
                    <input type="submit" name="addcart" value="Chi tiết" class="bi bi-cart-fill cart" class="bi bi-heart-fill favorites">
                    <input type="submit" name="add_to_cart" value="Thêm giỏ" class="bi bi-cart-fill cart">
                </div>
            </div>

            <div class="product_item">
                <div class="product_img">
                    <img src="../../img/img_item/tao.jpg" alt="">
                </div>
                <div class="text_product">
                    <h6>BELL PEPPER</h6>
                    <p>perfect</p>
                    <div class="price">$80</div>
                </div>
                <div class="icon_product">
                    <input type="submit" name="addcart" value="Chi tiết" class="bi bi-cart-fill cart" class="bi bi-heart-fill favorites">
                    <input type="submit" name="add_to_cart" value="Thêm giỏ" class="bi bi-cart-fill cart">
                </div>
            </div>

            <div class="product_item">
                <div class="product_img">
                    <img src="../../img/img_item/toi.jpg" alt="">
                </div>
                <div class="text_product">
                    <h6>BELL PEPPER</h6>
                    <p>perfect</p>
                    <div class="price">$80</div>
                </div>
                <div class="icon_product">
                    <input type="submit" name="addcart" value="Chi tiết" class="bi bi-cart-fill cart" class="bi bi-heart-fill favorites">
                    <input type="submit" name="add_to_cart" value="Thêm giỏ" class="bi bi-cart-fill cart">
                </div>
            </div>
        </div>

        <div class="view_all">
            <button class="btn_all"><a href="../pages/search.php">Xem tất cả </a></button>
        </div>
    </div>
    <!-- ---End Fruit--- -->

    <div class="lines"></div>


    <!-- ---Customer_reviews---- -->
    <div class="customer_review">
        <div class="text_customer">
            <h2>PHẢN HỒI CỦA KHÁCH HÀNG</h2>
            <p>Những đánh giá và ý kiến của khách hàng được chúng tôi cập nhật liên tục</p>
        </div>

        <div class="customers_evaluate">
            <div class="content_customer">
                <div class="img_content">
                    <img src="../img/img_customer/customer2.jpg" alt="">
                </div>
                <div class="text_content">
                    <h5>Dang Xuan Tien</h5>
                    <p>“Trái cây rất ngon và sạch, <br>tôi sẽ mua nhiều hơn trong tương lai”</p>
                </div>
            </div>

            <div class="content_customer">
                <div class="img_content">
                    <img src="../img/img_customer/customer3.jpg" alt="">
                </div>
                <div class="text_content">
                    <h5>Doan Cong Vu</h5>
                    <p>“Tư vấn nhiệt tình, <br> chu đáo, vận chuyển nhanh”</p>
                </div>
            </div>

            <div class="content_customer">
                <div class="img_content">
                    <img src="../img/img_customer/customer4.jpg" alt="">
                </div>
                <div class="text_content">
                    <h5>Giang</h5>
                    <p>“Very good”</p>
                </div>
            </div>
        </div>
    </div>
    <!-- ---End Customer_reviews---- -->

</body>

</html>