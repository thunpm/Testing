<div id="wrapper">
  	<form method="post" enctype="multipart/form-data" action="admin.php?controller=product&action=edit&id=<?php echo isset($item) ? $item->maSP : "" ?>">
		<div class="row-fluid">
			<div class="span12">                    
				<div class="head">
				<div class="isw">
					<h1 class="isw-grid__heading">SỬA SẢN PHẨM</h1>
					</div>            
					<div class="clear"></div>
				</div>
				<div class="mes" style="color: red; margin-left: 25px ;">
				    <?php
				        if(isset($message)) echo $message;
				    ?>
				</div>
				<div class="block-sorting">
					<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<tr>
							<td>Mã sản phẩm</td>
							<input type="hidden" name="masp"  value="<?php echo isset($item) ? $item->maSP : "" ?>">
	  						<td><input type="text" value="<?php echo isset($item) ? $item->maSP : "" ?>" disabled></td>
	  					</tr>
						<tr>
							<td>Tên sản phẩm</td>
							<td><input type="text" name="tensanpham" value="<?php echo isset($item) ? $item->tenSP : "" ?>"></td>
						</tr>
	  					<tr>
							<td>Hình ảnh</td>
							<td><input type="file" name="hinhanh"></td>
						</tr>
						<tr>
							<td>Mô tả</td>
							<td><textarea rows="10"  name="mota" style="resize: none; padding: 12px; border: 1px solid #ccc; width: 100%;   border-radius: 4px;"><?php echo isset($item) ? $item->moTa : "" ?></textarea></td>
						</tr>
						<tr>
							<td>Giá </td>
							<td><input type="text" name="giasp" value="<?php echo isset($item) ? $item->gia : "" ?>"></td>
						</tr>
						<tr>
							<td>Số lượng có</td>
							<td><input type="text" name="soluong" value="<?php echo isset($item) ? $item->soLuongCo : "" ?>"></td>
						</tr>
						<tr>
							<td>Khuyến mãi </td>
							<td><input type="text" name="khuyenmai" value="<?php echo isset($item) ? $item->khuyenMai : "" ?>"></td>
						</tr>
	 					<tr>
							<td>Danh mục thể loại</td>
	    					<td>
								<select name="MaTL">
									<option value="0">Chọn thể loại</option>
									<?php
										if(isset($listt)) {
											foreach($listt as $theloai) {
									?>
									<option <?php if(isset($item) && ($item->maTL == $theloai->maTL)) echo "selected";?> value="<?=$theloai->maTL?>"><?=$theloai->tenTL?></option>
									<?php }}?>
								</select>
	    					</td>
						</tr>
					</table>
                    <div class="form-group">       
                        <input style="margin-top: 20px;" type="submit" name="submit" class="btn btn-danger btn-md" value="CẬP NHẬT">
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