<?php
	require_once('models/Customer.php'); 
	if(isset($_SESSION['user'])) {
		$_SESSION["user"] = unserialize(serialize($_SESSION["user"]));
	}
?>

<div class="header">
	<div class="logo-slogan">
		<div class="logo">
			<a href="#">
				<img src="assets/images/commons/logo.png"/>
			</a>
		</div>
		<div class="slogan">
			<p style="font-family: cursive; text-align: center;">HAI SHOP</p>
			<p>Hàng điện tử không bao giờ tử</p>
		</div>
		<div class="login-cart">
			<div class="login">
				<?php
					if(isset($_SESSION['user'])) {
				?>
					<div class="dropdown dropleft">
						<a data-toggle="dropdown" href="#"><span class="far fa-user"></span></a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="index.php?controller=user&action=info">Thông tin tài khoản</a></li>
							<li><a class="dropdown-item" href="index.php?controller=user&action=logout">Đăng xuất</a></li>
						</ul>
					</div>
				<?php
					} else {	
				?>
					<a href="index.php?controller=user&action=login"><span class="far fa-user"></span></a>
				<?php
					}
				?>
			</div>
			<div class="cart">
				<a href="index.php?controller=cart&action=list">
					<span class="fas fa-shopping-cart"></span>
				</a>
			</div>
		</div>
	</div>
   	<div class="find">
		<div class="search-box">
			<form action="index.php?controller=product&action=product_list_search" method="POST" onsubmit="return check()">
           		<input id="searchText" type="text" placeholder="Nhập tên sản phẩm cần tìm" name="searchText" value="">
           		<button type="submit" class="fa fa-search" name="submit"></button>
           	</form>
        </div>
   	</div>
    <div class="login-cart">
		<div class="login">
			<?php
				if(isset($_SESSION['user'])){
					$user = $_SESSION['user'];
			?>
				<div class="dropdown ">
					<a data-toggle="dropdown" href="#"><span class="far fa-user"></span>
						<?= $user->username ?>
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="index.php?controller=user&action=info">Thông tin tài khoản</a></li>
						<li><a class="dropdown-item" href="index.php?controller=user&action=logout">Đăng xuất</a></li>
					</ul>
				</div>
			<?php
				} else {	
			?>
				<a href="index.php?controller=user&action=login"><span class="far fa-user"></span>Đăng nhập</a>
			<?php
				}
			?>
		</div>
		<div class="cart">
			<a href="index.php?controller=cart&action=list">
				<span class="fas fa-shopping-cart"></span>
				Giỏ hàng
			</a>
		</div>
	</div>
   	
   	<script type="text/javascript">
   		function check() {
   			var s = document.getElementById('searchText').value;
   			
   			if (s == null || s == "") {
   				return false;
   			}
   			
   			return true;
   		}
   	</script>
</div>
