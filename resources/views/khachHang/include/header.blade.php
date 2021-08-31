<!DOCTYPE html>
<html>
    <head>
        <title>Đồ Án</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- css  -->
        <link href="{{url('public/khachHang/css/bootstrap/bootstrap-theme.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('public/khachHang/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('public/khachHang/reset.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('public/khachHang/css/carousel/owl.carousel.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('public/khachHang/css/carousel/owl.theme.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('public/khachHang/css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('public/khachHang/responsive.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('public/khachHang/css/import/fonts.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('public/khachHang/css/import/global.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('public/khachHang/css/import/header.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('public/khachHang/css/import/footer.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('public/khachHang/css/import/home.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('public/khachHang/css/import/category_product.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('public/khachHang/css/import/blog.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('public/khachHang/css/import/detail_product.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('public/khachHang/css/import/detail_blog.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('public/khachHang/css/import/cart.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{url('public/khachHang/css/import/checkout.css')}}" rel="stylesheet" type="text/css"/>
        <!-- js  -->
        <script src="{{url('public/khachHang/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
        <script src="{{url('public/khachHang/js/elevatezoom-master/jquery.elevatezoom.js')}}" type="text/javascript"></script>
        <script src="{{url('public/khachHang/js/bootstrap/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{url('public/khachHang/js/carousel/owl.carousel.js')}}" type="text/javascript"></script>
        <script src="{{url('public/khachHang/js/main.js')}}" type="text/javascript"></script>
    </head>

    @php 
    use App\GioHang;
    use App\SanPham;
    $gioHangs =null;
    if(!empty(session()->get('khachHang'))){
        $gioHangs = GioHang::where('KhachHangID',session()->get('khachHang')->IDKhachHang)->get();
    }
    $tt=0;
    $sl=0;
    if(!empty($gioHangs)){
        foreach($gioHangs as $gioHang){
            $sl += $gioHang->SoLuong;
        }
    }

    @endphp
    @php 
    use App\Http\Controllers\Helper;
@endphp
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div id="head-top" class="clearfix">
                        <div class="wp-inner">
                            <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                            <div id="main-menu-wp" class="fl-right">
                                <ul id="main-menu" class="clearfix">
                                    <li>
                                        <a href="{{route('trangChu')}}" title="">Trang chủ</a>
                                    </li>
                                    <li>
                                        <a href="{{route('danhSachSanPham')}}" title="">Sản phẩm</a>
                                    </li>
                                    <li>
                                        <a href="{{route('danhSachBaiViet')}}" title="">Tin Tức</a>
                                    </li>
                                    <li>
                                        <a href="{{route('gioiThieu')}}" title="">Giới thiệu</a>
                                    </li>
                                    <li>
                                        <a href="{{route('lienHe')}}" title="">Liên hệ</a>
                                    </li>
                                    @if(!empty(session()->get('khachHang')))
                                    <li>
                                        <a href="{{route('dangXuat')}}" title="">Đăng Xuất</a>
                                    </li>
                                    @else
                                    <li>
                                        <a href="{{route('dangNhap')}}" title="">Đăng Nhập</a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="{{route('dangKy')}}" title="">Đăng Ký</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div id="head-body" class="clearfix">
                        <div class="wp-inner">
                            <a href="{{route('trangChu')}}" title="" id="logo" class="fl-left"><img src="https://vanphongpham247.vn/wp-content/uploads/2020/07/logo.png"/></a>
                            <div id="search-wp" class="fl-left">
                                <form method="POST" action="{{route('timKiem')}}">
                                {{ csrf_field() }}
                                    <input type="text" name="key" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                    <button type="submit" id="sm-s">Tìm kiếm</button>
                                </form>
                            </div>
                            <div id="action-wp" class="fl-right">
                                <div id="advisory-wp" class="fl-left">
                                    <span class="title">Tư vấn</span>
                                    <span class="phone">0987.654.321</span>
                                </div>
                                <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i></div>
                                <a href="?page=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="num">2</span>
                                </a>
                                <div id="cart-wp" class="fl-right">
                                    <div id="btn-cart">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="num">{{$sl}}</span>
                                    </div>
                                    <div id="dropdown">
                                        <p class="desc">Có <span>{{$sl}} sản phẩm</span> trong giỏ hàng</p>
                                        <ul class="list-cart">
                                            @if($gioHangs != null)
                                            @foreach($gioHangs as $gioHang)
                                            <li class="clearfix">
                                                <a href="" title="" class="thumb fl-left">
                                                    <img src="{{url(SanPham::where('IDSanPham',$gioHang->SanPhamID)->first()->ImgSanPham)}}" alt="">
                                                </a>
                                                <div class="info fl-right">
                                                    <a href="" title="" class="product-name">{{SanPham::where('IDSanPham',$gioHang->SanPhamID)->first()->TenSanPham}}</a>
                                                    <p class="price">{{Helper::fomatmoney(SanPham::where('IDSanPham',$gioHang->SanPhamID)->first()->GiaBan)}}</p>
                                                    <p class="qty">Số lượng: <span>{{$gioHang->SoLuong}}</span></p>
                                                </div>
                                            </li>
                                            @php 
                                            $tt += $gioHang->ThanhTien;

                                            @endphp
                                            @endforeach
                                            @endif
                                        </ul>
                                        <div class="total-price clearfix">
                                            <p class="title fl-left">Tổng:</p>
                                            <p class="price fl-right">{{Helper::fomatmoney($tt)}}</p>
                                        </div>
                                        <dic class="action-cart clearfix">
                                            <a href="{{route('gioHang')}}" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
                                            <a href="{{route('thanhToan')}}" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
                                        </dic>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>