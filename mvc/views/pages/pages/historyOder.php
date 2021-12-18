<div class="containerHistory">
    <div class="contentHtr">
        <?php
        while ($row = mysqli_fetch_assoc($data["hoaDon"])) {
            if($row['status']==1){
                $str = "Chờ Xử Lý";
            } elseif($row['status']==2){
                $str = "Đang Xử Lý";
            } elseif($row['status']==3){
                $str = "Đã Huỷ";
            } elseif($row['status']==4){
                $str = "Thành Công";
            } else {
                $str = "Thất Bại";
            } 
        ?>
        <form method="POST">
            <div class="content">
            <p class="id-hoaDon"><input type="tel" name="checkID" readonly id="" value="<?= $row['id_hoadon'] ?>"></p>
            <p class="tongPrice"><?= number_format($row['count_price']) ?></p>
            <p class="creDate"><?= $row['created_date'] ?></p>
            <div class="Status"> <p><?= $str ?></p> </div>
            <div class="action">
                <div class="watchInfo">
                    <!-- <p>xem chi tiết</p> -->
                    <input type="submit" class="InputXemChiT" name="btn-XemChiT" readonly value="xem chi tiết">
                </div>
                <div class="huy">
                    <input type="submit" class="InputHuy" name="btn-HuyHD" disabled readonly value="Huỷ Đơn">
                </div>
            </div>
        </div>
        </form>
        <?php
        }
        ?>
    </div>
</div>