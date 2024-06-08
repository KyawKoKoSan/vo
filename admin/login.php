<?php
require_once "core/base.php";
require_once "core/functions.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    <link rel="icon" href="">-->
    <link rel="icon" href="<?php echo $url ?>/adminassets/img/logo/logo.png">
    <title>Admin Dashboard</title>

    <!--  Start  Linking CSS Files, bootstrap, animate.style,feather icon and font awesome-->
    <link rel="stylesheet" href="<?php echo $url ?>/../assets/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/../assets/vendor/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/adminassets/css/admin.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/adminassets/css/adminStyle.css">
    <!--  End  Linking CSS Files, bootstrap, animate.style,feather icon and font awesome-->
</head>

<body>

    <!--start coding for login form-->
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-12 col-md-9 col-lg-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="text-center text-primary text-uppercase">
                            <i class="feather-users"></i>
                            Login To Account
                        </h4>
                        <hr>
                        <?php
                        if (isset($_POST['login-btn'])) {
                            echo login();
                        }
                        ?>
                        <form method="post" class="row mt-3" enctype="multipart/form-data">

                            <div class="m-2">
                                <label for="inputEmail4" class="form-label">
                                    <i class="feather-mail me-2 text-danger"></i>Email
                                </label>
                                <input type="email" name="email" class="form-control" id="inputEmail4"
                                    placeholder="example@gmail.com" required>
                            </div>
                            <div class="m-2">
                                <label for="inputPass" class="form-label">
                                    <i class=" me-2 feather-unlock text-primary"></i>Password
                                </label>
                                <input type="password" name="password" min="8" class="form-control" id="inputPass"
                                    required>
                            </div>
                            <div class="row justify-content-center col-12 mt-3">
                                <div class="col-8 col-md-4 col-lg-5">
                                    <button type="submit" name="login-btn" class="btn btn-outline-primary col-12">
                                        <i class="feather-log-in me-2"></i>Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--end coding for login form-->

    <!--  Start  Linking JS files and libraries-->

    <script src="<?php echo $url; ?>/../assets/vendor/jQuery/jquery.min.js"></script>
    <script src="<?php echo $url; ?>/../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $url; ?>/../assets/vendor/counterup/jquery.counterup.min.js"></script>
    <script src="<?php echo $url; ?>/adminassets/js/admin.js"></script>


    <!--  End  Linking JS files and libraries-->

</body>

</html>