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
					    <h1 class="isw-grid__heading">ADMIN</h1>
					</div>              
					<div class="clear"></div>
				</div>
				<div class="block-sorting">
					<table id="example" cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<thead>
							<tr>
                                <th width="15%">Mã Admin</th>
								<th width="15%">Tên đăng nhập</th>		 
                                <th width="15%">Họ tên</th>		                                
							</tr>
						</thead>
						<tbody>
                        <?php
                        if (isset($_SESSION['admin']) && $_SESSION['admin'] != null) {
                            $_SESSION["admin"] = unserialize(serialize($_SESSION["admin"]));
                            $admin = $_SESSION['admin'];
                        ?>
							<tr>
                                <td><?= $admin->maAD ?></td>
                                <td><?= $admin->tenDangNhap ?></td>
                                <td><?= $admin->hoTen ?></td>
							</tr> 
                        <?php
                        }
                        ?>
						</tbody>
					</table>		
				</div>
			</div> 
		</div>
	</div>                               
</div>