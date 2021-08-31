<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/flatlab/basic_table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:46:23 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Quản Lý</title>

    <!-- Bootstrap core CSS -->
    <link href="{{url('public/admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('public/admin/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{url('public/admin/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <!--right slidebar-->
    <link href="{{url('public/admin/css/slidebars.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{url('public/admin/css/style.css')}}" rel="stylesheet">
    <link href="{{url('public/admin/css/style-responsive.css')}}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <section id="container" class="">
        <!--header start-->
        @include('admin.include.header')
        @include('admin.include.sidebar')
        @php
        use App\KhachHang;
        use App\SanPham;
        use App\NhanVien;
        $i=1;
        @endphp
        <!--header end-->
        <!--sidebar start-->
        @if(!empty(session()->get("messHuy")))
        <script>
            alert("Hủy Đơn Hàng Thành Công !!!");
        </script>
        @php
        session()->forget('messHuy');
        @endphp
        @endif

        @if(!empty(session()->get("messXacNhan")))
        <script>
            alert("Xác Nhận Đơn Hàng Thành Công !!!");
        </script>
        @php
        session()->forget('messXacNhan');
        @endphp
        @endif
        @php 
    use App\Http\Controllers\Helper;
@endphp
        
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <div class="col-sm-6">
                        <section class="panel">
                            <header class="panel-heading">
                                Thông Tin Đơn Hàng: {{$donHang->MaDonHang}}
                            </header>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Ngày Mua:</th>
                                        <th>{{$donHang->created_at}}</th>

                                    </tr>
                                    <tr>
                                        <th>Khách Hàng</th>
                                        @if($donHang->KhachHangID != null)
                                        <th>{{KhachHang::where('IDKhachHang',$donHang->KhachHangID)->first()->TenKhachHang}}</th>
                                        @else
                                        <th>Khách Hàng Mua Lẻ</th>
                                        @endif

                                    </tr>
                                </thead>
                                <tbody>
                                    @if($donHang->TrangThai=='Thành Công')
                                    <tr style="font-weight: bold;">
                                        <td>Nhân Viên</td>
                                        <td>{{NhanVien::where('IDNhanVien',$donHang->NhanVienID)->first()->TenNhanVien}}</td>
                                    </tr>
                                    @endif
                                    <tr style="font-weight: bold;">
                                        <td>Trạng Thái Đơn</td>
                                        <td>{{$donHang->TrangThai}}
                                            @if($donHang->TrangThai=='Chờ Xử Lý')
                                            <a href="{{url('/admin/don-hang/xac-nhan/')}}/{{$donHang->IDDonHang}}" class="btn btn-primary btn-xs">Xác Nhận Đơn Hàng</a>
                                            <a href="{{url('/admin/don-hang/huy/')}}/{{$donHang->IDDonHang}}" class="btn btn-danger btn-xs">Hủy Đơn Hàng</a>
                                            @endif

                                        </td>

                                    </tr>
                                    <tr style="font-weight: bold;">
                                        <td>Số Lượng Sản Phẩm</td>
                                        <td>{{$donHang->SoLuong}}</td>

                                    </tr>
                                    <tr style="font-weight: bold;">
                                        <td>Tổng Tiền</td>
                                        <td>{{Helper::fomatmoney($donHang->TongTien)}}</td>

                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Chi Tiết Đơn Hàng
                            </header>
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                    <tr>
                                        <th> STT</th>
                                        <th class="hidden-phone"> Sản Phẩm</th>
                                        <th> Ảnh</th>
                                        <th> Số Lượng</th>
                                        <th> Đơn Giá</th>
                                        <th>Tổng Tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($chiTietDonHangs as $chiTietDonHang)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{SanPham::where('IDSanPham',$chiTietDonHang->SanPhamID)->first()->TenSanPham}}</td>
                                        <td><img src="{{url(SanPham::where('IDSanPham',$chiTietDonHang->SanPhamID)->first()->ImgSanPham)}}" style="width: 60px; height: 60px;" alt=""></td>
                                        <td>{{$chiTietDonHang->SoLuong}} </td>
                                        <td>{{Helper::fomatmoney(SanPham::where('IDSanPham',$chiTietDonHang->SanPhamID)->first()->GiaBan)}}</td>

                                        <td>{{Helper::fomatmoney($chiTietDonHang->TongTien)}}</td>
                                    </tr>
                                    @endforeach



                                    <!-- <tr>
                                  <td>
                                      <a href="#">
                                          Adimin co
                                      </a>
                                  </td>
                                  <td class="hidden-phone">Lorem Ipsum dorolo</td>
                                  <td>56456.00$ </td>
                                  <td><span class="label label-warning label-mini">Due</span></td>
                                  <td>
                                      <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                      <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                  </td>
                              </tr> -->
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->
        <!-- Right Slidebar start -->

        <!-- Right Slidebar end -->
        <!--footer start-->
        @include('admin.include.footer')
        <!--footer end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{url('public/admin/js/jquery.js')}}"></script>
    <script src="{{url('public/admin/js/bootstrap.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{url('public/admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{url('public/admin/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{url('public/admin/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{url('public/admin/js/respond.min.js')}}"></script>

    <!--right slidebar-->
    <script src="{{url('public/admin/js/slidebars.min.js')}}"></script>

    <!--common script for all pages-->
    <script src="{{url('public/admin/js/common-scripts.js')}}"></script>


</body>

<!-- Mirrored from thevectorlab.net/flatlab/basic_table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:46:23 GMT -->

</html>