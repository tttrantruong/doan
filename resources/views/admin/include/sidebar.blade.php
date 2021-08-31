<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a href="{{route('admin.home')}}">
                    <i class="fa fa-dashboard"></i>
                    <span>Trang Chủ</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-laptop"></i>
                    <span>Quản Lý Sản Phẩm</span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('admin.danhSachSanPham')}}">Danh Sách</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-book"></i>
                    <span>Quản Lý Danh Mục</span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('admin.danhSachDanhMuc')}}">Danh Sách</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-cogs"></i>
                    <span>Quản Lý Thương Hiệu</span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('admin.danhSachThuongHieu')}}">Danh Sách</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-tasks"></i>
                    <span>Quản Lý Bài Viết</span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('admin.danhSachBaiViet')}}">Danh Sách</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-th"></i>
                    <span>Quản Lý Nhân Viên</span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('admin.danhSachNhanVien')}}">Danh Sách</a></li>
                    <li><a href="{{route('admin.danhSachTaiKhoan')}}">Tài Khoản</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class=" fa fa-envelope"></i>
                    <span>Quản Lý Nhà Cung Cấp</span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('admin.danhSachNhaCungCap')}}">Danh Sách</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class=" fa fa-bar-chart-o"></i>
                    <span>Quản Lý Khách Hàng</span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('admin.danhSachKhachHang')}}">Danh Sách</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Quản Lý Đơn Hàng</span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('themDonHang')}}">Thêm Mới</a></li>
                    <li><a href="{{route('donHangThanhCong')}}">Đơn Hàng Thành Công</a></li>
                    <li><a href="{{route('donHangXuLy')}}">Đơn Hàng Xử Lý</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="google_maps.html">
                    <i class="fa fa-map-marker"></i>
                    <span>Nhập Hàng </span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('nhapHang')}}">Danh Sách</a></li>
                    <li><a href="{{route('DanhSachDonHangNhap')}}">Đơn Nhập</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-comments-o"></i>
                    <span>Thống Kê</span>
                </a>
                <ul class="sub">
                    <li><a href="{{route('admin.thongKeDoanhThu')}}">Doanh Thu</a></li>
                    <li><a href="{{route('admin.thongKeSanPham')}}"> Sản Phẩm</a></li>
                </ul>
            </li>
           
            <!--multi level menu end-->

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>