<?php require_once('views/admin/layouts/sibar.php') ?>
<div id="wrapper">
  <form method="post" action="admin.php?controller=user&action=list">
	<div class="workplace">                         
		<div class="row-fluid">
			<div class="span12">                    
				<div class="head">
					<div class="isw">
					<h1 class="isw-grid__heading">Danh sách khách hàng</h1>
					</div>
					                         
					<div class="clear"></div>
				</div>
				<?php
				        if(isset($message)) echo $message;
				    ?>
				<div class="block-sorting">
					<table id="example" cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<thead>
							<tr>
						
                                <th width="10%">Mã User</th>
								<th width="10%">UserName</th>
								<th width="10%">PassWord</th>
								<th width="20%">Họ Tên</th>
								<th width="16%">Ngày Sinh</th>
                                <th width="14%">Phone</th>
								<th width="16%">Email</th> 
								<th>Địa chỉ</th>     
								<th></th>                            
							</tr>
						</thead>
						<tbody>
							<?php 
											
							if($dulieu != null) {
								foreach($dulieu as $value){	
							// echo"<pre>";
							// print_r($value);
						?>
										
						<tr>
				
                                <td><?=$value-> idCustomer ?></td>
								<td><?=$value-> username ?></td>
								<td><?=$value-> password ?></td>
								<td><?=$value-> fullname ?></td>
								<td><?=$value-> birthday ?></td>  
								<td><?=$value-> phoneNumber ?></td>      
                                <td><?=$value-> email ?></td>
								<td>
									<a href="admin.php?controller=user&action=detail&id=<?=$value-> idCustomer?>">
									<i class="fas fa-eye customer-icon"></i>
									</a>
								</td>
								<td>
									<a href="admin.php?controller=user&action=delete&id=<?=$value-> idCustomer?>"onClick="return confirm('Bạn có chắc chắn muốn xóa ?');">
										<i class="fas fa-trash-alt customer-icon"></i>
									</a>
								</td>  
							</tr> 



							<?php } }                           ?>
						</tbody>
					</table>
					
				</div>
			</div>                                
	
    </form>


</div>
