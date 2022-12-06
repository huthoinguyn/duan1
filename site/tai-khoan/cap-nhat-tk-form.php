<?php extract($_SESSION['user']) ?>
<div class="user-update-account">
    <div class="update-close-icon">
        <i class="fa-solid fa-close"></i>
    </div>
    <form class="update-user-form" action="cap-nhat-tk.php" method="post" enctype="multipart/form-data">
        <div class="form-group avatar">
            <img src="<?= $CONTENT_URL ?>/images/users/<?= $hinh ?>">
        </div>
        <div class="form-group">
            <label for="">Username</label>
            <input name="ma_kh" value="<?= $ma_kh ?>" readonly>
        </div>
        <div class="form-group">
            <label for="">Name</label>
            <input name="ho_ten" value="<?= $ho_ten ?>">
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" value="<?= $email ?>">
        </div>
        <div class="form-group">
            <label for="">Avatar</label>
            <input name="up_hinh" type="file">
        </div>
        <div class="form-group">
            <button name="btn_update">Cập nhật</button>
        </div>

        <input name="vai_tro" value="<?= $vai_tro ?>" type="hidden">
        <input name="kich_hoat" value="<?= $kich_hoat ?>" type="hidden">
        <input name="mat_khau" value="<?= $mat_khau ?>" type="hidden">
    </form>
</div>

<script>
    const updateLink = document.querySelector('.update-account'),
        update = document.querySelector('.user-update-account'),
        updateCloseIcon = document.querySelector('.update-close-icon')

    updateLink.onclick = (e) => {
        e.preventDefault()
        update.classList.add('active')
    }
    updateCloseIcon.onclick = (e) => {
        update.classList.remove('active')
    }

    const updateForm = document.querySelector('.update-user-form'),
        updateBtn = document.querySelector('.update-user-form button');
    updateForm.onsubmit = (e) => {
        e.preventDefault()
    }
    updateBtn.onclick = () => {
        const xhr = new XMLHttpRequest(); // create new XML Object
        xhr.open("POST", "../tai-khoan/cap-nhat-tk.php?btn_update", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status == 200) {
                    let data = xhr.response;
                    alert(data)
                    location.reload()
                }
            }
        };
        let formData = new FormData(updateForm); //create new formData
        xhr.send(formData); //send formData to PHP
    };
</script>