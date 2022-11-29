<?php require_once('views/admin/layouts/sibar.php') ?>

<div id="wrapper">
	<div class="workplace">                         
		<div class="row-fluid">
			<div class="span12">                    
				<div class="head">
                    <div class="isw">
                        <h1 class="isw-grid__heading">DANH SÁCH ĐƠN HÀNG</h1>
                    </div>
				</div>
				<div class="block-sorting" style="overflow: auto;">
					<table id="example" cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<thead>
							<tr>
                                <th style="min-width: 130px;">Mã Đơn Hàng</th> 
                                <th style="min-width: 200px">Thông tin khách hàng</th>
                                <th style="min-width: 275px">Sản phẩm</th>
                                <th style="min-width: 150px">Tổng tiền</th>
                                <th style="min-width: 150px;">Trạng thái</th>
                                <th style="min-width: 100px;">Chi tiết</th>
                                <th style="min-width: 190px;">Ngày mua</th>
                                <th style="min-width: 100px;">Thao Tác</th> 
							</tr>
						</thead>
						<tbody>
                            <?php foreach ($orders as $item) { ?>
                                <tr>
                                    <td><?= $item->maHD ?></td>	
                                    <td>
                                        <div>
                                            <p>Tên khách hàng: <?= $item->customer->fullname ?></p>
                                            <p>Số điện thoại: <?= $item->customer->phoneNumber ?></p>
                                        </div>
                                    </td>	
                                    <td>
                                        <div>
                                            <?php 
                                                $total = 0;
                                                foreach ($item->detail as $value) {
                                            ?>
                                                <div style="margin-bottom: 10px">
                                                    <a href="index.php?controller=product&action=product_detail&masp=<?= $value->sanPham->maSP ?>" target="_blank"><?= $value->sanPham->tenSP ?></a> <br>
                                                    <span>x <?= $value->soLuong ?></span>
                                                </div>
                                            <?php 
                                                $total = $total + ($value->donGia - $value->khuyenMai)*$value->soLuong;
                                                } 
                                            ?>
                                        </div>
                                    </td>	
                                    <td>
                                        <b><?= number_format($total) ?> VNĐ</b>
                                    </td>	
                                    <td>
                                        <label class="label label-info">
                                            <?= $item->trangThai ?>
                                        </label>
                                    </td>	
                                    <td>
                                        <a style="font-size: 15px" href="admin.php?controller=order&action=edit&MaHD=<?= $item->maHD ?>">
                                            <i class="fa fa-eye"></i>
                                            Xem
                                        </a>
                                    </td>
                                    <td>
                                        <?= $item->ngayLap ?>
                                    </td>
                                    <td>
                                        <a href="admin.php?controller=order&action=delete&MaHD=<?= $item->maHD ?>">
                                            <i class="fas fa-trash-alt customer-icon"></i>
                                        </a>
                                    </td> 
                                </tr> 
                            <?php } ?>
						</tbody>
					</table>		
				</div>
			</div> 
		</div>
	</div>                               
</div>