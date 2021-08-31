@include('khachHang.include.header')
@php
use App\DanhMuc;
use App\SanPham;
@endphp
@php 
    use App\Http\Controllers\Helper;
@endphp
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    <div class="item">
                        <img src="https://vanphongpham247.vn/wp-content/uploads/2020/07/a1fd782dc3813edf6790-min.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="https://vanphongpham247.vn/wp-content/uploads/2021/05/banner.jpg" alt="">
                    </div>

                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="{{url('public/khachHang/images/icon-1.png')}}">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{{url('public/khachHang/images/icon-2.png')}}">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{{url('public/khachHang/images/icon-3.png')}}">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{{url('public/khachHang/images/icon-4.png')}}">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{{url('public/khachHang/images/icon-5.png')}}">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        @foreach($sanPhamBanChays as $sanPhamBanChay)
                        <li>
                            <a href="{{url('/chi-tiet-san-pham/')}}/{{$sanPhamBanChay->SanPhamID}}" title="" class="thumb">
                                <img src="{{url(SanPham::where('IDSanPham',$sanPhamBanChay->SanPhamID)->first()->ImgSanPham)}}">
                            </a>
                            <a href="{{url('/chi-tiet-san-pham/')}}/{{$sanPhamBanChay->SanPhamID}}" title="" class="product-name">{{SanPham::where('IDSanPham',$sanPhamBanChay->SanPhamID)->first()->TenSanPham}}</a>
                            <div class="price">
                                <span class="new">{{Helper::fomatmoney(SanPham::where('IDSanPham',$sanPhamBanChay->SanPhamID)->first()->GiaBan)}}</span>
                            </div>
                            <div class="action clearfix">
                                <!-- <a href="?page=cart" title="" class="add-cart fl-left">Thêm giỏ hàng</a> -->
                                <a href="{{url('/chi-tiet-san-pham/')}}/{{$sanPhamBanChay->SanPhamID}}" style="text-align: center;" title="Mua ngay" class="buy-now ">Xem Thêm</a>
                            </div>
                        </li>

                        @endforeach
                    </ul>
                </div>
            </div>
            @foreach($ArrSanPham as $Arr)
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">{{DanhMuc::where('IDDanhMuc',$Arr[0]->DanhMucID)->first()->TenDanhMuc}}</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        @foreach($Arr as $sanPhamBanChay)
                        <li>
                            <a href="{{url('/chi-tiet-san-pham/')}}/{{$sanPhamBanChay->IDSanPham}}" title="" class="thumb">
                                <img src="{{url($sanPhamBanChay->ImgSanPham)}}">
                            </a>
                            <a href="{{url('/chi-tiet-san-pham/')}}/{{$sanPhamBanChay->IDSanPham}}" title="" class="product-name">{{$sanPhamBanChay->TenSanPham}}</a>
                            <div class="price">
                                <span class="new">{{Helper::fomatmoney($sanPhamBanChay->GiaBan)}}</span>
                            </div>
                            <div class="action clearfix" style="text-align: center; ">
                            <style>
                                
                            </style>
                                <!-- <a style="color: #0092d3;" href="?page=cart" title="Thêm giỏ hàng" class="add-cart"> <span class="fa fa-shopping-basket"></span> Thêm giỏ hàng</a> -->
                                <a href="{{url('/chi-tiet-san-pham/')}}/{{$sanPhamBanChay->IDSanPham}}" style="text-align: center;" title="Mua ngay" class="buy-now ">Xem Thêm</a>
                            </div>
                        </li>

                        @endforeach

                    </ul>
                </div>
            </div>
            @endforeach

            <!-- ///// -->


            <!-- /// -->

        </div>
        <!-- //////////// -->

        <!-- // -->
        <div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                    <ul class="list-item">
                        @foreach($danhMucs as $danhMuc)
                        <li>
                            <a href="{{url('/danh-sach-san-pham/')}}/{{$danhMuc->IDDanhMuc}}" title="">{{$danhMuc->TenDanhMuc}}</a>

                        </li>

                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="section" id="selling-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm bán chạy</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        @foreach($sanPhamBanChays as $sanPhamBanChay)
                        <li class="clearfix">
                            <a href="{{url('/chi-tiet-san-pham/')}}/{{$sanPhamBanChay->SanPhamID}}" title="" class="thumb fl-left">
                                <img src="{{url(SanPham::where('IDSanPham',$sanPhamBanChay->SanPhamID)->first()->ImgSanPham)}}" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="{{url('/chi-tiet-san-pham/')}}/{{$sanPhamBanChay->SanPhamID}}" title="" class="product-name">{{SanPham::where('IDSanPham',$sanPhamBanChay->SanPhamID)->first()->TenSanPham}}</a>
                                <div class="price">
                                    <span class="new">{{Helper::fomatmoney(SanPham::where('IDSanPham',$sanPhamBanChay->SanPhamID)->first()->GiaBan)}}</span>
                                </div>
                                <a href="{{url('/chi-tiet-san-pham/')}}/{{$sanPhamBanChay->SanPhamID}}" title="" class="buy-now">Xem Thêm</a>
                            </div>
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