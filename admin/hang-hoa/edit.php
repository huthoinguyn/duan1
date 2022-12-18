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

        .btn {
            border-radius: 4px;
            border: 1px solid red;
            padding: 12px 24px;
            background-color: #000;
            color: white;
            text-decoration: none;

        }

        .img-preview,
        .current-image {
            flex: 0 0 50%;
            max-width: 50%;
            height: 200px;
            overflow: hidden;
        }

        .img-preview img,
        .current-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <div class="row">
        <form class="update-prod-form" action="index.php" method="post" enctype="multipart/form-data">
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
            <div class="form-group image-upload">
                <label for="">Product Image</label>
                <input name="up_hinh" type="file">
                <input type="hidden" name="hinh" value="<?= $hinh ?>">
            </div>
            <div class="form-group">
                <div class="img-preview">
                    <img src="<?= "$IMAGE_DIR/products/" . $hinh ?>" alt="">
                </div>
            </div>
            <div class="form-group">
                <label for="">Product Description</label>
                <textarea type="text" name="mo_ta"><?= $mo_ta ?></textarea>
            </div>
            <div class="form-group flex-start">
                <label for="">Product Speacial</label>
                <input type="checkbox" name="dac_biet" value="1">
            </div>
            <div class="form-group">
                <label for="">Time</label>
                <input type="date" name="ngay_nhap" value="<?= $ngay_nhap ?>">
            </div>
            <input type="hidden" name="so_luot_xem" value='<?= $so_luot_xem ?>'>
            <input type="hidden" name="currentImage" value="<?= $hinh ?>">
            <div class="form-group">
                <label for="">Product Category</label>
                <select type="text" name="loai_hang">
                    <?php
                    require_once "../../global.php";
                    require_once "../../pdo.php";
                    require_once "../../dao/loai.php";
                    $items = loai_select_all();
                    foreach ($items as $item) { ?>
                        <option <?php echo ($item['ma_loai'] == $ma_loai) ? "selected" : "" ?> value="<?= $item['ma_loai'] ?>"><?= $item['ten_loai'] ?></option>
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
        <a href="index.php?btn_list" class="btn">List</a>
        <!-- <a href="index.php?btn_list" class="btn">list</a> -->
    </div>
    <script>
        const imageUpload = document.querySelector('.image-upload'),
            imagePreview = document.querySelector('.img-preview img'),
            inputPrice = document.querySelector('input[name="don_gia"]'),
            addProdForm = document.querySelector(".update-prod-form"),
            addProdFormBtn = document.querySelector(".update-prod-form button")


        imageUpload.querySelector('input').onchange = (e) => {
            imagePreview.src = URL.createObjectURL(e.target.files[0])
        }

        addProdFormBtn.onclick = (e) => {
            e.preventDefault()
        }
        addProdForm.onchange = () => {
            const prodName = addProdForm.querySelector('input[name="ten_hh"]').value,
                prodPrice = addProdForm.querySelector('input[name="don_gia"]').value,
                prodSale = addProdForm.querySelector('input[name="giam_gia"]').value,
                prodDesc = addProdForm.querySelector('textarea[name="mo_ta"]').value,
                prodDate = addProdForm.querySelector('input[name="ngay_nhap"]').value
            addProdFormBtn.onclick = (e) => {
                e.preventDefault()
                if (prodName !== "" && prodDesc !== "") {
                    if (prodPrice > 0) {
                        ['readonly', 'disabled'].forEach(attribute => document.querySelector('input[name="giam_gia"]').removeAttribute(attribute));
                        if (prodSale < 100) {
                            showSuccessToast("Success", "Add Products Successfully")
                            setTimeout(() => {
                                addProdForm.submit()
                            }, 500)
                        } else {
                            showErrorToast("Error", "The discount value cannot exceed 100% of the value of the goods")
                            prodSale.focus()
                        }
                    } else {
                        ['readonly', 'disabled'].forEach(attribute => document.querySelector('input[name="giam_gia"]').setAttribute(attribute, 'true'));
                        showErrorToast("Fail", "Unit price must be positive")
                    }
                } else {
                    showErrorToast("Error", "All field are required")
                }
            }
        }

        inputPrice.onchange = (e) => {
            if (e.target.value > 0) {
                ['readonly', 'disabled'].forEach(attribute => document.querySelector('input[name="giam_gia"]').removeAttribute(attribute));
            } else {
                ['readonly', 'disabled'].forEach(attribute => document.querySelector('input[name="giam_gia"]').setAttribute(attribute, 'true'));
                document.querySelector('input[name="giam_gia"]').value = ""

            }
        }
        document.querySelector('input[name="giam_gia"]').onchange = (e) => {
            if (e.target.value >= 100) {
                showErrorToast("Error", "The discount value cannot exceed 100% of the value of the goods")
                e.target.focus()
            }
        }
    </script>
</body>

</html>