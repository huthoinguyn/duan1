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
        .btn{
            border-radius: 4px;
            border: 1px solid red;
            padding: 12px 24px;
            background-color: #000;
            color: white;
            text-decoration: none;
            
        }
    </style>
</head>

<body>
    <div class="row">
        <form action="index.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Custome code</label>
                <input type="text" name="ma_kh" value='<?= $ma_kh ?>'>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="text" name="mat_khau" value='<?= $mat_khau ?>'>
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input name="up_hinh" type="file">
                <input name="hinh" value="<?= $hinh ?>">
            </div>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="ho_ten" value="<?= $ho_ten ?>" />
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select name="kich_hoat" id="">
                    <option value="1" <?php echo ($kich_hoat == 1) ? "selected" : "" ?>>Active</option>
                    <option value="0" <?php echo ($kich_hoat == 0) ? "selected" : "" ?>>Unactive</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" value='<?= $email ?>'>
            </div>
            <div class="form-group">
                <label for="">Role</label>
                <div class="vai-tro-form">
                    <div>
                        <input type="radio" name="vai_tro" value="1" <?php echo ($vai_tro == 1) ? "checked" : "" ?>>
                        <label for="">Admin</label>
                    </div>
                    <div>
                        <input type="radio" name="vai_tro" value="0" <?php echo ($vai_tro == 0) ? "checked" : "" ?>>
                        <label for="">Customer</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <input type="hidden" name="ma_kh" value="<?= $ma_kh ?>">
                <button type="submit" name="btn_update">Update</button>
            </div>
        </form>
    </div>
    <div class="row">
        <a href="index.php?btn_list" class="btn">List</a>
    </div>
</body>

</html>
