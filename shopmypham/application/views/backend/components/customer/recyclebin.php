<div class="content-wrapper">
	<section class="content-header">
		<h1><i class="glyphicon glyphicon-text-background"></i> THÙNG RÁC KHÁCH HÀNG</h1>
		<div class="breadcrumb">
			<a class="btn btn-primary btn-sm" href="admin/customer" role="button">
				<span class="glyphicon glyphicon-remove do_nos"></span> Thoát
			</a>
		</div>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box" id="view">
					<div class="box-header with-border">
					<!-- /.box-header -->
					<div class="box-body">
						<?php  if($this->session->flashdata('success')):?>
	                        <div class="row">
	                            <div class="alert alert-success">
	                                <?php echo $this->session->flashdata('success'); ?>
	                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                            </div>
	                        </div>
	                    <?php  endif;?>
						<div class="row" style='padding:0px; margin:0px;'>
							<!--ND-->
							<div class="table-responsive">
								<table class="table table-hover table-bordered">
									<thead>
										<tr>
											<th class="text-center">ID</th>
											<th class="text-center">Họ Và Tên</th>
											<th class="text-center">Email</th>
											<th class="text-center">Số Điện Thoại</th>
											<th class="text-center">Khôi phục</th>
											<th class="text-center">Xóa </th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($list as $val): ?>
										<tr>
											<td class="text-center"><?php echo $val['id'] ?></td>
											<td class="text-center"><?php echo $val['fullname'] ?>
											</td>
											<td class="text-center"><?php echo $val['email'] ?></td>
											<td class="text-center"><?php echo $val['phone'] ?></td>
											<td class="text-center">
												<a class="btn btn-success btn-xs" href="admin/customer/restore/<?php echo $val['id'] ?>" role = "button">
													<span class="glyphicon glyphicon-edit"></span> Khôi Phục
												</a>
											</td>
											<?php  
												$quyen='';
												if($user['role']==1){
													$quyen.='
														<td class="text-center">
															<a class="btn btn-danger btn-xs" href="admin/customer/delete/'.$val['id'].'" role = "button">
																<span class="glyphicon glyphicon-trash"></span>Xóa
															</a>
														</td>
													';

												}else{
													$quyen.='
														<td class="text-center">
															<p class="fa fa-lock" style="color:red"> Không Đủ Quyền</p>
														</td>';
												}
												echo $quyen;
											?>
										</tr>
									<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<div class="row">
								<div class="col-md-12 text-center">
									<ul class="pagination">
										<?php echo $strphantrang ?>
									</ul>
								</div>
							</div>
							<!-- /.ND -->
						</div>
					</div><!-- ./box-body -->
				</div><!-- /.box -->
		</div>
		<!-- /.col -->
	  </div>
	  <!-- /.row -->
	</section>
<!-- /.content -->
</div><!-- /.content-wrapper -->