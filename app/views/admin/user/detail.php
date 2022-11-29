<?php require_once('views/admin/layouts/sibar.php') ?>
<div id="wrapper">
  <form method="post" action="admin.php?controller=user&action=list">
	<div class="workplace">                         
		<div class="row-fluid">
			<div class="span12">                    
				<div class="head">
					<div class="isw">
					<h1 class="isw-grid__heading">Địa chỉ khách hàng</h1>
					</div>
					                         
					<div class="clear"></div>
				</div>
				<?php
				        if(isset($message)) echo $message;
				    ?>
				<div class="block-sorting">
					<table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
						<tr>
							<th>Địa chỉ</th>
							<th>Ghi chú</th>
						</tr>
                    <?php 
											
                      if($dulieu != null) {
                           foreach($dulieu as $value){	
                                            // echo"<pre>";
                                            // print_r($value);
                     ?>
					 <tr>
						<td><?=$value->soNha ?>, <?=$value-> xa ?>, <?=$value->huyen ?>, <?=$value->tinh ?></td>
						<td><?=$value->ghiChu ?></td>
					</tr>
					<?php } }                           ?>
					</table>
					
					<div class="isw-grid">
                       	<a href="admin.php?controller=user&action=list"  class="isw-grid__add">
							<h2 class="isw-grid__text">
								
								Trở lại
							</h2>
                       </a>
                    </div>
				</div>
			</div>                                
	
    </form>


</div>