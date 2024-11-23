<?php echo form_open_multipart('admin/content/update/'.$row['id']); ?>
<div class="content-wrapper">
	<form action="<?php echo base_url() ?>admin/content/update.html" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
		<section class="content-header">
			<h1><i class="glyphicon glyphicon-text-background"></i> CẬP NHẬT BÀI VIẾT</h1>
			<div class="breadcrumb">
				<button type = "submit" class="btn btn-primary btn-sm">
					<span class="glyphicon glyphicon-floppy-save"></span>
					Lưu[Cập nhật]
				</button>
				<a class="btn btn-primary btn-sm" href="admin/content" role="button">
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
								<div class="form-group">
									<label>Tiêu Đề Bài Viết</label>
									<input type="text" class="form-control" name="name" style="width:100%" placeholder="Tiêu Đề Bài Viết" value="<?php echo $row['title'] ?>">
									<div class="error" id="password_error"><?php echo form_error('name')?></div>
								</div>
								<div class="form-group">
									<label>Mô Tả</label>
									<textarea name="introtext" class="form-control" ><?php echo $row['introtext'] ?></textarea>
								</div>
								<div class="form-group">
									<label>Chi Tiết Bài Viết <span class = "maudo">(*)</span></label>
									<textarea name="fulltext" id="fulltext" class="form-control"><?php echo $row['fulltext'] ?></textarea>
      								<script>CKEDITOR.replace('fulltext');</script>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
                                    <label>Hình Đại Diện</label>
                                    <input type="file" id="image_list" name="img">
                                </div>
								<div class="form-group">
									<label>Trạng Thái</label>
									<select name="status" class="form-control">
										<option value="1" <?php if($row['status'] == 1) {echo 'selected';}?> >Công Khai</option>
										<option value="0" <?php if($row['status'] == 0) {echo 'selected';}?>>Riêng Tư</option>
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
<!-- /.content -->
</div><!-- /.content-wrapper -->