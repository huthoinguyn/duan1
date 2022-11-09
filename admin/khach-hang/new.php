<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        form {
            display: flex;
            flex-wrap: wrap;
            max-width: 640px;
        }

        .form-group {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .vai-tro-form {
            display: flex;
            justify-content: center;
            gap: 28px;
        }
    </style>
</head>

<body>
    <div class="row">
        <form action="index.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="ma_kh">
            </div>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="ho_ten">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="text" name="mat_khau">
            </div>
            <div class="form-group">
                <label for="">Active</label>
                <select name="kich_hoat" id="">
                    <option value="1" selected>Active</option>
                    <option value="0">Unactive</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="hinh">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" />
            </div>
            <div class="form-group">
                <label for="">Position</label>
                <div class="vai-tro-form">
                    <div>
                        <input type="radio" name="vai_tro" value="1">
                        <label for="">Admin</label>
                    </div>
                    <div>
                        <input type="radio" name="vai_tro" value="0">
                        <label for="">Customer</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" name="btn_insert">Add</button>
            </div>
        </form>
    </div>
    <div class="row">
        <a href="index.php?btn_list" class="btn">list</a>
    </div>
</body>

</html>