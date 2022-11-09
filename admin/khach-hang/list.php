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
            align-items: center;
        }

        ul.prod_item:nth-child(2n +1) {
            background-color: #eee;
        }

        ul.prod_item li {
            text-align: center;
            width: calc(80% /7);
            overflow: hidden;
        }

        ul.prod_item li.prod-sale,
        ul.prod_item li.prod-view,
        ul.prod_item li.prod-action {
            width: 5%;
        }

        ul.prod_item li.user-image {
            width: 100px;
            height: 60px;
            overflow: hidden;
        }

        ul.prod_item li.user-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="row">
        <h1>List</h1>
        <ul class="prod_item">
            <li>Ma KH</li>
            <li>Ho Ten</li>
            <li>Mat Khau</li>
            <li class="user-image">Hinh</li>
            <li>Email</li>
            <li>Vai Tro</li>
            <li>Kich Hoat</li>
            <li class="prod-action"></li>
            <li class="prod-action"></li>
        </ul>
        <?php
        // $items = hang_hoa_select_all();
        foreach ($items as $item) { ?>
            <ul class="prod_item">
                <li><?= $item['ma_kh'] ?></li>
                <li><?= $item['ho_ten'] ?></li>
                <li><?= $item['mat_khau'] ?></li>
                <li class="user-image">
                    <img src="<?= "$IMAGE_DIR/users/" . $item['hinh'] ?>" alt="">
                </li>
                <li><?= $item['email'] ?></li>
                <li><?= ($item['vai_tro'] == 1) ? "Admin" : "Customer" ?></li>
                <li><?= ($item['kich_hoat'] == 1) ? "Active" : "Unactive" ?></li>
                <li class="prod-action"><a href="index.php?btn_edit&ma_kh=<?= $item['ma_kh'] ?>">Sua</a></li>
                <li class="prod-action"><a href="index.php?btn_delete&ma_kh=<?= $item['ma_kh'] ?>">Xoa</a></li>
            </ul>
        <?php } ?>
    </div>
    <div class="row">
        <a href="index.php" class="btn">Insert</a>
    </div>
</body>

</html>