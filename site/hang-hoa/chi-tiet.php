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
    <style>
        
    </style>
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
                <ul class="size-list">
                    <li class="size-item">XS</li>
                    <li class="size-item">S</li>
                    <li class="size-item active">M</li>
                    <li class="size-item">L</li>
                    <li class="size-item">XL</li>
                    <li class="size-item">2XL</li>
                    <li class="size-item">3XL</li>
                </ul>
                <!-- <p class="product-describe"></p> -->
                <p class="product-price"><?= number_format($don_gia, 0) ?> VND</p>
                <form action="" id="addcart">
                    <input type="hidden" name="ma_hh" value="<?= $ma_hh ?>">
                    <input type="hidden" name="ten_hh" value="<?= $ten_hh ?>">
                    <input type="hidden" name="don_gia" value="<?= $don_gia ?>">
                    <input type="hidden" name="size" class="prod-size" value="M">
                    <input type="hidden" name="hinh" value="<?= $hinh ?>">
                    <div class="button-quantity">
                        <div class="quantity">
                            <span>QUANTITY</span>
                            <input type="number" placeholder="1" style="outline: none;">
                        </div>

                        <button type="submit" name="addcart" class="button-addcart">ADD TO CART</button>
                    </div>
                </form>
                <div class="product-social">
                    <a class="product-fav" href="#"><i class="fa-solid fa-heart"></i> Add to favorite list</a>
                </div>
                <div class="product-dropdown">
                    <div class="heading">
                        <h3>Description</h3>
                        <div class="drop-icon">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                    </div>
                    <div class="description">
                        <?= $mo_ta ?>
                    </div>
                </div>
                <div class="product-dropdown">
                    <div class="heading">
                        <h3>Review</h3>
                        <div class="drop-icon">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                    </div>
                    <!-- <div class="prod-rate-star"> -->
                    <div class="rate"><a class="rate__star" id="rate-star-1" href="#rate-star-1"><i class="fa fa-star"></i></a><a class="rate__star" id="rate-star-2" href="#rate-star-2"><i class="fa fa-star"></i></a><a class="rate__star" id="rate-star-3" href="#rate-star-3"><i class="fa fa-star"></i></a><a class="rate__star" id="rate-star-4" href="#rate-star-4"><i class="fa fa-star"></i></a><a class="rate__star" id="rate-star-5" href="#rate-star-5"><i class="fa fa-star"></i></a>
                    </div>16 customer rated
                    <!-- </div> -->
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
    <script>
        const sizeItems = document.querySelectorAll('.size-item')
        const prodDrops = document.querySelectorAll('.product-dropdown')
        sizeItems.forEach(size => {
            size.onclick = () => {
                [...sizeItems].map(si => si.classList.remove('active'));
                size.classList.add('active');
                document.querySelector('.prod-size').value = size.textContent;
            }
        })
        prodDrops.forEach(drop => drop.onclick = () => {
            drop.classList.toggle('active');
            drop.querySelector('.drop-icon i').classList.toggle('fa-minus')
        })

        const addCartForm = document.querySelector('#addcart'),
            addCartBtn = document.querySelector('#addcart button')
        addCartForm.onsubmit = (e) => {
            e.preventDefault();
        }

        addCartBtn.onclick = () => {
            const xhr = new XMLHttpRequest(); // create new XML Object
            xhr.open("POST", "../gio-hang/gio-hang.php?addcart", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        let data = xhr.response;
                        alert(data)
                    }
                }
            };
            let formData = new FormData(addCartForm); //create new formData
            xhr.send(formData); //send formData to PHP
        }
    </script>
</body>

</html>