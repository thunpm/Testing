<?php require_once('views/admin/layouts/sibar.php') ?>

<div id="wrapper">
	<div class="workplace">                         
		<div class="row-fluid">
			<div class="span12">                    
				<div class="head">
                    <div class="isw">
                        <h1 class="isw-grid__heading">DANH SÁCH LIÊN HỆ</h1>
                    </div>
				</div>
				<div class="block-sorting">
					<table id="example"  cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<thead>
							<tr>
                                <th>Mã Phản Hồi</th>
                                <th>Tiêu Đề</th>
								<th>Họ Tên</th>		 
                                <th>Email</th>
                                <th>Số Điện Thoại</th>                                 
                                <th>Địa Chỉ</th> 
                                <th>Nội Dung</th>     
                                <th>Thao Tác</th> 
							</tr>
						</thead>
						<tbody>
							<?php foreach ($contacts as $item): ?>
                                <tr>
                                    <td><?= $item->MaPH ?></td>	
                                    <td><?= $item->TieuDe ?></td>	
                                    <td><?= $item->HoTen ?></td>	
                                    <td><?= $item->Email ?></td>	
                                    <td><?= $item->SoDienThoai ?></td>	
                                    <td><?= $item->DiaChi ?></td>	
                                    <td><?= $item->NoiDung ?></td>	
                                    <td>
                                        <a href="admin.php?controller=response&action=deleteContact&MaPH=<?= $item->MaPH ?>">
                                            <i class="fas fa-trash-alt customer-icon"></i>
                                        </a>
                                    </td> 
                                </tr> 
                            <?php endforeach ?>
						</tbody>
					</table>
                    <div class="isw-grid">
                       	<a href="admin.php?controller=responses&action=list"  class="isw-grid__add">
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