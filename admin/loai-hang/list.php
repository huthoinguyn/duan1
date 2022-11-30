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

       

        ul.prod_item li {
            text-align: center;
            width: calc(100% /3);
            overflow: hidden;
        }
        .title {
            height: 7vh;
           padding-left: 600px;
        }
        .insert {
            height: 8vh;
            padding: 16px;
        }
        .prod_item li i{
            color: black;
            font-size: 25px;
        }
        .row-heading li{
            background-color: black;
            color:white;
            padding: 12px;
        }
        .row i{
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
            <li>Category</li>
            <li></li>
            <li></li>
        </ul>
        <?php
        $items = loai_select_all();
        foreach ($items as $item) { ?>
            <ul class="prod_item">
                <li><?= $item['ten_loai'] ?></li>
                <li><a href="index.php?btn_edit&ma_loai=<?= $item['ma_loai'] ?>"><i class="fa-regular fa-pen-to-square"></i></a></li>
                <li><a href="index.php?btn_delete&ma_loai=<?= $item['ma_loai'] ?>"><i class="fa-regular fa-trash-can"></i></a></li>
            </ul>
        <?php } ?>
    </div>
    <div class="row">
        <a href="index.php" class="btn"><i class="fa-solid fa-plus"></i></a>
    </div>
</body>

</html>