<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>
<section id="checkout-cart">
    <div class="container">
        <div class="col-md-12">
            <div class="wrapper overflow-hidden">
                <div class="checkout-content">
                    <div class="tks-header">
                        <h3 style=" font-family: Times New Roman; font-size:150%;font-weight:bold;text-align:justify"> Thông Tin Đơn Hàng Đã Được Gửi Đến Email: 
                            <?php 
                            if($this->session->userdata('info-customer')){
                                $data=$this->session->userdata('info-customer');
                                echo $data['email'];
                                $this->session->unset_userdata('info-customer');
                            }else{
                                if($this->session->userdata('sessionKhachHang')){
                                    $data=$this->session->userdata('sessionKhachHang');
                                    echo $data['email'];
                                }
                            }
                            ?>
                        . Quý Khách Hãy Đăng Nhập Gmail Để Kiểm Tra Lại Thông Tin Đơn Hàng.
                        </h3>
                    </div>
                    <div class="tks-content" style="min-height: 1px;
                    overflow: hidden;">
                    <div class="col-xs-12 col-sm-12 col-md-7 col-login-checkout" style="margin-bottom: 20px">
                        <table class="table tks-tabele-info-cus">
                            <thead>
                                <tr>
                                    <th colspan="2">THÔNG TIN THANH TOÁN NHẬN HÀNG</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Khách Hàng :</td>
                                    <td><?php echo $get['fullname'] ?></td>
                                </tr>
                                <tr>
                                    <td>Số Điện Thoại :</td>
                                    <td><?php echo $get['phone'] ?></td>
                                </tr>
                                <tr>
                                    <td>Địa Chỉ Nhận Hàng :</td>
                                    <td><?php echo $get['address'] ?>, <?php echo $this->Mdistrict->district_name($get['district'] )?>, <?php echo $this->Mprovince->province_name($get['province'] )?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-5 products-detail">
                        <div class="no-margin-table" style="width: 95%; float: right;">
                            <table class="table" style="color: #333;">
                                <thead>
                                    <tr>
                                        <th colspan="3" style="font-weight: 600;">Thông Tin Đơn Hàng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="background: #fafafa; color: #333;" class="text-transform font-weight-600">
                                        <td>Sản Phẩm</td>
                                        <td class="text-center">Số Lượng</td>
                                        <td class="text-center">Giá</td>
                                        <td class="text-center">Tổng</td>
                                    </tr>
                                    <?php
                                    $data=$this->Morderdetail->orderdetail_order($get['id']);
                                    $money=0;
                                    $total2=0;                                   
                                    foreach ($data as $value) :
                                        $row = $this->Mproduct->product_detail_id($value['productid']);
                                        ?>
                                        <tr>
                                            <td><?php echo $row['name']; ?></td>
                                            <td class="text-center"><?php echo $value['count']; ?></td>
                                            <td class="text-center">    
                                                <?php echo number_format($value['price']);?>
                                            </td>
                                            <td><?php echo number_format($value['count'] * $value['price']); ?> VNĐ</td>
                                            <?php $total=$value['count'] * $value['price'];
                                            $total2+=$total;?>

                                        </tr>
                                    <?php endforeach; ?>
                                    <tr style="background: #fafafa">
                                        <td colspan="3">Tổng Cộng :</td>
                                        <td class="text-center">
                                            <?php 
                                            echo number_format($total2);
                                            ?> VNĐ
                                        </td>
                                    </tr>
                                    <tr style="background: #fafafa">
                                        <td colspan="3">Phí Vận Chuyển</td>
                                        <td class="text-center"><?php echo number_format($get['price_ship']).' VNĐ'; ?></td>
                                    </tr>
                                    <?php 
                                    if($get['coupon'] != 0){
                                        echo '<tr style="background: #fafafa">
                                        <td colspan="3">Voucher</td>
                                        <td class="text-center">'.number_format(-$get['coupon']).'VNĐ</td>
                                        </tr>';
                                    }
                                    ?>
                                    <tr style="background: #fafafa">
                                        <td colspan="3" class="font-weight-600">Thành Tiền<br/><span style="font-style: italic;">(tổng Số Tiền Thanh Toán)</span></td>
                                        <td class="text-center" style="font-weight: 600; font-size: 18px;color: red;"><?php echo number_format($get['money']).' VNĐ'; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="btn-tks clearfix">
                    <button type="button" onclick="window.location.href='<?php echo base_url() ?>trang-chu'" class="btn-next-checkout pull-left">Tiếp Tục Mua Hàng</button>
                    <button type="button" onclick="window.print()" class="btn-update-order pull-left">In</button>
                </div>
            </div>
        </div>
    </div>
</div>
</section>