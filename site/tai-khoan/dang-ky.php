<?php
require '../../global.php';
require '../../pdo.php';
require '../../dao/khach-hang.php';
extract($_REQUEST);
if (exist_param("btn_register")) {
    $ma_kh = $_POST['ma_kh'];
    $mat_khau = $_POST['mat_khau'];
    $mat_khau2 = $_POST['mat_khau2'];
    $ho_ten = $_POST['ho_ten'];
    $email = $_POST['email'];
    $vai_tro = $_POST['vai_tro'];
    $kich_hoat = $_POST['kich_hoat'];
    if (!empty($ma_kh) && !empty($mat_khau) && !empty($mat_khau2) && !empty($ho_ten) && !empty($email)) {
        if (!khach_hang_exist($ma_kh)) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if ($mat_khau == $mat_khau2) {
                    $file_name = save_file("up_hinh", "$IMAGE_DIR/users/");
                    $hinh = $file_name ? $file_name : "user.webp";
                    try {
                        khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $kich_hoat, $hinh, $email, $vai_tro);
                        echo "Register successfull";
                    } catch (Exception $exc) {
                        echo "Register fail";
                    }
                } else {
                    echo "Comfirm password is not true";
                }
            } else {
                echo "Email: $email is not valid";
            }
        } else {
            echo "Username is already exist";
        }
    } else {
        echo "All field are require!";
    }
} else {
    global $ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro, $mat_khau2;
}
$VIEW_NAME = "tai-khoan/dang-ky-form.php";
