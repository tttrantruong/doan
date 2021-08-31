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
@if(!empty(session()->get("messThemSanPham")))
<script>
    alert("Thêm Sản Phẩm Thành Công !!!");
</script>
@php
session()->forget('messThemSanPham');
@endphp
@endif

@if(!empty(session()->get("messXoaSanPham")))
<script>
    alert("Xóa Sản Phẩm Thành Công !!!");
</script>
@php
session()->forget('messXoaSanPham');
@endphp
@endif

@if(!empty(session()->get("messCapNhatSanPham")))
<script>
    alert("Cập Nhât Sản Phẩm Thành Công !!!");
</script>
@php
session()->forget('messCapNhatSanPham');
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
        use App\DanhMuc;
        use App\ThuongHieu;
        @endphp
        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                        <div class="row" style="margin-bottom: 600px;">
            <div class="col-sm-6">
                <section class="panel">
                    <header class="panel-heading">
                        Thống Kê Doanh Thu
                    </header>
                    <section class="panel">

                        <div class="panel-body">
                            <form class="form-horizontal" role="form" action="{{route('admin.thongKeDoanhThuP')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Thời Gian Bắt Đầu</label>
                                    <div class="col-lg-10">
                                        @error('batdau')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                        <input type="date" name="batdau" class="form-control" id="inputEmail1">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Thời Gian Kết Thúc</label>
                                    <div class="col-lg-10">
                                        @error('ketthuc')
                                        <small class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                        <input type="date" name="ketthuc" class="form-control" id="inputPassword1">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button type="submit" class="btn btn-danger">Thống Kê</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </section>
                </section>
            </div>
            <div class="col-sm-6">
                <section class="panel">
                    <header class="panel-heading">
                        Bảng Kết Quả
                    </header>
                    <table class="table table-striped">
                    <thead>
                            <!-- compact('tongthu','ngaybd','ngaykt') -->
                            <tr>
                                <th>STT</th>
                                <th>Ngày Bắt Đầu</th>
                                <th>Ngày Kết Thúc</th>
                                <th>Tổng Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>@if(!empty($ngaybd)) {{$ngaybd}} @endif</td>
                                <td>@if(!empty($ngaykt)) {{$ngaykt}} @endif</td>
                                <td>@if(!empty($tongthu) ){{Helper::fomatmoney($tongthu)}} @else {{0}} đ @endif</td>
                            </tr>

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