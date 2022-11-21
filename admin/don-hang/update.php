<?php
require '../../global.php';
require '../../pdo.php';
require '../../dao/thanh-toan.php';
if (exist_param('update_status')) {
    extract($_REQUEST);
    $ngay_hoan_thanh = null;
    hoa_don_update($ma_kh, $ho_ten, $dia_chi, $so_dien_thoai, $total, $ghi_chu, $trang_thai, $ngay_tao, $ngay_hoan_thanh, $ma_hd);
    echo 'success';
}
?>