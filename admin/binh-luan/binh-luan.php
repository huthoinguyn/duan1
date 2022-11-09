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
    </style>
</head>

<body>
    <div class="row title">
        <h1>Comments</h1>
    </div>
    <div class="row prod-list">
        <ul class="prod_item">
            <li>Comments</li>
            <li>User</li>
            <li>Product</li>
            <li>Time</li>
            <li></li>
            <li></li>
        </ul>
        <?php
        $items = binh_luan_select_all();
        foreach ($items as $item) {
            extract($item)
        ?>
            <ul class="prod_item">
                <li><?= $noi_dung ?></li>
                <li><?= $ma_kh ?></li>
                <li><?= hang_hoa_select_by_id($ma_hh)['ten_hh'] ?></li>
                <li><?= $ngay_binh_luan ?></li>
                <li><a href="index.php?btn_edit&ma_loai=<?= $ma_bl ?>">Sua</a></li>
                <li><a href="index.php?btn_delete&ma_loai=<?= $ma_bl ?>">Xoa</a></li>
            </ul>
        <?php } ?>
    </div>
</body>

</html>