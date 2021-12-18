<div class="containerABX">
    <form class="inputReview" method="POST">
        <img src="./public/images/logo123.png" alt="">
        <input type="text" name="NoiDReview" id="nhpReview" placeholder="Nhập Nội Dung">
        <input type="submit" value="Gửi Review" class="guiReview" name="guiReview">
    </form>
    <form class="containerReview" method="POST">
        <h2>LỊCH SỬ REVIEW</h2>
        <?php
            while ($row = mysqli_fetch_assoc($data["review"])) {
        ?>
        <div class="contentReview">
            <div class="noiDuReview">
                <input type="text" name="NDreview" id="" value="<?= $row['noidung'] ?>">
            </div>
            <div class="SuaReview">
                <input type="submit" value="Sửa review" name="SuaReview">
            </div>
            <div class="XoaReview">
                <input type="submit" value="Xoá" name="XoaReview">
            </div>
        </div>
        <?php
        }
        ?>
    </form>
</div>