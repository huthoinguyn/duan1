<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../content/css/form.css">
    <style>
    </style>
</head>

<body>
    <div class="user-container">
        <div class="user-close-icon">
            <i class="fa-solid fa-arrow-right"></i>
        </div>
        <?php
        if (isset($_SESSION['user'])) {
            require 'dang-nhap-info.php';
        } else {
            $ma_kh = get_cookie("ma_kh");
            $mat_khau = get_cookie("mat_khau");
            require 'dang-nhap-form.php';
        }
        ?>
    </div>
    <script>
        const loginForm = document.querySelector('.login-form'),
            loginBtn = document.querySelector('.login-form button')
        if (loginForm) {
            loginForm.onsubmit = (e) => {
                e.preventDefault()
            }
        }
        if (loginBtn) {
            loginBtn.onclick = () => {
                const xhr = new XMLHttpRequest(); // create new XML Object
                xhr.open("POST", "../tai-khoan/dang-nhap.php?btn_login", true);
                xhr.onload = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status == 200) {
                            let data = xhr.response;
                            alert(data)
                            location.reload()
                        }
                    }
                };
                let formData = new FormData(loginForm); //create new formData
                xhr.send(formData); //send formData to PHP
            };
        }
    </script>
</body>

</html>