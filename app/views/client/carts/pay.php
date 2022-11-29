<?php require('views/client/layouts/header.php'); ?>
<?php require('views/client/layouts/menu.php'); ?>
<div class="pay">
    <div class="product-detail__title">
        <h3 class="product-detail__heading" >THANH TOÁN</h3>
    </div>

    <div class="pay-generality">
        <!-- phương thức thanh toán -->
        <div class="pay-generality__payment">
            <h3 class="pay-generality__name">1. CHỌN PHƯƠNG THỨC THANH TOÁN</h3>    
            <div class="pay-generality__payment-methods">
                <ul class="list">
                    <li class="styles__StyledMethod-sc-1u5r3pb-2 cHcpqx">
                        <label class="styles__StyledRadio-sc-1y2j2ih-0 jsTqCl">
                            <input type="radio" data-view-id="checkout.payment_method_select" data-view-index="cod" readonly="" name="payment-methods" value="cod" checked="checked">
                            <span class="radio-fake"></span>
                            <span class="label">
                                <div class="styles__StyledMethodLabel-sc-1u5r3pb-1 gkKrcB">
                                    <img class="method-icon" width="32" src="https://frontend.tikicdn.com/_desktop-next/static/img/icons/checkout/icon-payment-method-cod.svg" alt="cod">
                                    <div class="method-content">
                                        <div class="method-content__name">
                                            <span>Thanh toán tiền mặt khi nhận hàng</span>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </label>
                    </li>
                    <li class="styles__StyledMethod-sc-1u5r3pb-2 cHcpqx">
                        <label class="styles__StyledRadio-sc-1y2j2ih-0 jsTqCl">
                            <input type="radio" data-view-id="checkout.payment_method_select" data-view-index="viettelpay" readonly="" name="payment-methods" value="viettelpay">
                            <span class="radio-fake"></span><span class="label">
                                <div class="styles__StyledMethodLabel-sc-1u5r3pb-1 gkKrcB">
                                    <img class="method-icon" width="32" src="https://frontend.tikicdn.com/_desktop-next/static/img/icons/checkout/icon-payment-method-viettelmoney.png" alt="viettelpay">
                                    <div class="method-content">
                                        <div class="method-content__name">
                                            <span>Thanh toán bằng Viettel Money</span>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </label>
                    </li>
                    <li class="styles__StyledMethod-sc-1u5r3pb-2 cHcpqx">
                        <label class="styles__StyledRadio-sc-1y2j2ih-0 jsTqCl">
                            <input type="radio" data-view-id="checkout.payment_method_select" data-view-index="momo" readonly="" name="payment-methods" value="momo">
                            <span class="radio-fake"></span>
                            <span class="label">
                                <div class="styles__StyledMethodLabel-sc-1u5r3pb-1 gkKrcB">
                                    <img class="method-icon" width="32" src="https://frontend.tikicdn.com/_desktop-next/static/img/icons/checkout/icon-payment-method-momo.svg" alt="momo">
                                    <div class="method-content">
                                        <div class="method-content__name">
                                            <span>Thanh toán bằng ví MoMo</span>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </label>
                    </li>
                    <li class="styles__StyledMethod-sc-1u5r3pb-2 cHcpqx">
                        <label class="styles__StyledRadio-sc-1y2j2ih-0 jsTqCl">
                            <input type="radio" data-view-id="checkout.payment_method_select" data-view-index="zalopay" readonly="" name="payment-methods" value="zalopay">
                            <span class="radio-fake"></span>
                            <span class="label">
                                <div class="styles__StyledMethodLabel-sc-1u5r3pb-1 gkKrcB">
                                    <img class="method-icon" width="32" src="https://frontend.tikicdn.com/_desktop-next/static/img/icons/checkout/icon-payment-method-zalo-pay.svg" alt="zalopay">
                                    <div class="method-content">
                                        <div class="method-content__name">
                                            <span>Thanh toán bằng ví ZaloPay</span>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </label>
                    </li>
                    <li class="styles__StyledMethod-sc-1u5r3pb-2 cHcpqx">
                        <label class="styles__StyledRadio-sc-1y2j2ih-0 jsTqCl">
                            <input type="radio" data-view-id="checkout.payment_method_select" data-view-index="pay123" readonly="" name="payment-methods" value="pay123">
                            <span class="radio-fake"></span>
                            <span class="label">
                                <div class="styles__StyledMethodLabel-sc-1u5r3pb-1 gkKrcB">
                                    <img class="method-icon" width="32" src="https://frontend.tikicdn.com/_desktop-next/static/img/icons/checkout/icon-payment-method-atm.svg" alt="pay123">
                                    <div class="method-content">
                                        <div class="method-content__name">
                                            <span>Thẻ ATM nội địa/Internet Banking (Hỗ trợ Internet Banking)</span>
                                        </div>
                                    </div>
                                </div>
                            </span>
                        </label>
                    </li>
                </ul>
            </div>
        </div>
        <!-- phương thức vận chuyển -->
        <div class="pay-generality__payment">
            <h3 class="pay-generality__name">2. CHỌN PHƯƠNG THỨC VẬN CHUYỂN</h3>    
            <div class="pay-generality__payment-methods">
                <ul class="list">
                    <li class="styles__StyledMethod-sc-1u5r3pb-2 cHcpqx">
                        <label class="styles__StyledRadio-sc-1y2j2ih-0 jsTqCl">
                            <input type="radio" data-view-id="checkout.payment_method_select" data-view-index="cod" readonly="" name="vanchuyen-methods" value="cod" checked="">
                            <span class="radio-fake"></span>
                            <div class="styles__StyledMethodLabel-sc-1u5r3pb-1 gkKrcB">
                                <div class="method-content">
                                    <div class="method-content__name">
                                        <span>Giao hàng nhanh</span>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </li>
                    <li class="styles__StyledMethod-sc-1u5r3pb-2 cHcpqx">
                        <label class="styles__StyledRadio-sc-1y2j2ih-0 jsTqCl">
                            <input type="radio" data-view-id="checkout.payment_method_select" data-view-index="viettelpay" readonly="" name="vanchuyen-methods" value="viettelpay">
                            <div class="styles__StyledMethodLabel-sc-1u5r3pb-1 gkKrcB">
                                <div class="method-content">
                                    <div class="method-content__name">
                                        <span>Giao hàng tiết kiệm</span>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </li>
                    <li class="styles__StyledMethod-sc-1u5r3pb-2 cHcpqx">
                        <label class="styles__StyledRadio-sc-1y2j2ih-0 jsTqCl">
                            <input type="radio" data-view-id="checkout.payment_method_select" data-view-index="momo" readonly="" name="vanchuyen-methods" value="momo">
                            <span class="radio-fake"></span>
                            <div class="styles__StyledMethodLabel-sc-1u5r3pb-1 gkKrcB">
                                <div class="method-content">
                                    <div class="method-content__name">
                                        <span>Giao hàng siêu tốc</span>
                                    </div>
                                </div>
                            </div>
                        </label>
                    </li>
                </ul>
            </div>
        </div>
        <!-- địa chỉ và đơn hàng -->
        <div class="pay-generality__delivery">
            <div class="pay-generality__delivery-address">
                <div class="pay-generality__delivery-address--item">
                    <h4 class="pay-generality__delivery-name">Địa chỉ giao hàng</h4>
                    
                </div>
                <?php
                if (isset($user)) {
                ?>
                <ul class="pay-generality__information">
                    <li class="pay-generality__information-item pay-generality__information-name"><?= $user->fullname ?></li>
                    <?php
                    if (! (isset($diaChi) && $diaChi != null)) {
                        echo '<li class="pay-generality__information-item">
                            <a href="index.php?controller=user&action=address_list">Thêm địa chỉ</a>
                            </li>';
                    } else {
                        echo '<li class="pay-generality__information-item">'.
                            $diaChi->soNha.', '.$diaChi->xa.', '.$diaChi->huyen.', '.$diaChi->tinh.'</li>';
                        echo '<li class="pay-generality__information-item">'.$user->phoneNumber.'</li>';
                        echo '<a href="#" class="pay-generality__btn">
                                <button class="btn btn_pram"> Thay đổi địa chỉ</button>
                            </a>';
                    }
                    ?>
                </ul> 
                <?php
                }
                ?>
            </div>
            <!-- đơn hàng -->
            <div class="pay-generality__delivery-address">
                <div class="pay-generality__delivery-address--item">
                    <h4 class="pay-generality__delivery-name">Đơn hàng</h4>
                </div>
                <?php
                if (isset($_SESSION['cart'])) {
                    $_SESSION["cart"] = unserialize(serialize($_SESSION["cart"]));
                    
                    $cart = $_SESSION['cart'];
                    $tongTien = 0;
                ?>
                <ul class="pay-generality__information " style="padding-bottom: 15px;" >
                    <li class="pay-generality__information-item" style="font-weight: 500;"><?= count($cart->listItems) ?> Sản phẩm</li>
                    <li class="pay-generality__information-item">
                        <p>
                            <a class="" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Xem thông tin
                            </a>
                        </p>
                        <div class="collapse" id="collapseExample">
                            <?php
                            foreach ($cart->listItems as $item) {
                            ?>
                                <div class="card card-body">
                                    <p>x<?= $item->soLuong ?> <?= $item->sanPham->tenSP ?>    <?= number_format(($item->sanPham->gia - $item->sanPham->khuyenMai)*$item->soLuong) ?> đ</p>
                                </div>
                            <?php
                            $tongTien = $tongTien + ($item->sanPham->gia - $item->sanPham->khuyenMai)*$item->soLuong;
                            }
                            ?>
                        </div>
                    </li>
                </ul>
                <div class="pay-generality__information--list">
                    <div class="pay-generality__provisional">
                        <li class="pay-generality__provisional-name">
                            Tạm tính:    
                        </li>
                        <li class="pay-generality__provisional-price">
                            <?=number_format($tongTien) ?> đ
                        </li>
                    </div>
                    <div class="pay-generality__provisional">
                        <li class="pay-generality__provisional-name">
                            Phí vận chuyển:    
                        </li>
                        <li class="pay-generality__provisional-price">
                            
                        </li>
                    </div>
                    <div class="pay-generality__provisional">
                        <li class="pay-generality__provisional-name" style="font-weight: 500;">
                            Thành tiền:    
                        </li>
                        <li class="pay-generality__provisional-price" style="color: #ED5323;font-weight: 500;">
                            <?= number_format($tongTien) ?> đ
                        </li>
                    </div>
                </div>
            <?php
            }
            ?>
            </div>
        </div>
        <div>
            <a class="btn btn_pram" href="index.php?controller=cart&action=order">ĐẶT HÀNG</a>	
        </div>
    </div>
</div>
<?php require('views/client/layouts/footer.php'); ?>