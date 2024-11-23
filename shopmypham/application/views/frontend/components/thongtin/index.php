<section id="content">
	<div class="container account">
        <aside class="col-right sidebar col-md-3 col-xs-12">
            <div class="block block-account">
                <div class="general__title">
                    <h2><span>THÔNG TIN TÀI KHOẢN</span></h2>
                </div>
                <div class="block-content">
                    <p>Tài Khoản: <strong><?php echo $info['username'] ?></strong></p>
                    <p>Họ Và Tên: <strong><?php echo $info['fullname'] ?></strong></p>
                    <p>Email: <strong><?php echo $info['email'] ?></strong></p>
                    <p>Số Điện Thoại: <strong><?php echo $info['phone'] ?></strong></p>
                </div>
                <br>    
                <div> 
                    <button class="btn"><a href="<?php echo base_url('khach-hang/ban-san-pham/'); ?>">Đăng Sản Phẩm</a></button>
                    <button class="btn"><a href="<?php echo base_url('khach-hang/san-pham/'); ?>">Quản Lý Sản Phẩm</a></button>
                </div>
                <br>
                <div>
                    <button class="btn"><a href="reset_password">Đổi Mật Khẩu</a></button>
                    <button class="btn"><a href="<?php echo base_url('dang-xuat/'); ?>">Đăng Xuất</a></button>
                </div>    
                
            </div>
        </aside>
        <div class="col-main col-md-9 col-sm-12">
            <div class="my-account">

                <?php if($this->Minfocustomer->order_listorder_customerid_not($info['id']) != null)
                { ?>
                    <div class="general__title">
                        <h2><span>Danh Sách Đơn Hàng Chưa Duyệt</span></h2>
                    </div>
                    <table style="padding-right: 10px; width: 100%;">
                        <thead style="border: 1px solid silver;">
                            <tr>
                                <th class="text-left" style="padding:5px 10px">Đơn Hàng</th>
                                <th style="padding:5px 10px">Ngày</th>
                                <th style="text-align: center; padding:5px 10px">
                                    Giá Trị Đơn Hàng 
                                </th>
                                <th style="text-align: center;">Trạng Thái Đơn Hàng</th>
                                <th style="text-align: center;" colspan="2">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody style="border: 1px solid silver;">
                            <?php $order = $this->Minfocustomer->order_listorder_customerid_not($info['id']);
                            foreach ($order as $value):?>
                                <tr style="border-bottom: 1px solid silver;">
                                    <td style="padding:5px 10px;">#<?php echo $value['orderCode'] ?></td>
                                    <td style="padding:5px 10px;"><?php echo $value['orderdate'] ?></td>
                                    <td style="text-align: center; padding:5px 10px;"><span class="price-2"><?php echo number_format($value['money']) ?> VNĐ</span></td>
                                    <td style="padding:5px 10px; text-align: center;">
                                       <?php
                                       switch ($value['status']) {
                                        case '0':
                                        echo 'Đang Đợi Duyệt';
                                        break;
                                    }
                                    $id = $value['id'];
                                    ?>
                                </td>
                                <td width="70">
                                    <span> <a style="color: #0f9ed8;" href="account/orders/<?php echo $value['id'] ?>">Xem Chi Tiết</a></span>
                                </td>
                                <td width="70">
                                    <a style="color: red;" href="thongtin/update/<?php echo $value['id'];?>" onclick="return confirm('Xác Nhận Hủy Đơn Hàng Này ?')">Hủy Đơn Hàng</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php
            }
            ?>
            
            <div class="general__title">
                <h2><span>Danh Sách Đơn Hàng</span></h2>
            </div>
            <div class="table-order">
                <table style="padding-right: 10px; width: 100%;">
                    <thead style="border: 1px solid silver;">
                        <tr>
                            <th class="text-left" style="padding:5px 10px">Đơn Hàng</th>
                            <th style="padding:5px 10px">Ngày</th>
                            <th style="text-align: center; padding:5px 10px">
                                Giá Trị Đơn Hàng 
                            </th>
                            <th style="text-align: center;">Trạng Thái Đơn Hàng</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody style="border: 1px solid silver;">
                        <?php $i = 0 ?>
                        <?php $order = $this->Minfocustomer->order_listorder_customerid($info['id']);
                        foreach ($order as $value):?>
                            <tr style="border-bottom: 1px solid silver;">
                                <td style="padding:5px 10px;">#<?php echo $value['orderCode'] ?></td>
                                <td style="padding:5px 10px;"><?php echo $value['orderdate'] ?></td>
                                <td style="text-align: center; padding:5px 10px;"><span class="price-2"><?php echo number_format($value['money']) ?> VNĐ</span></td>
                                <td style="padding:5px 10px; text-align: center;">
                                   <?php
                                   switch ($value['status']) {
                                    case '0':
                                    echo 'Đang Đợi Duyệt';
                                    break;
                                    case '1':
                                    echo 'Đang Giao Hàng';
                                    break;
                                    case '2':
                                    echo 'Đã Giao';
                                    break;
                                    case '3':
                                    echo 'Khách Hàng Đã Hủy';
                                    break;
                                    case '4':
                                    echo 'Nhân Viên Đã Hủy';
                                    break;
                                }
                                $id = $value['id'];
                                ?>
                            </td>
                            <td width="70">
                                <span> <a style="color: #0f9ed8;" href="account/orders/<?php echo $value['id'] ?>">Xem Chi Tiết</a></span>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <?php if($i == 0){ ?>
                <br>
                <p class="text-center">Danh Sách Đơn Hàng Của Bạn Đang Trống!</p>
            <?php } ?>

        </div>
    </div>
</div>
</section>
