<?php
require '../../global.php';
require '../../pdo.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gio hàng</title>
</head>

<body>
    <ul class="cartWrap h-[95%] overflow-y-auto">
        <!--<li class="items even">Item 2</li>-->

        <?php
        $cookie_data = isset($_COOKIE["cart"]) ? $_COOKIE['cart'] : '[]';
        $cart_data = json_decode($cookie_data, true);

        $total = 0;
        // var_dump($cart_data);
        foreach ($cart_data as $sp) :
            $subtotal = $sp['don_gia'] * $sp['quantity'];
            $total += $subtotal;
        ?>
            <form class="prod-item" action="" method="POST">
                <input type="hidden" name="prodId" value="<?php echo $sp['ma_hh'] ?>">
                <!-- <input type="hidden" name="addcart"> -->
                <li class="cart-item items odd">
                    <div class="infoWrap">
                        <div class="cartSection w-[60%]">
                            <img src="../../BackEnd/images/<?php echo $sp['hinh']; ?>" alt="" class="itemImg w-[128px] h-[100px] object-cover" />
                            <p class="itemNumber">#QUE-007544-002</p>
                            <h3><?php echo $sp['ten_hh']; ?></h3>
                            <input type="hidden" name="ma_hh" value="<?php echo $sp['ma_hh']; ?>">
                            <p>
                                <input class="quantityInp" type="number" name="quantity" class="qty product-qty" value='<?php echo $sp['quantity'] ?>' /> x $<?php echo $sp['don_gia']; ?>
                            </p>
                        </div>

                        <div class='prodqty w-[10%]'>
                        </div>

                        <div class="prodTotal cartSection  w-[20%] text-center">
                            <p>$<?php echo $subtotal; ?></p>
                        </div>
                        <div class="cartSection removeWrap  w-[10%] text-center">
                            <button class="delete-prod" type="submit" name="delcart">x</button>
                        </div>
                    </div>
                </li>
            </form>
        <?php
        endforeach;
        ?>

    </ul>
    <script>
        const prodForms = document.querySelectorAll('.prod-item')
        prodForms?.forEach(prod => {
            prod.onsubmit = (e) => {
                e.preventDefault();
            }

            // UPDATE QUANTITY IN CART
            prod.querySelector('.quantityInp').onchange = () => {
                const xhr = new XMLHttpRequest(); // create new XML Object
                xhr.open("POST", "../hang-hoa/gio-hang.php?updateqty", true);
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
                xhr.open("POST", "../hang-hoa/gio-hang.php?delcart", true);
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