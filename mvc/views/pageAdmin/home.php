<div class="startMain"></div>
<div class="BodyMain">
    <div class="box-content">
        <div class="info-web">
            <div>
                <p>Member :</p>
                <h2><?= mysqli_num_rows($data['TongMember']) ?></h2>
            </div>
            <i class="bi bi-people-fill"></i>
        </div>
        <div class="info-web">
            <div>
                <p>Sản Phẩm :</p>
                <h2><?= mysqli_num_rows($data['TongProduct']) ?></h2>
            </div>
            <i class="bi bi-card-list"></i>
        </div>
        <div class="info-web">
            <div>
                <p>Truy Cập :</p>
                <h2>98</h2>
            </div>
            <i class="bi bi-geo-fill"></i>
        </div>
        <div class="info-web">
            <div>
                <p>Doanh Thu :</p>
                <h2>
                    <?php
                    $count = 0;
                    while (($row = mysqli_fetch_assoc($data["TongDThu"]))) {
                        $count += $row['count_price'];
                    }
                    echo number_format($count);
                    ?>
                </h2>
            </div>
            <i class="bi bi-file-earmark-bar-graph"></i>
        </div>
        <div class="info-web">
            <div>
                <p>Tổng Hoá Đơn :</p>
                <h2><?= mysqli_num_rows($data['TongHoaDon']) ?></h2>
            </div>
            <i class="bi bi-stack"></i>
        </div>
        <div class="info-web">
            <div>
                <p>Chờ Xử lí :</p>
                <h2><?= mysqli_num_rows($data['TongHoaDonChoXl']) ?></h2>
            </div>
            <i class="bi bi-stickies-fill"></i>
        </div>
        <div class="info-web">
            <div>
                <p>Đang Xử Lí :</p>
                <h2><?= mysqli_num_rows($data['TongHoaDonDXl']) ?></h2>
            </div>
            <i class="bi bi-stickies"></i>
        </div>
        <div class="info-web">
            <div>
                <p>Đã Xử Lí :</p>
                <h2><?= mysqli_num_rows($data['TongHoaDonDaXl']) ?></h2>
            </div>
            <i class="bi bi-tags-fill"></i>
        </div>
    </div>
    <div class="box-member">
        <h2>Thành Viên Vip :</h2>
        <form method="POST" class="title-member">
            <p>ID</p>
            <p>Tên Thành Viên</p>
            <p>Email</p>
            <p>Số Đơn Hàng</p>
        </form>
        <?php
        while (($row = mysqli_fetch_assoc($data["vipProfile"]))) {
        ?>
            <form method="POST" class="title-member">
                <p><?= $row['id_users'] ?></p>
                <p><?= $row['full_name'] ?></p>
                <p><?= $row['email'] ?></p>
                <p><?= $row['TongHoaDon'] ?></p>
            </form>
        <?php
        }
        ?>

    </div>
</div>
<div class="endMain"></div>