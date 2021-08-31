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
    <link href="{{url('public/admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('public/admin/css/bootstrap-reset.css')}}" rel="stylesheet">
    <link href="{{url('public/admin/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{url('public/admin/assets/advanced-datatable/media/css/demo_page.css')}}" rel="stylesheet" />
    <link href="{{url('public/admin/assets/advanced-datatable/media/css/demo_table.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{url('public/admin/assets/data-tables/DT_bootstrap.css')}}" />
    <link href="{{url('public/admin/css/slidebars.css')}}" rel="stylesheet">
    <link href="{{url('public/admin/css/style.css')}}" rel="stylesheet">
    <link href="{{url('public/admin/css/style-responsive.css')}}" rel="stylesheet" />
</head>
@if(!empty(session()->get("messThemBaiViet")))
<script>
    alert("Thêm Bài Viết Thành Công !!!");
</script>
@php
session()->forget('messThemBaiViet');
@endphp
@endif
@if(!empty(session()->get("messXoaBaiViet")))
<script>
    alert("Xóa Bài Viết Thành Công !!!");
</script>
@php
session()->forget('messXoaBaiViet');
@endphp
@endif

@if(!empty(session()->get("messCapNhatBaiViet")))
<script>
    alert("Cập Nhât Bài Viết Thành Công !!!");
</script>
@php
session()->forget('messCapNhatBaiViet');
@endphp
@endif
<body>
    <section id="container" class="">
        @include('admin.include.header')
        @include('admin.include.sidebar')
        @php 
        use App\NhanVien;
        $i=1;
        @endphp
        <section id="main-content">
            <section class="wrapper">
                <div class="row">
                    <div class="col-sm-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Danh Sách Bài Viết
                                <span class="tools pull-right">
                                    <a href="{{route('admin.themBaiViet')}}" class="btn btn-info" style="color: white;">Thêm Bài Viết</a>
                                </span>
                                <br>
                                <br>
                            </header>
                            <div class="panel-body">
                                <div class="adv-table">
                                    <table class="display table table-bordered table-striped" id="dynamic-table">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tiêu Đề</th>
                                                <th>Ảnh</th>
                                                <th>Tác Giả</th>
                                                <th >Chức Năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($baiViets as $baiViet)
                                            <tr class="gradeX">
                                                <td>{{$i++}}</td>
                                                <td>{{$baiViet->TieuDe}}</td>
                                                <td><img src="{{url($baiViet->ImgBaiViet)}}" style="width: 60px; height: 60px;" alt=""></td>
                                                <td>{{NhanVien::where('IDNhanVien',$baiViet->NhanVienID)->first()->TenNhanVien}}</td>
                                                <td class="center hidden-phone">
                                                    <a href="{{url('/admin/sua-bai-viet/')}}/{{$baiViet->IDBaiViet}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{url('/admin/xoa-bai-viet/')}}/{{$baiViet->IDBaiViet}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
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
            </section>
        </section>
        @include('admin.include.footer')
    </section>
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
    <script src="{{url('public/admin/js/slidebars.min.js')}}"></script>
    <script src="{{url('public/admin/js/dynamic_table_init.js')}}"></script>
    <script src="{{url('public/admin/js/common-scripts.js')}}"></script>
</body>
</html>