<html>
<body>
	<div style="color: #000;">
		<p>Xin Chào <?php echo $customer['fullname']?>,</p>
		<p>Cảm Ơn Quý Khách Đã Đặt Hàng Tại <strong>STORE MỸ PHẨM</strong>!</p>
		<p>Đơn Hàng Của Quý Khách Đã Được Tiếp Nhận, Chúng Tôi Sẽ Nhanh Chóng Liên Hệ Với Quý Khách.</p>
		<div>
			<div style="font-size:18px;padding-top:10px"><strong>THÔNG TIN KHÁCH HÀNG</strong></div>
			<table style="width:100%;">
				<tbody>
					<tr>
						<td style="border-left:1px solid #d7d7d7;border-right:1px solid #d7d7d7;border-bottom:1px solid #d7d7d7;padding:5px 10px">
							<table style="width:100%">
								<tbody>
									<tr>
										<td>Họ Và Tên: </td>
										<td><?php echo $order['fullname'] ?></td>
									</tr>
									<tr>
										<td>Email: </td>
										<td><?php echo $customer['email'] ?></td>
									</tr>
									<tr>
										<td>Số Điện Thoại: </td>
										<td><?php echo $order['phone'] ?></td>
									</tr>
									<tr>
										<td>Địa Chỉ: </td>
										<td>
											<?php echo $order['address'] ?>, <?php echo $district; ?>, <?php echo $province; ?> 
										</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div>
			<div style="font-size:18px;padding-top:10px"><strong>THÔNG TIN ĐƠN HÀNG</strong></div>
			<table>
				<tbody>
					<tr>
						<td>Mã Đơn Hàng: <strong>#<?php echo $order['orderCode'] ?></strong></td>
						<td style="padding-left:40px">Ngày Tạo: <?php echo $order['orderdate'] ?></td>
					</tr>
				</tbody>
			</table>
			<table style="width:100%;border-collapse:collapse">
				<thead>
					<tr style="border:1px solid #d7d7d7;background-color:#f8f8f8">
						<th style="text-align:left;padding:5px 10px"><strong>Sản Phẩm</strong></th>
						<th style="text-align:center;padding:5px 10px"><strong>Số Lượng</strong></th>
						<th style="text-align:center;padding:5px 10px"><strong>Đơn Giá</strong></th>
						<th style="text-align:right;padding:5px 10px"><strong>Tổng</strong></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$total = 0;
					foreach ($orderDetail as $value) :?>
						<tr style="border:1px solid #d7d7d7">
							<td><?php echo $value['name']; ?></td>
							<td style="text-align:center;padding:5px 10px"><?php echo $value['count'] ?></td>
							<td style="padding:5px 10px;text-align:center;"><?php echo number_format($value['priceorder']) ?> VNĐ</td>
							<td style="padding:5px 10px;text-align:right">
								<?php 
								$price = $value['priceorder'] * $value['count'];
								echo number_format($price);
								$total += $price;
								?>
							VNĐ</td>
						</tr>

					<?php endforeach; ?>
					<tr style="border:1px solid #d7d7d7">
						<td colspan="2">&nbsp;</td>
						<td colspan="2">
							<table style="width:100%">
								<tbody>
									<tr>
										<td><strong>Tổng Cộng: </strong></td>
										<td style="text-align:right"><?php echo  number_format($total) ?> VNĐ</td>
									</tr>
									<tr>
										<td><strong>Phí Vận Chuyển:</strong></td>
										<td style="text-align:right"><?php echo  number_format($priceShip) ?> VNĐ</td>
									</tr>
									<tr>
										<td><strong>Voucher :</strong></td>
										<td style="text-align:right">- <?php echo  number_format($coupon) ?> VNĐ</td>
									</tr>
									<tr>
										<td><strong>Thành Tiền</strong></td>
										<td style="text-align:right color: red; font-size: 19px;"><?php echo number_format($order['money']) ?> VNĐ</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<p><strong>Hình Thức Thanh Toán: </strong>Thanh Toán Khi Giao Hàng (COD)</p>
	</div>
</div>
</body>
</html>