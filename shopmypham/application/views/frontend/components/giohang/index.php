<div class="row content-cart">
    <div class="container">
        <?php if($this->session->userdata('cart')):
			$cart = $this->session->userdata('cart');
			?>
        <form action="" method="post" id="cartformpage">
            <div class="cart-index">
                <h2> <b>CHI TIẾT GIỎ HÀNG</b></h2>
                <div class="tbody text-center">
                    <div class="col-xs-12 col-12 col-sm-12 col-md-8 col-lg-8">

                        <table class="table table-list-product">

                            <thead>
                                <tr style="background: #f3f3f3;">
                                    <th class="text-center">Hình Ảnh</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th class="text-center">Giá Tiền</th>
                                    <th class="text-center">Số lượng</th>
                                    <th class="text-center">Thành tiền</th>
                                    <th class="text-center">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($cart as $key => $value) :
										$row = $this->Mproduct->product_detail_id($key);
										?>
                                <tr>
                                    <td class="img-product-cart">
                                        <a href="<?php echo $row['alias'] ?>">
                                            <img src="public/images/products/<?php echo $row['avatar'] ?>"
                                                alt="<?php echo $row['name'] ?>">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php echo $row['alias'] ?>" class="pull-left">
                                            <?php echo $row['name'] ?>
                                        </a>
                                    </td>
                                    <td>
                                        <span class="amount">
                                            <?php 
													if($row['price_sale'] > 0){
														echo (number_format($row['price_sale'])).' VNĐ';
													}else{
														echo (number_format($row['price'])).' VNĐ';
													}
													?>
                                        </span>
                                    </td>
                                    <td >
                                        <div class="quantity clearfix">
                                            <input name="quantity" id="<?php echo $row['id'] ?>" class="form-control"
                                                type="number" value="<?php echo $value ?>" min="1" max="1000"
                                                onchange="onChangeSL(<?php echo $row['id'] ?>)">
                                        </div>
                                    </td>
                                    <td>
                                        <span class="amount" >
                                            <?php 
													if($row['price_sale'] > 0){
														echo (number_format($row['price_sale']*$value)).' VNĐ';
													}else{
														echo (number_format($row['price'] * $value)).' VNĐ';
													}
													?>
                                        </span>
                                    </td>
                                    <td>
                                        <a class="remove" title="Xóa"
                                            onclick="onRemoveProduct(<?php echo $row['id']; ?>)"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <button class="btn" onclick="window.location.href='san-pham'"> <a
                                href="<?php echo base_url() ?>san-pham">Tiếp Tục Mua Hàng</a></button>
                    </div>
                    <?php $total = 0; ?>
                    <?php foreach ($cart as $key => $value) : 
							$row = $this->Mproduct->product_detail_id($key);?>
                    <?php
							if($row['price_sale'] > 0)
								$sum = $row['price_sale'] * $value;
							else
								$sum = $row['price'] * $value;
							$total += $sum;
							?>
                    <?php endforeach; ?>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="clearfix btn-submit" style="padding-left: 10px;margin-top: 20px;">
                            <table class="table total-price" style="border: 1px solid #ececec;">
                                <tbody>
                                    <tr style="background: #f4f4f4;">
                                        <td>Tổng Tiền</td>
                                        <td><strong>
                                                <?php echo (number_format($total)).' VNĐ'; ?>
                                            </strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h5>Ưu Đãi Khi Mua Hàng Trực Tiếp Tại Cửa Hàng Giảm Giá 5%</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <h5>NẾU ĐẶT ONLINE BẠN HÃY ĐỒNG Ý VỚI ĐIỀU KHOẢN SỬ DỤNG & HƯỚNG DẪN HOÀN
                                                TRẢ.</h5>
                                        </td>
                                    </tr>

                                    <tr>

                                        <td colspan="2">
                                            <button type="button" onclick="window.location.href='info-order'"
                                                class="btn-next-checkout">
                                                <?php 
														if(!$this->session->userdata('sessionKhachHang')){
														    echo "Đăng Nhập - Đặt Hàng";
														}else{
															echo "Đặt Hàng";
														}
													?>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>

        </form>
        <?php else: ?>
        <div class="cart-info">
             <b>
             Chưa Có Sản Phẩm Nào Trong Giỏ Hàng !
             </b>
            <br>
            <button class="btn" onclick="window.location.href='san-pham'"> Tiếp Tục Mua Hàng</button>
        </div>

        <?php endif;?>
    </div>
</div>
<script>
    function onChangeSL(id) {
        var sl = document.getElementById(id).value;
        var strurl = "<?php echo base_url();?>" + '/sanpham/update';
        jQuery.ajax({
            url: strurl,
            type: 'POST',
            dataType: 'json',
            data: { id: id, sl: sl },
            success: function (data) {
                if (data) {
                    document.location.reload(true);
                } else {
                    if (data == false) {
                        alert("Số Lượng Sản Phẩm Trong Giỏ Hàng Không Được Vượt Quá Số Lượng Trong Kho!")
                    }
                    document.location.reload(true);
                }

            }
        });
    }
    function onRemoveProduct(id) {
        var strurl = "<?php echo base_url();?>" + '/sanpham/remove';
        jQuery.ajax({
            url: strurl,
            type: 'POST',
            dataType: 'json',
            data: { id: id },
            success: function (data) {
                document.location.reload(true);
                alert('Xóa Sản Phẩm Thành Công !!');
            }
        });
    }
</script>
