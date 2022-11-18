<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .row {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
        }

        ul.prod_item {
            padding: 12px 24px;
            width: 100%;
            display: flex;
            list-style: none;
            justify-content: flex-start;
        }

        ul.prod_item:nth-child(2n +1) {
            background-color: #eee;
        }

        ul.prod_item li {
            text-align: center;
            width: calc(100% /3);
            overflow: hidden;
        }

        .prod-list {
            height: 90vh;
            overflow-y: auto;
        }

        .title {
            height: 7vh;
        }

        li.id {
            flex: 0 0 5%;
            max-width: 5%;
        }

        li.user-info {
            flex: 0 0 35%;
            max-width: 35%;
        }

        li.user-info ul {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        li.user-info ul li {
            flex: 0 0 100%;
            max-width: 100%;
            width: unset;
        }

        li.products {
            flex: 0 0 35%;
            max-width: 35%;
            padding-right: 24px;
        }

        li.products ul li {
            width: 100%;
        }

        li.total,
        li.action {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        li.action {
            flex: 0 0 4%;
            max-width: 4%;
        }

        li.total {
            flex: 0 0 6%;
            max-width: 6%;
            font-weight: bold;
            font-size: 18px;
        }

        li.status {
            flex: 0 0 15%;
            max-width: 15%;
        }

        li.products .receipt-item h4 {
            flex: 0 0 100%;
            max-width: 100%;
            text-align: left;
        }

        li.products .receipt-item .qty {
            flex: 0 0 60%;
            max-width: 60%;
            display: flex;
            justify-content: space-between;
            font-size: 14px;
        }

        li.products .receipt-item .qty span {
            color: red;
            font-weight: bold;
        }

        li.products .receipt-item .subtotal {
            font-style: italic;
        }
        li.products .receipt-item .total {
            text-align: right;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>

<body>
    <div class="row title">
        <h1>Receipt</h1>
    </div>
    <div class="row prod-list">
        <ul class="prod_item">
            <li class="id">ID</li>
            <li class="user-info">USER</li>
            <li class="products">Products</li>
            <li class="total">Total</li>
            <li class="status"></li>
            <li class="action"></li>
        </ul>
        <?php
        $items = hoa_don_select_all();
        foreach ($items as $item) {
            extract($item)
        ?>
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
                        $listSP = runSQL("SELECT hoa_don_chi_tiet.don_gia, hoa_don_chi_tiet.so_luong, hoa_don_chi_tiet.ma_hh, hang_hoa.ten_hh FROM hoa_don_chi_tiet JOIN hang_hoa on hoa_don_chi_tiet.ma_hh = hang_hoa.ma_hh WHERE ma_hd=" . $ma_hd);
                        foreach ($listSP as $x) : ?>
                            <li>
                                <div class="receipt-item">
                                    <div class="info">
                                        <h4><a style="text-decoration: none;" href="../../site/trang-chinh/index.php?chi-tiet&ma_hh=<?= $x["ma_hh"] ?>" target="_blank" rel="noopener noreferrer"><?= $x['ten_hh'] ?></a>
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
                                            $<?= $x['don_gia'] * $x['so_luong'] ?>
                                        </p>
                                    </div>
                                </div>

                            </li>
                        <?php endforeach ?>
                    </ul>
                </li>
                <li class="total">$<?= $total ?></li>
                <li class="status">
                    <select name="status" id="">
                        <option value="0">Chưa Xác Nhận</option>
                        <option value="1">Đang xử lý</option>
                        <option value="2">Delivery</option>
                        <option value="3">Finished</option>
                        <option value="4">Cancel</option>
                    </select>
                </li>
                <li class="action"><a href="index.php?btn_delete&ma_loai=<?= $ma_bl ?>">Xoa</a></li>
            </ul>
        <?php } ?>
    </div>
</body>

</html>