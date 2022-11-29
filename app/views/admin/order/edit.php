<?php require_once('views/admin/layouts/sibar.php') ?>

<div id="wrapper">
    <div class="workplace">
        <div class="row-fluid" style="display: flex; box-shadow: none">
            <div class="col-md-6" style="margin: 0 5px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 10px; min-height: 300px">
                <h6 style="display: flex; justify-content: space-between;" class="heading-title">
                    <span>Thông tin đơn hàng</span>
                    <span>#<?= $order->maHD ?></span>
                </h6>

                <table class="table list-product">
                    <tbody>
                        <?php 
                            $total = 0;
                            foreach ($order->detail as $product) {
                        ?>
                        <tr>
                            <td class="td-title">
                                <div class="p-title">
                                    <a href="index.php?controller=product&action=product_detail&masp=<?= $product->sanPham->maSP ?>" target="_blank">
                                        <?= $product->sanPham->tenSP ?>
                                    </a>
                                </div>
                            </td>
                            <td class="td-price"><?= number_format($product->donGia) ?> đ</td>
                            <td class="td-quantity">x</td>
                            <td class="td-quantity"><?= $product->soLuong ?></td>
                            <td class="td-total"><?= number_format(($product->donGia - $product->khuyenMai)*$product->soLuong) ?> đ</td>
                        </tr>
                        <?php
                            $total = $total + ($product->donGia - $product->khuyenMai)*$product->soLuong;
                            }
                        ?>

                        <tr>
                            <td colspan="4" class="text-right">Tổng tiền hàng</td>
                            <td class="td-total"><?= number_format($total) ?> đ</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-3" style="margin: 0 5px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 10px; min-height: 300px">
                <h6 class="heading-title">Thông tin khách hàng</h6>
                <div style="font-size: 14px;">
                    <p>Họ tên: <?= $order->customer->fullname ?></p>
                    <p>Số điện thoại: <?= $order->customer->phoneNumber ?></p>
                </div>
            </div>

            <form 
                class="col-md-3" 
                style="margin: 0 5px; box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 10px; min-height: 300px"
                action="admin.php?controller=order&action=update&MaHD=<?= $order->maHD ?>"
                method="POST"
            >
                <h6 class="heading-title">Trạng thái đơn hàng</h6>
                <div style="font-size: 14px;">
                    <input class="radio" value="Đang chuẩn bị hàng" name="TrangThai" type="radio" <?php if ($order->trangThai == "Đang chuẩn bị hàng") { ?> checked <?php } ?>> Đặt hàng <br>
                    <input class="radio" value="Đã nhận hàng" name="TrangThai" type="radio" <?php if ($order->trangThai == "Dã nhận hàng") { ?> checked <?php } ?>> Đã nhận hàng 
                </div>
                <button type="submit" class="btn btn-success mt-2" style="font-size: 13px;">Cập nhật</button>
            </form>
        </div>
    </div>
</div>