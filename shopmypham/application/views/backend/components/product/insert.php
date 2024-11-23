<?php echo form_open_multipart('admin/product/insert'); ?>
<div class="content-wrapper">
	<form action="<?php echo base_url() ?>admin/product/insert.html" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
		<section class="content-header">
			<h1><i class="glyphicon glyphicon-cd"></i> Thêm sản phẩm mới</h1>
			<div class="breadcrumb">
				<button type = "submit" class="btn btn-primary btn-sm">
					<span class="glyphicon glyphicon-floppy-save"></span>
					Lưu[Thêm]
				</button>
				<a class="btn btn-primary btn-sm" href="admin/product" role="button">
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
							<?php //echo validation_errors(); ?>
								<div class="form-group">
									<label>Tên Sản Phẩm <span class = "maudo">(*)</span></label>
									<input type="text" class="form-control" name="name" style="width:100%" placeholder="Tên Sản Phẩm...">
									<div class="error" id="password_error"><?php echo form_error('name')?></div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="col-md-6" style="padding-left: 0px;">
										<div class="form-group">
									<label>Loại Sản Phẩm <span class = "maudo">(*)</span></label>
									<select name="catid" class="form-control">
										<option value = "">[--Chọn Loại Sản Phẩm--]</option>
											<?php  
												$list=$this->Mcategory->category_list();
												$option_parentid="";
												foreach ($list as $r) {
													$option_parentid.="<option value='".$r['id']."'>".$r['name']."</option>";
												}
												echo $option_parentid;
											?>
									</select>
									<div class="error" id="password_error"><?php echo form_error('catid')?></div>
								</div>
									</div>
									<div class="col-md-6" style="padding-right: 0px;">
								<div class="form-group">
									<label>Nhà Cung Cấp <span class = "maudo">(*)</span></label>
									<select name="producer" class="form-control">
										<option value = "">[--Chọn Nhà Cung Cấp--]</option>
											<?php  
												$list=$this->Mproducer->producer_list();
												$option_parentid="";
												foreach ($list as $r) {
													$option_parentid.="<option value='".$r['id']."'>".$r['name']."</option>";
												}
												echo $option_parentid;
											?>
									</select>
									<div class="error" id="password_error"><?php echo form_error('producer')?></div>
								</div>
							</div>
								</div>
									</div>
								<div class="form-group">
									<label>Mô Tả</label>
									<textarea name="sortDesc" class="form-control" ></textarea>
								</div>
								<div class="form-group">
									<label>Chi Tiết Sản Phẩm</label>
									<textarea name="detail" id="detail" class="form-control" ></textarea>
      								<script>CKEDITOR.replace('detail');</script>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Giá Gốc</label>
									<input name="price_root" class="form-control" type="number" value="0" min="0" step="1" max="1000000000">
								</div>
								<div class="form-group">
									<label>Khuyến Mãi (%)</label>
									<input name="sale_of" class="form-control" type="number">
								</div>
								<div class="form-group">
									<label>Giá Bán</label>
									<input name="price_buy" class="form-control" type="number" value="0" min="0" step="1" max="1000000000">
									<div class="error" id="password_error"><?php echo form_error('price_buy')?></div>
								</div>
								<div class="form-group">
									<label>Số Lượng</label>
									<input name="number" class="form-control" type="number" value="1" min="1" step="1" max="1000">
								</div>
								<div class="form-group">
                                    <label>Hình Đại Diện</label>
                                    <input type="file"  id="image_list" name="img" required style="width: 100%">
                                </div>
								<div class="form-group">
									<label>Hình Ảnh Sản Phẩm</label>
									<input type="file"  id="image_list" name="image_list[]" multiple required>
								</div>
								<div class="form-group">
									<label>Trạng Thái</label>
									<select name="status" class="form-control">
										<option value="1">Kinh Doanh</option>
										<option value="0">Chưa Kinh Doanh</option>
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
</div>