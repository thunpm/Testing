<nav class="menu navbar navbar-expand-lg justify-content-center align-items-center">
	<button class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		<i style="color: white; font-size: 20px; background-color: #14274a;" class="fas fa-bars"></i>
	</button>
	<div class="collapse navbar-collapse" id="myNavbar">
		<ul class="navbar-nav">
			<li class="nav-item menu-item">
					<a class="nav-link" href="index.php">Trang chủ</a>
			</li>
			<?php
			if($listDM != null) {
				foreach ($listDM as $danhMuc) {
			?>
				<li class="nav-item menu-item">
					<a class="nav-link" href="index.php?controller=product&action=product_list&danhmuc=<?= $danhMuc->maDM ?>&page=1"><?= $danhMuc->tenDM ?></a>
				</li>
			<?php	
				}
			}
			?>	
			<li class="nav-item menu-item">
				<a class="nav-link" href="index.php?controller=news&action=news_list">Tin tức</a>
			</li>
			<li class="nav-item menu-item">
				<a class="nav-link" href="index.php?controller=page&action=contact">Liên hệ</a>
			</li>
		<ul>
	</div>
</nav>

<script>
	jQuery(document).ready(function($) {
		pos = $('.menu').position();
		
		$(window).scroll(function() {
			var posScroll = $(document).scrollTop();
			if (parseInt(posScroll) > parseInt(pos.top)) {
				$('.menu').addClass('fixed');
			} else {
				$('.menu').removeClass('fixed');
			}
		});
	}); 

</script>
        