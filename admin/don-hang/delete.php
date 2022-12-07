<?php
require '../../global.php';
require '../../pdo.php';
require '../../dao/thanh-toan.php';
if (exist_param("btn_delete")) {
    try {
        $ma_hd = $_POST['ma_hd'];
        hoa_don_delete($ma_hd);
        echo 'Successfully';
    } catch (Exception $exc) {
        echo 'Something went wrong!';
    }
}
