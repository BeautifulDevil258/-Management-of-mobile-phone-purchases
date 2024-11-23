<?php echo 	('admin/coupon/insert'); ?>
<div class="content-wrapper">
	<form action="<?php echo base_url() ?>admin/coupon/insert.html" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
		<section class="content-header">
			<h1><i class="glyphicon glyphicon-text-background"></i> THÊM MÃ GIẢM GIÁ MỚI</h1>
			<div class="breadcrumb">
				<button type = "submit" class="btn btn-primary btn-sm">
					<span class="glyphicon glyphicon-floppy-save"></span>
					Lưu[Thêm]
				</button>
				<a class="btn btn-primary btn-sm" href="admin/coupon" role="button">
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
							<div class="col-md-6">
								<div class="form-group">
									<label>Mã Giảm Giá</label>
									<input type="text" class="form-control" name="code" style="width:100%" placeholder="Mã Giảm Giá">
									<div class="error" id="password_error"><?php echo form_error('code')?></div>
								</div>
								<div class="form-group">
									<label>Số Tiền Giảm Giá</label>
									<input type="number" class="form-control" name="discount" style="width:100%" placeholder="Số Tiền Giảm Giá">
									<div class="error" id="password_error"><?php echo form_error('discount')?></div>
								</div>
								<div class="form-group">
									<label>Số Lần Nhập Giới Hạn</label>
									<input type="number" class="form-control" name="limit_number" style="width:100%" placeholder="Số Lần Nhập Giới Hạn">
									<div class="error" id="password_error"><?php echo form_error('limit_number')?></div>
								</div>
								<div class="form-group">
									<label>Áp Dụng Đơn Hàng Có Giá Trị Từ</label>
									<input type="number" class="form-control" name="payment_limit" style="width:100%" placeholder="Áp Dụng Đơn Hàng Có Giá Trị Từ">
									<div class="error" id="password_error"><?php echo form_error('payment_limit')?></div>
								</div>
								
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Hạn Nhập</label>
									<div class="form-group">
										<input type="date"  style="width:100%" name="expiration_date" required>
									</div>
								</div>
								<div class="form-group">
									<label>Mô Tả</label>
									<textarea name="description" class="form-control"></textarea>
								</div>
								<div class="form-group">
									<label>Trạng Thái</label>
									<select name="status" class="form-control" style="width:235px">
										<option value="1">Có Hiệu Lực</option>
										<option value="0">Không Có Hiệu Lực</option>
									</select>
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
	<!-- /.coupon -->
</div><!-- /.coupon-wrapper -->
