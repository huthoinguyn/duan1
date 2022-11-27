<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../content/css/lay-sanpham.css">
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
            border-radius: 2px;
            outline: none;
            border: 1px solid #ccc;
            width: 200px;
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
<<<<<<< HEAD:site/trang-chinh/coffee.php
        
=======

        .cate-list li a:hover {
            color: var(--primary-color);
        }
        .cate-list li a.active {
            color: var(--primary-color);
        }
>>>>>>> b3b2b1a3d280d4919a92350b06dfd5ed3f62c6c8:site/trang-chinh/san-pham.php
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
                <ul class="cate-list">
                    <li><a class="cate-all active" href="index.php?coffee">All</a></li>
                    <?php
                    require '../../dao/loai.php';
                    $loais = loai_select_all();
                    foreach ($loais as $loai) {
                        extract($loai)
                    ?>
                        <li><a data-cate-id="<?= $ma_loai ?>" href="index.php?coffee&ma_loai=<?= $ma_loai ?>"><?= $ten_loai ?></a></li>
                    <?php } ?>
                </ul>
                <form action="">
                    <input type="hidden" name="">
                </form>
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
            contentWrap = document.querySelector('.content-wrap .row'),
            cateList = document.querySelector('.cate-list'),
            cateItems = cateList.querySelectorAll('li a')

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

        cateItems.forEach(cate => {
            cate.onclick = (e) => {
                e.preventDefault();
                [...cateItems].map(ct => ct.classList.remove('active'))
                cate.classList.add('active')

                //
                if (cate == document.querySelector('.cate-all')) {
                    const xhr = new XMLHttpRequest(); // create new XML Object
                    xhr.open("GET", `../hang-hoa/tim-kiem.php`, true);
                    xhr.onload = () => {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status == 200) {
                                let data = xhr.response;
                                contentWrap.innerHTML = data;
                            }
                        }
                    };
                    xhr.send(); //send formData to PHP
                } else {
                    const xhr = new XMLHttpRequest(); // create new XML Object
                    xhr.open("GET", `../hang-hoa/tim-kiem.php?ma_loai=${cate.dataset.cateId}`, true);
                    xhr.onload = () => {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status == 200) {
                                let data = xhr.response;
                                contentWrap.innerHTML = data;
                            }
                        }
                    };
                    xhr.send(); //send formData to PHP
                }
            }
        })
    </script>
</body>

</html>