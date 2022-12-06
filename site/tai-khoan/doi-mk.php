<?php
require '../../pdo.php';
require '../../global.php';
require '../../dao/khach-hang.php';
if (exist_param("btn_change")) {
    $ma_kh = $_POST['ma_kh'];
    $mat_khau = $_POST['mat_khau'];
    $mat_khau2 = $_POST['mat_khau2'];
    $mat_khau3 = $_POST['mat_khau3'];
    if(!empty($ma_kh) && !empty($mat_khau)  && !empty($mat_khau2)  && !empty($mat_khau3)){
        if ($mat_khau2 != $mat_khau3) {
            $MESSAGE = "Xác nhận mật khẩu mới không đúng!";
            echo "Confirm new password is not true";
        } else {
            $user = khach_hang_select_by_id($ma_kh);
            if ($user) {
                if ($user['mat_khau'] == $mat_khau) {
                    try {
                        $ho_ten = $user['ho_ten'];
                        $kich_hoat = $user['kich_hoat'];
                        $hinh = $user['hinh'];
                        $email = $user['email'];
                        $vai_tro = $user['vai_tro'];
                        khach_hang_change_password($ma_kh, $mat_khau2, $ho_ten, $kich_hoat, $hinh, $email, $vai_tro);
                        $MESSAGE = "Đổi mật khẩu thành công!";
                        echo "Change password successfully";
                    } catch (Exception $exc) {
                        $MESSAGE = "Đổi mật khẩu thất bại !";
                        echo "Change password fail";
                    }
                } else {
                    $MESSAGE = "Sai mật khẩu!";
                    echo "Password is not true";
                }
            } else {
                $MESSAGE = "Sai mã đăng nhập!";
                echo "Username is not true";
            }
        }

    }else{
        echo "All fields are required";
    }
}
// $VIEW_NAME = "tai-khoan/doi-mk-form.php";
// require '../layout.php';
