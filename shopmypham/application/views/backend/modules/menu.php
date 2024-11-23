<aside class="main-sidebar">

    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="<?php echo base_url() ?>admin">
                    <i class="fa fa-bar-chart"></i> <span>THỐNG KÊ</span>
                </a>
            </li>
            <li class="header">QUẢN LÝ CỬA HÀNG</li>
            <li class="treeview">
                <a href="<?php echo base_url() ?>admin/content">
                    <i class="glyphicon glyphicon-list"></i><span>Tin Tức</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo base_url()?>admin/product">
                    <i class="fa fa-leaf"></i><span>Sản Phẩm</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo base_url()?>admin/category">
                    <i class="fa fa-indent"></i><span>Loại Sản Phẩm</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo base_url()?>admin/producer">
                    <i class="fa fa-gift"></i><span>Nhà Cung Cấp</span>
                </a>
            </li>
            <li class="header">QUẢN LÝ BÁN HÀNG</li>
            <li class="treeview">
                <a href="<?php echo base_url() ?>admin/coupon">
                    <i class="fa fa-diamond"></i> <span>Mã Giảm Giá</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo base_url() ?>admin/contact">
                    <i class="fa fa-envelope"></i> <span>Liên Hệ</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo base_url() ?>admin/orders">
                    <i class="fa fa-shopping-cart"></i> <span>Đơn Hàng</span>
                </a>
            </li>
            <li class="treeview">
                <a href="<?php echo base_url() ?>admin/customer">
                    <i class="fa fa-user"></i><span>Khách Hàng</span>
                </a>
            </li>
            <li class="treeview">
             <a href="<?php echo base_url() ?>admin/sliders">
                <i class="fa fa-cogs"></i> <span>Giao Diện</span>
            </a>
        </li>
        <li class="header">CÀI ĐẶT</li>
        <li class="treeview">
            <a href="#">
                <i class="glyphicon glyphicon-cog"></i><span>Hệ Thống</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="active">
                    <a href="<?php echo base_url() ?>admin/configuration/update">
                        <i class="fa fa-cogs"></i> Cấu Hình MAIL
                    </a>
                </li>
                <?php if($user['role'] == 1){ ?>
                <li>
                    <a href="<?php echo base_url('admin/useradmin') ?>">
                        <i class="fa fa-users"></i> Nhân Viên
                    </a>
                </li>
                <?php } ?>
            </ul>
        </li>
        <li><a href="admin/user/logout.html"><i class="fa fa-sign-out text-red"></i> <span>Thoát</span></a></li>
    </ul>
</section>
<!-- /.sidebar -->
</aside>