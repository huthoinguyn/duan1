<?php
require "../../global.php";
require "../../pdo.php";
require "../../dao/loai.php";
extract($_REQUEST);


if (exist_param("btn_insert")) {
    try {
        $ten_loai = $_POST['loai_hang'];
        loai_insert($ten_loai);
        unset($ten_loai, $ma_loai);
        $MESSAGE = "Thêm mới thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Thêm mới thất bại!";
    }
    $VIEW_NAME = "loai-hang/new.php";
} else if (exist_param("btn_update")) {
    try {
        $ma_loai = $_POST['ma_loai'];
        $ten_loai = $_POST['ten_loai'];
        loai_update($ma_loai, $ten_loai);
        $MESSAGE = "Cập nhật thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Cập nhật thất bại!";
    }
    $VIEW_NAME = "loai-hang/edit.php";
} else if (exist_param("btn_delete")) {
    try {
        loai_delete($ma_loai);
        $items = loai_select_all();
        $MESSAGE = "Xóa thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
    $VIEW_NAME = "loai-hang/list.php";
} else if (exist_param("btn_edit")) {
    $item = loai_select_by_id($ma_loai);
    extract($item);
    $VIEW_NAME = "loai-hang/edit.php";
} else if (exist_param("btn_list")) {
    $items = loai_select_all();
    $VIEW_NAME = "loai-hang/list.php";
} else {
    $VIEW_NAME = "loai-hang/new.php";
}

require "../layout.php";
