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

       

        ul.prod_item li {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            width: calc(70% / 4);
            border-bottom: 1px solid black;
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
           padding: 52px 0px;
            overflow: hidden;
        }

        ul.prod_item li.prod-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .prod-list {
           
            overflow-y: auto;
        }

        .title {
           height: 7vh;
           padding-left: 600px;
        }

        .insert {
            height: 8vh;
            padding: 16px;
        }

        .row-heading li{
            background-color: black;
            color:white;
            padding: 12px;
        }
        .prod_item li i{
            color: black;
            font-size: 25px;
        }
        .insert i{
            font-size: 30px;
            color: black;
        }
    </style>
</head>

<body>
    <div class="row title">
        <h1>List</h1>
    </div>
    <div class="row prod-list">
        <ul class="prod_item row-heading">
            <li>Product name</li>
            <li class="prod-price">Price</li>
            <li class="prod-sale">Sale</li>
            <li class="prod-image">Images</li>
            <li>Time</li>
            <li>Describe</li>
            <li class="prod-view">View</li>
            <li>Category</li>
            <li class="prod-action"></li>
            <li class="prod-action"></li>
        </ul>
        <?php
        require '../../dao/loai.php';
        $items = hang_hoa_select_all();
        foreach ($items as $item) { ?>
            <ul class="prod_item">
                <li><?= $item['ten_hh'] ?></li>
                <li class="prod-price">$<?= $item['don_gia'] ?></li>
                <li class="prod-sale"><?= $item['giam_gia'] ?></li>
                <li class="prod-image">
                    <img src="<?= "$IMAGE_DIR/products/" . $item['hinh'] ?>" alt="">
                </li>
                <li><?= $item['ngay_nhap'] ?></li>
                <li><?= $item['mo_ta'] ?></li>
                <li class="prod-view"><?= $item['so_luot_xem'] ?></li>
                <li><?= loai_select_by_id($item['ma_loai'])['ten_loai'] ?></li>
                <li class="prod-action"><a href="index.php?btn_edit&ma_hh=<?= $item['ma_hh'] ?>"><i class="fa-regular fa-pen-to-square"></i></a></li>
                <li class="prod-action"><a href="index.php?btn_delete&ma_hh=<?= $item['ma_hh'] ?>"><i class="fa-regular fa-trash-can"></i></a></li>
            </ul>
        <?php } ?>
    </div>
    <div class="row insert">
        <a href="index.php" class="btn"><i class="fa-solid fa-plus"></i></a>
    </div>
</body>

</html>