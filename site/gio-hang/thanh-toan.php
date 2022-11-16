<?php
require '../../pdo.php';
require '../../global.php';
require '../../dao/thanh-toan.php';

if (exist_param('buy')) {
    if (isset($_SESSION['user'])) {
        $ma_hh = $_POST['ma_hh'];
        $total = $_POST['total'];
        $ho_ten = $_POST['ho_ten'];
        $so_dien_thoai = $_POST['so_dien_thoai'];
        $dia_chi = $_POST['dia_chi'];
        $ghi_chu = $_POST['ghi_chu'];
        $ma_kh = $_POST['ma_kh'];
        $trang_thai = 0;
        $ngay_tao = '' . date("Y.m.d");
        $ngay_hoan_thanh = null;

        if (isset($_COOKIE['cart'])) {
            $cookie_data = $_COOKIE['cart'];

            $cart_data = json_decode($cookie_data, true);

            $insert_hoa_don = hoa_don_insert($ma_kh, $dia_chi, $ho_ten, $so_dien_thoai, $total, $ghi_chu, $trang_thai, $ngay_tao, $ngay_hoan_thanh);
            // echo 'success';
            // if ($insert_hoa_don) {
            $hd_id = pdo_get_connection()->lastInsertId($ma_hd);
            foreach ($cart_data as $key => $value) {
                $ma_hh = $value['ma_hh'];
                $so_luong = $value['quantity'];
                $don_gia = $value['don_gia'];
                $insert_hoa_don_chi_tiet = hoa_don_chi_tiet_insert($don_gia, $so_luong, $hd_id, $ma_hh);
                if ($insert_hoa_don_chi_tiet) {
                    setcookie("cart", "", time() -  3600 * 24 * 30 * 12, '/');
                    if (isset($_COOKIE['cart'])) {
                        setcookie("cart", "", time() -  3600 * 24 * 30 * 12, '/');
                    }
                }
            }

            echo 'Success';
        }
    }
}
// }
