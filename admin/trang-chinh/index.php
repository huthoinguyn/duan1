<?php
require_once '../../global.php';
require '../../pdo.php';
if (exist_param("hang-hoa")) {
    $VIEW_NAME = "hang-hoa/index.php";
} else if (exist_param("loai-hang")) {
    $VIEW_NAME = "loai-hang/index.php";
} else if (exist_param("khach-hang")) {
    $VIEW_NAME = "khach-hang/index.php";
} else if (exist_param("binh-luan")) {
    $VIEW_NAME = "binh-luan/index.php";
} else if (exist_param("thong-ke")) {
    $VIEW_NAME = "thong-ke/index.php";
} else {
    $VIEW_NAME = "trang-chinh/home.php";
}
require '../layout.php';
