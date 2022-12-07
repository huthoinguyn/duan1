<?php

require '../../pdo.php';
require '../../global.php';
require '../../dao/khach-hang.php';

if (exist_param("btn_login")) {
    $ma_kh = $_POST['ma_kh'];
    $mat_khau = $_POST['mat_khau'];
    $user = khach_hang_login($ma_kh);
    if (!empty($ma_kh) && !empty($mat_khau)) {
        if ($user) {
            if ($user['mat_khau'] == $mat_khau) {
                $MESSAGE = "Đăng nhập thành công!";
                $_SESSION["user"] = $user;
                // Xử lý ghi nhớ tài khoản
                // Quay trở lại trang được yêu cầu
                if (isset($_SESSION['request_uri'])) {
                    header("location: " . $_SESSION['request_uri']);
                }
                echo 'success';
                if (exist_param("ghi_nho")) {
                    add_cookie("ma_kh", $ma_kh, 30);
                    add_cookie("mat_khau", $mat_khau, 30);
                } else {
                    delete_cookie("ma_kh");
                    delete_cookie("mat_khau");
                }
            } else {
                $MESSAGE = "Sai mật khẩu!";
                echo "Password is not true!";
            }
        } else {
            echo "Username is not true or your account is unactive";
            $MESSAGE = "Sai mã đăng nhập!";
        }
    } else {
        echo "All field are require!";
    }
} else {
    if (exist_param("btn_logoff")) {
        session_unset();
        echo "Logout Successfully";
    }
    $ma_kh = get_cookie("ma_kh");
    $mat_khau = get_cookie("mat_khau");
}
// $VIEW_NAME = "tai-khoan/dang-nhap-form.php";
// require '../layout.php';
