<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Font  google -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

    <!-- CSS -->
    <link rel="stylesheet" href="../../content/css/search.css">
    <link rel="stylesheet" href="../../content/css/chart.css">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../../content/css/admin.css" />
    <link rel="stylesheet" href="../../content/css/form-admin.css" />

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />

    <script src="<?= $CONTENT_URL ?>/js/jquery.min.js" type="text/javascript"></script>

    <title>Admin Dashboard Panel</title>

    <style>
        main.dashboard {
            /* margin-left: 300px; */
            height: 100vh;
        }

        nav {
            z-index: 9999;
        }
    </style>
</head>

<body>
    <?php
    require 'pages/nav.php';
    ?>
    <main class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
        </div>
        <div class="content-container">
            <?php require $VIEW_NAME ?>
        </div>
    </main>
    <script src="../../content/js/admin.js"></script>

</body>

</html>