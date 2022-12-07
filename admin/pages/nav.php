<nav>
    <div class="logo-name">
        <div class="logo-image">
            <img src="../../content/images/users/<?php echo $_SESSION['user']['hinh'] ?>" alt="" />
        </div>

        <span class="logo_name">
            <?php echo $_SESSION['user']['ho_ten'] ?>
        </span>
    </div>
    <div class="menu-items">
        <ul class="nav-links">
            <li>
                <a href="../trang-chinh">
                <i class="fa-solid fa-house"></i>
                    <span class="link-name">Dahsboard</span>
                </a>
            </li>
            <li>
                <a href="../hang-hoa">
                <i class="fa-solid fa-shirt"></i>
                    <span class="link-name">Product</span>
                </a>
            </li>
            <li>
                <a href="../loai-hang/">
                <i class="fa-solid fa-list-ul"></i>
                    <span class="link-name">Category</span>
                </a>
            </li>
            <li>
                <a href="../khach-hang/">
                <i class="fa-solid fa-user-large"></i>
                    <span class="link-name">Customer</span>
                </a>
            </li>
            <li>
                <a href="../binh-luan/">
                <i class="fa-solid fa-comment"></i>
                    <span class="link-name">Comments</span>
                </a>
            </li>
            <li>
                <a href="../don-hang/">
                <i class="fa-solid fa-receipt"></i>
                    <span class="link-name">Receipt</span>
                </a>
            </li>
            <li>
                <a href="../../site/trang-chinh/">
                    <i class="uil uil-globe"></i>
                    <span class="link-name">Go to website</span>
                </a>
            </li>
        </ul>

        <ul class="logout-mode">
           

            <li class="mode">
                <a href="#">
                    <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                    <span class="switch"></span>
                </div>
            </li>
        </ul>
    </div>
</nav>