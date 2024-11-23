<?php echo form_open_multipart('admin/configuration/update/'); ?>
<div class="content-wrapper">
	<form action="<?php echo base_url() ?>admin/configuration/update.html" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
		<section class="content-header">
			<h1><i class="glyphicon glyphicon-text-background"></i> HỆ THỐNG </h1>
			<div class="breadcrumb">
				<button type = "submit" class="btn btn-primary btn-sm">
					<span class="glyphicon glyphicon-floppy-save"></span>
					Lưu
				</button>
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
									<div class="form-group">
										<label> Mail SMTP<span class = "maudo">(*)</span></label>
										<input type="email" class="form-control" name="mail_smtp" style="width:100%" placeholder="Mail cấu hình" value="<?php echo $row['mail_smtp'] ?>">
									</div>
									<div class="form-group">
										<label>Password Mail SMTP</label>
										<input type="password" class="form-control" name="mail_smtp_password" style="width:100%" placeholder=" Password Mail cấu hình" value="<?php echo $row['mail_smtp_password'] ?>">
									</div>
									<div class="form-group">
										<label>Email ADMIN</label>
										<input type="text" class="form-control" name="mail_noreply" style="width:100%" placeholder="Mail nhận thông tin đơn hàng" value="<?php echo $row['mail_noreply'] ?>">
									</div>
									<div class="form-group">
										<label> Phí Ship <span class = "maudo">(*)</span></label>
										<input type="number" class="form-control" name="priceShip" style="width:100%" placeholder=" priceShip" value="<?php echo $row['priceShip'] ?>">

									</div>
									<div class="form-group">
										<label> Tiêu Đề Web <span class = "maudo">(*)</span></label>
										<input type="text" class="form-control" name="title" style="width:100%" placeholder=" title" value="<?php echo $row['title'] ?>">

									</div>
									<div class="form-group">
										<label> Mô Tả <span class = "maudo">(*)</span></label>
										<input type="text" class="form-control" name="description" style="width:100%" placeholder=" description" value="<?php echo $row['description'] ?>">
									</div>
								</div>
							</div>
							<div class="col-md-3">
								
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