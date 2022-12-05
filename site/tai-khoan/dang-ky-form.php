<?php
if (strlen($MESSAGE)) {
    echo "<h5>$MESSAGE</h5>";
}
?>
<form action="dang-ky.php" method="post" enctype="multipart/form-data">
    <input name="ma_kh" value="<?= $ma_kh ?>">
    <input name="ho_ten" value="<?= $ho_ten ?>">
    <input name="email" value="<?= $email ?>">
    <input name="mat_khau" type="password" value="<?= $mat_khau ?>">
    <input name="mat_khau2" type="password" value="<?= $mat_khau2 ?>">
    <input name="up_hinh" type="file">
    <button name="btn_register">Đăng ký</button>
    <input name="vai_tro" value="0" type="hidden">
    <input name="kich_hoat" value="0" type="hidden">
</form>