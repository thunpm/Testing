<?php require('views/client/layouts/header.php'); ?>
<?php require('views/client/layouts/menu.php'); ?>

<div class="main">

	<ul class="breadcrum">
        <li class="active"><a href="index.php?controller=page&action=home" class="breadcrum__active">Trang chủ</a> <span class="active">/&nbsp</span></li>         
		<li class="active"><a href="index.php?controller=news&action=news_list" class="breadcrum__active">Tin tức</a> <span class="active">/&nbsp</span></li> 
	<?php
		if($tintuc != '') {    
	?>         
        <li class="active"><a href="index.php?controller=news&action=news_list&id=<?=$tintuc->danhmuctin->maDM?>" class="breadcrum__active"><?=$tintuc->danhmuctin->tenDM?></a></li>
    
    </ul> 

	<div class="content">
		<div class="title">
			<h3><?=$tintuc->tieuDe?></h3>
		</div>

		<div class="comment">
			<p>Võ Thùy Dương - 1 ngày trước <span class="cmt"><a href="#" >2 bình luận</a></span></p>
		</div>

		<div class="cont">
			<p><?=$tintuc->noiDung?></p>

			<div class="quangcao">
				<ul>
					<li><a href="#">MacBook Pro 2021 sẵn sàng lên kệ, Hai Shop giảm ngay 1 triệu đồng cho khác hàng đặt trước</a></li>
					<li><a href="#">Hai Shop tung giá bán dự kiến của Iphone 13 vào tháng 9/2021</a></li>
					<li><a href="#">Mua sản phẩm Samsung tại Hai Shop, nhận cơ hội trúng bộ quà 60 triệu đồng</a></li>
				</ul>
			</div>

			<p>Với mong muốn 'tăng sức nóng' cho mùa mau sắm cuối năm cũng như gửi lời cảm ơn đến tất cả các khách hàng, Hai Shop sẽ dành tặng bạn nhiều ưu đãi giá trị và thiết thực thông qua chương trình Khuyến mại đặc biệt khi thanh toán qua ví ZaloPay. </p>

			<p><img src="assets/images/news/tt.jpg" alt="" /></p>

			<p>Một số lưu ý nhỏ về chương trình ưu đãi này:</p>
			<ul>
				<li>Thời gian áp dụng: 1/12/2021 - 31-12-2021</li>
				<li>Phạm vi áp dụng: Thanh toán trực tiếp tại website Hai Shop</li>
				<li>Sản phẩm áp dụng: Iphone 13</li>
				<li>Chương trình áp dụng cho hình thức trả thẳng, tức là trả toàn bộ số tiền và không tách hóa đơn.</li>
			</ul>

			<div class="cham">
				<p style="padding-left: 0px;">Sản phẩm mua tại Hai Shop là hàng chính hãng, bạn có thể mua trực tiếp tại cửa hàng, chọn mua online hoặc gọi hotline 1800 6601 để được tư vấn và mua hàng nhanh hơn.</p>
			</div>

			<div class="ttt">
				<p>Chia sẻ bài viết<span class="like"><a href="#">Thích 0</a></span><span class="share"><a href="#">Chia sẻ</a></span></p>
			</div>
			<div class="clr"></div>
		</div>
	</div>
<?php }?>	
</div>
<?php require('views/client/layouts/footer.php'); ?>