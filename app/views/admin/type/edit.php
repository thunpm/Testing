<div id="wrapper">
  	<form method="post" action="">
		<div class="row-fluid">
			<div class="span12">                    
				<div class="head">
					<div class="isw-grid"></div>                      
					<div class="clear"></div>
				</div>
				<div class="mes" style="color: red; margin-left: 25px ;">
				    <?php
				        if(isset($message)) echo $message;
				    ?>
				</div>
				<div class="block-sorting">
					<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<thead>
							<tr>
                                <th width="20%">Mã Thể loại</th>
								<th width="40%">Tên Thể loại</th>
								<th width="20%">Tên Danh mục</th>                              
							</tr>
						</thead>
						<tbody>
							<tr>
                                <td><input type="text" class="span12" name="MaTL" value="<?php echo isset($theloai) ? $theloai->maTL : "" ?>" disabled></td>
								<td><input type="text" class="span12" name="TenTL" value="<?php echo isset($theloai) ? $theloai->tenTL : "" ?>"></td>
								<td>
									<select name="MaDM">
										<option value="0">Chọn danh mục</option>
										<?php
											if(isset($listDM)) {
												foreach($listDM as $item) {
										?>
									    <option <?php if(isset($theloai) && ($theloai->maDM == $item->maDM)) echo "selected";?> value="<?=$item->maDM?>"><?=$item->tenDM?></option>
										<?php }}?>
								</select>
								</td>
							</tr> 	
						</tbody>
					</table>
                    <div class="form-group">       
                        <input style="margin-top: 20px;" type="submit" name="submit" class="btn btn-danger btn-md" value="CẬP NHẬT">
                    </div>
					<div class="isw-grid">
                       	<a href="admin.php?controller=type&action=list"  class="isw-grid__add">
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