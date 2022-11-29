<div id="wrapper">
	<div class="workplace">                         
		<div class="row-fluid">
			<div class="span12">  
                <?php
                if (isset($message) && $message != "") {
                    echo '<p class="alert alert-danger" role="alert">'.$message.'</p>';
                }
                ?>                
				<div class="head">
				    <div class="isw">
					    <h1 class="isw-grid__heading">ĐÁNH GIÁ</h1>
					</div>              
					<div class="clear"></div>
				</div>
				<div class="block-sorting">
					<table id="example" cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<thead>
							<tr>
                                <th width="15%">Mã đánh giá</th>
								<th width="15%">Khách hàng</th>		 
                                <th width="15%">Sản phẩm</th>		 
                                <th width="15%">Mức đánh giá</th>	
                                <th width="35%">Nhận xét</th>		 	 
                                <th width="5%"></th>                                 
							</tr>
						</thead>
						<tbody>
                        <?php
                        if (isset($listEvaluate) && count($listEvaluate) > 0) {
                            foreach ($listEvaluate as $evaluate) {
                        ?>
							<tr>
                                <td><?= $evaluate->maDG ?></td>
								<td>
                                    <a href="#" data-toggle="modal" data-target="#<?= $evaluate->maKH ?>">
                                        <?= $evaluate->maKH ?>
                                    </a>
                                    <div class="modal fade" id="<?= $evaluate->maKH ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Khách hàng</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="index.php?controller=user&action=add_address" method="POST">
                                                    <div class="modal-body"> 
                                                        <div class="form-group">
                                                            <label>Mã khách hàng: </label>
                                                            <input class="form-control" type="text" value="<?= $evaluate->khachHang->idCustomer ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tên đăng nhập: </label>
                                                            <input class="form-control" type="text" value="<?= $evaluate->khachHang->username ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Họ tên: </label>
                                                            <input class="form-control" type="text" value="<?= $evaluate->khachHang->fullname ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Số điện thoại: </label>
                                                            <input class="form-control" type="text" value="<?= $evaluate->khachHang->phoneNumber ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email: </label>
                                                            <input class="form-control" type="text" value="<?= $evaluate->khachHang->email ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>	
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#<?= $evaluate->maSP ?>">
                                        <?= $evaluate->maSP ?>
                                    </a>
                                    <div class="modal fade" id="<?= $evaluate->maSP ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Sản phẩm</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="index.php?controller=user&action=add_address" method="POST">
                                                    <div class="modal-body"> 
                                                        <div class="form-group">
                                                            <label>Mã sản phẩm: </label>
                                                            <input class="form-control" type="text" value="<?= $evaluate->sanPham->maSP ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Hình ảnh: </label>
                                                            <img class="form-control" src="assets/images/products/<?=  $evaluate->sanPham->listHinh[0]->tenHinh ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tên sản phẩm: </label>
                                                            <input class="form-control" type="text" value="<?= $evaluate->sanPham->tenSP ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Giá: </label>
                                                            <input class="form-control" type="text" value="<?= number_format($evaluate->sanPham->gia) ?> đ">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Đã bán: </label>
                                                            <input class="form-control" type="text" value="<?= $evaluate->sanPham->soLuongBan ?>">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Thoát</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td><?= $evaluate->danhgia ?> <i style="color: #ffc107;" class="fas fa-star"></i></td>
                                <td><?= $evaluate->nhanXet ?></td>
                                <td>
									<a onclick='return confirm("Bạn có chắc chắn muốn xóa không?")' href="admin.php?controller=evaluate&action=delete&id=<?= $evaluate->maDG ?>">
										<i class="fas fa-trash-alt customer-icon"></i>
									</a>
								</td>  
							</tr> 
                        <?php
                            }
                        }
                        ?>
						</tbody>
					</table>		
				</div>
			</div> 
		</div>
	</div>                               
</div>