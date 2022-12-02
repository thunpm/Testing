<?php
	if (isset($_SESSION['user']) == false || $_SESSION['user'] == null) {
        header("location:index.php?controller=user&action=login");
        exit();
    } 

?>
<?php require('views/client/layouts/header.php'); ?>
<?php require('views/client/layouts/menu.php'); ?>
<style>

    input[type="radio"] {
        margin: 0px;
    }

    label.form-check-label {
        margin-left: 46px;
    }

</style>
<div class="main-block">
    <div class="content">
        <div class="contact__title">
            <h3 class="contact__heading" >THÔNG TIN TÀI KHOẢN</h3>
        </div>
        <div class="user-info-block">
            <div class="list-user-info">
                <ul>
                    <li>
                        <i class="far fa-user-circle"></i>
                        <div>
                            <p style="line-height: 24px;">Tài khoản</p>
                            <p style="line-height: 24px;"><?php $user = $_SESSION['user'];
                                echo $user->fullname; ?></p>
                        </div>
                    </li>
                    <input type="hidden" id="in" value="<?= $info ?>">
                    <li id="info"><a href="index.php?controller=user&action=info"><i class="fas fa-user-edit"></i>    Thông tin tài khoản</a></li>
                    <li id="password"><a href="index.php?controller=user&action=password"><i class="fas fa-key"></i>    Thay đổi mật khẩu</a></li>
                    <li id="order"><a href="index.php?controller=user&action=order"><i class="far fa-list-alt"></i>    Đơn hàng đã đặt</a></li>
                    <li id="address"><a href="index.php?controller=user&action=address_list"><i class="far fa-address-book"></i>    Sổ địa chỉ</a></li>
                </ul>
            </div>
            <div class="user-info">
                <form action="index.php?controller=user&action=info" method="post">
                    <?php if ($msg != "") {
                        echo '<div class="alert alert-warning" role="alert">';
                        echo $msg;
                        echo '</div>';
                    }
                    ?>
                    <div class="form-group">
                        <label for="HoTen" class="text-inf">Họ và tên *</label><br>
                        <input type="text" required name="HoTen" id="HoTen" class="form-control" value="<?= $user->fullname ?>">
                    </div>
                    <div class="form-group">
                        <label  for="SoDienThoai" class="text-inf">Số điện thoại *</label><br>
                        <input type="text" required name="SoDienThoai" id="username" class="form-control" value="<?= $user->phoneNumber ?>"> 
                    </div>
                    <div class="form-group">
                        <label for="Email" class="text-inf">Email</label><br>
                        <input type="email" name="Email" id="mail" class="form-control" value="<?= $user->email ?>"> 
                    </div>
                    <div class="form-group">
                        <label class="text-inf">Giới tính</label><br>
                        <div class="form-check">
                            <?php 
                            if ($user->gender == "Nam") {
                                echo '<input type="radio" class="form-check-input" id="radio1" name="GioiTinh" value="Nam" checked>';
                            } else {
                                echo '<input type="radio" class="form-check-input" id="radio1" name="GioiTinh" value="Nam">';
                            }
                            ?>
                            <label class="form-check-label" for="radio1">Nam</label>
                        </div>
                        <div class="form-check">
                            <?php 
                            if ($user->gender == "Nu") {
                                echo '<input type="radio" class="form-check-input" id="radio2" name="GioiTinh" value="Nu" checked>';
                            } else {
                                echo '<input type="radio" class="form-check-input" id="radio2" name="GioiTinh" value="Nu">';
                            }
                            ?>
                            <label class="form-check-label" for="radio2">Nữ</label>
                        </div> 
                    </div>
                    <div class="form-group">
                        <label for="birthday" class="text-inf">Ngày sinh</label><br>
                        <input type="date" name="NgaySinh" id="birthday" class="form-control" value="<?= $user->birthday ?>"> 
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="MaKH" id="MaKH" class="form-control"  value="<?php echo $user->idCustomer?>">
                        <input style="margin-top: 20px;" type="submit" name="submit" class="btn btn-danger btn-md" value="CHỈNH SỬA">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require('views/client/layouts/footer.php'); ?>

<script type="text/javascript">
	$(document).ready(function() {
        var info = $('#in').val();

        if (info == "info") {
            $('#info').css({'background': 'darkgray'});
            
        } else if (info == "address") {
            $('#address').css({'background': 'darkgray'});
            
        } else if (info == "order") {
            $('#order').css({'background': 'darkgray'});
            
        } else if (info == "password") {
            $('#password').css({'background': 'darkgray'});
            
        }
	});	
</script>
