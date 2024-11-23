<?php 
	$user = $this->session->userdata('sessionKhachHang');
?>
<?php echo form_open( base_url()."lien-he"); ?>
<style>
	.btn-update-order{
		background: #0f9ed8; 
		color: white;
	}
	.btn-update-order:hover{
		background: #00b5ff;
	}
</style>
<section>
	<div class="container">
		<div class="col-md-7 col-12">
			<div class="section-article contactpage" style="  padding-left: 20px;">
				<form accept-charset="UTF-8" action="<?php echo base_url() ?>lien-he" id="contact" method="post">
					<input name="FormType" type="hidden" value="contact">
					<input name="utf8" type="hidden" value="true">
					<h1 style="color: black">LIÊN HỆ VỚI CHÚNG TÔI</h1>				
					<hr style="border-top: 1px solid #eeeeee;">
					<div class="form-comment">
						<div class="row" style="padding-left: 14px;">
							<div class="col-md-4 col-12">
								<div class="form-group" style="width: 200px;">
									<label for="name"><em> Họ Tên </em><span class="required">*</span></label>
									<?php if($this->session->userdata('sessionKhachHang')){ ?>
										<input id="name" name="fullname" type="text" value="<?php echo $user['fullname']; ?>" class="form-control">
									<?php }else{  ?>
										<input id="name" name="fullname" type="text" value="" class="form-control">
									<?php } ?>
								</div>
							</div>
							<div class="col-md-4 col-12">
								<div class="form-group" style="width: 200px;">
									<label for="email"><em> Email </em><span class="required">*</span></label>
									<?php if($this->session->userdata('sessionKhachHang')){ ?>
										<input id="email" name="email" class="form-control" type="email" value="<?php echo $user['email']; ?>">
									<?php }else{  ?>
										<input id="email" name="email" class="form-control" type="email" value="">
									<?php } ?>
								</div>
							</div>
							<div class="col-md-4 col-12">
								<div class="form-group" style="width: 200px;">
									<label for="phone"><em> Số Điện Thoại </em><span class="required">*</span></label>
									<?php if($this->session->userdata('sessionKhachHang')){ ?>
										<input type="number" id="phone" class="form-control" name="phone" value="<?php echo $user['phone']; ?>">
									<?php }else{  ?>
										<input type="number" id="phone" class="form-control" name="phone">
									<?php } ?>
									
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="message"><em> Tiêu Đề </em><span class="required">*</span></label>
							<textarea id="message" name="title" class="form-control custom-control tieude" rows="2"></textarea>
							<div class="error" id="error_tieude"></div>
						</div>
						<div class="form-group">
							<label for="message"><em> Nội Dung </em><span class="required">*</span></label>
							<textarea id="message" name="content" class="form-control custom-control loinhan" rows="5"></textarea>
							<div class="error" id="error_loinhan"></div>
						</div>
						<button type="submit" class="btn-update-order">Gửi Nhận Xét</button>

					</div>
				</form>
			</div>
		</div>
		<div class="col-md-4 col-12">
			<div class="f-contact" style="
			padding-left: 32px;
			">
			<h1 style="color: black">THÔNG TIN LIÊN HỆ</h1>
			<hr style="border-top: 1px solid #eeeeee;">
			<ul class="list-unstyled">
				<li class="clearfix">
					<i class="fa fa-map-marker fa-1x" style="color:#0f9ed8; padding: 20px; "></i>
					<span style="color: black;"> ĐH11C8 - NHÓM 8 </span><br>
				</li>
				<li class="clearfix">
					<i class="fa fa-phone fa-1x" style="color:#0f9ed8;padding: 20px;  "></i>
					<span style="color: black">0981.794.519 - 0559.332.519</span>
				</li>
				<li class="clearfix">
					<i class="fa fa-envelope fa-1x " style="color:#0f9ed8; padding: 20px; "></i>
					<span style="color: black"><a href="mailto:tratrinh19623@gmail.com">tratrinh19623@gmail.com</a></span>
				</li>
			</ul>
		</div>

	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$(".btn-update-order").click(function(e){
			var TieuDe = $(".tieude").val()
			var LoiNhan = $(".loinhan").val()

			if(TieuDe == "" && LoiNhan == ""){
				e.preventDefault()
				$("#error_tieude").html('<p>Tiêu Đề Không Được Để Trống !</p>')
				$("#error_loinhan").html('<p>Nội Dung Không Được Để Trống !</p>')
				return
			}

			if(TieuDe == ""){
				e.preventDefault()
				$("#error_tieude").html('<p>Tiêu Đề Không Được Để Trống !</p>')
			}

			if(LoiNhan == ""){
				e.preventDefault()
				$("#error_loinhan").html('<p>Nội Dung Không Được Để Trống !</p>')
			}

			if (TieuDe.split(' ').length > 100){
				e.preventDefault()
				$("#error_tieude").html('<p>Tiêu Đề Không Quá 100 Từ!</p>')
			}

			if (LoiNhan.split(' ').length > 500){
				e.preventDefault()
				$("#error_loinhan").html('<p>Nội Dung Không Quá 500 Từ!</p>')
			}
		})
	});
</script>
</section>