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
    </style>
</head>

<body>
    <div class="row">
        <form action="index.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" name="ten_hh" value='<?= $ten_hh ?>'>
            </div>
            <div class="form-group">
                <label for="">Product Price</label>
                <input type="text" name="don_gia" value='<?= $don_gia ?>'>
            </div>
            <div class="form-group">
                <label for="">Product Sale</label>
                <input type="text" name="giam_gia" value='<?= $giam_gia ?>'>
            </div>
            <div class="form-group">
                <label for="">Product Image</label>
                <input name="up_hinh" type="file">
                <input name="hinh" value="<?= $hinh ?>">
            </div>
            <div class="form-group">
                <label for="">Product Description</label>
                <textarea type="text" name="mo_ta"><?= $mo_ta ?></textarea>
            </div>
            <div class="form-group">
                <label for="">Product Speacial</label>
                <input type="text" name="dac_biet" value='<?= $dac_biet ?>'>
            </div>
            <div class="form-group">
                <label for="">Time</label>
                <input type="text" name="ngay_nhap" value='<?= $ngay_nhap ?>'>
            </div>
            <div class="form-group">
                <label for="">So luot xem</label>
                <input type="text" name="so_luot_xem" value='<?= $so_luot_xem ?>'>
            </div>
            <div class="form-group">
                <label for="">Product Category</label>
                <select type="text" name="loai_hang">
                    <?php
                    require_once "../../global.php";
                    require_once "../../pdo.php";
                    require_once "../../dao/loai.php";
                    $items = loai_select_all();
                    foreach ($items as $item) { ?>
                        <option value="<?= $item['ma_loai'] ?>"><?= $item['ten_loai'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" name="ma_hh" value="<?= $ma_hh ?>">
                <button type="submit" name="btn_update">Update</button>
            </div>
        </form>
    </div>
    <div class="row">
        <a href="index.php?btn_list" class="btn">list</a>
        <!-- <a href="index.php?btn_list" class="btn">list</a> -->
    </div>
</body>

</html>