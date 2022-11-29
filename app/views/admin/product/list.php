<div id="wrapper">
	<div class="workplace">                         
		<div class="row-fluid">
			<div class="span12">                    
				<div class="head">
				<div class="isw">
					<h1 class="isw-grid__heading">DANH SÁCH SẢN PHẨM</h1>
					</div>
					<div class="isw-grid">
                       <a href="admin.php?controller=product&action=add" class="isw-grid__add">
							<h2 class="isw-grid__text">
								<i class="far fa-plus-square isw-grid__icon"></i>
								Thêm sản phẩm
							</h2>
                       </a>
                    </div>
					<div class="mes" style="color: blue; margin-left: 20px ;">
                       	<?php
                       		if(isset($message)) echo $message;
                       	?>
                    </div>            
					<div class="clear"></div>
				</div>
				<div class="block-sorting">
					
					<table id="example" cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<thead>
							<tr>
                                <th width="5%">Mã SP</th>
								<th width="15%">Tên SP</th>		 
								<th width="20%">Hình ảnh</th>		
								<th width="10%">Thể loại</th>
								<th width="10%">Chi tiết</th>
                                <th width="10%"></th>
                                <th width="10%"></th>                                    
							</tr>
						</thead>
						<tbody>
						<?php 
							if($dulieu != null) {
								foreach($dulieu as $item) {
						?>
							<tr>
                                <td><?=$item->maSP ?></td>
								<td><?=$item->tenSP ?></td>
								<td><img src="assets/images/products/<?=  $item->listHinh[0]->tenHinh ?>" width="100%">	</td>
								<td><?=$item->maTL ?></td>	
								<td>
									<div class="info">
										<div class="add-address">
											<a href="#" data-toggle="modal" data-target="#<?=  $item->maSP ?>">Chi tiết</a>
										</div>

										<!-- Modal -->
										<div class="modal fade" id="<?= $item->maSP ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" style="max-width: 1000px;">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="<?= $order->maHD ?>">Chi tiết sản phẩm <?= $item->maSP ?></h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<form action="index.php?controller=user&action=add_address" method="POST">
														<div class="modal-body"> 
															<table class="table">
																<tr>
																	<th width="50%">Mô tả</th>
																	<th>Giá</th>
																	<th>Khuyến mãi</th>
																	<th>Số lượng có</th>
																	<th>Số lượng bán</th>
																</tr>
																<tr>
																	<td><?= $item->moTa ?></td>
																	<td><?= number_format($item->gia) ?> đ</td>
																	<td><?= number_format($item->khuyenMai) ?> đ</td>
																	<td><?= number_format($item->soLuongCo) ?></td>
																	<td><?= number_format($item->soLuongBan) ?></td>
																</tr>
															</table>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
														</div>
													</form>
												</div>
											</div>
										</div>
                            		</div>
								</td>
                                <td>
									<a href="admin.php?controller=product&action=edit&id=<?=$item->maSP ?>">
										<i class="far fa-edit"></i>
									</a>
								</td> 
								
								<td>
									<a href="admin.php?controller=product&action=delete&id=<?=$item->maSP ?>" onClick="return confirm('Bạn có chắc chắn muốn xóa ?');">
										<i class="fas fa-trash-alt customer-icon"></i>
									</a> 
                               
							</tr> 
							<?php }}?>
						</tbody>
					</table>		
				</div>
			</div> 
		</div>
	</div>                               
</div>
