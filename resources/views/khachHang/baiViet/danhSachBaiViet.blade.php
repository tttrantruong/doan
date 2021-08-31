@include('khachHang.include.header')
@php 
use App\SanPham;
@endphp
@php 
    use App\Http\Controllers\Helper;
@endphp

<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Bài Viết</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">BÀi Viết</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">

                        @foreach($baiViets as $baiViet)
                        <li class="clearfix">
                            <a href="{{url('/chi-tiet-bai-viet/')}}/{{$baiViet->IDBaiViet}}" title="" class="thumb fl-left">
                                <img src="{{url($baiViet->ImgBaiViet)}}" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="{{url('/chi-tiet-bai-viet/')}}/{{$baiViet->IDBaiViet}}" title="" class="title">{{$baiViet->TieuDe}}</a>
                                <span class="create-date">{{$baiViet->created_at}}</span>
                                <div class="desc">{{$baiViet->MoTaNgan}}</div>
                            </div>
                        </li>

                        @endforeach





                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                    {{$baiViets->links()}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
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
                                    <!-- <span class="old">7.190.000đ</span> -->
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
                    <a href="?page=detail_blog_product" title="" class="thumb">
                        <img src="https://vanphongpham247.vn/wp-content/uploads/2019/11/M%C3%A1y-%C4%91%C3%B3ng-g%C3%A1y-xo%E1%BA%AFn-nh%E1%BB%B1a-CombBind-C20A5.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('khachHang.include.footer')