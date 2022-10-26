<?php
    include("../database/connect.php");
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
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/index.css">
</head>

<body>

    <?php include ("./header.php") ?>

    <div class="head_post">
        <div class="head_post-img"></div>
        <div class="head_post-text">
            <h1>POST</h1>
            <p>News of the world</p>
        </div>
    </div>


    <div class="table_post">
        <h2>Tin tức mới</h2>
        <table>
            <tbody>
                <?php
                    $sql_post = "SELECT * FROM post";
                    $select_post = mysqli_query($conn, $sql_post);
                    $total_money = 0;
                    $i = 1; 

                    if (mysqli_num_rows($select_post) > 0) {
                        while ($fetch_post = mysqli_fetch_array($select_post)) { ?>
                    <div class="row">
                        <div class="col-md-7">
                            <a href="detail_post.php?idbaiviet=<?php echo $fetch_post['post_id'] ?>">
                                <img class="img-responsive post_img" src="../img/uploads/<?php echo $fetch_post['post_img']; ?>" alt="">
                            </a>
                        </div>
                        <div class="col-md-5">
                            <h2><?php echo substr($fetch_post['post_name'], 0, 25) ?>...</h2>
                            <a class="btn btn-primary" href="detail_post.php?idbaiviet=<?php echo $fetch_post['post_id'] ?>">Xem Bài <span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                    </div>
                    <?php }; }; ?>
            </tbody>
        </table>
    </div>

    <?php include ("./footer.php") ?>

</body>
</html>