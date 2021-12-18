<div class="startMain"></div>
<div class="BodyMain">
    <h2 class="danhSach">Danh Sách Hoá Đơn : </h2>
    <div class="box-oder">
        <?php
        while ($row = mysqli_fetch_assoc($data["HoaDon"])) { ?>
            <form method="post" class="box-content-order">
                <input type="tel" name="checkID" readonly id="" value="<?= $row['id_hoadon'] ?>">
                <p class="tongPrice"><?= number_format($row['count_price']) ?></p>
                <p class="creDate"><?= $row['created_date'] ?></p>
                <div class="Status">
                    <select class="selectTT">
                        <?php
                        if ($row['status'] == 1) {
                            $str = "Chờ Xử Lý";
                        } elseif ($row['status'] == 2) {
                            $str = "Đang Xử Lý";
                        } elseif ($row['status'] == 3) {
                            $str = "Đã Huỷ";
                        } elseif ($row['status'] == 4) {
                            $str = "Thành Công";
                        } else {
                            $str = "Thất Bại";
                        }
                        for ($x = 1; $x < 6; $x++) {
                            if ($x == $row['status']) {
                        ?>
                                <option value="<?= $x ?>" selected class="TraThai"><?= $str ?></option>
                        <?php
                            }
                        }
                        ?>
                        <option value="1">Chờ Xử Lý</option>
                        <option value="2">Đang Xử Lý</option>
                        <option value="3">Đã Huỷ</option>
                        <option value="4">Thành Công</option>
                        <option value="5">Thất Bại</option>
                    </select>
                </div>
                <div class="action">
                    <div class="watchInfo">
                        <!-- <p>xem chi tiết</p> -->
                        <input type="submit" class="InputXemChiT" name="btn-XemChiT" readonly value="Xem chi tiết">
                    </div>
                    <div class="huy">
                        <input type="submit" class="InputHuy" name="btn-HuyHD" readonly value="Cập Nhật">
                    </div>
                </div>
            </form>
        <?php } ?>
    </div>
</div>
<div class="endMain"></div>