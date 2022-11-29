<div id="wrapper">
  	<form method="post" action="" enctype="multipart/form-data">
		<div class="row-fluid">
			<div class="span12">                    
				<div class="head">
				<div class="isw">
					<h1 class="isw-grid__heading">THÊM SẢN PHẨM</h1>
					</div>
					<div class="isw-grid" style="color: red; margin-left: 20px ;">
                       <?php
                       if(isset($message)) echo $message;
                       ?>
                    </div>                 
					<div class="clear"></div>
				</div>
				<div class="block-sorting">
					<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
	  	<input type="hidden" name="MaSP" value="">
	  <tr>
	  	<td>Tên sản phẩm</td>
	  	<td><input type="text" name="TenSP" value=""></td>
	</tr>
	  <tr>
	  <tr>
	  	<td>Hình ảnh</td>
	  	<td><input type="file" name="TenHinh"></td>
	  </tr>
	  <tr>
	  	<td>Mô tả</td>
	  	<td><textarea rows="10"  name="MoTa" style="resize: none; padding: 12px; border: 1px solid #ccc; width: 100%;   border-radius: 4px;"></textarea></td>
	  </tr>
	  	<td>Giá </td>
	  	<td><input type="text" name="Gia" value=""></td>
	  </tr>
	  <tr>
	  	<td>Số lượng có</td>
	  	<td><input type="text" name="SoLuongCo" value=""></td>
	  </tr>
	  <tr>
	  	<td>Khuyến Mãi</td>
	  	<td><input type="text" name="KhuyenMai" value=""></td>
	  </tr>
	  <tr>
	
	<td>Thể loại</td>
	<td>
	
		  <select name="danhmuc">
		  	<?php 
			if($listt != null) {
				foreach($listt as $item) {
			?>
				<option value="<?php echo isset($item) ? $item->maTL : '' ?>"><?php echo isset($item) ? $item->tenTL : "" ?></option>
			<?php }}?>
		</select>
		
	</td>
</tr>
	  			</table>
					<div class="form-group">
                        <input style="margin-top: 20px;" type="submit" name="submit" class="btn btn-danger btn-md" value="Thêm">
                    </div>
					<div class="isw-grid">
                       	<a href="admin.php?controller=product&action=list"  class="isw-grid__add">
							<h2 class="isw-grid__text">
								
								Trở lại
							</h2>
                       </a>
                    </div>
				</div>
			</div>   
		</div>                             
    </form>
</div>