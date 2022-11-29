
<?php require('views/client/layouts/header.php'); ?>
<?php require('views/client/layouts/menu.php'); ?>

<!-- Trang sản phâm -->
<div class="product-detail">
    <ul class="breadcrum">
        <li class="active"><a href="index.php?controller=page&action=home" class="breadcrum__active">Trang chủ</a> <span class="active">/&nbsp</span></li>                
        <li class="active"> Điện thoại</li>
    </ul> 
    <?php 
    if($listDM != null) {
        foreach ($listDM as $danhMuc) {
            if ($danhMuc->maDM == $maDanhMuc) {
    ?>
        <div class="product-list">
            <div class="product-list-filter">
                <div style="width: 35%;">
                    <span class="product-list-filter__label"><?= $danhMuc->tenDM ?></span>
                    <span id="soSanPham" class="product-list-filter__quantity">(<?= count($danhMuc->listSP) ?> sản phẩm)</span>
                </div>
                <div class="product-moble">
                    <div class="product-moble__icon">
                        <i class="fas fa-chevron-circle-down product-list-moble__icon "></i>
                    </div>
                    <div class="product-list-moble">  
                        <div class="product-list-moble__filter active"> 
                            <?php
                            if (isset($maTheLoai) && $maTheLoai != null) {
                            ?>
                                <a class="filter__btn"
                                href="index.php?controller=product&action=product_list&danhmuc=<?= $danhMuc->maDM ?>&page=1">
                                    Tất cả
                                </a>
                            <?php
                            } else {
                            ?>
                                <a style="background-color: #d21809; color: white;" class="filter__btn"
                                href="index.php?controller=product&action=product_list&danhmuc=<?= $danhMuc->maDM ?>&page=1">
                                    Tất cả
                                </a>
                            <?php
                            $maTheLoai = null;
                            }
                            ?>
                        </div>
                        <?php
                        foreach ($danhMuc->listTL as $theLoai) {
                            if ($maTheLoai != null && $theLoai->maTL == $maTheLoai) {
                        ?>
                            <div class="product-list-moble__filter"> 
                                <a style="background-color: #d21809; color: white;" class="filter__btn" href="index.php?controller=product&action=product_list&danhmuc=<?= $danhMuc->maDM ?>&theloai=<?= $theLoai->maTL ?>&page=1">
                                    <?= $theLoai->tenTL ?>
                                </a>
                            </div> 
                        <?php	
                            } else {
                        ?>
                            <div class="product-list-moble__filter"> 
                                <a class="filter__btn" href="index.php?controller=product&action=product_list&danhmuc=<?= $danhMuc->maDM ?>&theloai=<?= $theLoai->maTL ?>&page=1">
                                    <?= $theLoai->tenTL ?>
                                </a>
                            </div> 
                        <?php
                            }
                        }
                        ?>	
                    </div>
                </div>    
            </div>
        </div>
        <div class="product-list">
            <div class="product-list-filter">
                <div>
                    <span class="product-list-filter__label">Chọn mức giá</span>
                </div>
                <div class="product-moble">
                    <div class="product-moble__icon">
                        <i class="fas fa-chevron-circle-down product-list-moble__icon "></i>
                    </div>
                    <div class="product-list-moble">
                        <div class="product-list-moble__filter active"> 
                        <?php
                            if (isset($giaDau)) {
                            ?>
                                <a class="filter__btn"
                                href="index.php?controller=product&action=product_list&danhmuc=<?= $danhMuc->maDM ?>&theLoai=<?= $maTheLoai ?>&page=1">
                                    Tất cả
                                </a>
                            <?php
                            } else {
                            ?>
                                <a style="background-color: #d21809; color: white;" class="filter__btn"
                                href="index.php?controller=product&action=product_list&danhmuc=<?= $danhMuc->maDM ?>&theLoai=<?= $maTheLoai ?>&page=1">
                                    Tất cả
                                </a>
                            <?php
                            }
                            ?>
                        </div>
                        <!-- giá 0 - 2 triệu -->
                        <?php
                        if (isset($giaDau) && $giaDau == 0 && $giaCuoi == 2000000) {
                        ?>
                            <div class="product-list-moble__filter"> 
                                <a style="background-color: #d21809; color: white;" class="filter__btn" 
                                href="index.php?controller=product&action=product_list&danhmuc=<?= $danhMuc->maDM ?>&theloai=<?= $maTheLoai ?>&gia=0-2&page=1">
                                Dưới 2 triệu
                                </a>
                            </div> 
                        <?php	
                            } else {
                        ?>
                            <div class="product-list-moble__filter"> 
                                <a class="filter__btn" 
                                href="index.php?controller=product&action=product_list&danhmuc=<?= $danhMuc->maDM ?>&theloai=<?= $maTheLoai ?>&gia=0-2&page=1">
                                Dưới 2 triệu
                                </a>
                            </div> 
                        <?php
                            }
                        ?>
                        <!-- giá 2 - 6 triệu -->
                        <?php
                        if (isset($giaDau) && $giaDau == 2000000 && $giaCuoi == 6000000) {
                        ?>
                            <div class="product-list-moble__filter"> 
                                <a style="background-color: #d21809; color: white;" class="filter__btn" 
                                href="index.php?controller=product&action=product_list&danhmuc=<?= $danhMuc->maDM ?>&theloai=<?= $maTheLoai ?>&gia=2-6&page=1">
                                Từ 2 triệu đến 6 triệu
                                </a>
                            </div> 
                        <?php	
                            } else {
                        ?>
                            <div class="product-list-moble__filter"> 
                                <a class="filter__btn" 
                                href="index.php?controller=product&action=product_list&danhmuc=<?= $danhMuc->maDM ?>&theloai=<?= $maTheLoai ?>&gia=2-6&page=1">
                                Từ 2 triệu đến 6 triệu
                                </a>
                            </div> 
                        <?php
                            }
                        ?>
                        <!-- giá 6 - 10 triệu -->
                        <?php
                        if (isset($giaDau) && $giaDau == 6000000 && $giaCuoi == 10000000) {
                        ?>
                            <div class="product-list-moble__filter"> 
                                <a style="background-color: #d21809; color: white;" class="filter__btn" 
                                href="index.php?controller=product&action=product_list&danhmuc=<?= $danhMuc->maDM ?>&theloai=<?= $maTheLoai ?>&gia=6-10&page=1">
                                Từ 6 triệu đến 10 triệu
                                </a>
                            </div> 
                        <?php	
                            } else {
                        ?>
                            <div class="product-list-moble__filter"> 
                                <a class="filter__btn" 
                                href="index.php?controller=product&action=product_list&danhmuc=<?= $danhMuc->maDM ?>&theloai=<?= $maTheLoai ?>&gia=6-10&page=1">
                                Từ 6 triệu đến 10 triệu
                                </a>
                            </div> 
                        <?php
                            }
                        ?>
                        <!-- giá trên 10 triệu -->
                        <?php
                        if (isset($giaDau) && $giaDau == 10000000) {
                        ?>
                            <div class="product-list-moble__filter"> 
                                <a style="background-color: #d21809; color: white;" class="filter__btn" 
                                href="index.php?controller=product&action=product_list&danhmuc=<?= $danhMuc->maDM ?>&theloai=<?= $maTheLoai ?>&gia=10-0&page=1">
                                Trên 10 triệu
                                </a>
                            </div> 
                        <?php	
                            } else {
                        ?>
                            <div class="product-list-moble__filter"> 
                                <a class="filter__btn" 
                                href="index.php?controller=product&action=product_list&danhmuc=<?= $danhMuc->maDM ?>&theloai=<?= $maTheLoai ?>&gia=10-0&page=1">
                                Trên 10 triệu
                                </a>
                            </div> 
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-list">
            <div class="product-detail__same">
                <div class="product-list__title">
                    <div class="product-list__title-heading">Bán chạy nhất </div>
                    <div class="product-list__select">
                        <span class="product-list__select-sort">Sắp xếp theo: </span>
                        <div class="select-input">
                            <span class="select-input__label">Bán chạy nhất</span>
                            <i class="fas fa-angle-down select-input__icon"></i>
                            <!-- list options -->
                            <ul class="select-input__list">
                                <li class="select-input__item">
                                    <a href="" class="select-input__link">Bán chạy nhất</a>
                                </li>
                                <li class="select-input__item">
                                    <a href="" class="select-input__link">Mới nhất</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="product-selling">
                    <?php
                    if (isset($giaDau)) {
                        if ($giaDau == 10000000) {
                            $giaCuoi = 100000000;
                        } 
                    } else {
                        $giaDau = 0;
                        $giaCuoi = 100000000;
                    }
                    $demSoSanPham = 0;
                    foreach ($danhMuc->listSP as $sanPham) {
                        if ($sanPham->gia >= $giaDau && $sanPham->gia <= $giaCuoi) {
                            if ($maTheLoai != null) {
                                if ($sanPham->maTL == $maTheLoai) {
                                    $demSoSanPham += 1;
                                    if (($demSoSanPham >= ($page - 1)*8 + 1) && ($demSoSanPham <= $page*8)) {
                    ?>
                                    <div class="product-similar__list">  
                                        <a href="index.php?controller=product&action=product_detail&masp=<?= $sanPham->maSP?>&madanhmuc=<?=$danhMuc->maDM?>" class="product-similar-item">
                                            <img class="product-similar-item__img" src="assets/images/products/<?= $sanPham->listHinh[0]->tenHinh?>">
                                            <h5 class="product-similar-item__name"><?= $sanPham->tenSP ?></h5>                         
                                            <?php
                                            $dem = 0;
                                            foreach ($sanPham->listDacTinh as $dacTinh) {
                                                $dem += 1;
                                                if (($danhMuc->maDM == 'DM04' && $dem <= 1) || ($danhMuc->maDM != 'DM04' && $dem <= 4)) {
                                            ?>
                                                <div data-toggle="tooltip" data-placement="top" title="<?= $dacTinh->tenDT ?>" class="dac-tinh">
                                                    <?= $dacTinh->chiTietDT ?>
                                                </div>
                                            <?php
                                                }
                                            }
                                            ?>
                                            <div class="product-similar-item__price">
                                                <?php
                                                if ($sanPham->khuyenMai > 0) {
                                                ?>
                                                    <span class="product-item__price-current"><?= number_format($sanPham->gia) ?> đ</span>
                                                <?php
                                                }
                                                ?>
                                                <span class="product-similar-item__price-old"><?= number_format($sanPham->gia-$sanPham->khuyenMai) ?> đ</span>
                                            </div>
                                            <div class="product-item__action">
                                                <!-- <div class="product-item__ration">
                                                    <i class="product-item__star fas fa-star"></i>
                                                    <i class="product-item__star fas fa-star"></i>
                                                    <i class="product-item__star fas fa-star"></i>
                                                    <i class="product-item__star fas fa-star"></i>
                                                    <i class="product-item__star fas fa-star"></i>
                                                </div> -->
                                                <span class="product-similar-item__sold">Đã bán <?= $sanPham->soLuongBan ?></span>
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
                                        </a>
                                    </div>
                    <?php
                                    }
                                }
                            } else {
                                $demSoSanPham += 1;
                                if (($demSoSanPham >= ($page - 1)*8 + 1) && ($demSoSanPham <= $page*8)) {
                    ?>
                                <div class="product-similar__list">  
                                    <a href="index.php?controller=product&action=product_detail&masp=<?= $sanPham->maSP?>&madanhmuc=<?=$danhMuc->maDM?>" class="product-similar-item">
                                        <img class="product-similar-item__img" src="assets/images/products/<?= $sanPham->listHinh[0]->tenHinh?>">
                                        <h5 class="product-similar-item__name"><?= $sanPham->tenSP ?></h5>                         
                                        <?php
                                        $dem = 0;
                                        foreach ($sanPham->listDacTinh as $dacTinh) {
                                            $dem += 1;
                                            if (($danhMuc->maDM == 'DM04' && $dem <= 1) || ($danhMuc->maDM != 'DM04' && $dem <= 4)) {
                                        ?>
                                            <div data-toggle="tooltip" data-placement="top" title="<?= $dacTinh->tenDT ?>" class="dac-tinh">
                                                <?= $dacTinh->chiTietDT ?>
                                            </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                        <div class="product-similar-item__price">
                                            <?php
                                            if ($sanPham->khuyenMai > 0) {
                                            ?>
                                                <span class="product-item__price-current"><?= number_format($sanPham->gia) ?> đ</span>
                                            <?php
                                            }
                                            ?>
                                            <span class="product-similar-item__price-old"><?= number_format($sanPham->gia-$sanPham->khuyenMai) ?> đ</span>
                                        </div>
                                        <div class="product-item__action">
                                            <!-- <div class="product-item__ration">
                                                <i class="product-item__star fas fa-star"></i>
                                                <i class="product-item__star fas fa-star"></i>
                                                <i class="product-item__star fas fa-star"></i>
                                                <i class="product-item__star fas fa-star"></i>
                                                <i class="product-item__star fas fa-star"></i>
                                            </div> -->
                                            <span class="product-similar-item__sold">Đã bán <?= $sanPham->soLuongBan ?></span>
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
                                    </a>
                                </div>
                    <?php            
                              }
                            }
                        }
                    }
                    ?>
                </div>
                <!-- lấy số sản phẩm cho js hiển thị ra ở đầu trang -->
                <p style="display: none;" id="demSoSanPham"><?= $demSoSanPham ?></p>
                <!-- không có sản phẩm -->
                <?php
                if ($demSoSanPham <= 0) {
                 echo "<p style='text-align: center; padding: 143px;'>Không có sản phẩm nào</p>";
                } else {
                ?>
                <!-- phân trang -->
                <ul class="pagination product__pagination">
                    <?php
                        $soTrang = (int)(($demSoSanPham + 7) / 8);
                        $listPage = [];
                        if ($soTrang <= 3) {
                            for ($i = 1; $i <= $soTrang; $i++) {
                                $listPage[$i] = $i;
                            }   
                        } else {
                            if ($page < 3) {
                                for ($i = 1; $i <= 3; $i++) {
                                    $listPage[$i] = $i;
                                }  
                            } else if ($page > $soTrang - 2) {
                                for ($i = $soTrang - 2; $i <= $soTrang; $i++) {
                                    $listPage[$i - $soTrang + 3] = $i;
                                }  
                            } else {
                                for ($i = $page - 1; $i <= $page + 1; $i++) {
                                    $listPage[$i - $page + 2] = $i;
                                }  
                            }
                        }
                    ?>
                    <?php 
                    if (! ($page == 1)) {
                    ?>
                    <li class="pagination-item">
                        <a href="index.php?controller=product&action=product_list&danhmuc=<?= $danhMuc->maDM ?>&page=<?= $page - 1 ?>" class="pagination-item__link">
                            <i class="pagination-item__icon fas fa-angle-left"></i>
                        </a>
                    </li>
                    <?php 
                    }
                    ?>
                    <?php
                    for ($i = 1; $i <= count($listPage); $i++) {
                        if ($page == $listPage[$i]) {
                    ?>
                        <li class="pagination-item pagination-item--active">
                            <a style="background-color: #d21809;" href="index.php?controller=product&action=product_list&danhmuc=<?= $danhMuc->maDM ?>&page=<?= $listPage[$i] ?>" class="pagination-item__link"><?= $listPage[$i] ?></a>
                        </li>
                    <?php
                        } else {
                    ?>
                        <li class="pagination-item pagination-item--active">
                            <a href="index.php?controller=product&action=product_list&danhmuc=<?= $danhMuc->maDM ?>&page=<?= $listPage[$i] ?>" class="pagination-item__link"><?= $listPage[$i] ?></a>
                        </li>
                    <?php
                        }
                    }
                    ?>
                    <?php 
                    if (! ($page == $soTrang)) {
                    ?>
                    <li class="pagination-item">
                        <a href="index.php?controller=product&action=product_list&danhmuc=<?= $danhMuc->maDM ?>&page=<?= $page + 1 ?>" class="pagination-item__link">
                            <i class="pagination-item__icon fas fa-angle-right"></i>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
                <?php
                }
                ?>
            </div>
        </div>
    <?php
            }
        }
    }
    ?>
</div>

<?php require('views/client/layouts/footer.php'); ?>

<script>
    window.onload = function() {
        var elm = document.getElementById("soSanPham");
        elm.innerHTML = "(" + document.getElementById("demSoSanPham").innerHTML + " sản phẩm)";
    };
</script>

