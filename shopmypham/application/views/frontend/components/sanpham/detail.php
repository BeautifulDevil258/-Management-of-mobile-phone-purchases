<section id="product-detail">
	<div class="container">
		<div class="products-wrap">
			<form action="" method="post" id="ProductDetailsForm">
				<?php if ($row) : ?>
					<div class="breadcrumbs">
						<ul>
							<li class="home">
								<a href="trang-chu" title="Go to Home Page">Trang Chủ</a>
								<i class="fa fa-angle-right"></i>
							</li>
							<li class="category3">
								<a href="<?php echo base_url() ?>/san-pham/<?php $link = $this->Mcategory->category_link($row['catid']);
																			echo $link; ?>" title=""><?php $name = $this->Mcategory->category_name($row['catid']);
																																								echo $name; ?></a>
								<i class="fa fa-angle-right"></i>
							</li>
							<li class="product"><?php echo $row['name'] ?></li>
						</ul>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 listimg-desc-product">
						<?php $this->load->view('frontend/modules/jcarousel'); ?>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<div class="product-view-content">
							<div class="product-view-name">
								<h1><?php echo $row['name'] ?></h1>
							</div>
							<div class="product-view-price">
								<div class="pull-left">
									<span class="price-label">Giá Bán:</span>
									<span class="price"><?php echo number_format($row['price_sale']) ?>₫</span>
								</div>
								<?php if ($row['price_sale'] > 0 && $row['sale'] > 0) : ?>
									<div class="product-view-price-old">
										<span class="price"><?php echo $row['price'] ?>₫</span>
										<span class="sale-flag">-<?php echo $row['sale'] ?>%</span>
									</div>
								<?php endif; ?>
							</div>
							<div class="product-status">
								<p style=" float: left;margin-right: 10px;">Thương Hiệu: <?php $name = $this->Mcategory->category_name($row['catid']);
																							echo $name; ?></p>
								<p>| Tình Trạng: <?php if ($row['number'] - $row['number_buy'] == 0 || $row['status'] == 0) echo 'Hết Hàng';
													else echo 'Còn Hàng' ?></p>
							</div>
							<div class="product-view-desc">
								<h4>Mô Tả:</h4>
								<p><?php echo $row['sortDesc'] ?></p>
							</div>
							<div class="actions-qty">
								<?php
								if ($row['number'] - $row['number_buy'] == 0 || $row['status'] == 0) {
									echo '<h2 style="color:red;">Ngừng Kinh Doanh</h2>';
								} else {
									echo '<div class="actions-qty__button">
									<button class="button btn-cart add_to_cart_detail detail-button" title="Mua Ngay" type="button" aria-label="Mua Ngay" class="fa fa-shopping-cart" onclick="onAddCart(' . $row['id'] . ')"> Thêm Vào Giỏ</button>
								</div>';
								}
								?>
							</div>
							<div class="fk-boxs" id="km-all" data-comt="False">
								<div id="km-detail">
									<p class="fk-tit">Khuyến Mại Đặc Biệt (SL Có Hạn)</p>
									<div class="fk-main">
										<div class="fk-sales">
											</ul>
											<ul>
												<li>- Tặng Bộ Quà Tặng Trị Giá Tới 600.000VNĐ ( Khi Phiếu Mua Hàng Trên 5.000.000VNĐ )</li>
											</ul>
											<ul>
												<li>- Giảm 100.000VNĐ Cho Những Khách Hàng Lần Đầu Mua Hàng <a href="#" target="_blank"></a>
												</li>
											</ul>
											<ul>
												<li>- Giảm Thêm 200.000VNĐ Cho Những Khách Hàng Thân Thiết <a href="#" target="_blank"></a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<script>
								function copyToClipboard(element) {
									var $temp = $("<input>");
									$("body").append($temp);
									$temp.val($(element).text()).select();	
									document.execCommand("copy");
									alert("Đã Sao Chép Mã Giảm Giá Thành Công!");
									$temp.remove();	
									
									
								}
							
								
							</script>

							<div style="margin-top: 20px;">
								<b>NHẬP MÃ: </b> <b id="m1" style="color:red">NOV</b> <button onclick="copyToClipboard('#m1')" style="background-color:red;color:#fff;border: none;padding: 2px 15px;margin-bottom: 3px;border-radius: 99999px !important;"> Sao Chép </button>
								<br>
								<span>Mã Giảm Thêm 50.000VNĐ Cho Mọi Đơn Hàng Từ 0đ Tối Đa 50K Áp Dụng Với Một Số Sản Phẩm Nhất Định</span>
							</div>
							<div style="margin-top: 20px;">
								<b>NHẬP MÃ: </b> <b id="m2" style="color:red">TEADZQUA</b> <button onclick="copyToClipboard('#m2')" style="background-color:red;color:#fff;border: none;padding: 2px 15px;margin-bottom: 3px;border-radius: 99999px !important;"> Sao Chép </button>
								<br>
								<span>Mã Giảm Thêm 100.000VNĐ Cho Mọi Đơn Hàng Áp Dụng Với Một Số Sản Phẩm Nhất Định</span></div>
						</div>
					</div>
					<div class="product-v-desc col-md-10 col-12 col-xs-12">
						<h3>ĐẶC ĐIỂM NỔI BẬT</h3>
						<?php echo $row['detail'] ?>
					</div>
					<div class="product-comment product-v-desc">
						<h3>Bình Luận</h3>
						<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">

							<div class="fb-comments" data-href="<?php echo base_url() ?><?php echo $row['alias'] ?>" data-numposts="5"></div>
						</div>
					</div>
					<div class="product-comment product-v-desc product">
						<h3>Sản Phẩm Liên Quan</h3>
						<?php
						$list_spcungloai = $this->Mproduct->product_cungloai($row['catid'], $row['id'], 5); ?>
						<?php
						if (count($list_spcungloai) > 0) : ?>
							<div class="product-container">
								<div class="owl-carousel-product owl-carousel owl-theme">
									<?php foreach ($list_spcungloai as $sp) : ?>
										<div class="item">
											<div class="product-lt">
												<div class="lt-product-group-image">
													<a href="<?php echo $sp['alias'] ?>" title="<?php echo $sp['name'] ?>">
														<img class="img-p" src="public/images/products/<?php echo $sp['avatar'] ?>" alt="">
													</a>

													<?php if ($sp['sale'] > 0) : ?>
														<div class="giam-percent">
															<span class="text-giam-percent">Giảm <?php echo $sp['sale'] ?>%</span>
														</div>
													<?php endif; ?>
												</div>

												<div class="lt-product-group-info">
													<a href="<?php echo $sp['alias'] ?>" title="<?php echo $sp['name'] ?>" style="text-align: left;">
														<h3><?php echo $sp['name'] ?></h3>
													</a>
													<div class="price-box">
														<?php if ($sp['sale'] > 0) : ?>

															<p class="old-price">
																<span class="price"><?php echo (number_format($sp['price'])); ?>₫</span>
															</p>
															<p class="special-price">
																<span class="price"><?php echo (number_format($sp['price_sale'])); ?>₫</span>
															</p>
														<?php else : ?>
															<p class="old-price">
																<span class="price" style="color: #fff"><?php echo (number_format($sp['price'])); ?>₫</span>
															</p>
															<p class="special-price">
																<span class="price"><?php echo (number_format($sp['price'])); ?>₫</span>
															</p>
														<?php endif; ?>
													</div>
													<div class="clear"></div>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							<?php else : ?>
								<h4>Chưa Có Sản Phẩm Cùng Loại</h4>
							<?php endif; ?>
							</div>
						<?php endif; ?>
			</form>

		</div>
	</div>
</section>
<script>
	function onAddCart(id) {
		var strurl = "<?php echo base_url(); ?>" + '/sanpham/addcart';
		jQuery.ajax({
			url: strurl,
			type: 'POST',
			dataType: 'json',
			data: {
				id: id
			},
			success: function(data) {
				document.location.reload(true);
				alert('Thêm Sản Phẩm Vào Giỏ Hàng Thành Công!');
			}
		});
	}
</script>