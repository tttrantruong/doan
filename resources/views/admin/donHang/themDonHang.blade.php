<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/flatlab/dynamic_table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:46:23 GMT -->

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

    <!--dynamic table-->
    <link href="{{url('public/admin/assets/advanced-datatable/media/css/demo_page.css')}}" rel="stylesheet" />
    <link href="{{url('public/admin/assets/advanced-datatable/media/css/demo_table.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{url('public/admin/assets/data-tables/DT_bootstrap.css')}}" />
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
@if(!empty(session()->get("messNhapHang")))
<script>
    alert("Nhập Hàng Thành Công !!!");
</script>
@php
session()->forget('messNhapHang');
@endphp
@endif

@php 
    use App\Http\Controllers\Helper;
@endphp

<body>

    <section id="container" class="">
        @include('admin.include.header')
        @include('admin.include.sidebar')
        @php
        $i=1;
        use App\KhachHang;
        use App\SanPham;
        @endphp
        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->


        <!--wysihtml5 start-->
        <div class="row" style="margin-bottom: 200px;">
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm Đơn Hàng Mới
                        <span class="tools pull-right">
                        </span>
                    </header>
                    <div class="panel-body">
                        <form class="form-horizontal tasi-form" action="{{route('themDonHangP')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-3" for="inputSuccess">Chọn Khách Hàng </label>
                                <div class="col-lg-9">
                                    @error('KhachHangID')
                                    <small class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                    <select multiple class="form-control" name="KhachHangID">
                                        @foreach($khachhangs as $khachhang)
                                        <option value="{{$khachhang->IDKhachHang}}">{{$khachhang->TenKhachHang}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                    </div>
                    <div class="panel-body">
                        <form action="#" class="form-horizontal tasi-form">
                            <div class="form-group">
                                <label class="col-sm-2 control-label col-lg-3" for="inputSuccess">Chọn Sản Phẩm</label>
                                @error('sanpham')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>


                    </div>

                    <div class="panel-body">

                        <div class="adv-table">
                            <table class="display table table-bordered table-striped" id="">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Sản Phẩm</th>
                                        <th>Ảnh</th>
                                        <th>Đơn Giá</th>
                                        <th>Số Lượng Còn</th>
                                        <th>Nhập Số Lượng Mua</th>
                                        <th>Chọn Sản Phẩm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sanphams as $sanpham)
                                    <tr class="gradeX">
                                        <td>{{$i++}}</td>
                                        <td>{{$sanpham->TenSanPham}}</td>
                                        <td><img src="{{url($sanpham->ImgSanPham)}}" style="width: 70px; height: 70px;" alt=""></td>
                                        <td>{{Helper::fomatmoney($sanpham->GiaBan)}}</td>
                                        <td>{{$sanpham->SoLuong}}</td>
                                        <td><input type="number" style="width: 50px;" name="slsp[{{$sanpham->IDSanPham}}]" min="1" value="1" max="{{$sanpham->SoLuong}}"></td>
                                        <td class="center"><input name="sanpham[]" value="{{$sanpham->IDSanPham}}" type="checkbox"></td>
                                    </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-offset-5 col-lg-10">
                                <button class="btn btn-danger" type="submit">Thêm Mới</button>
                                <a class="btn btn-default" href="" >Quay Lại</a>
                            </div>
                        </div>
                    </div>
                </section>
                </form>
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
    <script src="{{url('public/admin/js/jquery-ui-1.9.2.custom.min.js')}}"></script>
    <script src="{{url('public/admin/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{url('public/admin/js/bootstrap.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{url('public/admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{url('public/admin/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{url('public/admin/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script type="text/javascript" language="javascript" src="{{url('public/admin/assets/advanced-datatable/media/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin/assets/data-tables/DT_bootstrap.js')}}"></script>
    <script src="{{url('public/admin/js/respond.min.js')}}"></script>

    <!--right slidebar-->
    <script src="{{url('public/admin/js/slidebars.min.js')}}"></script>

    <!--dynamic table initialization -->
    <script src="{{url('public/admin/js/dynamic_table_init.js')}}"></script>


    <!--common script for all pages-->
    <script src="{{url('public/admin/js/common-scripts.js')}}"></script>

</body>

<!-- Mirrored from thevectorlab.net/flatlab/dynamic_table.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:46:26 GMT -->

</html>