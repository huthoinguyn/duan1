<?php
// require '../../global.php';
// require '../../pdo.php';
require '../../dao/hang-hoa.php';
//-------------------------------//
extract($_REQUEST);
// Truy vấn mặt hàng theo mã
$hang_hoa = hang_hoa_select_by_id($ma_hh);
extract($hang_hoa);
// Tăng số lượt xem lên 1
hang_hoa_tang_so_luot_xem($ma_hh);
// $VIEW_NAME = "hang-hoa/chi-tiet-ui.php";
// require '../layout.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T-COFFEE-Product</title>
    <link rel="stylesheet" href="../../content/css/style.css">
    <link rel="stylesheet" href="../../content/css/sanpham-chitiet.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="product-slide">
            <p class="product-paragraph">PRODUCT DETAILS</p>
            <p class="product-child">T-COFFEE</p>
        </div>
        <div class="product">
            <div class="product-image">
                <div class="">
                    <img src="<?= $CONTENT_URL ?>/images/products/<?= $hinh ?>" width="80%">
                </div>
            </div>
            <div class="product-infor">
                <p class="product-name"><?= $ten_hh ?></p>
                <span>Viewer : <?= $so_luot_xem ?></span> <br />
                REVIEW FOR PRODUCT
                <div class="rate"><a class="rate__star" id="rate-star-1" href="#rate-star-1"><i class="fa fa-star"></i></a><a class="rate__star" id="rate-star-2" href="#rate-star-2"><i class="fa fa-star"></i></a><a class="rate__star" id="rate-star-3" href="#rate-star-3"><i class="fa fa-star"></i></a><a class="rate__star" id="rate-star-4" href="#rate-star-4"><i class="fa fa-star"></i></a><a class="rate__star" id="rate-star-5" href="#rate-star-5"><i class="fa fa-star"></i></a>
                </div>16 customer rated

                <p class="product-describe"><?= $mo_ta ?></p>
                <p class="product-price"><?= number_format($don_gia, 0) ?> VND</p>
                <div class="button-quantity">
                    <div class="quantity">
                        <span>QUANTITY</span>
                        <input type="number" placeholder="1">
                    </div>
                    <button class="button-addcart">ADD TO CART</button>
                </div>
                <div class="product-social">
                    <a class="product-fav" href="#"><i class="fa-solid fa-heart"></i> Add to favorite list</a>
                </div>
            </div>
        </div>
    </div>
    <div class="prod-cung-loai">
        <div class="row">
            <h2 class="title">related products</h2>
        </div>
        <div class="row">
            <?php require 'hang-cung-loai.php'; ?>
        </div>
    </div>
    <div class="comment">
        <div class="row">
            <h2 class="title">Comments</h2>
        </div>
        <div class="row">
            <ul class="comment-list">
                <?php require 'binh-luan.php'; ?>
            </ul>
        </div>
    </div>
</body>

</html>