<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost/mYproduct/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./public/css/admin.css" type="text/css" media="screen">
    <!-- <link rel="stylesheet" href="../public/css/style.css"> -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="menu">
            <div class="logo">
                <img src="./public/images/logo123.png" alt="">
            </div>
            <nav class="dashboard">
                <div><a href="admin/Home">Dashboard</a></div>
            </nav>
            <nav class="hoaDon">
                <div><a href="admin/order">Order Manager</a></div>
            </nav>
            <nav class="product">
                <div><a href="admin/product">Product Manager</a></div>
            </nav>
            <nav class="comment">
                <div><a href="admin/comment">Comment Manager</a></div>
            </nav>
            <nav class="blog">
                <div><a href="admin/blogs">Blog Manager</a></div>
            </nav>
            <div class="logoutAdmin">
                <img src="./public/images/pic-1.png" alt="">
                <div>Name Admin <i style="margin-left: 10px;" class="bi bi-reply-all-fill"></i> </div>
            </div>
        </div>
        <div class="main">
            
            <?php
            require_once "./mvc/views/pageAdmin/" . $data['pageAdmin'] . ".php";
            ?>
            
        </div>
    </div>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="./public/js/admin.js"></script>
</body>
</html>