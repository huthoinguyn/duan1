<main class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>
        <h3><?php echo isset($_GET['manage']) ? $_GET['manage'] : 'dashboard' ?> Manager</h3>
    </div>
    <div class="content-container">
        <?php require $VIEW_NAME ?>
    </div>
</main>
<!-- <script src="./module/product/js/upload.js"></script> -->