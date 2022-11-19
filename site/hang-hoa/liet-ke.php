<?php
// require '../../global.php';
// require '../../pdo.php';
// require '../../dao/hang-hoa.php';
//-------------------------------//
extract($_REQUEST);
if (exist_param("ma_loai")) {
    $items = hang_hoa_select_by_loai($ma_loai);
} else if (exist_param("keywords")) {
    $items = hang_hoa_select_keyword($keywords);
} else {
    $items = hang_hoa_select_all();
}
// $VIEW_NAME = "hang-hoa/liet-ke-ui.php";
?>
<?php
foreach ($items as $item) {
    extract($item);
?>
    <div class="grid-column prod-item">
        <a href="index.php?chi-tiet&ma_hh=<?= $ma_hh ?>">
            <div class="prod-image">
                <img src="<?= $CONTENT_URL ?>/images/products/<?= $hinh ?>" />
            </div>
            <div class="prod-content">
                <div class="prod-info">
                    <h2 class="prod-title"><?= $ten_hh ?></h2>
                    <p class="prod-price"><?= number_format($don_gia, 0) ?>VND</p>
                </div>
            </div>
        </a>
    </div>
<?php
}
?>