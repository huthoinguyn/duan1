<div class="title">
    <i class="uil uil-chart-bar"></i>
    <span class="text">Chart</span>
</div>
<div class="chart-wrap h-40vh">
    <div class="prod-chart" style="height: <?php echo (thong_ke_hang_hoa() / total_all()) * 100 ?>%;">
    </div>
    <div class="cus-chart" style="height: <?php echo (thong_ke_khach_hang() / total_all()) * 100 ?>%;">
    </div>
    <div class="cate-chart" style="height: <?php echo (thong_ke_loai() / total_all()) * 100 ?>%;">
    </div>
    <div class="comm-chart" style="height: <?php echo (thong_ke_binh_luan() / total_all()) * 100 ?>%;">
    </div>
    <div class="rep-chart" style="height: <?php echo (thong_ke_don_hang() / total_all()) * 100 ?>%;">
    </div>
</div>
<div class="chart-wrap">
    <div class="chart-name">Products</div>
    <div class="chart-name">Customer</div>
    <div class="chart-name">Categories</div>
    <div class="chart-name">Comments</div>
    <div class="chart-name">Receipt</div>
</div>