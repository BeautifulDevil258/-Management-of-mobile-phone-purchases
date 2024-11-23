<div class="content-wrapper" style="min-height: 564px;">
	<section class="content-header">
		<h1><i class="glyphicon glyphicon-shopping-cart"></i> CHI TIẾT ĐƠN HÀNG</h1>
		<div class="breadcrumb">
			<a class="btn btn-primary btn-sm" href="admin/orders" role="button">
				<span class="glyphicon glyphicon-trash"></span> Thoát
			</a>
		</div>
	</section>
	<section class="content">
		<!-- Info boxes -->
		<div class="row">
			<div class="col-md-12">
				<div class="box">
					<div class="box-body">
						<!--ND-->
						<div id="view">
							<form action="admin/orders/detail/<?php echo $id; ?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
								<?php

								$order = $this->Morders->orders_detail($id);
								$customer = $this->Mcustomer->customer_detail($order['customerid']);
								$data = $this->Morderdetail->orderdetail_orderid($id);
								?>
								<h1 class="text-center" style="color: red;">CHI TIẾT ĐƠN HÀNG</h1>
								<h4>Tên Khách Hàng: <b><?php echo $order['fullname']; ?></b></h4>
								<h4>Điện Thoại: <i> <?php echo $order['phone']; ?> </i> </h4>
								<h4>Thời gian đặt hàng: <i> Ngày <?php echo $order['orderdate']; ?></i></h4>
								<h4>Địa chỉ: <?php echo $order['address']; ?>,
									<?php echo $this->Mdistrict->district_name($order['district']); ?>,
									<?php echo $this->Mprovince->province_name($order['province']); ?>
								</h4>
								<h4>Mã đơn hàng: <b><?php echo $order['orderCode']; ?></b></h4>
								<br />
								<div class="table-responsive">
									<table class="table table-hover table-bordered">
										<thead>
											<tr>
												<th class="text-center">STT</th>
												<th>Tên Sản Phẩm</th>
												<th class="text-center" style="width:100px">Số Lượng</th>
												<th style="width:120px">Giá Bán</th>
												<th class="text-right" style="width:120px">Thành Tiền</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$stt = 0; $total = 0;
											foreach ($data as $row) :
												$product = $this->Mproduct->product_detail($row['productid']);												?>
												<tr>
													<td class="text-center"><?php $stt += 1; echo $stt; ?></td>
													<td><?php echo $product['name']; ?></td>
													<td class="text-center"><?php echo $row['count']; ?></td>
													<td><?php echo number_format($row['price']); ?>₫</td>
													<td class="text-right">
														<?php 
														$price = $row['price'] * $row['count'];
														echo number_format($price);
														$total += $price;
														$price_ship= $order['price_ship'];;
														$coupon = $order['coupon'];
														?>₫
													</td>
												</tr>
											<?php endforeach; ?>
											<tr>
												<td colspan="6" class="text-right" style="border: none; font-size: 1.1em;">Tổng Cộng: <?php echo number_format($total); ?>₫</td>
											</tr>
											<?php 
											if($coupon != 0)
											{
												echo '<tr>
												<td colspan="6" class="text-right" style="border: none; font-size: 1.1em;">Voucher giảm giá : '.number_format($coupon).'₫</td>
											</tr>';
											}
											?>
											<tr>
												<td colspan="6" class="text-right" style="border: none; font-size: 0.9em;">Phí Vận Chuyển:
													<?php echo number_format($price_ship); ?>₫
												</td>
											</tr>
											<tr>
												<td colspan="6" class="text-right" style="border: none; color: red; font-size: 1.3em;">Thành Tiền: <?php echo number_format($total+$price_ship-$coupon);?>₫</td>
											</tr>
											
											<tr>
												<td class="text-right" colspan="6">
													<a class="btn btn-primary btn-md" role="button" onclick="window.print()">
														<span class="glyphicon glyphicon-print"></span> In Đơn Hàng
													</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="row">
									<div class="col-md-12 text-right">
										<ul class="pagination">
										</ul>
									</div>
								</div>
							</form>                    
						</div>
						<!--/.ND-->
					</div>
				</div><!-- /.box -->
			</div><!-- /.col -->
		</div><!-- /.row -->
	</section><!-- /.content -->	      	
</div>