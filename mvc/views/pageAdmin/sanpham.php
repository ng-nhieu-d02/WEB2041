<div class="startMain"></div>
<div class="BodyMain">
    <div class="containerProd">
        <div class="containerDm">
            <h2>Danh Mục :</h2>
            <form class="thEmDM" method="post">
                <input type="text" name="NameDm" placeholder="Tên Danh Mục">
                <input type="submit" style="text-align: right;" value="Thêm Danh Mục">
            </form>
            <div class="contentDm">
                <?php 
                    while ($row = mysqli_fetch_assoc($data['danMuc'])) {
                ?>
                <form method="post">
                    <input type="tel" name="checkIDDm" readonly id="" value="<?= $row['id_danhmuc'] ?>">
                    <input type="tel" name="checkNameDm" id="" value="<?= $row['name_dm'] ?>">
                    <div class="action">
                        <input type="submit" class="SuaDanhMuc" name="btn-SuaDanhMuc" readonly value="Sửa">
                        <input type="submit" class="XoaDanhMuc" name="btn-XoaDanhMuc" readonly value="Xoá">
                    </div>
                </form>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="containerPrd">
            <h2>Sản Phẩm :</h2>
            <form class="thEmSp" method="post">
                <input type="text" name="NameSp" id="" placeholder="Tên Sản Phẩm">
                <input type="submit" style="text-align: right;" value="Thêm Sản Phẩm">
            </form>
            <div class="contentSp">
                <?php 
                    while ($row = mysqli_fetch_assoc($data['allProduct'])) {
                ?>
                <form method="post">
                        <input type="tel" name="checkIDSp" readonly id="" value="<?= $row['id_sanpham'] ?>">
                        <input type="tel" name="checkIDDmSp" id="" value="<?= $row['id_danhmuc'] ?>">
                        <input type="tel" name="checkNameSp" id="" value="<?= $row['name_sp'] ?>">
                        <input type="tel" name="checkNameSp" id="" value="<?= number_format($row['price']) ?>">
                        <input type="image" src="<?= $row['urlpicture'] ?>" id="imagesAdm" alt="" readonly>
                        <input type="tel" name="checkChiTSp" value="<?= $row['chitiet'] ?>">
                        <div class="action">
                            <input type="submit" class="SuaSpam" name="btn-SuaSpam" readonly value="Sửa">
                            <input type="submit" class="XoaSpam" name="btn-XoaSpam" readonly value="Xoá">
                        </div>
                </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="endMain"></div>