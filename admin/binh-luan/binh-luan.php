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
            height: 10%;
            width: 100%;
            display: flex;
            list-style: none;
            justify-content: flex-start;
            
        }

       
        ul.prod_item li {
            text-align: center;
            width: calc(70% /3);
            overflow: hidden;
            border-bottom: 1px solid black;
           
            margin-bottom: 10px;
        }

        .prod-list {
           
            overflow-y: auto;
        }

        .title {
            height: 7vh;
           padding-left: 500px;
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
     
    </style>
</head>

<body>
    <div class="row title">
        <h1>Comments</h1>
    </div>
    <div class="row ">
        <ul class="prod_item row-heading">
            <li >Comments</li>
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
            <ul class="prod_item prod-list">
                <li><?= $noi_dung ?></li>
                <li><?= $ma_kh ?></li>
                <li><?= hang_hoa_select_by_id($ma_hh)['ten_hh'] ?></li>
                <li><?= $ngay_binh_luan ?></li>
                <li><a href="index.php?btn_edit&ma_loai=<?= $ma_bl ?>"><i class="fa-regular fa-pen-to-square"></i></a></li>
                <li><a href="index.php?btn_delete&ma_loai=<?= $ma_bl ?>"><i class="fa-regular fa-trash-can"></i></a></li>
            </ul>
        <?php } ?>
    </div>
</body>

</html>