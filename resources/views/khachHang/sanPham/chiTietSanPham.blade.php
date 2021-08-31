@include('khachHang.include.header')
@php
use App\ThuongHieu;
use App\DanhMuc;
@endphp
@php 
    use App\Http\Controllers\Helper;
@endphp
<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Sản Phẩm</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="detail-product-wp">
                <div class="section-detail clearfix">
                    <div class="thumb-wp fl-left">
                        <a href="" title="" id="main-thumb">
                            <img src="{{url($sanPham->ImgSanPham)}}" />
                        </a>
                    </div>
                    <form action="{{route('themGioHang')}}" method="post">
                    {{ csrf_field() }}
                    <div class="info fl-right">
                        <h3 class="product-name">{{$sanPham->TenSanPham}}</h3>
                        <div class="desc">
                            <p>Danh Mục: {{DanhMuc::where('IDDanhMuc',$sanPham->DanhMucID)->first()->TenDanhMuc}}</p>
                            <p>Thương Hiệu: {{ThuongHieu::where('IDThuongHieu',$sanPham->ThuongHieuID)->first()->TenThuongHieu}}</p>
                        </div>
                        <div class="num-product">
                            <span class="title">Sản phẩm: </span>
                            <span class="status" style="background-color: green; color: white;">Còn hàng</span>
                        </div>
                        <input type="text" name="IDSanPham" value="{{$sanPham->IDSanPham}}" hidden id="">
                        <p class="price">{{Helper::fomatmoney($sanPham->GiaBan)}}</p>
                        <div id="num-order-wp">
                            <a title="" id="minus"><i class="fa fa-minus"></i></a>
                            <input type="text" name="SoLuong" value="1" id="num-order">
                            <a title="" id="plus"><i class="fa fa-plus"></i></a>
                        </div>
                        <button style="border: none;" type="submit" title="Thêm giỏ hàng" class="add-cart">Thêm giỏ hàng</button>
                    </div>
                </div>
            </div>
            </form>
            <div class="section" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Mô tả sản phẩm</h3>
                </div>
                <div class="section-detail">
                    {!!$sanPham->MoTa!!}
                </div>
            </div>
            <div class="section" id="same-category-wp">
                <div class="section-head">
                    <h3 class="section-title">Cùng chuyên mục</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        @foreach($sanPhamLienQuans as $sanPham)
                        <li>
                            <a href="{{url('/chi-tiet-san-pham/')}}/{{$sanPham->IDSanPham}}" title="" class="thumb">
                                <img src="{{url($sanPham->ImgSanPham)}}">
                            </a>
                            <a href="{{url('/chi-tiet-san-pham/')}}/{{$sanPham->IDSanPham}}" title="" class="product-name">{{$sanPham->TenSanPham}}</a>
                            <div class="price">
                                <span class="new">{{Helper::fomatmoney($sanPham->GiaBan)}}</span>
                            </div>
                            <div class="action clearfix">
                                <a href="{{url('/chi-tiet-san-pham/')}}/{{$sanPham->IDSanPham}}" title="" class="buy-now " style="text-align: center;">Xêm Thêm</a>
                            </div>
                        </li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                    <ul class="list-item">
                        @foreach($danhMucs as $danhMuc)
                        <li>
                            <a href="?page=category_product" title="">{{$danhMuc->TenDanhMuc}}</a>

                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="" title="" class="thumb">
                        <img src="https://vanphongpham247.vn/wp-content/uploads/2019/11/M%C3%A1y-%C4%91%C3%B3ng-g%C3%A1y-xo%E1%BA%AFn-nh%E1%BB%B1a-CombBind-C20A5.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('khachHang.include.footer')