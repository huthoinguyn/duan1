<div class="user-change-password">
    <div class="change-close-icon">
        <i class="fa-solid fa-close"></i>
    </div>
    <form class="change-password-form" action="doi-mk.php" method="post">
        <div class="form-group">
            <label for="">Username</label>
            <input name="ma_kh">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input name="mat_khau" type="password">
        </div>
        <div class="form-group">
            <label for="">New Password</label>
            <input name="mat_khau2" type="password">
        </div>
        <div class="form-group">
            <label for="">Confirm New Password</label>
            <input name="mat_khau3" type="password">
        </div>
        <div class="form-group">
            <button name="btn_change">change</button>
        </div>
    </form>
</div>

<script>
    const changeLink = document.querySelector('.change-password'),
        changeContainer = document.querySelector('.user-change-password'),
        changeCloseIcon = document.querySelector('.change-close-icon')

    changeLink.onclick = (e) => {
        e.preventDefault()
        changeContainer.classList.add('active')
    }
    changeCloseIcon.onclick = (e) => {
        console.log('hi');
        changeContainer.classList.remove('active')
    }

    const changeForm = document.querySelector('.change-password-form'),
        changeBtn = document.querySelector('.change-password-form button');
    changeForm.onsubmit = (e) => {
        e.preventDefault()
    }
    changeBtn.onclick = () => {
        const xhr = new XMLHttpRequest(); // create new XML Object
        xhr.open("POST", "../tai-khoan/doi-mk.php?btn_change", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status == 200) {
                    let data = xhr.response;
                    alert(data)
                    location.reload()
                }
            }
        };
        let formData = new FormData(changeForm); //create new formData
        xhr.send(formData); //send formData to PHP
    };
</script>