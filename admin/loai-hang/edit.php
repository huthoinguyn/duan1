<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <style>
        form {
            display: flex;
            flex-wrap: wrap;
        }

        .form-group {
            flex: 0 0 100%;
            max-width: 100%;
        }
    </style>
</head>

<body>
    <div class="row">
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="">Ten Loai Hang</label>
                <input type="text" name="ten_loai" value="<?= $ten_loai ?>">
                <input type="hidden" name="ma_loai" value="<?= $ma_loai ?>">
            </div>
            <div class="form-group">
                <button type="submit" name="btn_update" class="btn">Add</button>
            </div>
        </form>
    </div>
</body>

</html>