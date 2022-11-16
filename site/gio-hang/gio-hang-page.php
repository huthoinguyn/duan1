<?php
// require '../../global.php';
// require '../../pdo.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/style.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/gio-hang.css">
    <title>gio hàng</title>
    <style>
        .checkout-btn a {
            width: 100%;
            padding: 12px 24px;
            text-transform: uppercase;
            background-color: #000;
            color: #fff;
            font-size: 1.6rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 16px;
        }

        .checkout-btn a i {
            font-size: 1.8rem;
        }
    </style>
</head>

<body>
    <div class="cart-container">
        <div class="row cart-contai">
            <div class="prod-list">
                <div class="row">
                    <?php
                    $cookie_data = isset($_COOKIE["cart"]) ? $_COOKIE['cart'] : '[]';
                    $cart_data = json_decode($cookie_data, true);
                    // var_dump($cart_data);
                    $total = 0;
                    foreach ($cart_data as $sp) :
                        $subtotal = $sp['don_gia'] * $sp['quantity'];
                        $total += $subtotal;
                    ?>
                        <form class="prod-item" action="" method="POST">
                            <input type="hidden" name="ma_hh" value="<?php echo $sp['ma_hh']; ?>">
                            <input type="hidden" name="size" value="<?php echo $sp['size'] ?>">
                            <div class="row cart-item">
                                <div class="prod-img">
                                    <img src="<?= $CONTENT_URL ?>/images/products/<?php echo $sp['hinh']; ?>" alt="">
                                </div>
                                <div class="prod-info">
                                    <p class="itemNumber">#QUE-007544-002</p>
                                    <h3><?php echo $sp['ten_hh']; ?></h3>
                                    <div class="size">SIZE: <span><?php echo (($sp['size']) ? $sp['size'] : ''); ?></span></div>
                                    <p>
                                        <input class="quantityInp" type="number" name="quantity" class="qty product-qty" value='<?php echo $sp['quantity'] ?>' /> x $<?php echo $sp['don_gia']; ?>
                                    </p>
                                </div>
                                <div class="prod-total">
                                    <p>$<?php echo $subtotal; ?></p>
                                </div>
                                <div class="prod-action">
                                    <button class="delete-prod" type="submit" name="delcart">x</button>
                                </div>
                            </div>
                        </form>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
            <div class="cart-checkout">
                <div class="cart-sumary">
                    <h3>ORDER SUMARY</h3>
                    <div class="subtotal">
                        <span>Subtotal</span>
                        <span>$<?php echo $total ?></span>
                    </div>
                    <div class="delivery">
                        <span>Estimated Delivery & Handling
                        </span>
                        <span>FREE</span>
                    </div>
                    <div class="total">
                        <p>TOTAL
                            (inclusive of tax 370,370₫)</p>
                        <p>
                            $<?php echo $total ?></p>
                    </div>
                </div>
                <div class="checkout-btn">
                    <a href="?thanh-toan">
                        Checkout
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
        const prodForms = document.querySelectorAll('.prod-item')
        prodForms?.forEach(prod => {
            prod.onsubmit = (e) => {
                e.preventDefault();
            }

            // UPDATE QUANTITY IN CART
            prod.querySelector('.quantityInp').onchange = () => {
                const xhr = new XMLHttpRequest(); // create new XML Object
                xhr.open("POST", "../gio-hang/gio-hang.php?updateqty", true);
                xhr.onload = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status == 200) {
                            let data = xhr.response;
                            alert(data)
                        }
                    }
                };
                let formData = new FormData(prod); //create new formData
                xhr.send(formData); //send formData to PHP
            }

            // DELETE PRODUCT IN CART
            prod.querySelector('.delete-prod').onclick = () => {
                const xhr = new XMLHttpRequest(); // create new XML Object
                xhr.open("POST", "../gio-hang/gio-hang.php?delcart", true);
                xhr.onload = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status == 200) {
                            let data = xhr.response;
                            alert(data)
                        }
                    }
                };
                let formData = new FormData(prod); //create new formData
                xhr.send(formData); //send formData to PHP
            }
        })
    </script>
</body>

</html>