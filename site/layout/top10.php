<?php
function hang_hoa_select_top10()
{
    $sql = "SELECT * FROM hang_hoa
WHERE so_luot_xem > 0
ORDER BY so_luot_xem DESC LIMIT 0, 3";
    return pdo_query($sql);
}
?>
<div class="row">
    <?php
    require_once '../../dao/hang-hoa.php';
    $hh_array = hang_hoa_select_top10();
    foreach ($hh_array as $hh) {
        extract($hh)
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
                    <button class="prod-action"><i class="fa-solid fa-plus"></i></button>
                </div>
            </a>
        </div>
    <?php
    }
    ?>
</div>