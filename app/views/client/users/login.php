<?php require('views/client/layouts/header.php'); ?>
<?php require('views/client/layouts/menu.php'); ?>
<div class="login-block">
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <?php
                        if (isset($message)) {
                        ?>
                        <div style="margin-top: 10px;" class="alert alert-primary"><?= $message ?></div>
                        <?php
                        }
                        ?>
                        <form id="login-form" class="form" action="index.php?controller=user&action=check_login" method="post">
                            <h4 class="text-center text-inf">
                                <i class="fa fa-user icon-user"></i>
                                ĐĂNG NHẬP
                            </h4>
                           <div class="form-group">
                                <label for="TenDangNhap" style="color: black;" class="text-inf">Tên đăng nhập:</label><br>
                                <input type="text" name="TenDangNhap" id="TenDangNhap" class="form-control"  value="<?php echo isset($TenDangNhap) ? $TenDangNhap : "" ?>">
                            </div>
                            <div class="form-group">
                                <label for="MatKhau" style="color: black;" class="text-inf">Mật khẩu:</label><br>
                                <input type="password" name="password" id="MatKhau" class="form-control" value="<?php echo isset($MatKhau) ? $MatKhau : "" ?>">
                            </div>
                            <div class="form-group d-flex mt-3" style="justify-content: space-between; align-items: center">
                                <label for="remember-me">
                                    <input id="remember-me" name="remember-me" type="checkbox">
                                    <span>Ghi nhớ đăng nhập</span> 
                                </label>
                                <input type="submit" name="submit" class="btn btn-danger btn-md" value="Đăng nhập">
                            </div>
                        </form>
                        <div id="register-link" class="text-right">
                            <a href="index.php?controller=user&action=register">Bạn chưa có tài khoản? Đăng ký ngay!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('views/client/layouts/footer.php'); ?>
