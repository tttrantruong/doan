@include('khachHang.include.header')
@php
use App\SanPham;
$tt =0;

@endphp
@php
use App\Http\Controllers\Helper;
@endphp
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Giỏ Hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Mã sản phẩm</td>
                            <td>Ảnh sản phẩm</td>
                            <td>Tên sản phẩm</td>
                            <td>Giá sản phẩm</td>
                            <td>Số lượng</td>
                            <td colspan="2">Thành tiền</td>
                        </tr>
                    </thead>
                    <form action="{{route('capNhat')}}" method="post">
                        {{ csrf_field() }}
                        <tbody>
                            @foreach($gioHangs as $gioHang)
                            <tr>
                            <input type="text" value="{{$gioHang->SanPhamID}}" name="sanpham[]" hidden>
                                <td>{{SanPham::where('IDSanPham',$gioHang->SanPhamID)->first()->MaSanPham}}</td>
                                <td>
                                    <a href="" title="" class="thumb">
                                        <img src="{{url(SanPham::where('IDSanPham',$gioHang->SanPhamID)->first()->ImgSanPham)}}" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{url('/chi-tiet-san-pham/')}}/{{$gioHang->SanPhamID}}" title="" class="name-product">{{SanPham::where('IDSanPham',$gioHang->SanPhamID)->first()->TenSanPham}}</a>
                                </td>
                                <td>{{Helper::fomatmoney(SanPham::where('IDSanPham',$gioHang->SanPhamID)->first()->GiaBan)}}</td>
                                <td>
                                    <input type="number" value="{{$gioHang->SoLuong}}" name="soluongsanpham[{{$gioHang->SanPhamID}}]" class="num-order">
                                </td>
                                <td>{{Helper::fomatmoney($gioHang->ThanhTien)}}</td>
                                @php
                                $tt+= $gioHang->ThanhTien;
                                @endphp
                                <td>
                                    <a href="{{url('/gio-hang/xoa/')}}/{{$gioHang->SanPhamID}}" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <p id="total-price" class="fl-right">Tổng giá: <span>{{Helper::fomatmoney($tt)}}</span></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <div class="fl-right">
                                            <button title="" type="submit" id="update-cart">Cập nhật giỏ hàng</button>
                                            <a href="{{route('thanhToan')}}" title="" id="checkout-cart">Thanh toán</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </form>
                </table>
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                <a href="{{route('trangChu')}}" title="" id="buy-more">Mua tiếp</a><br />
                <a href="{{route('xoaGioHang')}}" title="" id="delete-cart">Xóa giỏ hàng</a>
            </div>
        </div>
    </div>
</div>

@include('khachHang.include.footer')