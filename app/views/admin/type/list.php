<div id="wrapper">
	<div class="workplace">                         
		<div class="row-fluid">
			<div class="span12">                    
				<div class="head">
				<div class="isw">
					<h1 class="isw-grid__heading">DANH SÁCH THỂ LOẠI</h1>
					</div>
					<div class="isw-grid">
                       <a href="admin.php?controller=type&action=add"  class="isw-grid__add">
							<h2 class="isw-grid__text">
								<i class="far fa-plus-square isw-grid__icon"></i>
								Thêm thể loại
							</h2>
                       </a>
                    </div>
					                       
					<div class="clear"></div>

					<div class="mes" style="color: blue; margin-left: 20px ;">
                       	<?php
                       		if(isset($message)) echo $message;
                       ?>
                    </div>
				</div>
				<div class="block-sorting">
					<table id="example" cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<thead>
							<tr>
                                <th width="20%">Mã Thể loại</th>
								<th width="30%">Tên Thể loại</th>
								<th width="30%">Tên Danh mục</th>		 
                                <th width="10%"></th>
                                <th width="10%"></th>                                 
							</tr>
						</thead>
						<tbody>
							<?php
								if($listTL != null) {
									foreach($listTL as $item) {
							?>
							<tr>
                                <td><?=$item->maTL ?></td>
								<td><?=$item->tenTL?></td>
								<td><?=$item->tenDM?></td>	
                                <td>
									<a href="admin.php?controller=type&action=edit&id=<?=$item->maTL ?>">
										<i class="far fa-edit"></i>
									</a>
								</td> 
                                <td>
									<a href="admin.php?controller=type&action=delete&id=<?=$item->maTL ?>" onClick="return confirm('Bạn có chắc chắn muốn xóa ?');">
										<i class="fas fa-trash-alt customer-icon"></i>
									</a>
								</td>
							</tr> 
							<?php }}?>
						</tbody>
					</table>		
				</div>
			</div> 
		</div>
	</div>                               
</div>