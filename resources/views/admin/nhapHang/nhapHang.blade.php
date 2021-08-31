<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/flatlab/advanced_form_components.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:45:30 GMT -->

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

    <link rel="stylesheet" type="text/css" href="{{url('public/admin/assets/bootstrap-fileupload/bootstrap-fileupload.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/admin/assets/bootstrap-datepicker/css/datepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/admin/assets/bootstrap-timepicker/compiled/timepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/admin/assets/bootstrap-colorpicker/css/colorpicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/admin/assets/bootstrap-daterangepicker/daterangepicker-bs3.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/admin/assets/bootstrap-datetimepicker/css/datetimepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/admin/assets/jquery-multi-select/css/multi-select.css')}}" />

    <!--right slidebar-->
    <link href="{{url('public/admin/css/slidebars.css')}}" rel="stylesheet">

    <!--  summernote -->
    <link href="{{url('public/admin/assets/summernote/dist/summernote.css')}}" rel="stylesheet">

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
        <!--header end-->
        <!--sidebar start-->
        @include('admin.include.sidebar')
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">

                <div class="row" style="margin-bottom: 400px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Thêm Sản Phẩm
                            </header>
                            <div class="panel-body">
                                <div class=" form">
                                    <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="{{route('nhapHangPP')}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-2">Tên Sản Phẩm</label>
                                            <div class="col-lg-10">
                                                @error('TenSanPham')
                                                <small class="form-text text-danger">{{$message}}</small>
                                                @enderror
                                                <input class=" form-control" id="cname" value="{{$sanPham->TenSanPham}}" disabled name="TenSanPham" minlength="2" type="text" required />
                                            </div>
                                        </div>
                                        <input type="text" name="SanPhamID" value="{{$sanPham->IDSanPham}}" hidden id="">
                                        <div class="form-group ">
                                            <label for="cemail" class="control-label col-lg-2">Giá Nhập</label>
                                            <div class="col-lg-10">
                                                @error('GiaBan')
                                                <small class="form-text text-danger">{{$message}}</small>
                                                @enderror
                                                <input class="form-control " id="cemail" type="number" name="GiaNhap" required />
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="cemail" class="control-label col-lg-2">Số Lượng</label>
                                            <div class="col-lg-10">
                                                @error('GiaBan')
                                                <small class="form-text text-danger">{{$message}}</small>
                                                @enderror
                                                <input class="form-control " id="cemail" type="number" name="SoLuong" required />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Nhà Cung Cấp</label>
                                            <div class="col-lg-10">
                                                @error('DanhMucID')
                                                <small class="form-text text-danger">{{$message}}</small>
                                                @enderror
                                                <select multiple class="form-control" name="NhaCungCapID">
                                                    @foreach($nhaCungCaps as $nhaCungCap)
                                                    <option value="{{$nhaCungCap->IDNhaCungCap}}">{{$nhaCungCap->TenNhaCungCap}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button class="btn btn-danger" type="submit">Nhập Hàng</button>
                                                <a class="btn btn-default">Quay Lại</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </section>
                    </div>
                </div>

                <!--Advanced File Input start-->

                <!--Advanced File Input end-->

                <!--wysihtml5 start-->

                <!--wysihtml5 end-->

                <!--Summernote start-->

                <!--Summernote end-->


                <!-- page end-->
            </section>
        </section>
        <!--main content end-->



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

    <!--this page plugins-->

    <script type="text/javascript" src="{{url('public/admin/assets/fuelux/js/spinner.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin/assets/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin/assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin/assets/bootstrap-daterangepicker/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin/assets/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin/assets/bootstrap-timepicker/js/bootstrap-timepicker.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin/assets/jquery-multi-select/js/jquery.multi-select.js')}}"></script>
    <script type="text/javascript" src="{{url('public/admin/assets/jquery-multi-select/js/jquery.quicksearch.js')}}"></script>


    <!--summernote-->
    <script src="{{url('public/admin/assets/summernote/dist/summernote.min.js')}}"></script>

    <!--right slidebar-->
    <script src="{{url('public/admin/js/slidebars.min.js')}}"></script>

    <!--common script for all pages-->
    <script src="{{url('public/admin/js/common-scripts.js')}}"></script>
    <!--this page  script only-->
    <script src="{{url('public/admin/js/advanced-form-components.js')}}"></script>

    <script>
        jQuery(document).ready(function() {

            $('.summernote').summernote({
                height: 200, // set editor height

                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor

                focus: true // set focus to editable area after initializing summernote
            });
        });
    </script>

</body>

<!-- Mirrored from thevectorlab.net/flatlab/advanced_form_components.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:45:49 GMT -->

</html>