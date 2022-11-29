<div id="wrapper">
	<div class="workplace">                         
		<div class="row-fluid">
			<div class="span12">                    
				<div class="head">
				<div class="isw">
					<h1 class="isw-grid__heading">DANH SÁCH DANH MỤC</h1>
					</div>
					<div class="isw-grid">
                       <a href="admin.php?controller=category&action=add"  class="isw-grid__add">
							<h2 class="isw-grid__text">
								<i class="far fa-plus-square isw-grid__icon"></i>
								Thêm danh mục
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
                                <th width="20%">Mã Danh Mục</th>
								<th width="60%">Tên Danh Mục</th>		 
                                <th width="10%"></th>
                                <th width="10%"></th>                                 
							</tr>
						</thead>
						<tbody>
							<?php
								if($listDM != null) {
									foreach($listDM as $item) {
							?>
							<tr>
                                <td><?=$item->maDM ?></td>
								<td><?=$item->tenDM?></td>	
                                <td>
									<a href="admin.php?controller=category&action=edit&id=<?=$item->maDM ?>">
										<i class="far fa-edit"></i>
									</a>
								</td> 
                                <td>
									<a href="admin.php?controller=category&action=delete&id=<?=$item->maDM ?>" onClick="return confirm('Bạn có chắc chắn muốn xóa ?');">
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