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
    </style>
</head>

<body>
    <div class="row prod-list">
        <h1>List</h1>
        <ul class="prod_item">
            <li>Ten loai hang</li>
            <li></li>
            <li></li>
        </ul>
        <?php
        $items = loai_select_all();
        foreach ($items as $item) { ?>
            <ul class="prod_item">
                <li><?= $item['ten_loai'] ?></li>
                <li><a href="index.php?btn_edit&ma_loai=<?= $item['ma_loai'] ?>">Sua</a></li>
                <li><a href="index.php?btn_delete&ma_loai=<?= $item['ma_loai'] ?>">Xoa</a></li>
            </ul>
        <?php } ?>
    </div>
    <div class="row">
        <a href="index.php" class="btn">Insert</a>
    </div>
</body>

</html>