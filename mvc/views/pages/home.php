<section class="home" id='home'>
    <div>
        <img src="./public/images/3.png" alt="" class="meat">
        <img src="./public/images/2.png" alt="" class="egg">
        <img src="./public/images/4.png" alt="" class="canned-food">
    </div>
</section>
<section class="Certification" id="Certification">
    <div class="header-cer">
        <div class="title-cer">
            <h1><span>Certification</span></h1>
        </div>
    </div>
    <div class="box-container">
        <div class="box">
            <img src="./public/images/5.png" alt="">
            <h3>Chất Lượng Tuyệt Đối</h3>
            <p>Fristi với sửa và vitamin A,B,D bổ sung thêm chất sơ - hỗ trợ hệ tiêu hoá cho siêu anh hùng nhí.</p>
            <a href="#" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="./public/images/6.png" alt="">
            <h3>Giao Hàng Thần Tốc</h3>
            <p>Fristi với sửa và vitamin A,B,D bổ sung thêm chất sơ - hỗ trợ hệ tiêu hoá cho siêu anh hùng nhí.</p>
            <a href="#" class="btn">read more</a>
        </div>

        <div class="box">
            <img src="./public/images/7.png" alt="">
            <h3>Thanh toán dễ dàng</h3>
            <p>Fristi với sửa và vitamin A,B,D bổ sung thêm chất sơ - hỗ trợ hệ tiêu hoá cho siêu anh hùng nhí.</p>
            <a href="#" class="btn">read more</a>
        </div>
    </div>
</section>
<section class="product" id="product">
    <div class="header-prd">
        <div class="title-prd">
            <h1><span>Products</span></h1>
        </div>
    </div>
    <div class="box-container box-product">

        <?php
        while ($row = mysqli_fetch_assoc($data["product"])) {
        ?>
            <div class="box">
                <img src="<?= $row['urlpicture'] ?>" alt="">
                <h3><?= $row['name_sp'] ?></h3>
                <p><?= number_format($row['price']) ?></p>
                <a class="btn btn-add-to-card" name=<?= $row['id_sanpham'] ?>>add to your cart</a>
            </div>
        <?php
        }
        ?>
    </div>
</section>
<section class="review" id="review">
    <div class="header-review">
        <div class="title-review">
            <h1><span>Customer's review</span></h1>
        </div>
    </div>
    <div class="swiper review-slider">
        <div class="swiper-wrapper">

            <?php
            while ($row = mysqli_fetch_assoc($data["review"])) {
            ?>
                <div class="swiper-slide box">
                    <img src="<?= $row['avata'] ?>" alt="">
                    <p><?= $row['noidung'] ?></p>
                    <h3><?= $row['full_name'] ?></h3>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>
<section class="blogs" id="blogs">
    <div class="header-blogs">
        <div class="title-blogs">
            <h1><span>Blogs</span></h1>
        </div>
    </div>
    <div class="box-container">
        <?php
        while ($row = mysqli_fetch_assoc($data["blog"])) {
        ?>
            <div class="box">
                <img src="<?= $row['urlpiture'] ?>" alt="">
                <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fas fa-user"></i> by user </a>
                        <a href="#"> <i class="fas fa-calendar"></i> <?= $row['created_time'] ?> </a>
                    </div>
                    <h3><?= $row['title'] ?></h3>
                    <p><?= $row['main'] ?></p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>