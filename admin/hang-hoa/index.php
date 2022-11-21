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
require_once "../../dao/hang-hoa.php";


extract($_REQUEST);


if (exist_param("btn_insert")) {
    try {
        $ten_hh = $_POST['ten_hh'];
        $don_gia = $_POST['don_gia'];
        $giam_gia = isset($_POST['giam_gia']) ? $_POST['giam_gia'] : null;
        $up_hinh = save_file("hinh", "$IMAGE_DIR/products/");
        $hinh = strlen(".$up_hinh.") > 0 ? $up_hinh : 'product.png';
        $mo_ta = $_POST['mo_ta'];
        $dac_biet = $_POST['dac_biet'];
        $so_luot_xem = $_POST['so_luot_xem'];
        $ma_loai = $_POST['loai_hang'];
        $ngay_nhap = $_POST['ngay_nhap'];
        hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dac_biet, $so_luot_xem, $ma_loai);
        unset($ten_hh, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dac_biet, $so_luot_xem, $ma_loai);
        $MESSAGE = "Thêm mới thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Thêm mới thất bại!";
    }
    $VIEW_NAME = "hang-hoa/new.php";
} else if (exist_param("btn_update")) {
    try {
        $ma_hh = $_POST['ma_hh'];
        $ten_hh = $_POST['ten_hh'];
        $don_gia = $_POST['don_gia'];
        $giam_gia = isset($_POST['giam_gia']) ? $_POST['giam_gia'] : null;
        $up_hinh = save_file("up_hinh", "$IMAGE_DIR/products/");
        $hinh = strlen(".$up_hinh.") > 0 ? $up_hinh : $hinh;
        $mo_ta = $_POST['mo_ta'];
        $dac_biet = $_POST['dac_biet'];
        $so_luot_xem = $_POST['so_luot_xem'];
        $ma_loai = $_POST['loai_hang'];
        $ngay_nhap = $_POST['ngay_nhap'];
        hang_hoa_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dac_biet, $so_luot_xem, $ma_loai);
        $MESSAGE = "Cập nhật thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Cập nhật thất bại!";
    }
    $VIEW_NAME = "hang-hoa/list.php";
} else if (exist_param("btn_delete")) {
    try {
        $ma_hh = $_GET['ma_hh'];
        hang_hoa_delete($ma_hh);
        $items = hang_hoa_select_all();
        $MESSAGE = "Xóa thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
    $VIEW_NAME = "hang-hoa/list.php";
} else if (exist_param("btn_edit")) {
    $ma_hh = $_GET['ma_hh'];
    $item = hang_hoa_select_by_id($ma_hh);
    extract($item);
    $VIEW_NAME = "hang-hoa/edit.php";
} else if (exist_param("btn_list")) {
    $items = hang_hoa_select_all();
    $VIEW_NAME = "hang-hoa/list.php";
} else {
    $VIEW_NAME = "hang-hoa/new.php";
}

require "../layout.php";
