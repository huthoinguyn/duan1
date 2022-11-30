<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/hoadon-admin.css">
    <title>Document</title>
    <style>
        .heading {
            height: 36px;
        }

        form.update-status-form {
            flex: 0 0 100%;
            max-width: 100%;
            padding: unset;
            margin: unset;
        }

       
        .row-heading li{
            background-color: black;
            color:white;
            padding: 5px;
            
        }
        .title{
            padding-left: 550px;
        }
    </style>
</head>

<body>
    <div class="row title">
        <h1>Receipt</h1>
    </div>
    <div class="row prod-list">
        <ul class="prod_item row-heading">
            <li class="heading">ID</li>
            <li class="heading">USER</li>
            <li class="heading">Products</li>
            <li class="heading">Total</li>
            <li class="heading"></li>
            <li class="heading"></li>
        </ul>
        <?php
        $items = hoa_don_select_all();
        foreach ($items as $item) {
            extract($item)
        ?>
            <form action="" class="update-status-form">
                <input type="hidden" name="ma_kh" value="<?= $ma_kh ?>">
                <input type="hidden" name="ma_hd" value="<?= $ma_hd ?>">
                <input type="hidden" name="ho_ten" value="<?= $ho_ten ?>">
                <input type="hidden" name="dia_chi" value="<?= $dia_chi ?>">
                <input type="hidden" name="so_dien_thoai" value="<?= $so_dien_thoai ?>">
                <input type="hidden" name="total" value="<?= $total ?>">
                <input type="hidden" name="ghi_chu" value="<?= $ghi_chu ?>">
                <input type="hidden" name="ngay_tao" value="<?= $ngay_tao ?>">
                <ul class="prod_item">
                    <li class="id"><?= $ma_hd ?></li>
                    <li class="user-info">
                        <ul>
                            <li><?= $ho_ten ?></li>
                            <li><?= $so_dien_thoai ?></li>
                            <li><?= $dia_chi ?></li>
                        </ul>

                    </li>
                    <li class="products">
                        <ul>
                            <?php
                            $listSP = runSQL("SELECT hoa_don_chi_tiet.don_gia, hoa_don_chi_tiet.so_luong, hoa_don_chi_tiet.ma_hh,hoa_don_chi_tiet.size, hang_hoa.ten_hh, hang_hoa.giam_gia FROM hoa_don_chi_tiet JOIN hang_hoa on hoa_don_chi_tiet.ma_hh = hang_hoa.ma_hh WHERE ma_hd=" . $ma_hd);
                            foreach ($listSP as $x) : ?>
                                <li>
                                    <div class="receipt-item">
                                        <div class="info">
                                            <h4><a style="text-decoration: none;" href="../../site/trang-chinh/index.php?chi-tiet&ma_hh=<?= $x["ma_hh"] ?>" target="_blank" rel="noopener noreferrer"><?= $x['ten_hh'] ?></a>
                                                <span style="font-weight: lighter; color: #555;">/</span> <span class="size"> <?php echo ($x['size']) ? $x['size'] : '' ?></span>
                                            </h4>
                                            <div class="qty">
                                                <span>
                                                    x<?= $x['so_luong'] ?>
                                                </span>
                                                <p class="subtotal">
                                                    $<?= $x['don_gia'] ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="total">
                                            <p>
                                                $<?= ($x['don_gia'] - (($x['don_gia'] * $x['giam_gia']) / 100)) * $x['so_luong'] ?>
                                            </p>
                                        </div>
                                    </div>

                                </li>
                            <?php endforeach ?>
                        </ul>
                    </li>
                    <li class="total">$<?= $total ?></li>
                    <li class="status">
                        <select name="trang_thai" id="">
                            <option value="0" <?php echo ($trang_thai == 0) ? "selected" : "" ?>>Chưa Xác Nhận</option>
                            <option value="1" <?php echo ($trang_thai == 1) ? "selected" : "" ?>>Đang xử lý</option>
                            <option value="2" <?php echo ($trang_thai == 2) ? "selected" : "" ?>>Delivery</option>
                            <option value="3" <?php echo ($trang_thai == 3) ? "selected" : "" ?>>Finished</option>
                            <option value="4" <?php echo ($trang_thai == 4) ? "selected" : "" ?>>Cancel</option>
                        </select>
                    </li>
                    <li class="action"><a href="">Xoa</a></li>
                </ul>
            </form>
        <?php } ?>
    </div>
    <script>
        const updateStatusForm = document.querySelectorAll('.update-status-form')

        updateStatusForm.forEach(up => {
            up.onsubmit = (e) => {
                e.preventDefault();
            }
            up.querySelector('select').onchange = () => {
                const xhr = new XMLHttpRequest(); // create new XML Object
                xhr.open("POST", "./update.php?update_status", true);
                xhr.onload = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status == 200) {
                            let data = xhr.response;
                            alert(data)
                        }
                    }
                };
                let formData = new FormData(up); //create new formData
                xhr.send(formData); //send formData to PHP
            }
            up.querySelector('.action a').onclick = (e) => {
                e.preventDefault();
                const xhr = new XMLHttpRequest(); // create new XML Object
                xhr.open("POST", "./delete.php?btn_delete", true);
                xhr.onload = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status == 200) {
                            let data = xhr.response;
                            // alert(data)
                            up.remove();
                        }
                    }
                };
                let formData = new FormData(up); //create new formData
                xhr.send(formData); //send formData to PHP
            }
        })
    </script>
</body>

</html>