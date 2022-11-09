<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .info-container {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .info-container .title {
            width: 100%;
            text-align: center;
        }

        .user-info {
            width: 100%;
            padding: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }

        .user-content {
            margin-bottom: 16px;
        }

        .logout-form {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 24px;
        }

        .logout-form button {
            padding: 12px 24px;
            border-radius: 4px;
            color: #fff;
            background-color: #000;
            outline: none;
            cursor: pointer;
        }

        .go-admin,
        .update-account,
        .change-password {
            width: 100%;
            text-align: center;
            display: block;
            color: blue;
        }

        .user-update-account,
        .user-change-password {
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            z-index: 99999;
            transform: scaleX(0);
            transform-origin: right;
            transition: all 300ms ease;
            box-shadow: 0 0 20px rgba(48, 46, 77, 0.15);
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .user-update-account.active,
        .user-change-password.active {
            transform: scaleX(1);
        }

        .change-close-icon,
        .update-close-icon {
            position: absolute;
            top: 0;
            left: 0;
            padding: 20px;
            font-size: 24px;
            cursor: pointer;
            transition: all 200ms ease;
        }

        .change-close-icon:hover,
        .update-close-icon:hover {
            transform: scale(1.3);
        }
    </style>
</head>

<body>
    <div class="info-container">
        <div class="row">
            <h2 class="title">User Infomation</h2>
        </div>
        <div class="row">
            <div class="user-info">
                <div class="user-img">
                    <img src="../../content/images/users/<?php echo $_SESSION['user']['hinh'] ?>" alt="">
                </div>
                <div class="user-content">
                    <h3 class="name"><?php echo $_SESSION['user']['ho_ten'] ?></h3>
                    <p><?php echo ($_SESSION['user']['vai_tro'] == 1) ? "Admin" : "Customer"  ?></p>
                </div>
                <div class="row">
                    <a class="change-password" href="">Change Password</a>
                </div>
                <div class="row">
                    <a class="update-account" href="">Update Account</a>
                </div>
                <div class="row">
                    <?php
                    echo ($_SESSION['user']['vai_tro'] == 1) ? "<a class='go-admin' href='../../admin/'>Go to Admin</a>" : "";
                    ?>
                </div>
                <div class="row">
                    <form class="logout-form" method="POST">
                        <input type="hidden" name="btn_logoff">
                        <button>
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require '../tai-khoan/doi-mk-form.php' ?>
    <?php require '../tai-khoan/cap-nhat-tk-form.php' ?>
    <script>
        const logOutForm = document.querySelector('.logout-form'),
            logOutBtn = document.querySelector('.logout-form button')
        logOutForm.onsubmit = (e) => {
            e.preventDefault()
        }
        logOutBtn.onclick = () => {
            const xhr = new XMLHttpRequest(); // create new XML Object
            xhr.open("POST", "../tai-khoan/dang-nhap.php?btn_logoff", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        let data = xhr.response;
                        alert(data)
                        location.reload()
                    }
                }
            };
            let formData = new FormData(logOutForm); //create new formData
            xhr.send(formData); //send formData to PHP
        };
    </script>
</body>

</html>