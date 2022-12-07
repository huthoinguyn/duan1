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
        if (!empty($so_dien_thoai) && !empty($dia_chi)) {
            if (preg_match("/(84|0[3|5|7|8|9])+([0-9]{8})\b/", $so_dien_thoai)) {
                if (strlen($dia_chi) > 20) {
                    if (isset($_COOKIE['cart'])) {
                        $cookie_data = $_COOKIE['cart'];

                        $cart_data = json_decode($cookie_data, true);

                        $insert_hoa_don = hoa_don_insert($ma_kh, $dia_chi, $ho_ten, $so_dien_thoai, $total, $ghi_chu, $trang_thai, $ngay_tao, $ngay_hoan_thanh);
                        if ($insert_hoa_don) {
                            $ma_hd = runSQL("SELECT MAX(ma_hd) FROM hoa_don")[0]["MAX(ma_hd)"];
                            foreach ($cart_data as $key => $value) {
                                $size = $value['size'];
                                $ma_hh = $value['ma_hh'];
                                $so_luong = $value['quantity'];
                                $don_gia = $value['don_gia'];
                                $insert_hoa_don_chi_tiet = hoa_don_chi_tiet_insert($don_gia, $size, $so_luong, $ma_hd, $ma_hh);
                                if ($insert_hoa_don_chi_tiet) {
                                    setcookie("cart", "", time() -  3600 * 24 * 30 * 12, '/');
                                    if (isset($_COOKIE['cart'])) {
                                        setcookie("cart", "", time() -  3600 * 24 * 30 * 12, '/');
                                    }
                                }
                            }
                            echo 'success';
                        }
                    }
                } else {
                    echo "Please enter an address longer than 20 characters";
                }
            } else {
                echo "Your phone number is unvalid!";
            }
        } else {
            echo "Phone number and Address are required";
        }
    } else {
        echo "Please login to pay";
    }
}
