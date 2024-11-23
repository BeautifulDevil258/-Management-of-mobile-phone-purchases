<?php echo form_open_multipart('admin/product/import/'.$row['id']); ?>
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
?>
<div class="content-wrapper">
	<form action="<?php echo base_url() ?>admin/product/import.html" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
		<section class="content-header">
			<h1><i class="glyphicon glyphicon-text-background"></i> NHẬP HÀNG</h1>
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
									<div class="form-group">
									<label>Tên Sản Phẩm </label>
									<input type="text" class="form-control" disabled name="name" style="width:100%" placeholder="Tên Sản Phẩm" value="<?php echo $row['name'] ?>" >
									<div class="error" id="password_error"><?php echo form_error('name')?></div>
								</div>
								<div class="form-group">
									<label>Loại Sản Phẩm</label>
									<select name="catid" class="form-control" style="width:300px" disabled>
										<option value = "">[--Chọn Loại Sản Phẩm--]</option>
											<?php  
												echo $option_parentid;
											?>
									</select>
									<div class="error" id="password_error"><?php echo form_error('catid')?></div>
								</div>
								<div class="form-group">
									<div class="form-group">
									<label>Tổng Số Lượng Đã Nhập</label>
									<input type="number" class="form-control" name="number" placeholder="Số lượng" min="0" max="10000" value="<?php echo $row['number'] ?>" disabled>
								</div>
								<div class="form-group">
									<div class="form-group">
									<label>Số Lượng Sản Phẩm Đã Bán</label>
									<input type="number" class="form-control" name="number" placeholder="Số lượng" min="0" max="10000" value="<?php echo $row['number_buy'] ?>" disabled>
								</div>
								<div class="form-group">
									<div class="form-group">
									<label>Số Lượng Còn Của Cửa Hàng</label>
									<input type="number" class="form-control" name="number" placeholder="Số lượng" min="0" max="10000" value="<?php echo $row['number']-$row['number_buy'] ?>" disabled>
								</div>
								<div class="form-group">
									<div class="form-group">
									<label>Nhập Số Lượng Nhập Thêm<span class = "maudo">(*)</span></label>
									<input type="number" class="form-control" name="number" style="width:100%" placeholder="Số lượng" min="0" max="10000">

									<div class="error" id="password_error"><?php echo form_error('number')?></div>
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