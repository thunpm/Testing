<div class="login-block">
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12"> 
                        <?php
                        if (isset($message) && $message != "") {
                            echo '<p style="margin-top: 20px;" class="alert alert-danger" role="alert">'.$message.'</p>';
                        }
                        ?> 
                        <form id="login-form" class="form" action="admin.php?controller=page&action=check_login" method="post">
                            <h4 class="text-center text-inf">ĐĂNG NHẬP</h4>
                           <div class="form-group">
                                <label for="TenDangNhap" class="text-inf">Tên đăng nhập:</label><br>
                                <input required type="text" name="TenDangNhap" id="TenDangNhap" class="form-control"  value="">
                            </div>
                            <div class="form-group">
                                <label for="MatKhau" class="text-inf">Mật khẩu:</label><br>
                                <input required type="password" name="password" id="MatKhau" class="form-control" value="">
                            </div>
                            <div class="form-group">  
                                <input style="margin-top: 20px;" type="submit" name="submit" class="btn btn-danger btn-md" value="Đăng nhập">
                            </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>