<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .coffee-container {
            width: 100%;
            display: flex;
        }

        .coffee-container .search form {
            padding: 12px;
            justify-content: start;
        }

        .coffee-container .search input {
            padding: 9px 6px;
            border-radius: 6px;
            outline: none;
            border: 1px solid #ccc;
        }

        .coffee-container .cate-wrap {
            padding: 24px;
            max-width: 20%;
            flex: 0 0 30%;
        }

        .coffee-container .cate-wrap ul {
            width: 100%;
        }

        .coffee-container .cate-wrap ul a {
            display: block;
            width: 100%;
            font-size: 18px;
            pointer-events: all;
        }

        .coffee-container .content-wrap {
            max-width: 80%;
            flex: 0 0 70%;
        }
    </style>
</head>

<body>
    <div class="coffee-container">
        <div class="cate-wrap">
            <div class="row search">
                <form action="">
                    <input type="text" name="keywords" placeholder="Search a coffee...">
                </form>
            </div>
            <div class="row">
                <h3 class="title">
                    Categories
                </h3>
            </div>
            <div class="row">
                <ul>
                    <li><a href="index.php?coffee">All</a></li>
                    <?php
                    require '../../dao/loai.php';
                    $loais = loai_select_all();
                    foreach ($loais as $loai) {
                        extract($loai)
                    ?>
                        <li><a href="index.php?coffee&ma_loai=<?= $ma_loai ?>"><?= $ten_loai ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="content-wrap">
            <div class="row prod-list">
                <?php require '../hang-hoa/liet-ke.php' ?>
            </div>
        </div>
    </div>
    <script>
        const searchForm = document.querySelector('.search form'),
            searchInp = document.querySelector('.search form input'),
            contentWrap = document.querySelector('.content-wrap .row')

        searchForm.onsubmit = (e) => {
            e.preventDefault()
        }
        searchInp.oninput = () => {
            const xhr = new XMLHttpRequest(); // create new XML Object
            xhr.open("POST", "../hang-hoa/tim-kiem.php", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        let data = xhr.response;
                        contentWrap.innerHTML = data;
                    }
                }
            };
            let formData = new FormData(searchForm); //create new formData
            xhr.send(formData); //send formData to PHP
        }
    </script>
</body>

</html>