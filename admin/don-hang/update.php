<?php
require '../../global.php';
require '../../pdo.php';
require '../../dao/thanh-toan.php';
if (exist_param('update_status')) {
    extract($_REQUEST);
    $ngay_hoan_thanh = null;
    hoa_don_update($trang_thai,$ma_hd);
    echo 'success';
}
?>