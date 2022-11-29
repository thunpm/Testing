<?php require('views/client/layouts/header.php'); ?>
<?php require('views/client/layouts/menu.php'); ?>

<div class="main-block">
	<div class="banner">
		<div id="carouselExampleControls" class="carousel slide border" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item">
					<img src="assets/images/banners/banner-1.jpg">
				</div>
				<div class="carousel-item">
					<img src="assets/images/banners/banner-2.jpg">
				</div>
				<div class="carousel-item">
					<img src="assets/images/banners/banner-3.jpg">
				</div>
				<div class="carousel-item">
					<img src="assets/images/banners/banner-4.jpg">
				</div>
				<div class="carousel-item active">
					<img src="assets/images/banners/banner-5.jpg">
				</div>
			</div>
			<a class="carousel-control-prev" role="button" href="#carouselExampleControls" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only"></span>
			</a>	
			<a class="carousel-control-next" role="button" href="#carouselExampleControls" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only"></span>
			</a>
		</div>
	</div>
	<div class="content">
		
		<div class="product-block">
			<?php
			if($listDM != null) {
				foreach ($listDM as $danhMuc) {
			?>
			<div class="product">
				<div class="title-block">
					<div class="title"><?= $danhMuc->tenDM ?> bán chạy</div>
					<div class="kind">
						<div class="product-list-moble__filter active"> 
							<input type="hidden" class="type" value="all<?= $danhMuc->maDM ?>">
							<input type="hidden" class="category" value="<?= $danhMuc->maDM ?>">
							<button style="background-color: #d21809; color: white" class="filter__btn">Tất cả</button>
						</div>
						<?php
						foreach ($danhMuc->listTL as $theLoai) {
						?>
							<div class="product-list-moble__filter"> 
								<input type="hidden" class="type" value="<?= $theLoai->maTL ?>">
								<input type="hidden" class="category" value="<?= $danhMuc->maDM ?>">
								<button class="filter__btn"><?= $theLoai->tenTL ?></button>
							</div> 
						<?php	
						}
						?>	
					</div>
				</div>
				<div id="carousel<?= $danhMuc->maDM ?>" class="carousel slide border" data-ride="carousel" data-interval="false">
					<div id="all<?= $danhMuc->maDM ?>" class="theLoai<?= $danhMuc->maDM ?> carousel-inner">
						<div class="carousel-item active">
							<div class="card-list">
								<?php
								$demSanPham = 0;
								foreach ($danhMuc->listSP as $sanPham) {
									$demSanPham += 1;
									if ($demSanPham <= 4) {
								?>
									<a href="index.php?controller=product&action=product_detail&masp=<?=$sanPham->maSP?>&madanhmuc=<?=$danhMuc->maDM?>" class="card">
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
													<!-- <div class="product-item__ration">
														<i class="product-item__star fas fa-star"></i>
														<i class="product-item__star fas fa-star"></i>
														<i class="product-item__star fas fa-star"></i>
														<i class="product-item__star fas fa-star"></i>
														<i class="fas fa-star"></i>
													</div> -->
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
						if (count($danhMuc->listSP) > 4) {
						?>
						<div class="carousel-item">
							<div class="card-list">
								<?php
								$demSanPham = 0;
								foreach ($danhMuc->listSP as $sanPham) {
									$demSanPham += 1;
									if ($demSanPham >= 5 && $demSanPham <= 8) {
								?>
									<a href="index.php?controller=product&action=product_detail&masp=<?=$sanPham->maSP?>&madanhmuc=<?=$danhMuc->maDM?>" class="card">
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
													<!-- <div class="product-item__ration">
														<i class="product-item__star fas fa-star"></i>
														<i class="product-item__star fas fa-star"></i>
														<i class="product-item__star fas fa-star"></i>
														<i class="product-item__star fas fa-star"></i>
														<i class="fas fa-star"></i>
													</div> -->
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
						}
						?>
					</div>
					<!-- lọc sản phẩm, hiển thị sản phẩm của từng thể loại -->
					<?php
					foreach ($danhMuc->listTL as $theLoai) {
					?>
					<div style="display: none;" id="<?= $theLoai->maTL ?>" class="theLoai<?= $danhMuc->maDM ?> carousel-inner">
						<div class="carousel-item active">
							<div class="card-list">
								<?php
								$demSanPham = 0;
								foreach ($danhMuc->listSP as $sanPham) {
									if ($sanPham->maTL == $theLoai->maTL) {
										$demSanPham += 1;
										if ($demSanPham <= 4) {
								?>
										<a href="index.php?controller=product&action=product_detail" class="card">
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
														<!-- <div class="product-item__ration">
															<i class="product-item__star fas fa-star"></i>
															<i class="product-item__star fas fa-star"></i>
															<i class="product-item__star fas fa-star"></i>
															<i class="product-item__star fas fa-star"></i>
															<i class="fas fa-star"></i>
														</div> -->
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
								}
								?>
							</div>
						</div>
						<?php
						if ($demSanPham > 4) {
						?>
						<div class="carousel-item">
							<div class="card-list">
								<?php
								$demSanPham = 0;
								foreach ($danhMuc->listSP as $sanPham) {
									if ($sanPham->maTL == $theLoai->maTL) {
										$demSanPham += 1;
										if ($demSanPham >= 5 && $demSanPham <= 8) {
								?>
										<a href="index.php?controller=product&action=product_detail" class="card">
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
														<!-- <div class="product-item__ration">
															<i class="product-item__star fas fa-star"></i>
															<i class="product-item__star fas fa-star"></i>
															<i class="product-item__star fas fa-star"></i>
															<i class="product-item__star fas fa-star"></i>
															<i class="fas fa-star"></i>
														</div> -->
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
								}
								?>
							</div>
						</div>
						<?php
						}
						?>
					</div>
					<?php
					}
					?>
					<a class="carousel-control-prev" role="button" href="#carousel<?= $danhMuc->maDM ?>" data-slide="prev">
						<span class="fas fa-angle-left" aria-hidden="true"></span>
						<span class="sr-only"></span>
					</a>	
					<a class="carousel-control-next" role="button" href="#carousel<?= $danhMuc->maDM ?>" data-slide="next">
						<span class="fas fa-angle-right" aria-hidden="true"></span>
						<span class="sr-only"></span>
					</a>
				</div>
			</div>
			<?php	
				}
			}
			?>	
		</div>
	</div>
</div>

<?php require('views/client/layouts/footer.php'); ?>

<script type="text/javascript">
	$(document).ready(function() {
		$('.filter__btn').on('click', function() {
			// xử lí css
			var tabs = $(this).parent().parent().find('.filter__btn');

			for (i = 0; i < tabs.length; i++) {
				tabs[i].style.background = "white";
				tabs[i].style.color = "#d21809";
			}

			$(this).css({'color': 'white','background': '#d21809'});

			// xử lí hiển thị sản phẩm
			var type = $(this).parent().find('.type').val(), category = $(this).parent().find('.category').val();
			var x = '.theLoai' + category;
			tabs = $(x);

			for (i = 0; i < tabs.length; i++) {
				tabs[i].style.display = "none";
			}

			// x = '#carousel' + category;
			// tabs = $(x).find('.carousel-inner').removeClass('carousel-inner');

			type= '#' + type;
			var idTheLoai = $(type);

			// idTheLoai.addClass('carousel-inner');
			idTheLoai.css({'display': 'block'});
		})
	
	});	
</script>