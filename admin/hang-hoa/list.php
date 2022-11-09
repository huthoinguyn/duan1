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
            justify-content: space-between;
        }

        ul.prod_item:nth-child(2n +1) {
            background-color: #eee;
        }

        ul.prod_item li {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            width: calc(70% / 4);
        }

        ul.prod_item li.prod-price {
            width: 10%;
        }

        ul.prod_item li.prod-sale,
        ul.prod_item li.prod-view,
        ul.prod_item li.prod-action {
            width: 5%;
        }

        ul.prod_item li.prod-image {
            width: 100px;
            height: 60px;
            overflow: hidden;
        }

        ul.prod_item li.prod-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .prod-list {
            height: 85vh;
            overflow-y: auto;
        }

        .title {
            height: 7vh;
        }

        .insert {
            height: 8vh;
            padding: 16px;
        }
    </style>
</head>

<body>
    <div class="row title">
        <h1>List</h1>
    </div>
    <div class="row prod-list">
        <ul class="prod_item">
            <li>Ten</li>
            <li class="prod-price">Don Gia</li>
            <li class="prod-sale">Sale</li>
            <li class="prod-image">Hinh</li>
            <li>Ngay Nhap</li>
            <li>Mo ta</li>
            <li class="prod-view">View</li>
            <li>Loai Hang</li>
            <li class="prod-action"></li>
            <li class="prod-action"></li>
        </ul>
        <?php
        require '../../dao/loai.php';
        $items = hang_hoa_select_all();
        foreach ($items as $item) { ?>
            <ul class="prod_item">
                <li><?= $item['ten_hh'] ?></li>
                <li class="prod-price"><?= $item['don_gia'] ?> VNĐ</li>
                <li class="prod-sale"><?= $item['giam_gia'] ?></li>
                <li class="prod-image">
                    <img src="<?= "$IMAGE_DIR/products/" . $item['hinh'] ?>" alt="">
                </li>
                <li><?= $item['ngay_nhap'] ?></li>
                <li><?= $item['mo_ta'] ?></li>
                <li class="prod-view"><?= $item['so_luot_xem'] ?></li>
                <li><?= loai_select_by_id($item['ma_loai'])['ten_loai'] ?></li>
                <li class="prod-action"><a href="index.php?btn_edit&ma_hh=<?= $item['ma_hh'] ?>">Sua</a></li>
                <li class="prod-action"><a href="index.php?btn_delete&ma_hh=<?= $item['ma_hh'] ?>">Xoa</a></li>
            </ul>
        <?php } ?>
    </div>
    <div class="row insert">
        <a href="index.php" class="btn">Insert</a>
    </div>
</body>

</html>