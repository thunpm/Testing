<?php
	if (isset($_SESSION['user']) == false || $_SESSION['user'] == null) {
        header("location:index.php?controller=user&action=login");
        exit();
    } 

?>
<?php require('views/client/layouts/header.php'); ?>
<?php require('views/client/layouts/menu.php'); ?>
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
                            <p>Tài khoản</p>
                            <p><?php $user = $_SESSION['user'];
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
                <!-- Button trigger modal -->
                <div class="add-address">
                    <a href="#" data-toggle="modal" data-target="#addAddress">+ Thêm địa chỉ</a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="addAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Thêm địa chỉ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="index.php?controller=user&action=add_address" method="POST">
                                <div class="modal-body"> 
                                    <div class="form-group">
                                        <label>Tỉnh/Thành phố: </label>
                                        <input required class="form-control" type="text" name="tinh" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Quận/Huyện: </label>
                                        <input required class="form-control" type="text" name="huyen" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Xã/Phường: </label>
                                        <input required class="form-control" type="text" name="xa" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Số nhà: </label>
                                        <input required class="form-control" type="text" name="diaChi" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Ghi chú: </label>
                                        <input required class="form-control" type="text" name="ghiChu" value="">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                    <input class="btn btn-secondary" type="submit" value="Thêm">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
		        <?php      
                if (isset($listAddress) && $listAddress != null && count($listAddress) > 0) {
                    foreach ($listAddress as $address) {
                ?>
                <div class="list-address">
                    <div class="address">
                        <div class="info">
                            <ul>
                                <li>Tên: <?php echo $user->fullname; ?></li>
                                <li>Địa chỉ: <?= $address->soNha ?>, <?= $address->xa ?>, <?= $address->huyen ?>, <?= $address->tinh ?></li>
                                <li>Ghi chú: <?= $address->ghiChu ?></li>
                                <li>Số điện thoại: <?php echo $user->phoneNumber;?></li>
                            </ul>
                        </div>
                        <!-- sửa địa chỉ -->
                        <div class="info">
                            <p class="mac-dinh"><?php if ($address->macDinh == 1) {echo "Địa chỉ mặc định";} ?></p>
                        </div>
                        <div class="info">
                            <div class="add-address">
                                <a href="index.php?controller=user&action=add_address&id=<?= $address->maDC ?>" data-toggle="modal" data-target="#<?= $address->maDC ?>">Chỉnh sửa</a>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="<?= $address->maDC ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="<?= $address->maDC ?>">Sửa địa chỉ</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="index.php?controller=user&action=update_address" method="POST">
                                            <div class="modal-body"> 
                                                <input type="hidden" name="id" value="<?= $address->maDC ?>">
                                                <div class="form-group">
                                                    <label>Tỉnh/Thành phố: </label>
                                                    <input required class="form-control" type="text" name="tinh" value="<?= $address->tinh ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Quận/Huyện: </label>
                                                    <input required class="form-control" type="text" name="huyen" value="<?= $address->huyen ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Xã/Phường: </label>
                                                    <input required class="form-control" type="text" name="xa" value="<?= $address->xa ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Số nhà: </label>
                                                    <input required class="form-control" type="text" name="soNha" value="<?= $address->soNha ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Ghi chú: </label>
                                                    <input required class="form-control" type="text" name="ghiChu" value="<?= $address->ghiChu ?>">
                                                </div>
                                                <div class="form-group form-check">
                                                    <?php
                                                    if ($address->macDinh == 1) {
                                                        echo '<input checked type="checkbox" class="form-check-input" name="macDinh">';
                                                    } else {
                                                        echo '<input type="checkbox" class="form-check-input" name="macDinh">';
                                                    }
                                                    ?>
                                                    <label class="form-check-label" for="exampleCheck1">Địa chỉ mặc định</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                                <input class="btn btn-secondary" type="submit" value="Sửa">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <p class="mac-dinh"><a href="index.php?controller=user&action=delete_address&id=<?= $address->maDC ?>">Xóa</a></p>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
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
