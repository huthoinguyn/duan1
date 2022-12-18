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
                <?php
                if ($giam_gia > 0) {
                ?>
                    <div class="prod-sale">
                        <span>
                            -<?= $giam_gia ?>%
                        </span>
                    </div>
                <?php
                } ?>
            </div>
            <div class="prod-content">
                <div class="prod-info">
                    <h2 class="prod-title"><?= $ten_hh ?></h2>
                    <p class="prod-price">
                        <?php
                        if ($giam_gia > 0) {
                        ?>
                            <span class="listed-price">
                                <del>
                                    $<?= number_format($don_gia, 2) ?>
                                </del>
                                <i>$<?= number_format($don_gia - (($don_gia * $giam_gia) / 100), 2) ?></i>
                            </span>
                        <?php
                        } else {
                        ?>
                            <span class="listed-price">
                                $<?= number_format($don_gia, 2) ?>
                            </span>
                        <?php
                        }
                        ?>
                    </p>
                </div>
            </div>
        </a>
    </div>
<?php
}
?>

