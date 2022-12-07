<?php
require '../../pdo.php';
require '../../global.php';
require '../../dao/khach-hang.php';
if (exist_param("btn_update")) {
    $file_name = save_file("up_hinh", "$IMAGE_DIR/users/");
    $hinh = $_POST['current-image'];
    $hinh1 = isset($file_name) ? $file_name : $hinh;
    $ma_kh = $_POST['ma_kh'];
    $mat_khau = $_POST['mat_khau'];
    $ho_ten = $_POST['ho_ten'];
    $email = $_POST['email'];
    $kich_hoat = $_POST['kich_hoat'];
    $vai_tro = $_POST['vai_tro'];
    if (!empty($ma_kh) && !empty($ho_ten) && !empty($email)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            try {
                khach_hang_update($ma_kh, $mat_khau, $ho_ten, $kich_hoat, $hinh1, $email, $vai_tro);
                $MESSAGE = "Cập nhật thông tin thành viên thành công!";
                echo "Successfully";
                $_SESSION['user'] = khach_hang_select_by_id($ma_kh);
            } catch (Exception $exc) {
                $MESSAGE = "Cập nhật thông tin thành viên thất bại!";
                echo "Update fail";
            }
        } else {
            echo "Email: $email is not valid";
        }
    } else {
        echo "All field are require!";
    }
} else {
    extract($_SESSION['user']);
}
$VIEW_NAME = "tai-khoan/cap-nhat-tk-form.php";
// require '../layout.php';
