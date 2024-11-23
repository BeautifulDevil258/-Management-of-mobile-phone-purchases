<?php echo form_open_multipart('admin/coupon/update/'.$row['id']); ?>
<div class="content-wrapper">
	<form action="<?php echo base_url() ?>admin/coupon/update.html" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
		<section class="content-header">
			<h1><i class="glyphicon glyphicon-text-background"></i> CẬP NHẬT MÃ GIẢM GIÁ</h1>
			<div class="breadcrumb">
				<button type = "submit" class="btn btn-primary btn-sm">
					<span class="glyphicon glyphicon-floppy-save"></span>
					Lưu[Cập Nhật]
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
									<input type="text" class="form-control" name="code" style="width:100%" placeholder="Mã Giảm Giá" value="<?php echo $row['code'] ?>">
									<div class="error" id="password_error"><?php echo form_error('code')?></div>
								</div>
								<div class="form-group">
									<label>Số Tiền Giảm Giá</label>
									<input type="number" class="form-control" name="discount" style="width:100%" placeholder="Số Tiền Giảm Giá" value="<?php echo $row['discount'] ?>">
									<div class="error" id="password_error"><?php echo form_error('discount')?></div>
								</div>
								<div class="form-group">
									<label>Số Lần Nhập Giới Hạn</label>
									<input type="number" class="form-control" name="limit_number" style="width:100%" placeholder="Số Lần Nhập Giới Hạn" value="<?php echo $row['limit_number'] ?>">
									<div class="error" id="password_error"><?php echo form_error('limit_number')?></div>
								</div>
								<div class="form-group">
									<label>Số Lần Đã Nhập</label>
									<input type="number" class="form-control" name="number_used" style="width:100%" value="<?php echo $row['number_used'] ?>" disabled>
									<div class="error" id="password_error"><?php echo form_error('number_used')?></div>
								</div>
								<div class="form-group">
									<?php $number_rest = $row['limit_number'] - $row['number_used']
									?>
									<label>Số Lần Còn Lại</label>
									<input type="text" class="form-control" style="width:100%" placeholder="Số Lần Nhập Giới Hạn" value="<?php echo  $number_rest ?>" disabled>
								</div>
								
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Áp Dụng Đơn Hàng Có Giá Trị Từ</label>
									<input type="number" class="form-control" name="payment_limit" style="width:100%" placeholder="Áp Dụng Đơn Hàng Có Giá Trị Từ" value="<?php echo $row['payment_limit'] ?>">
								</div>
								<div class="form-group">
									<label>Hạn Nhập</label>
									<input type="text" class="form-control" name="expiration_date" style="width:100%" placeholder="Hạn Nhập" value="<?php echo $row['expiration_date'] ?>">
								</div>
								<div class="form-group">
									<label>Mô Tả</label>
									<textarea name="description" class="form-control" value=""><?php echo $row['description'] ?></textarea>
								</div>
								<div class="form-group">
									<label>Trạng Thái</label>
									<select name="status" class="form-control">
										<option value="1" <?php if($row['status'] == 1) {echo 'selected';}?> >Có Hiệu Lực</option>
										<option value="0" <?php if($row['status'] == 0) {echo 'selected';}?>>Hết Hiệu Lực</option>
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