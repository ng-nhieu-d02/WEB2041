<div class="containerHistoryPrd">
    <div class="contentHistory">
        <?php
            while ($row = mysqli_fetch_assoc($data["historyPRd"])) {
            ?>
            <form class="content" method="POST">
                <div class="idSanPHtrP">
                    <input type="tel" name="checkIDSpinHtr" readonly value="<?= $row['id_sanpham'] ?>">
                </div>
                <div class="nameSpHtrP">
                    <input type="tel" name="checkNameSpinHtr" readonly value="<?= $row['name_sp'] ?>">
                </div>
                <div class="imgSpHtrP">
                    <img src="<?= $row['urlpicture'] ?>" alt="">
                </div>
                <div class="giaSpHtrP">
                    <input type="tel" name="checkPriceSpinHtr" readonly value="<?= number_format($row['giasanpham']) ?>">
                </div>
                <div class="inputDGia">
                    <input type="text" name="checkDGiaSpinHtr" placeholder="... Bình Luận Sản Phẩm">
                </div>
                <input type="submit" value="Gửi bình luận" name="btn-submit-commentP" class="btn-comment">
            </form>
        <?php
        }
        ?>
    </div>
</div>
<div class="containerAct">
    <h2>Lịch Sử Bình Luận</h2>
    <div class="contentHistory">
        <?php
            while ($row = mysqli_fetch_assoc($data["comment"])) {
        ?>
        <form method="POST" class="contentLiSu">
            <div class="idSanPCmt">
                <input type="tel" name="checkIDSpinCmt" readonly value="<?= $row['id_sanpham'] ?>">
            </div>
            <div class="nameSanPCmt">
                <input type="tel" name="checkNameSpinCmt" readonly value="<?= $row['name_sp'] ?>">
            </div>
            <div class="imgSpHtrPCmt">
                    <img src="<?= $row['urlpicture'] ?>" alt="">
            </div>
            <div class="inputDGia">
                    <input type="text" name="checkDGiaSpinHtrMoi" value="<?= $row['noidung'] ?>">
            </div>
            <input type="submit" value="Sửa Bình Luận" name="btn-submit-commentMMN" class="btn-comment">
            <input type="submit" value="Xoá" name="btn-submit-commentXoa" class="btn-removeCmt">
        </form>
        <?php
        }
        ?>
    </div>
</div>