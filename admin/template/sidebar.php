<div class="col-12 col-lg-3 col-xl-2 vh-100 sidebar bg-light " style="overflow-y: scroll">
    <div class="d-flex justify-content-between align-items-center py-2 mt-3">
        <a href="dashboard.php" class="text-decoration-none">
            <div class="d-flex align-items-center">
                <span class="fw-bold text-primary mb-0"> Visible
                </span>
                <img src="<?php echo $url ?>/adminassets/img/logo/logo.png"
                    style="width: 30px; height: 30px; border-radius: 50%" alt="">
                <span class="fw-bold text-primary mb-0">ne</span>
            </div>
        </a>
        <button class="btn-outline-secondary hide-sidebar d-block d-lg-none">
            <i class="feather-x" style="color: #c6c4c4; font-size: 2rem; line-height: 1"></i>
        </button>
    </div>
    <div class="nav-menu">
        <ul>


            <li class="menu-spacer"></li>
            <li class="menu-title my-2">
                <span>User Management</span>
            </li>
            <?php if ($_SESSION['user']['role'] == 0) { ?>
            <li class="menu-item my-2">
                <a href="<?php echo $url ?>/register.php"
                    class="d-flex justify-content-between menu-item-link text-decoration-none">
                    <span>
                        <i class="feather-user-plus"></i>
                        <small class="fw-bold ms-2 text-uppercase">Create New Account</small>
                    </span>
                </a>
            </li>
            <?php } ?>

            <li class="menu-item my-2">
                <a href="<?php echo $url ?>/admins_list.php"
                    class="d-flex justify-content-between menu-item-link text-decoration-none">
                    <span>
                        <i class="feather-menu"></i>
                        <small class="fw-bold ms-2 text-uppercase">Admins List</small>
                    </span>
                    <span class="badge rounded p-2 text-black-50 shadow-sm bg-white">
                        <?php echo countTotal("admins") ?>
                    </span>
                </a>
            </li>


            <li class="menu-spacer"></li>
            <li class="menu-item my-2">
                <a href="<?php echo $url ?>/logout.php" class="btn btn-outline-primary w-100">
                    <i class="feather-log-out"></i>
                    <small class="fw-bold ms-2 text-uppercase">Logout</small>
                </a>
            </li>
        </ul>
    </div>
</div>