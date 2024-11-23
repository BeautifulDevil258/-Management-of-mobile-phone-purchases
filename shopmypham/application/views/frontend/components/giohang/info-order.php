<?php echo form_open('info-order'); ?>
<?php  

if(!$this->session->userdata('sessionKhachHang')){
    redirect('dang-nhap');
}

if(!$this->session->userdata('cart')){
    redirect('gio-hang');
}else{
    $user=$this->session->userdata('sessionKhachHang');
}
?> 
<section id="checkout-cart">
    <div class="container">
        <div class="col-md-12">
            <div class="wrapper overflow-hidden">
                <form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8" name='info-order' novalidate>
                   <?php
                        if(!$this->session->userdata('sessionKhachHang')){
                             echo ' <div style="font-size: 16px; padding-top: 10px; color: #ccc;">
                             Bạn Đã Có Tài Khoản? 
                             <a href="dang-nhap" style="color: ">Ấn Vào Đây Để Đăng Nhập</a>
                             </div>';
                        }
                    ?>   
                <div class="checkout-content"> 
                   <div class="col-xs-12 col-sm-12 col-md-8 col-login-checkout" style="margin-bottom: 20px">

                    <p class="text-center">VUI LÒNG NHẬP THÔNG TIN CỦA QUÝ KHÁCH</p>
                    <div class="wrap-info" style="width: 100%; min-height: 1px; overflow: hidden; padding: 10px;">
                        <table class="table tinfo" style="width: 80%;">
                            <tbody>
                                <tr>
                                    <td class="width30 text-right td-right-order">Khách Hàng: <span class="require_symbol">* </span></td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Họ và tên" name="name" value="<?php echo $user['fullname'] ?>" <?php if($this->session->userdata('sessionKhachHang')) echo'readonly'?>>
                                        <div class="error"><?php echo form_error('name')?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="width30 text-right td-right-order">Email: <span class="require_symbol">* </span></td>
                                    <td>
                                        <input type="text" class="form-control" name="<?php if($this->session->userdata('sessionKhachHang')) echo 'tv'; else echo 'email'?>" value="<?php echo $user['email'] ?>" placeholder="Email" <?php if($this->session->userdata('sessionKhachHang')) echo'readonly'?>>
                                        <div class="error"><?php echo form_error('email')?></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="width30 text-right td-right-order">Số Điện Thoại: <span class="require_symbol">* </span></td>
                                    <td>
                                        <input type="text"  class="form-control" placeholder="Số điện thoại" name="phone" value="<?php echo $user['phone'] ?>" <?php if($this->session->userdata('sessionKhachHang')) echo'readonly'?>>
                                        <div class="error"><?php echo form_error('phone')?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="width30 text-right td-right-order">Tỉnh/Thành Phố: <span class="require_symbol">* </span></td>
                                    <td>
                                        <select name="city" id="province" onchange="renderDistrict()" class="form-control next-select" >
                                            <option value="">--- Chọn Tỉnh Thành ---</option>
                                            <?php $list = $this->Mprovince->province_all();
                                            foreach($list as $row):?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="error" id="error_tinh"><?php echo form_error('city')?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="width30 text-right td-right-order">Quận/Huyện: <span class="require_symbol">* </span></td>
                                    <td>
                                        <select name="DistrictId" id="district"  class="form-control next-select">
                                            <option value="">--- Chọn Quận Huyện ---</option>
                                        </select>
                                        <div class="error" id="error_quan"><?php echo form_error('DistrictId')?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="width30 text-right td-right-order">Thôn/Xóm/Đường... : <span class="require_symbol">* </span></td>
                                    <td>
                                        <textarea id="address_dc" name="address" placeholder="Thôn/Xóm/Đường... :" class="form-control ad" rows="4"  style="height: auto !important;" value="<?php echo $user['address'] ?>"></textarea>
                                        <div class="error" id="error_diachi"><?php echo form_error('address')?></div>
                                    </td>
                                </tr>

                                <tr class="sudungma">
                                    <td class="width30 text-right td-right-order">Mã Giảm Giá (Nếu Có):</td>
                                    <td>
                                         <input id="coupon" style="border-radius: 5px; border-color: #0f9ed8;" type="text" class="form-control" placeholder="Mã Giảm Giá" name="coupon">
                                        <div class="error" id="result_coupon"></div>
                                    </td>
                                     <td colspan="1" style="border-radius: 5px; text-align: center; background: #0f9ed8;">
                                        <a class="check-coupon" title="mã giảm giá" onclick="checkCoupon()" style="color: white;font-weight: bold;">Sử Dụng</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <label for="html">Phương Thức Thanh Toán</label><br>
                                        <label style="font-weight: initial;"><input type="checkbox" checked class="ttnhanhang"> Thanh Toán Khi Nhận Hàng</label>   
                                        <label style="font-weight: initial;"><input type="checkbox" class="pay_online"> Thanh Toán Qua VNPAY</label>   
                                    </td>
                                    <td>
                                        <div class="form-group list_bank" style="display: none;">
                                            <select id="bank_code" name="bank_code" class="form-control">
                                                <option value="" hidden>Chọn Ngân Hàng</option>
                                                <option value="NCB"> Ngân Hàng NCB</option>
                                                <option value="AGRIBANK"> Ngân Hàng Agribank</option>
                                                <option value="SCB"> Ngân Hàng SCB</option>
                                                <option value="SACOMBANK">Ngân Hàng SacomBank</option>
                                                <option value="EXIMBANK"> Ngân Hàng EximBank</option>
                                                <option value="MSBANK"> Ngân Hàng MSBANK</option>
                                                <option value="NAMABANK"> Ngân Hàng NamABank</option>
                                                <option value="VNMART"> Vi dien tu VnMart</option>
                                                <option value="VIETINBANK">Ngân Hàng Vietinbank</option>
                                                <option value="VIETCOMBANK"> Ngân Hàng VCB</option>
                                                <option value="HDBANK"> Ngân Hàng HDBank</option>
                                                <option value="DONGABANK"> Ngân Hàng Dong A</option>
                                                <option value="TPBANK"> Ngân Hàng TPBank</option>
                                                <option value="OJB"> Ngân Hàng OceanBank</option>
                                                <option value="BIDV"> Ngân Hàng BIDV</option>
                                                <option value="TECHCOMBANK"> Ngân Hàng Techcombank</option>
                                                <option value="VPBANK"> Ngân Hàng VPBank</option>
                                                <option value="MBBANK"> Ngân Hàng MBBank</option>
                                                <option value="ACB"> Ngân Hàng ACB</option>
                                                <option value="OCB"> Ngân Hàng OCB</option>
                                                <option value="IVB"> Ngân Hàng IVB</option>
                                                <option value="VISA"> Thẻ VISA/MASTERCARD/JCB</option>
                                            </select>
                                            <div class="error" id="error_nganhang"></div>
                                        </div>
                                    </td>
                                </tr>
                                
                            <tr>
                                <td style="border: none;"></td>
                                <td style="border: none;"><div class="btn-checkout frame-100-1 overflow-hidden border-pri" style="float: right;">
                                    <button type="submit" style="width: 300px" class="bg-pri border-pri col-fff" id="dathang" name="dathang">Đặt Hàng</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div> 
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 products-detail">
                <div class="no-margin-table col-login-checkout" style="width: 95%;">
                    <p>THÔNG TIN ĐƠN HÀNG</p>
                    <table class="table" style="color: #333">
                        <tbody>
                            <tr class="text-transform font-weight-600">
                                
                                <td style="width: 100%;"><h4> <b>Sản Phẩm</b></h4></td>
                                <td class="text-center" style="width: 100px;"><h4><b>Số Lượng</b></h4></td>
                                <td class="text-center" style="width: 100px;"><h4><b>Giá</b></h4></td>
                                <td class="text-center" style="width: 100px;"><h4><b>Tổng</b></h4></td>
                               
                            </tr>
                            <?php if($this->session->userdata('cart')):
                                $data=$this->session->userdata('cart');
                                $money=0;
                                foreach ($data as $key => $value) :
                                    $row = $this->Mproduct->product_detail_id($key);?>
                                    <tr>
                                        <td><?php echo $row['name']; ?></td>
                                        <td class="text-center"><?php echo $value ?></td>
                                        <td>
                                            <?php
                                            if($row['price_sale'] > 0){
                                                $price_end=$row['price_sale'];
                                            }else{
                                                $price_end=$row['price'];
                                            }
                                            echo number_format($price_end).' VNĐ';
                                            ?>
                                        </td>
                                        <td style="float: left;">    
                                            <?php 
                                            $total=0;
                                            $total=$price_end*$value;
                                            $money+=$total;
                                            echo number_format($total).' VNĐ';
                                            ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <td>
                                <tr>
                                    <td colspan="3">Tổng Cộng </td>
                                    <td style="float: right;"><?php echo number_format($money)?> VNĐ</td>
                                </tr>
                            </td>
                            <tr>
                                <td colspan="3">
                                 <p style="font-size: 12px;">(Phí Vận Chuyển)</p>
                             </td>
                             <td style="float: left;"><?php echo number_format($this->Mconfig->config_price_ship()).' VNĐ'; ?> </td>
                         </tr>

                         <?php 
                         if($this->session->userdata('coupon_price')){
                            $price_coupon_money = $this->session->userdata('coupon_price');
                            $price_coupon = number_format($this->session->userdata('coupon_price'));
                            echo '
                            <td colspan="3">Voucher Giảm Giá: </td>
                            <td>
                            <p style="float:right;"> -'.$price_coupon.' VNĐ</p> 
                            <td style="    cursor: pointer;"><a onclick="removeCoupon()"><i class="fas fa-times"></i></a></td>
                            </td>
                            ';

                        }
                        ?>
                        <tr style="background: #f4f4f4">
                            <td colspan="3">
                                <p style="font-size: 17px; color: red;"> <b>Thành Tiền</b></p>
                                <span style="font-weight: 100; font-style: italic;">(Tổng Số Tiền Thanh Toán)</span>
                            </td>
                            <td class="text-center">
                                <p style="font-size: 17px; color: red;">
                                 <?php if(isset($price_coupon_money))
                                 {
                                    $money_pay = ($money + $this->Mconfig->config_price_ship()) - $price_coupon_money;
                                }
                                else{
                                    $money_pay = $money + $this->Mconfig->config_price_ship();
                                }
                                echo number_format($money_pay).' VNĐ'; ?> 
                            </p>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
<input class="form-control" id="txt_ship_fullname" name="txt_ship_fullname" type="hidden" value="<?php echo $user['fullname'] ?>" >
<input class="form-control" id="txt_ship_mobile" name="txt_ship_mobile" type="hidden" value="<?php echo $user['phone'] ?>" >
<input class="form-control" id="txt_ship_city" name="txt_ship_city" type="hidden" value="" >
<input type="hidden" name="amount" value="<?php echo $money_pay;?>" >

</form>
</div>
</div>
</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    var base_url =  window.location.origin == "http://localhost" ? window.location.origin + "/shopmypham" : window.location.origin

    function renderDistrict(){
        var provinceid=$("#province").val();
        var strurl="<?php echo base_url();?>"+'giohang/district';
        jQuery.ajax({
            url: strurl,
            type: 'POST',
            dataType: 'json',
            data: {'provinceid': provinceid},
            success: function(data) {
                $('#district').html(data);
            }
        });
    };
    function checkCoupon(){
        var code = $("input[name='coupon']").val();
        var strurl="<?php echo base_url();?>"+'giohang/coupon';
        jQuery.ajax({
            url: strurl,
            type: 'POST',
            dataType: 'json',
            data: {code: code},
            success: function(data) {
                $('#result_coupon').html(data);
            }
        });
    }
    function removeCoupon(){
        var strurl="<?php echo base_url();?>"+'/giohang/removecoupon';
        jQuery.ajax({
            url: strurl,
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                $('#result_coupon').html(data);
                document.location.reload(true);
            }
        });
    }

    $(document).ready(function(){
        $(".pay_online").click(function(){
            if($(this).prop('checked') == true){
                $('.list_bank').css('display', 'unset');
                $("#dathang").addClass("dathang");
                $('form').attr('action', base_url + '/thanh-toan/vnpay/');
                $('#dathang').attr('name', 'redirect');

                var province = $("#province").val();

                var district = $("#district").val();
                var address = $('.ad').val()

                $("#txt_ship_city").val(address + ',' + district + ',' + province);

                $('.ttnhanhang').prop('checked', false);
                $('#coupon').attr("placeholder", "Chỉ Áp Dụng Cho Thanh Toán Trực Tiếp");
                $("#coupon").prop('disabled', true);
                $(".check-coupon").remove()
                $(".sudungma").remove()
            }else{
                window.location.reload();
            }
        });
        $(".ttnhanhang").click(function(){
            if($(this).prop('checked') == true){
                window.location.reload();
            }
        });

        $("#dathang").click(function(e){
            if($(".pay_online").prop('checked') == true){
                var Tinh = $('#province').find(":selected").val()
                var Huyen = $('#district').find(":selected").val()
                var DiaChi = $('#address_dc').val()
                var NganHang = $('#bank_code').find(":selected").val()

                if(Tinh == "" && Huyen == "" && DiaChi == "" && NganHang == ""){
                    e.preventDefault()
                    $("#error_tinh").html('<p>Tỉnh Thành Không Được Để Trống !</p>')
                    $("#error_quan").html('<p>Quận Huyện Không Được Để Trống !</p>')
                    $("#error_diachi").html('<p>Địa Chỉ Thôn/Xóm/Đường Không Được Để Trống !</p>')
                    $("#error_nganhang").html('<p>Ngân Hàng Không Được Để Trống !</p>')
                    return
                }

                if(Tinh == ""){
                    e.preventDefault()
                    $("#error_tinh").html('<p>Tỉnh Thành Không Được Để Trống !</p>')
                }

                if(Huyen == ""){
                    e.preventDefault()
                    $("#error_quan").html('<p>Quận Huyện Không Được Để Trống !</p>')
                }

                if(DiaChi == ""){
                    e.preventDefault()
                    $("#error_diachi").html('<p>Địa Chỉ Thôn/Xóm/Đường Không Được Để Trống !</p>')
                }

                if(NganHang == ""){
                    e.preventDefault()
                    $("#error_nganhang").html('<p>Ngân Hàng Không Được Để Trống !</p>')
                }

            }
            
        })
    });
</script> 

<!-- error: (error) => {
                     console.log(JSON.stringify(error));
   } -->
