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
@if(!empty(session()->get("messThemThuongHieu")))
<script>
    alert("Thêm Thương Hiệu Thành Công !!!");
</script>
@php
session()->forget('messThemThuongHieu');
@endphp
@endif

@if(!empty(session()->get("messXoaThuongHieu")))
<script>
    alert("Xóa Thương Hiệu Thành Công !!!");
</script>
@php
session()->forget('messXoaThuongHieu');
@endphp
@endif

@if(!empty(session()->get("messCapNhatThuongHieu")))
<script>
    alert("Cập Nhât Thương Hiệu Thành Công !!!");
</script>
@php
session()->forget('messCapNhatThuongHieu');
@endphp
@endif

<body>

    <section id="container" class="">
        @include('admin.include.header')
        @include('admin.include.sidebar')
        @php
        $i=1;
        @endphp
        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Danh Sách Thương Hiệu
                                <span class="tools pull-right">
                                    <a href="{{route('admin.themThuongHieu')}}" class="btn btn-info" style="color: white;">Thêm Thương Hiệu</a>
                                </span>
                                <br> <br>
                            </header>
                            <div class="panel-body">
                                <div class="adv-table">
                                    <table class="display table table-bordered table-striped" id="dynamic-table">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên Thương Hiệu</th>
                                                <th>Ảnh</th>
                                                <th class="hidden-phone">Chức Năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($thuongHieus as $thuongHieu)
                                            <tr class="gradeX">
                                                <td>{{$i++}}</td>
                                                <td>{{$thuongHieu->TenThuongHieu}}</td>
                                                <td class="center hidden-phone"><img src="{{url($thuongHieu->ImgThuongHieu)}}" style="width: 60px; height: 60px;" alt=""></td>
                                                <td class="center hidden-phone">
                                                    <a href="{{url('/admin/sua-thuong-hieu/')}}/{{$thuongHieu->IDThuongHieu}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{url('/admin/xoa-thuong-hieu/')}}/{{$thuongHieu->IDThuongHieu}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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