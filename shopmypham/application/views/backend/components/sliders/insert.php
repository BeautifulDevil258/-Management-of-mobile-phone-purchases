<?php echo form_open_multipart('admin/sliders/insert'); ?>
<div class="content-wrapper" style="min-height: 454px;">
    <form action="<?php echo base_url() ?>admin/sliders/insert.html" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <section class="content-header">
            <h1><i class="glyphicon glyphicon-picture"></i> THÊM SLIDERS</h1>
            <div class="breadcrumb">
                <button name="THEM_NEW" type="submit" class="btn btn-primary btn-sm">
                    <span class="glyphicon glyphicon-floppy-save"></span> Lưu[Thêm]
                </button>
                <a class="btn btn-primary btn-sm" href="admin/sliders" role="button">
                    <span class="glyphicon glyphicon-remove"></span> Thoát
                </a>
            </div>
        </section>
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="col-md-9">
                            <!--ND-->
                            <div class="form-group">
                                <label>Tên Sliders<span class = "maudo">(*)</span></label>
                                <input type="text" name="name" placeholder="Tên Sliders" class="form-control">
                                <div class="error" id="password_error"><?php echo form_error('name')?></div>
                            </div>
                            <!--/.ND-->
                        </div>
                        <div class="col-md-3">
                                
                            <div class="form-group">
                                <label>Hình Ảnh <span class = "maudo">(*)</span></label>
                                <input type="file" name="img" class="form-control" required="">
                                <div class="error" id="password_error"><?php echo form_error('img')?></div>
                            </div>
                            <div class="form-group">
                                <label>Trạng Thái </label>
                                <select name="status" class="form-control">
                                    <option value="1">Đang Chạy</option>
                                    <option value="0">Chưa Chạy</option>
                                </select>
                            </div>
                            </div>
                    </div>
                </div><!-- /.box -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </form>         
</div>