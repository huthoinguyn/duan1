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

        .user-list ul.user_item {
            padding: 12px 24px;
            width: 100%;
            height: 200px;
            display: flex;
            list-style: none;
            justify-content: center;
        }

        .user_item {
            padding: 12px 24px;
            width: 100%;
            display: flex;
            list-style: none;
            justify-content: center;
            overflow: hidden;
        }

        ul.user_item li {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            border-bottom: 1px solid black;
        }

        ul.prod_item li.kich-hoat,
        ul.prod_item li.vai-tro,
        ul.prod_item li.ma_kh,
        ul.prod_item li.prod-action {
            width: 5%;
        }

        ul.prod_item li.user-image {
            width: 100px;
            height: 60px;
        }
        .user-list ul.user_item li {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            border-bottom: 1px solid black;
            padding-left: 30px;
        }
        ul.user_item li.user-price {
            width: 10%;
        }

        ul.user_item li.kich-hoat,
        ul.user_item li.vai-tro,
        ul.user_item li.ma_kh,
        ul.user_item li.action
         {
            width: 8%;
        }
        ul.user_item li.email,
        ul.user_item li.ho-ten
        {
            width: 20%;
        }
        ul.user_item li.user-image {
           padding: 12px 0;
            overflow: hidden;
            width: 20%;
        }

        ul.user_item li.user-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .user-list {
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
        .user_item li i{
            color: black;
            font-size: 25px;
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
    <ul class="user_item row-heading">
            <li>Custome code</li>
            <li class="ho-ten">Name</li>
            <li class="user-image">Image</li>
            <li class="email">Email</li>
            <li class="vai-tro">Role</li>
            <li class="kich-hoat">Actived</li>
            <li class="action"></li>
            <li class="action"></li>
        </ul>
    <div class="row user-list">
      
       
        <?php
        // $items = hang_hoa_select_all();
        foreach ($items as $item) { ?>
            <ul class="user_item">
                <li><?= $item['ma_kh'] ?></li>
                <li class="ho-ten"><?= $item['ho_ten'] ?></li>
              
                <li class="user-image">
                    <img src="<?= "$IMAGE_DIR/users/" . $item['hinh'] ?>" alt="">
                </li>
                <li class="email"><?= $item['email'] ?></li>
                <li class="vai-tro"><?= ($item['vai_tro'] == 1) ? "Admin" : "Customer" ?></li>
                <li class="kich-hoat"><?= ($item['kich_hoat'] == 1) ? "Active" : "Unactive" ?></li>
                <li class="action"><a href="index.php?btn_edit&ma_kh=<?= $item['ma_kh'] ?>"><i class="fa-regular fa-pen-to-square"></i></a></li>
                <li class="action"><a href="index.php?btn_delete&ma_kh=<?= $item['ma_kh'] ?>"><i class="fa-regular fa-trash-can"></i></a></li>
            </ul>
        <?php } ?>
    </div>
    <div class="row">
        <a href="index.php" class="btn"><i class="fa-solid fa-plus"></i></a>
    </div>
</body>

</html>