<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .btn {
            border-radius: 4px;
            border: 1px solid red;
            padding: 12px 24px;
            background-color: #000;
            color: white;
            text-decoration: none;

        }

        .img-preview {
            width: 240px;
            height: 180px;
            overflow: hidden;
        }

        .img-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="row">
        <form action="index.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" name="ten_hh">
            </div>
            <div class="form-group">
                <label for="">Product Price</label>
                <input type="text" name="don_gia">
            </div>
            <div class="form-group">
                <label for="">Product Sale</label>
                <input type="text" name="giam_gia">
            </div>
            <div class="form-group image-upload">
                <label for="">Product Image</label>
                <input type="file" name="hinh">
            </div>
            <div class="img-preview">
                <img src="" class="" alt="">
            </div>
            <div class="form-group">
                <label for="">Product Description</label>
                <textarea type="text" name="mo_ta"></textarea>
            </div>
            <div class="form-group">
                <label for="">Product Speacial</label>
                <input type="text" name="dac_biet">
            </div>
            <div class="form-group">
                <label for="">Time</label>
                <input type="text" name="ngay_nhap" placeholder="yyyy/mm/dd">
            </div>
            <div class="form-group">
                <label for="">View</label>
                <input type="text" name="so_luot_xem">
            </div>
            <div class="form-group">
                <label for="">Category</label>
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
                <button type="submit" name="btn_insert">Add</button>
            </div>
        </form>
    </div>
    <div class="row">
        <a href="index.php?btn_list" class="btn">List</a>
    </div>
    <script>
        const imageUpload = document.querySelector('.image-upload'),
            imagePreview = document.querySelector('.img-preview img')
        imageUpload.querySelector('input').onchange = (e) => {
            imagePreview.src = URL.createObjectURL(e.target.files[0])
        }
    </script>
</body>

</html>