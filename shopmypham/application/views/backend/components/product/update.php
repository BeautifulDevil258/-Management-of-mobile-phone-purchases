<?php echo form_open_multipart('admin/product/update/'.$row['id']); ?>
<?php  
$list=$this->Mcategory->category_list();
$option_parentid="";
foreach ($list as $r) {
	if($r['id']==$row['catid']){
		$option_parentid.="<option selected value='".$r['id']."'>".$r['name']."</option>";
	}else{
		$option_parentid.="<option value='".$r['id']."'>".$r['name']."</option>";
	}
}
$listProducer=$this->Mproducer->producer_list();
$option="";
foreach ($listProducer as $r) {
	if($r['id']==$row['producer']){
		$option.="<option selected value='".$r['id']."'>".$r['name']."</option>";
	}else{
		$option.="<option value='".$r['id']."'>".$r['name']."</option>";
	}
}
?>
<div class="content-wrapper">
	<form action="<?php echo base_url() ?>admin/product/update.html" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
		<section class="content-header">
			<h1><i class="glyphicon glyphicon-cd"></i> CẬP NHẬT SẢN PHẨM</h1>
			<div class="breadcrumb">
				<button type = "submit" class="btn btn-primary btn-sm">
					<span class="glyphicon glyphicon-floppy-save"></span>
					Lưu[Cập Nhật]
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
								<div class="form-group">
									<label>Tên Sản Phẩm <span class = "maudo">(*)</span></label>
									<input type="text" class="form-control" name="name" style="width:100%" placeholder="Tên Sản Phẩm..." value="<?php echo $row['name'] ?>">
									<div class="error" id="password_error"><?php echo form_error('name')?></div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="col-md-6" style="padding-left: 0px;">
											<div class="form-group">
												<label>Loại Sản Phẩm <span class = "maudo">(*)</span></label>
												<select name="catid" class="form-control">
													<option value = "">[--Chọn Loại Sản Phẩm--]</option>
													<!-- <option value = "0">Không Có</option> -->
													<?php  
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
													<?php echo $option;?>
												</select>
												<div class="error" id="password_error"><?php echo form_error('catid')?></div>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Mô Tả </label>
									<textarea name="sortDesc" class="form-control" ><?php echo $row['sortDesc'] ?></textarea>
								</div>
								<div class="form-group">
									<label>Chi Tiết Sản Phẩm</label>
									<textarea name="detail" id="detail" class="form-control"><?php echo $row['detail'] ?></textarea>
									<script>CKEDITOR.replace('detail');</script>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Giá Gốc</label>
									<input name="price_root" class="form-control" type="number" value="<?php echo $row['price'] ?>" min="0" step="10000" max="1000000000">
								</div>
								<div class="form-group">
									<label>Khuyến Mãi (%)</label>
									<input name="sale_of" class="form-control" type="number" value="<?php echo $row['sale'] ?>">
								</div>
								<div class="form-group">
									<label>Giá Bán</label>
									<input name="price_buy" class="form-control" type="number" value="<?php echo $row['price_sale'] ?>" min="0" step="10000" max="1000000000">
									<div class="error" id="password_error"><?php echo form_error('price_buy')?></div>
								</div>
								<div class="form-group">
									<label>Số Lượng Tồn Kho</label>
									<input name="number" class="form-control" type="number" value="<?php echo $row['number'] - $row['number_buy'] ?>" min="1" step="1" max="1000">
								</div>
								<div class="form-group">
									<label>Số Lượng Đã Bán</label>
									<input name="number" class="form-control" type="number" value="<?php echo $row['number_buy'] ?>" min="1" step="1" max="1000" disabled>
								</div>
								<div class="form-group">
									<label>Trạng Thái</label>
									<select name="status" class="form-control">
										<option value="1" <?php if($row['status'] == 1) {echo 'selected';}?> >Đang Kinh Doanh</option>
										<option value="0" <?php if($row['status'] == 0) {echo 'selected';}?>>Ngừng Kinh Doanh</option>
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