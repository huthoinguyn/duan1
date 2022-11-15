<?php
require '../../dao/hang-hoa.php';
require '../../global.php';
require '../../pdo.php';
if (exist_param('addcart')) {
    $ma_hh = isset($_POST['ma_hh']) ? $_POST['ma_hh'] : '';
    $sanpham = hang_hoa_select_by_id($ma_hh);
    extract($sanpham);
    $kh = $_SESSION['user'];
    if (isset($_COOKIE['cart'])) {
        // nếu đã tồn tại cookie cart thì lấy giá trị của cookie cart 
        // nếu đã tồn tại cookie cart thì lấy giá trị của cookie cart 
        $cookie_data = $_COOKIE['cart'];
        // chuyển string thành array 
        $cart_data = json_decode($cookie_data, true);
    } else {
        $cart_data = array();
    }

    $ma_hh_ds = array_column($cart_data, 'ma_hh');

    // kiểm tra ma_hh có tồn tại trong cookie cart chưa s
    if (in_array($ma_hh, $ma_hh_ds)) {
        foreach ($cart_data as $key => $value) {
            // nếu có thì tăng có lượng sản phẩm 

            if ($cart_data[$key]['ma_hh'] == $ma_hh) {
                $cart_data[$key]['quantity'] = $cart_data[$key]['quantity'] + 1;
            }
        }
    } else {
        // nếu chưa có thì thêm vào cookie cart 
        $product_array = array(
            'ma_hh' => $ma_hh,
            'ten_hh' => $ten_hh,
            'don_gia' => $don_gia,
            'quantity' => 1,
            'hinh' => $hinh,
            'kh' => $kh

        );
        $cart_data[] = $product_array;
    }

    // chuyển array thành string để lưu vào cookie cart 
    $product_data = json_encode($cart_data);

    // lưu cookie 
    setcookie('cart', $product_data, time() +  3600 * 24 * 30 * 12, '/');
    echo 'successfully';
    // header('location: ../index.php?page=product');
} else if (exist_param('updateqty')) {
    $ma_hh = $_POST['ma_hh'];
    $prodQty = $_POST['quantity'];
    $kh = $_SESSION['user'];

    if (isset($_COOKIE['cart'])) {
        $cookie_data = $_COOKIE['cart'];
        $cart_data = json_decode($cookie_data, true);
    } else {
        $cart_data = array();
    }

    $ma_hh_ds = array_column($cart_data, 'ma_hh');

    if (in_array($ma_hh, $ma_hh_ds)) {
        foreach ($cart_data as $key => $value) {
            if ($cart_data[$key]['ma_hh'] == $ma_hh) {
                $cart_data[$key]['quantity'] =  $prodQty;
            }
        }
    } else {
        $product_array = array(
            'ma_hh' => $ma_hh,
            'ten_hh' => $ten_hh,
            'don_gia' => $don_gia,
            'quantity' => 1,
            'hinh' => $hinh,
            'kh' => $kh
        );
        $cart_data[] = $product_array;
    }

    $product_data = json_encode($cart_data);
    setcookie('cart', $product_data, time() + 3600 * 24 * 30 * 12, '/');

    // echo "$don_gia";
    echo 'success';
} else if (exist_param('delcart')) {
    if (isset($_COOKIE['cart'])) {
        $cookie_data = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";;
        $cart_data = json_decode($cookie_data, true);
        foreach ($cart_data as $key => $value) {
            if ($cart_data[$key]['ma_hh'] == $_POST['ma_hh']) {
                unset($cart_data[$key]);
                $product_data = json_encode($cart_data);

                setcookie("cart", $product_data, time() +  3600 * 24 * 30 * 12, '/');
            }
        }
    }
    echo 'Delete successfully';
} else if (exist_param('deleteall')) {
    if (isset($_COOKIE['cart'])) {
        setcookie("cart", "", time() -  3600 * 24 * 30 * 12, '/');
    }
    echo "Delete successfully";
} else {
    echo 'something went wrong!';
}
