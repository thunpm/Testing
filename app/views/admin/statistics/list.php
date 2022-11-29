<div id="wrapper">
	<div class="workplace">                         
		<div class="row-fluid">
			<div class="span12">                    
				<div class="head">
				<div class="isw">
					<h1 class="isw-grid__heading">THỐNG KÊ</h1>
					</div>              
					<div class="clear"></div>
				</div>
                <p class="alert alert-danger" role="alert" style="margin: auto; width: 60%; font-size: 18px;">Doanh thu từ <?= $date1 ?> đến <?= $date2 ?> là: <b id="tongDoanhThu"></b> </p>
				<div style="margin: 10px;">
                    <form id="thong-ke" action="admin.php?controller=statistics&action=list" method="POST">
                        <div style="display: flex;">
                            <div style="width: 50%; margin-right: 30px;" class="form-group">
                                <label for="date1" class="text-inf">Ngày bắt đầu:</label><br>
                                <input type="date" name="date1" id="d1" class="form-control"  value="">
                            </div>
                            <div style="width: 50%;" class="form-group">
                                <label for="date1" class="text-inf">Ngày kết thúc:</label><br>
                                <input type="date" name="date2" id="d2" class="form-control"  value="">
                            </div>
                        </div>
                        <input class="btn btn-dark" type="submit" value="THỐNG KÊ">
                    </form>
                </div>
                <div class="block-sorting">
					<table id="example" cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<thead>
							<tr>
                                <th width="15%">Mã sản phẩm</th>
								<th width="15%">Tên sản phẩm</th>		 
                                <th width="15%">Số lượng bán được</th>		 
                                <th width="15%">Đơn giá</th>	
                                <th width="15%">Khuyến mãi</th>		 	 
                                <th width="15%">Tổng thu</th>                                 
							</tr>
						</thead>
						<tbody>
                        <?php
                        $tongDoanhThu = 0;
                        if (isset($listProduct) && count($listProduct) > 0) {
                            foreach ($listProduct as $item) {
                                $tongDoanhThu += ($item->donGia - $item->khuyenMai)*($item->soLuong);
                        ?>
							<tr>
                                <td><?= $item->sanPham->maSP ?></td>
								<!-- <td>
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
                                </td>	 -->
                                <td><?= $item->sanPham->tenSP ?></td>
                                <td><?= $item->soLuong ?></td>
                                <td><?= number_format($item->donGia) ?> đ</td>
                                <td><?= number_format($item->khuyenMai) ?> đ</td>
                                <td><?= number_format(($item->donGia - $item->khuyenMai)*($item->soLuong)) ?> đ</td>
							</tr> 
                        <?php
                            }
                        }
                        ?>
						</tbody>
					</table>
                    
                    <div id="doanhThu" style="display: none;"><?= $tongDoanhThu ?></div>
                    <div class="isw-grid">
                       	<a href="admin.php?controller=statistics&action=list"  class="isw-grid__add">
							<h2 class="isw-grid__text">
								
								Trở lại
							</h2>
                       </a>
                    </div>
				</div>
			</div> 
		</div>
	</div>                               
</div>

<script>
    window.onload = function() {
        var elm = document.getElementById("tongDoanhThu");
        elm.innerHTML = document.getElementById("doanhThu").innerHTML.replace(/\B(?=(\d{3})+(?!\d))/g, ',') + " đồng";
    };
</script>
<script>
    $(document).ready(function() {
        $('#thong-ke').submit(function() {
            var d1 = $('#d1').val();
            var d2 = $('#d2').val();
            
            if (d1 > d2) {
                alert("Ngày bắt đầu nhỏ hơn ngày kết thúc!");
                return false;
            } else {
                return true;
            }
        });
	});	
</script>