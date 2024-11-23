<?php echo form_open_multipart('admin/producer/update/'.$row['id']); ?>
<div class="content-wrapper">
	<form action="<?php echo base_url() ?>admin/producer/update.html" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
		<section class="content-header">
			<h1><i class="glyphicon glyphicon-text-background"></i> CẬP NHẬT NHÀ CUNG CẤP</h1>
			<div class="breadcrumb">
				<button type = "submit" class="btn btn-primary btn-sm">
					<span class="glyphicon glyphicon-floppy-save"></span>
					Lưu[Cập nhật]
				</button>
				<a class="btn btn-primary btn-sm" href="admin/producer" role="button">
					<span class="glyphicon glyphicon-remove do_nos"></span> Thoát
				</a>
			</div>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box" id="view">
						<div class="box-body">
							<div class="col-md-9">
							<?php echo validation_errors(); ?>
								<div class="box-body">
									<div class="col-md-9">
										<div class="form-group">
											<label>Tên Nhà Cung Cấp</label>
											<input type="text" class="form-control" name="name" placeholder="Tên Nhà Cung Cấp" value="<?php echo $row['name'] ?>">
											<div class="error" id="password_error" style="color: red"><?php echo form_error('name')?></div>
										</div>
										<div class="form-group">
											<label>Mã Nhà Cung Cấp <span class = "maudo">(*)</span></label>
											<input type="text" class="form-control" name="code" placeholder="Mã Nhà Cung Cấp" disabled value="<?php echo $row['code'] ?>">
											<div class="error" id="password_error" style="color: red"><?php echo form_error('code')?></div>
										</div>
										<div class="form-group">
											<label>Sản Phẩm Cung Cấp <span class = "maudo">(*)</span></label>
											<input type="text" class="form-control" name="keyword" placeholder="Sản Phẩm Cung Cấp" value="<?php echo $row['keyword'] ?>">
											<span style="font-style: italic; line-height: 32px;">Chú Ý: Mỗi Từ Khóa Cách Bởi Một Dấu ", ". Ví Dụ: Kem, Phấn, Son, v.v</span>
											<div class="error" id="password_error" style="color: red"><?php echo form_error('keyword')?></div>
										</div>
										<div class="form-group">
											<label>Trạng Thái</label>
											<select name="status" class="form-control">
												<option value="1" <?php if($row['status'] == 1) {echo 'selected';}?> >Đang Cung Cấp</option>
												<option value="0" <?php if($row['status'] == 0) {echo 'selected';}?> >Ngừng Cung Cấp</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- /.box -->
				</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
	</form>
<!-- /.content -->
</div><!-- /.content-wrapper -->