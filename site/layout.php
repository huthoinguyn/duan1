<main>
    <header>
        <div class="logo">
            <a href="./index.php">TDK Store</a>
        </div>
        <?php require '../layout/nav.php' ?>
        <?php require '../layout/dang-nhap.php' ?>
    </header>

    <?php require '../layout/notification.php' ?>
    <div class="content">
        <?php require $VIEW_NAME; ?>
    </div>
    <?php require '../layout/footer.php' ?>
</main>