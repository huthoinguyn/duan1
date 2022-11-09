<div class="activity">
    <div class="title">
        <i class="uil uil-clock-three"></i>
        <span class="text">Statistical</span>
    </div>

    <div class="activity-data">
        <div class="data names">
            <span class="data-title">Categories</span>
        </div>
        <div class="data email">
            <span class="data-title">Total Products</span>
        </div>
        <div class="data joined">
            <span class="data-title">Highest price</span>
        </div>
        <div class="data type">
            <span class="data-title">Lowest price</span>
        </div>
        <div class="data status">
            <span class="data-title">Average price</span>
        </div>
    </div>
    <?php
    $items = statistical();
    foreach ($items as $item) {
    ?>
        <div class="activity-data">
            <div class="data names">
                <span class="data-list">
                    <?php echo $item['ten_loai'] ?>
                </span>
            </div>
            <div class="data email">
                <span class="data-list"><?php echo total_prod_of_cate($item['ma_loai']) ?></span>
            </div>
            <div class="data joined">
                <span class="data-list"><?php print_r(priceCompare($item['ma_loai'])[0][0])  ?></span>
            </div>
            <div class="data type">
                <span class="data-list"><?php print_r(priceMin($item['ma_loai'])[0][0])  ?></span>
            </div>
            <div class="data status">
                <span style="text-transform: capitalize;" class="data-list">
                    <?php echo averagePrice($item['ma_loai'])  ?>
                </span>
            </div>
        </div>
    <?php } ?>
</div>