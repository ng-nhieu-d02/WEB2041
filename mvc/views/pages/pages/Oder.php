<form method="post" class="Oder">
    <div class="contentPrd">
        
    </div>
    <div class="infoOder">
        <div class="logoOder">
            <img src="./public/images/logo123.png" alt="">
        </div>
        <div>
            <span>Địa Chỉ : </span><input type="text" name="diaChi" id="diaChi" value="<?= $row['address'] ?>">
        </div>
        <div>
            <span>Số Điện Thoại : </span><input type="text" name="sdt" id="sdt" value="<?= $row['phone_number'] ?>">
        </div>
        <nav class="infoOder123">

        </nav>
        <input type="submit" value="Xác Nhận Đặt Hàng" class="btn-Oder" name="btn-Oder">
    </div>
    
</form>