
<div class="containerUser">
    <div class="menuUser">
        <h3>Menu Users</h3>
        <li>
            <a href="users/Home">Thông Tin Tài Khoản</a>
        </li>
        <li>
            <a href="users/HistoryOder">Lịch Sử Đặt Hàng</a>
        </li>
        <li>
            <a href="users/Banking">Tài Khoản Ngân Hàng</a>
        </li>
        <li>
            <a href="users/HistoryProduct">Sản Phẩm Đã Mua</a>
        </li>
        <li>
            <a href="users/HistoryActivities">Gửi Đánh Giá Shop</a>
        </li>
        
        <a href="index/Logout"><div>Log Out<i class="bi bi-box-arrow-left"></i></div></a>
    </div>
    <div class="contentUser">
        <?php
            require_once "./mvc/views/pages/pages/" . $data['function'] . ".php";
        ?>
    </div>
</div>