<!DOCTYPE html>
<html lang="en">


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
    <link rel="stylesheet" type="text/css" href="{{url('public/admin/assets/bootstrap-fileupload/bootstrap-fileupload.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/admin/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/admin/assets/bootstrap-datepicker/css/datepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/admin/assets/bootstrap-timepicker/compiled/timepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/admin/assets/bootstrap-colorpicker/css/colorpicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/admin/assets/bootstrap-daterangepicker/daterangepicker-bs3.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/admin/assets/bootstrap-datetimepicker/css/datetimepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('public/admin/assets/jquery-multi-select/css/multi-select.css')}}" />
    <link href="{{url('public/admin/css/slidebars.css')}}" rel="stylesheet">
    <link href="{{url('public/admin/assets/summernote/dist/summernote.css')}}" rel="stylesheet">
    <link href="{{url('public/admin/css/style.css')}}" rel="stylesheet">
    <link href="{{url('public/admin/css/style-responsive.css')}}" rel="stylesheet" />
</head>

<body>

    <section id="container" class="">
        @include('admin.include.header')
        @include('admin.include.sidebar')
        <section id="main-content">
            <section class="wrapper">
                <div class="row" style="margin-bottom: 200px;">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Cập Nhật Thương Hiệu
                            </header>
                            <div class="panel-body">
                                <div class=" form">
                                    <form class="cmxform form-horizontal tasi-form" id="commentForm" method="post" action="{{route('admin.suaThuongHieuP')}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group ">
                                            <label for="cname" class="control-label col-lg-2">Tên Thương Hiệu</label>
                                            <div class="col-lg-10">
                                                @error('TenThuongHieu')
                                                <small class="form-text text-danger">{{$message}}</small>
                                                @enderror
                                                <input class=" form-control" id="cname" value="{{$thuongHieu->TenThuongHieu}}" name="TenThuongHieu" minlength="2" type="text" required />
                                            </div>
                                        </div>
                                        <div class="form-group last">
                                            <label class="control-label col-md-2">Ảnh</label>
                                            <div class="col-md-10">
                                                @error('ImgThuongHieu')
                                                <small class="form-text text-danger">{{$message}}</small>
                                                @enderror
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                    </div>
                                                    <img style="width: 150px; height: 150px;" src="{{url($thuongHieu->ImgThuongHieu)}}" alt="">
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn-white btn-file">
                                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Chọn Ảnh</span>
                                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Chọn Lại</span>
                                                            <input type="file" class="default" name="ImgThuongHieu" />
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="text" value="{{$thuongHieu->IDThuongHieu}}" name="id" hidden>
                                        <input type="text" value="{{$thuongHieu->ImgThuongHieu}}" name="ImgThuongHieu2" hidden>
                                        <div class="form-group ">
                                            <label for="ccomment" class="control-label col-lg-2">Mô Tả</label>
                                            <div class="panel-body col-md-10">
                                                @error('MoTaThuongHieu')
                                                <small class="form-text text-danger">{{$message}}</small>
                                                @enderror
                                                <textarea class="summernote" name="MoTaThuongHieu" id="" cols="30" rows="10">{{$thuongHieu->MoTaThuongHieu}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button class="btn btn-danger" type="submit">Cập Nhật</button>
                                                <a class="btn btn-default">Quay Lại</a>
                                            </div>
                                        </div>
                                    </form>
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
    <script src="{{url('public/admin/js/bootstrap.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{url('public/admin/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{url('public/admin/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{url('public/admin/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script src="{{url('public/admin/js/respond.min.js')}}"></script>
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
    <script src="{{url('public/admin/assets/summernote/dist/summernote.min.js')}}"></script>
    <script src="{{url('public/admin/js/slidebars.min.js')}}"></script>
    <script src="{{url('public/admin/js/common-scripts.js')}}"></script>
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


</html>