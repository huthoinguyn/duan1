<?php
if (strlen($MESSAGE)) {
    echo "<h5>$MESSAGE</h5>";
}
?>
<form action="dang-nhap.php" method="post">
    <input name="ma_kh" value="<?= $ma_kh ?>">
    <input name="mat_khau" type="password" value="<?= $mat_khau ?>">
    <input name="ghi_nho" type="checkbox" checked>
    Ghi nhớ tài khoản?
    <button name="btn_login">Đăng nhập</button>
</form>