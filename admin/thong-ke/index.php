<?php
require_once "../../global.php";
require_once "../../dao/thong-ke.php";
//--------------------------------//
?>
<div class="dash-content">
    <div class="overview">
        <div class="title">
            <i class="uil uil-tachometer-fast-alt"></i>
            <span class="text">Dashboard</span>
        </div>

        <div class="boxes">
            <div class="box box1">
                <i class="uil uil-thumbs-up"></i>
                <span class="text">Product</span>
                <span class="number">
                    <?php echo thong_ke_hang_hoa() ?>
                </span>
            </div>
            <div class="box box2">
                <i class="uil uil-comments"></i>
                <span class="text">Cate</span>
                <span class="number"><?php echo thong_ke_loai() ?></span>
            </div>
            <div class="box box3">
                <i class="uil uil-share"></i>
                <span class="text">Comments</span>
                <span class="number"><?php echo thong_ke_binh_luan() ?></span>
            </div>
            <div class="box box4">
                <i class="uil uil-user"></i>
                <span class="text">Customer</span>
                <span class="number"><?php echo thong_ke_khach_hang() ?></span>
            </div>
            <div class="box box5">
                <i class="uil uil-user"></i>
                <span class="text">Receipt</span>
                <span class="number"><?php echo thong_ke_don_hang() ?></span>
            </div>
        </div>
    </div>
    <?php
    require '../thong-ke/chart.php';
    require '../thong-ke/list.php';

    // if (exist_param("chart")) {
    //     $VIEW_NAME = "thong-ke/chart.php";
    // } else {
    //     $VIEW_NAME = "thong-ke/list.php";
    // }
    // $items = thong_ke_hang_hoa();
    // require "../layout.php";

    ?>
</div>