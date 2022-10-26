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
    <link href="../../font/fontawesome-free-6.1.2-web/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../css/index.css">
</head>

<body>

    <?php include("./header.php"); ?>

    <?php
        $sql_chitiet = "SELECT * FROM post WHERE post_id = '$_GET[idbaiviet]' LIMIT 1";
        $query_chitiet = mysqli_query($conn, $sql_chitiet);
        while ($row_chitiet = mysqli_fetch_array($query_chitiet)) { ?>

        <div class="detail_post">
            <h4 class="detail_post-h4"><?php echo $row_chitiet['post_name']; ?></h4>
            <div class="detail_post-text">
                <img src="../img/uploads/<?php echo $row_chitiet['post_img']; ?>" class="detail_post-img">
            </div>
            <div class="detail_post-content">
                <h6><?php echo $row_chitiet['post_content']; ?></h6>
            </div>
        </div>
    <?php } ?>

    <?php include("./footer.php"); ?>

</body>

</html>