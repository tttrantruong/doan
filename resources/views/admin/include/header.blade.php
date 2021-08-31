<header class="header white-bg">
    <div class="sidebar-toggle-box">
        <div data-original-title="Toggle Navigation" data-placement="right" class="fa fa-bars tooltips"></div>
    </div>
    <!--logo start-->
    <a href="{{route('admin.home')}}" class="logo"><span>Quản Lý Bán Hàng</span></a>
    <!--logo end-->
    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
            <!-- settings start -->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <i class="fa fa-tasks"></i>
                    <span class="badge bg-success">3</span>
                </a>
                <ul class="dropdown-menu extended tasks-bar">
                    <div class="notify-arrow notify-arrow-green"></div>
                    <li>
                        <!-- <p class="green">You have 6 pending tasks</p> -->
                    </li>
                    
                    <li>
                        <a href="{{route('themDonHang')}}">
                            <div class="task-info">
                                <div class="desc">Thêm Đơn Hàng</div>
                            </div>
                           
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.themSanPham')}}">
                            <div class="task-info">
                                <div class="desc">Thêm Sản Phẩm</div>
                            </div>
                            
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.themNhanVien')}}">
                            <div class="task-info">
                                <div class="desc">Thêm Nhân Viên</div>
                            </div>
                            
                        </a>
                    </li>
                   
                   
                </ul>
            </li>
            <!-- settings end -->
        </ul>
    </div>
    <div class="top-nav ">
        <ul class="nav pull-right top-menu">
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" style="width: 40px; height: 40px;" src="{{url(session()->get('nhanvien')->ImgNhanVien)}}">
                    <span class="username">{{session()->get('nhanvien')->TenNhanVien}}</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <div class="log-arrow-up"></div>
                    <li><a href="{{route('admin.dangXuat')}}"><i class="fa fa-key"></i> Đăng Xuất</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->
           
        </ul>
    </div>
</header>