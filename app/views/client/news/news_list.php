<?php require('views/client/layouts/header.php'); ?>
<?php require('views/client/layouts/menu.php'); ?>

<div class="main">
	<ul class="breadcrum">
        <li class="active"><a href="index.php?controller=page&action=home" class="breadcrum__active">Trang chủ</a> <span class="active">/&nbsp</span></li>                         
        <li class="active"><a href="index.php?controller=news&action=news_list" class="breadcrum__active">Tin tức</a></li>
    </ul> 

	<div class="title">
		<div class="title-left">
			<h3>Tin tức</h3>
		</div>

		<div class="title-right">
		<?php
			foreach ($danhMucTin as $dm) {
				if($dm->tenDM != $ten_danhmuc) {
				echo '<a href="index.php?controller=news&action=news_list&id='.$dm->maDM.'">'.$dm->tenDM.'</a>';
				} else {
				echo '<a style="background-color: #ED5323;" href="index.php?controller=news&action=news_list&id='.$dm->maDM.'">'.$dm->tenDM.'</a>';	
				}
			}
		?>
		</div>

		<div class="clr"></div>
	</div>

	<div class="content">
	<?php
		if($ten_danhmuc != '') {
		echo '<h3><a href="#">'.$ten_danhmuc.'</a></h3>';
	}
	?>

		<ul class="list">
			<?php
				if($list_tintuc != null) {
					foreach ($list_tintuc as $list) {
			?>
			<li>
				<a href="index.php?controller=news&action=news_detail&id=<?=$list->maTT?>" class="cont">
					<div class="cont-left">
						<img src="assets/images/news/<?=$list->anh?>"/>
					</div>

					<div class="cont-right">
						<h4><?=$list->tieuDe?></h4>
						<p><span class="time"><?=$list->ngayDang?></span></p>
						<p><?=$list->tomTat?></p>
					</div>

					<div class="clr"></div>
				</a>
			</li>
			<?php 
		}}
			?>
		</ul>
		
		<!-- phân trang -->
		<!--
		<ul class="pagination product__pagination">
		<li class="pagination-item">
			<a href="" class="pagination-item__link">
				<i class="pagination-item__icon fas fa-angle-left"></i>
			</a>
		</li>
		<li class="pagination-item pagination-item--active">
			<a href="" class="pagination-item__link">1</a>
		</li>
		<li class="pagination-item">
			<a href="" class="pagination-item__link">2</a>
		</li>
		<li class="pagination-item">
			<a href="" class="pagination-item__link">3</a>
		</li>
		<li class="pagination-item">
			<a href="" class="pagination-item__link">4</a>
		</li>
		<li class="pagination-item">
			<a href="" class="pagination-item__link">5</a>
		</li>
		<li class="pagination-item">
			<a href="" class="pagination-item__link">...</a>
		</li>
		<li class="pagination-item">
			<a href="" class="pagination-item__link">14</a>
		</li>
		<li class="pagination-item">
			<a href="" class="pagination-item__link">
				<i class="pagination-item__icon fas fa-angle-right"></i>
			</a>
		</li>
		</ul>
		-->
	</div>
</div>

<?php require('views/client/layouts/footer.php'); ?>