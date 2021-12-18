<div class="containerInfo">
    <div class="avatar">
        <?php 
            echo '<img src="'.$row['avata'].'" alt="">';
        ?>
    </div>
    <div class="contentinfo">
        <?php 
            echo ' 
            <form method="post" class="foMac">
                <div><span>Họ Tên : </span><input name="full-name" type="text" required value="'.$row['full_name'].'"></div>
                <div><span>Avatar : </span><input type="file" name="avatarInfo" id="avatarInfo" required accept="images/*"></div>
                <div><span>Email : </span><input type="text" value="'.$row['email'].'" disabled></div>
                <div><span>Password : </span><input name="pass-word" type="password" placeholder="Nếu không muốn đổi password thì bỏ trống vùng này"></div>
                <div><span>Địa chỉ : </span><input name="dia-chi" required type="text" value="'.$row['address'].'"></div>
                <div><span>Số Điện Thoại : </span><input name="phone-number" required type="text" value="'.$row['phone_number'].'"></div>
                <div><div></div><button type="submit" name="btn-info" class="btn-info">Cập Nhật<nav></nav></button></div>
            </form>';
        ?>
    </div>
</div>