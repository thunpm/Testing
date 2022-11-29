
<?php require('views/client/layouts/header.php'); ?>
<?php require('views/client/layouts/menu.php'); ?>

<!-- Trang tìm kiếm -->
<div class="product-detail__same">
    <div class="product-detail__shared-heading">
       TÌM KIẾM SẢN PHẨM
    </div>
    <div class="product-similar">

            <div id="carouselP10" class="carousel slide" data-ride="carousel" data-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="card-list">
                            <?php
                            $demSanPham = 0;
                            foreach ($spTimKiem as $sanPham) {
                                $demSanPham += 1;
                                if ($demSanPham <= 4) {
                            ?>
                                <a href="index.php?controller=product&action=product_detail&masp=<?=$sanPham->maSP?>" class="card">
                                    <img class="product-similar-item__img" src="assets/images/products/<?= $sanPham->listHinh[0]->tenHinh?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $sanPham->tenSP ?></h5>
                                        <div class="card-text">
                                            <?php
                                            $dem = 0;
                                            foreach ($sanPham->listDacTinh as $dacTinh) {
                                                $dem += 1;
                                                if ($dem <= 4) {
                                            ?>
                                                <div data-toggle="tooltip" data-placement="top" title="<?= $dacTinh->tenDT ?>" class="dac-tinh">
                                                    <?= $dacTinh->chiTietDT ?>
                                                </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                            <div class="gia">
                                                <?php
                                                if ($sanPham->khuyenMai > 0) {
                                                ?>
                                                    <p class="gia-goc"><?= number_format($sanPham->gia) ?> đ</p>
                                                <?php
                                                }
                                                ?>
                                                <p class="gia-km"><?= number_format($sanPham->gia-$sanPham->khuyenMai) ?> đ</p>
                                            </div>
                                            <div class="product-item__action">
                                                <!--<div class="product-item__ration">
                                                    <i class="product-item__star fas fa-star"></i>
                                                    <i class="product-item__star fas fa-star"></i>
                                                    <i class="product-item__star fas fa-star"></i>
                                                    <i class="product-item__star fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>-->
                                                <span class="product-similar-item__sold">Đã bán <?= $sanPham->soLuongBan ?> </span>
                                            </div>
                                            <?php
                                            if ($sanPham->khuyenMai > 0) {
                                            ?>
                                                <div class="product-similar-item__sale-off">
                                                    <span class="product-similar-item__sale-off-label">GIẢM</span>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </a>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    if (count($spTimKiem) > 4) {
                    ?>
                    <div class="carousel-item">
                        <div class="card-list">
                            <?php
                            $demSanPham = 0;
                            foreach ($spTimKiem as $sanPham) {
                                $demSanPham += 1;
                                if ($demSanPham >= 5 && $demSanPham <= 8) {
                            ?>
                                <a href="index.php?controller=product&action=product_detail&masp=<?=$sanPham->maSP?>" class="card">
                                    <img class="product-similar-item__img" src="assets/images/products/<?= $sanPham->listHinh[0]->tenHinh?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $sanPham->tenSP ?></h5>
                                        <div class="card-text">
                                            <?php
                                            $dem = 0;
                                            foreach ($sanPham->listDacTinh as $dacTinh) {
                                                $dem += 1;
                                                if ($dem <= 4) {
                                            ?>
                                                <div data-toggle="tooltip" data-placement="top" title="<?= $dacTinh->tenDT ?>" class="dac-tinh">
                                                    <?= $dacTinh->chiTietDT ?>
                                                </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                            <div class="gia">
                                                <?php
                                                if ($sanPham->khuyenMai > 0) {
                                                ?>
                                                    <p class="gia-goc"><?= number_format($sanPham->gia) ?> đ</p>
                                                <?php
                                                }
                                                ?>
                                                <p class="gia-km"><?= number_format($sanPham->gia-$sanPham->khuyenMai) ?> đ</p>
                                            </div>
                                            <div class="product-item__action">
                                                <!--<div class="product-item__ration">
                                                    <i class="product-item__star fas fa-star"></i>
                                                    <i class="product-item__star fas fa-star"></i>
                                                    <i class="product-item__star fas fa-star"></i>
                                                    <i class="product-item__star fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>-->
                                                <span class="product-similar-item__sold">Đã bán <?= $sanPham->soLuongBan ?> </span>
                                            </div>
                                            <?php
                                            if ($sanPham->khuyenMai > 0) {
                                            ?>
                                                <div class="product-similar-item__sale-off">
                                                    <span class="product-similar-item__sale-off-label">GIẢM</span>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </a>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                <a class="carousel-control-prev" role="button" href="#carouselP10" data-slide="prev">
                    <span class="fas fa-angle-left" aria-hidden="true"></span>
                    <span class="sr-only"></span>
                </a>    
                <a class="carousel-control-next" role="button" href="#carouselP10" data-slide="next">
                    <span class="fas fa-angle-right" aria-hidden="true"></span>
                    <span class="sr-only"></span>
                </a>
                    <?php
                    }
                    ?>
            </div>
    </div>
    </div>
</div>

