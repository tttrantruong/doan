@include('khachHang.include.header')
@php 
    use App\Http\Controllers\Helper;
@endphp
<div id="main-content-wp" class="clearfix category-product-page">
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
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left">Sản Phẩm</h3>
                    <!-- <div class="filter-wp fl-right">
                        <p class="desc">Hiển thị 45 trên 50 sản phẩm</p>
                        <div class="form-filter">
                            <form method="POST" action="">
                                <select name="select">
                                    <option value="0">Sắp xếp</option>
                                    <option value="1">Từ A-Z</option>
                                    <option value="2">Từ Z-A</option>
                                    <option value="3">Giá cao xuống thấp</option>
                                    <option value="3">Giá thấp lên cao</option>
                                </select>
                                <button type="submit">Lọc</button>
                            </form>
                        </div>
                    </div> -->
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix" style="display: flex;
    flex-wrap: wrap;">
                        @foreach($sanPhams as $sanPham)
                        <li>
                            <a href="{{url('/chi-tiet-san-pham/')}}/{{$sanPham->IDSanPham}}" title="" class="thumb">
                                <img src="{{url($sanPham->ImgSanPham)}}">
                            </a>
                            <a href="{{url('/chi-tiet-san-pham/')}}/{{$sanPham->IDSanPham}}" title="" class="product-name">{{$sanPham->TenSanPham}}</a>
                            <div class="price">
                                <span style="display: block;" class="new">{{Helper::fomatmoney($sanPham->GiaBan)}}</span>
                            </div>
                            <div class="action clearfix">
                            <a href="{{url('/chi-tiet-san-pham/')}}/{{$sanPham->IDSanPham}}" style="text-align: center;" title="Mua ngay" class="buy-now ">Xem Thêm</a>
                            </div>
                        </li>

                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                    {{$sanPhams->links()}}
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
                            <a href="{{url('/danh-sach-san-pham/')}}/{{$danhMuc->IDDanhMuc}}" title="">{{$danhMuc->TenDanhMuc}}</a>

                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="section" id="filter-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Bộ lọc</h3>
                </div>
                <div class="section-detail">
                    <form method="POST" action="">
                        
                        <table>
                            <thead>
                                <tr>
                                    <td colspan="2">Hãng</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($thuongHieus as $thuongHieu)
                                <tr>
                                    <td><a href="{{url('/danh-sach-san-pham-thuong-hieu/')}}/{{$thuongHieu->IDThuongHieu}}">-  {{$thuongHieu->TenThuongHieu}}</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="?page=detail_product" title="" class="thumb">
                        <img src="https://vanphongpham247.vn/wp-content/uploads/2019/11/M%C3%A1y-%C4%91%C3%B3ng-g%C3%A1y-xo%E1%BA%AFn-nh%E1%BB%B1a-CombBind-C20A5.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('khachHang.include.footer')