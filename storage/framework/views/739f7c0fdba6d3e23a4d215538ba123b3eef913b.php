<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/fontawesome/css/fontawesome.min.css">
<!--===============================================================================================-->
    <title><?php echo e($title); ?></title>
</head>
<body>

<!-- CONTENT -->
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form" action="<?php echo e(url('/login/action')); ?>" method="post">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <span class="login100-form-title p-b-26">
                    Welcome
                </span>
                <span class="login100-form-title p-b-48">
                    <i class="zmdi zmdi-font"></i>
                </span>

                <div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
                    <input class="input100" type="email" name="email" require>
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <span class="btn-show-pass">
                        <i class="zmdi zmdi-eye"></i>
                    </span>
                    <input class="input100" type="password" name="password" require>
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" type="submit" value="Login">
                            Login
                        </button>
                    </div>
                </div>

                <div class="text-center p-t-115">
                    <span class="txt1">
                        Don’t have an account?
                    </span>

                    <a class="txt2" href="#">
                        Sign Up
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- <section class="bg-color-0">
    <div class="container">
        <div class="row align-items-center half-screen space">
            <div class="col-md-4 offset-md-4">
                <form action="<?php echo e(url('/action')); ?>" method="post">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Tulis email disini" require><br>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Tulis password disini" require><br>
                </div>
                <input type="submit" value="Login" class="btn btn-success btn-block">
                </form>
            </div>
        </div>
    </div>
</section> -->

<!-- FOOTER -->


<!--===============================================================================================-->
    <script src="assets/js/jquery.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/js/popper.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/js/main.js"></script>

</body>
</html><?php /**PATH C:\xampp\htdocs\PsychoCare\resources\views/login_page.blade.php ENDPATH**/ ?>