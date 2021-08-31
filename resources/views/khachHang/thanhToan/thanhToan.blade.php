@include('khachHang.include.header')
@php
use App\SanPham;
$tt=0;
@endphp

@if(!empty(session()->get("messThanhToan")))
<script>
    alert("Đặt Đơn Hàng Thành Công, Vui Lòng Chờ Xử Lý !!!");
</script>
@php
session()->forget('messThanhToan');
@endphp
@endif
@php 
    use App\Http\Controllers\Helper;
@endphp
<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Thanh toán</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="customer-info-wp">
            <div class="section-head">
                <form action="{{route('thanhToanP')}}" method="post">
                    {{ csrf_field() }}
                    <h1 class="section-title">Thông tin khách hàng</h1>
            </div>
            <div class="section-detail">
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="fullname">Họ tên</label>
                            <input type="text" disabled name="fullname" value="{{session()->get('khachHang')->TenKhachHang}}" id="fullname">
                        </div>
                        <div class="form-col fl-right">
                            <label for="email">Email</label>
                            <input type="email" disabled name="email" value="{{session()->get('khachHang')->MailKhachHang}}" id="email">
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="address">Địa chỉ</label>
                            <input type="text" disabled name="address" value="{{session()->get('khachHang')->DiaChiKhachHang}}" id="address">
                        </div>
                        <div class="form-col fl-right">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" disabled name="phone" value="{{session()->get('khachHang')->SDTKhachHang}}" id="phone">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="notes">Ghi chú</label>
                            <textarea name="ChuThich"></textarea>
                        </div>
                    </div>
            </div>
        </div>
        <div class="section" id="order-review-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin đơn hàng</h1>
            </div>
            <div class="section-detail">

                <table class="shop-table">
                    <thead>
                        <tr>
                            <td>Sản phẩm</td>
                            <td>Tổng</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gioHangs as $gioHang)
                        <tr class="cart-item">
                            <td class="product-name">{{SanPham::where('IDSanPham',$gioHang->SanPhamID)->first()->TenSanPham}}<strong class="product-quantity">x {{$gioHang->SoLuong}}</strong></td>
                            <td class="product-total">{{Helper::fomatmoney($gioHang->ThanhTien)}}</td>
                            @php
                            $tt += $gioHang->ThanhTien;
                            @endphp
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="order-total">
                            <td>Tổng đơn hàng:</td>
                            <td><strong class="total-price">{{Helper::fomatmoney($tt)}}</strong></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="place-order-wp clearfix">
                    <input type="submit" id="order-now" value="Đặt hàng">
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

@include('khachHang.include.footer')