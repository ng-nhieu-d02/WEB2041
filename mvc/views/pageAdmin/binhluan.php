<section class="review" id="review">

    <div class="swiper review-slider">
    <h2>REVIEW : </h2>
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