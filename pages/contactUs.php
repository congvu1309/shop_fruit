<?php

    include("../database/connect.php");
    $err = [];

    if (isset($_POST['contact_name'])) {
        $contact_name = $_POST['contact_name'];
        $contact_phone = $_POST['contact_phone'];
        $contact_email = $_POST['contact_email'];
        $contact_address = $_POST['contact_address'];
        $contact_content = $_POST['contact_content'];
  
        if (empty($contact_name)) {
            $err['contact_name'] = 'Bạn chưa nhập họ tên!';
        }
        if (empty($contact_phone)) {
            $err['contact_phone'] = 'Bạn chưa nhập số điện thoại!';
        }
        if (empty($contact_email)) {
            $err['contact_email'] = 'Bạn chưa nhập email!';
        }
        if (empty($contact_address)) {
            $err['contact_address'] = 'Bạn chưa nhập tỉnh thành!';
        }
        if (empty($contact_content)) {
            $err['contact_content'] = 'Bạn chưa nhập nội dung!';
        }

        if (empty($err)) {
            $sql = "INSERT INTO contact(contact_name,contact_phone,contact_email,contact_address,contact_content) VALUES ('$contact_name','$contact_phone','$contact_email','$contact_address','$contact_content')";
            $query = mysqli_query($conn, $sql);
            if ($query) {
                $message = '<div class="alert alert-success d-flex align-items-center" role="alert">
                                Gửi tin nhắn thành công!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
            }
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@700;900&family=Roboto:ital,wght@0,100;0,300;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/contact.css">
</head>

<body>

    <?php include("./header.php"); ?>

    <!-- --Contact_Us-------- -->
    <div class="contactUs">
        <div class="contact_img"></div>
        <div class="contact_text">
            <h1>CONTACT US</h1>
            <p>HOME CONTATC US</p>
        </div>

        <div class="box">
            <div class="contact from">
                <h5 class="contact_h5">Gửi tin nhắn</h5>
                <form class="from_register" method="POST" role="form" autocomplete="off">
                    <div class="formBox">
                        <div class="row50">
                            <div class="inputBox">
                                <input type="text" placeholder="Họ và tên" name="contact_name">
                                <div class="has_error">
                                    <span><?php echo (isset($err['contact_name'])) ? $err['contact_name'] : '' ?></span>
                                </div>
                            </div>
                            <div class="inputBox">
                                <input type="text" placeholder="Số điện thoại" name="contact_phone">
                                <div class="has_error">
                                    <span><?php echo (isset($err['contact_phone'])) ? $err['contact_phone'] : '' ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row50">
                            <div class="inputBox">
                                <input type="text" placeholder="Tỉnh thành" name="contact_address">
                                <div class="has_error">
                                    <span><?php echo (isset($err['contact_address'])) ? $err['contact_address'] : '' ?></span>
                                </div>
                            </div>
                            <div class="inputBox">
                                <input type="text" placeholder="Email" name="contact_email">
                                <div class="has_error">
                                    <span><?php echo (isset($err['contact_email'])) ? $err['contact_email'] : '' ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="inputBox">
                                <textarea placeholder="Nội dung" name="contact_content"></textarea>
                                <div class="has_error">
                                    <span><?php echo (isset($err['contact_content'])) ? $err['contact_content'] : '' ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="inputBox">
                                <input type="submit" value="Gửi">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="contact info">
                <h5>Địa chỉ liên lạc</h5>
                <div class="infoBox">
                    <div>
                        <span><i class="bi bi-geo-alt-fill"></i></span>
                        <p class="contact_info-address">18 Tam Trinh</p>
                    </div>
                    <div>
                        <span><i class="bi bi-envelope-fill"></i></span>
                        <a href="#">dangxuantien123@gmail.com</a>
                    </div>
                    <div>
                        <span><i class="bi bi-telephone-fill"></i></span>
                        <a href="#">0123456671</a>
                    </div>
                    <!-- Social Media Links -->
                    <ul class="sci">
                        <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                        <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
                        <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            
            <div class="contact map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14900.979644331761!2d105.85459852673085!3d20.982817576370753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac3d5908f79d%3A0x9fd40d6905ec525d!2zMTggxJAuIFRhbSBUcmluaCwgSG_DoG5nIFbEg24gVGjhu6UsIEhhaSBCw6AgVHLGsG5nLCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1664212142348!5m2!1svi!2s"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <?php include("./footer.php"); ?>
    
</body>
</html>