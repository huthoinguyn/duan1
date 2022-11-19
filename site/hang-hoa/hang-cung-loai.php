<ul class="prod-list">
    <?php
    $hh_cung_loai = hang_hoa_select_by_loai($ma_loai);
    foreach ($hh_cung_loai as $hh) {
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
                </div>
            </a>
        </div>
    <?php
    }
    ?>
</ul>