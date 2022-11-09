<?php
// if (exist_param("btn_insert")) {
//     $up_hinh = save_file("hinh", "$IMAGE_DIR/users/");
//     $hinh = strlen(".$up_hinh.") > 0 ? $up_hinh : 'user.png';
// } else if (exist_param("btn_update")) {
//     $up_hinh = save_file("up_hinh", "$IMAGE_DIR/users/");
//     $hinh = strlen(".$up_hinh.") > 0 ? $up_hinh : $hinh;
// }

require_once "../../global.php";
require_once "../../pdo.php";
require_once "../../dao/khach-hang.php";

extract($_REQUEST);


if (exist_param("btn_insert")) {
    try {
        $ma_kh = $_POST['ma_kh'];
        $mat_khau = $_POST['mat_khau'];
        $ho_ten = $_POST['ho_ten'];
        $up_hinh = save_file("hinh", "$IMAGE_DIR/users/");
        $hinh = strlen(".$up_hinh.") > 0 ? $up_hinh : 'user.png';
        $kich_hoat = $_POST['kich_hoat'];
        $email = $_POST['email'];
        $vai_tro = $_POST['vai_tro'];
        khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $kich_hoat, $hinh, $email, $vai_tro);
        unset($ma_kh, $mat_khau, $ho_ten, $kich_hoat, $hinh, $email, $vai_tro);
        $MESSAGE = "Thêm mới thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Thêm mới thất bại!";
    }
    $VIEW_NAME = "khach-hang/new.php";
} else if (exist_param("btn_update")) {
    try {
        $ma_kh = $_POST['ma_kh'];
        $mat_khau = $_POST['mat_khau'];
        $ho_ten = $_POST['ho_ten'];
        $up_hinh = save_file("up_hinh", "$IMAGE_DIR/users/");
        $hinh = strlen(".$up_hinh.") > 0 ? $up_hinh : $hinh;
        $kich_hoat = $_POST['kich_hoat'];
        $email = $_POST['email'];
        $vai_tro = $_POST['vai_tro'];
        khach_hang_update($ma_kh, $mat_khau, $ho_ten, $kich_hoat, $hinh, $email, $vai_tro);
        $MESSAGE = "Cập nhật thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Cập nhật thất bại!";
    }
    $items = khach_hang_select_all();
    $VIEW_NAME = "khach-hang/list.php";
} else if (exist_param("btn_delete")) {
    try {
        $ma_kh = $_REQUEST['ma_kh'];
        khach_hang_delete($ma_kh);
        $items = khach_hang_select_all();
        $MESSAGE = "Xóa thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
    $VIEW_NAME = "khach-hang/list.php";
} else if (exist_param("btn_edit")) {
    $ma_kh = $_REQUEST['ma_kh'];
    $item = khach_hang_select_by_id($ma_kh);
    extract($item);
    $VIEW_NAME = "khach-hang/edit.php";
} else if (exist_param("btn_list")) {
    $items = khach_hang_select_all();
    $VIEW_NAME = "khach-hang/list.php";
} else {
    $VIEW_NAME = "khach-hang/new.php";
}

require "../layout.php";
