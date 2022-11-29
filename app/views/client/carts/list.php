<?php require('views/client/layouts/header.php'); ?>
<?php require('views/client/layouts/menu.php'); ?>

<?php
	require_once('models/Cart.php'); 
	if(isset($_SESSION['cart'])) {
		$_SESSION["cart"] = unserialize(serialize($_SESSION["cart"]));
	}
?>

<div class="mainn">
	<div class="product-detail__title">
        <h3 class="product-detail__heading" >GIỎ HÀNG</h3>
    </div>
	<?php
		if(isset($_SESSION['cart']) && count($_SESSION['cart']->listItems) > 0) {
	?>
		<div class="contain">
			<?php
			if(isset($message) && $message != "") {
				echo "<div class='alert alert-primary' role='alert'>$message</div>";
			}
			?>
			<table>
				<thead>
					<tr>
						<th colspan="2">Tên sản phẩm</th>
						<th colspan="2">Giá</th>
						<th>Số lượng</th>
						<th>Thành tiền</th>
						<th></th>
					</tr>
				</thead>

				<tbody>
					<?php
						$tongTien = 0;
						$cart = $_SESSION['cart'];
						foreach ($cart->listItems as $item) {
					?>
						<tr>
							<td style="width: 20%;">
								<a style="cursor: pointer;" href="index.php?controller=product&action=product_detail&masp=<?= $item->sanPham->maSP?>&madanhmuc=null">
									<img style="width: 100%;" src="assets/images/products/<?= $item->sanPham->listHinh[0]->tenHinh ?>"/>
								</a>
							</td>
							<td style="width: 20%;">
								<a style:hover="cursor: pointer;" href="index.php?controller=product&action=product_detail&masp=<?= $item->sanPham->maSP?>&madanhmuc=null">
									<h4><?= $item->sanPham->tenSP ?></h4>
									<p>Màu sắc: Trắng</p>
								</a>	
							</td>
							<td>
								<p><span class="price"><?= number_format($item->sanPham->gia-$item->sanPham->khuyenMai) ?> đ</span></p>
							</td>
							<td>
								<p style="text-decoration: line-through;"><span class="price"><?= number_format($item->sanPham->gia) ?> đ</span></p>
							</td>
							<!-- chỉnh sửa giỏ hàng -->
							<td>
								<!-- số lượng muốn mua -->
								<div class="product-detail__number">
									<button onclick="giam('<?= $item->sanPham->maSP ?>')" class="product-detail__number-minus product-detail__number-reduce">
										<i class="fas fa-minus"></i>
									</button>
									<input onchange="doi('<?= $item->sanPham->maSP ?>')" type="text" id="soLuong" value="<?= $item->soLuong ?>" class="product-detail__number-minus product-detail__number-one">
									<button onclick="tang('<?= $item->sanPham->maSP ?>')" class="product-detail__number-minus">
										<i class="fas fa-plus"></i>
									</button>
								</div>
							</td>
							<td>
								<p><span class="price"><?= number_format(($item->sanPham->gia - $item->sanPham->khuyenMai)*$item->soLuong) ?> đ</span></p>
							</td>
							<td>
								<button onclick="xoa('<?= $item->sanPham->maSP ?>')">
									<i style="cursor: pointer;" class="fas fa-trash-alt"></i>
								</button>
							</td>
							<!-- hết chỉnh sửa giỏ hàng -->
						</tr>
					<?php
						$tongTien = $tongTien + ($item->sanPham->gia - $item->sanPham->khuyenMai)*$item->soLuong;
						}
					?>
				</tbody>
			</table>

			<div class="count-left">
				<p>Tổng tiền: <span class="price"><?= number_format($tongTien) ?></span></p>
			</div>
			
			<form class="count-right">
				<a href="index.php?controller=cart&action=pay">THANH TOÁN</a>	
			</form>
			<div class="clr"></div>
		</div>
		<?php
		} else {
		?>
		<div style="width: 100%; height: 300px; background-color: white; margin-top: 30px; border-radius: 5px; align-items: center; display: flex; justify-content: center;">
			Không có sản phẩm nào
		</div>
		<?php
		}
		?>
	</div>

<?php require('views/client/layouts/footer.php'); ?>

<script>
	function xoa(maSP) {
		var href = "index.php?controller=cart&action=edit&tt=xoa&id=" + maSP;
		location.href = href;
	}

	function giam(maSP) {
		var href = "index.php?controller=cart&action=edit&tt=giam&id=" + maSP;
		location.href = href;
	}

	function tang(maSP) {
		var href = "index.php?controller=cart&action=edit&tt=tang&id=" + maSP;
		location.href = href;
	}

	function doi(maSP) {
		var soLuong = document.getElementById("soLuong").value;
		var href = "index.php?controller=cart&action=edit&tt=doi&id=" + maSP + "&soLuong=" + soLuong;
		location.href = href;
	}
</script>