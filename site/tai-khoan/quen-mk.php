<?php

require '../../global.php';
require '../../pdo.php';
require '../../dao/khach-hang.php';
extract($_REQUEST);
$VIEW_NAME = "tai-khoan/quen-mk-form.php";
if (exist_param("btn_forgot")) {
    $ma_kh = $_POST['ma_kh'];
    $email = $_POST['email'];
    $user = khach_hang_select_by_id($ma_kh);
    if ($user) {
        if ($user['email'] != $email) {
            $MESSAGE = "Sai địa chỉ email!";
            echo "Email is not true";
        } else {
            $MESSAGE = "Mật khẩu của bạn là: " . $user['mat_khau'];
            echo "Your password is: " . $user['mat_khau'];
            // $VIEW_NAME = "../trang-chinh/index.php";
            global $ma_kh, $mat_khau;
        }
    } else {
        $MESSAGE = "Sai tên đăng nhập!";
        echo "Username is not true";
    }
}
// require '../layout.php';
