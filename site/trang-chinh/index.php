<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    <link rel="stylesheet" href="../../content/css/login.css">
    <link rel="stylesheet" href="../../content/css/sanpham.css">
    <link rel="stylesheet" href="../../content/css/testim.css">
    <link rel="stylesheet" href="../../content/css/style.css">
    <link rel="stylesheet" href="../../content/css/carousel.css">

</head>

<body>
    <?php
    require '../../global.php';
    require '../../pdo.php';
    if (exist_param("gioi-thieu")) {
        $VIEW_NAME = "trang-chinh/gioi-thieu.php";
    } else if (exist_param("coffee")) {
        require_once '../../dao/hang-hoa.php';
        $items_all = hang_hoa_select_all();
        $VIEW_NAME = "trang-chinh/coffee.php";
    } else if (exist_param("lien-he")) {
        $VIEW_NAME = "trang-chinh/lien-he.php";
    } else if (exist_param("chi-tiet")) {
        $VIEW_NAME = "../hang-hoa/chi-tiet.php";
    } else if (exist_param("gio-hang")) {
        $VIEW_NAME = "../gio-hang/gio-hang-page.php";
    } else if (exist_param("thanh-toan")) {
        $VIEW_NAME = "../gio-hang/thanh-toan-page.php";
    } else if (exist_param("lich-su")) {
        $VIEW_NAME = "../gio-hang/lich-su.php";
    } else {
        require_once '../../dao/hang-hoa.php';
        $items_all = hang_hoa_select_all();
        $dac_biet_list = hang_hoa_select_dac_biet();
        $VIEW_NAME = "trang-chinh/trang-chu.php";
    }
    require '../layout.php';
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.min.js" referrerpolicy="no-referrer"></script>
    <script src="../../content/js/login.js"></script>
    <script src="../../content/js/script.js"></script>
    <script src="../../content/js/testim.js"></script>
    <script>
        const typed = new Typed(".typing", {
            strings: [
                "Coffee with our story",
                "Fresh, Organic, Handcrafted",
                "Experence the full taste",
            ],
            typeSpeed: 100,
            backSpeed: 60,
            loop: true,
        });
    </script>

</body>

</html>