<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Trang Chủ</title>
    <link href="{{url('public/admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('public/admin/css/bootstrap-reset.css')}}" rel="stylesheet">
    <link href="{{url('public/admin/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{url('public/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{url('public/admin/css/owl.carousel.css')}}" type="text/css">
      <link href="{{url('public/admin/css/slidebars.css')}}" rel="stylesheet">
    <link href="{{url('public/admin/css/style.css')}}" rel="stylesheet">
    <link href="{{url('public/admin/css/style-responsive.css')}}" rel="stylesheet" />
  </head>

  <body>

  <section id="container" >
      <!--header start-->
      @include('admin.include.header')
      @include('admin.include.sidebar')
      @php 
        $i=1;
        $ii=1;
        use App\KhachHang;
      @endphp
      @php 
    use App\Http\Controllers\Helper;
@endphp
      <section id="main-content">
          <section class="wrapper" style="margin-bottom: 100px;">
              <!--state overview start-->
              <div class="row state-overview">
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                              <h1 class="">
                                  {{$count_khachHang}}
                              </h1>
                              <p>Khách Hàng</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="fa fa-tags"></i>
                          </div>
                          <div class="value">
                              <h1 class="">
                                  {{$count_nhanVien}}
                              </h1>
                              <p>Nhân Viên</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="fa fa-shopping-cart"></i>
                          </div>
                          <div class="value">
                              <h1 class=" ">
                                  {{$count_donHang}}
                              </h1>
                              <p>Đơn Hàng</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="fa fa-bar-chart-o"></i>
                          </div>
                          <div class="value">
                              <h1 class=" ">
                              {{Helper::fomatmoney($tongThu)}}
                              </h1>
                              <p>Doanh Thu</p>
                          </div>
                      </section>
                  </div>
              </div>
              <!--state overview end-->

              <div class="row">
                  <div class="col-lg-12">
                      <!--custom chart start-->
                      <div class="border-head">
                          <h3>Thống Kê Doanh Thu Năm: {{$nam}}</h3>
                      </div>
                      <div class="custom-bar-chart">
                          <ul class="y-axis">
                              <li><span>100</span></li>
                              <li><span>80</span></li>
                              <li><span>60</span></li>
                              <li><span>40</span></li>
                              <li><span>20</span></li>
                              <li><span>0</span></li>
                          </ul>
                          <div class="bar">
                              <div class="title">T.1</div>
                              <div class="value tooltips" data-original-title="{{$tiLe[1]}}%" data-toggle="tooltip" data-placement="top">{{$tiLe[1]}}%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">T.2</div>
                              <div class="value tooltips" data-original-title="{{$tiLe[2]}}%" data-toggle="tooltip" data-placement="top">{{$tiLe[2]}}%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">T.3</div>
                              <div class="value tooltips" data-original-title="{{$tiLe[3]}}%" data-toggle="tooltip" data-placement="top">{{$tiLe[3]}}%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">T.4</div>
                              <div class="value tooltips" data-original-title="{{$tiLe[4]}}%" data-toggle="tooltip" data-placement="top">{{$tiLe[4]}}%</div>
                          </div>
                          <div class="bar">
                              <div class="title">T.5</div>
                              <div class="value tooltips" data-original-title="{{$tiLe[5]}}%" data-toggle="tooltip" data-placement="top">{{$tiLe[5]}}%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">T.6</div>
                              <div class="value tooltips" data-original-title="{{$tiLe[6]}}%" data-toggle="tooltip" data-placement="top">{{$tiLe[6]}}%</div>
                          </div>
                          <div class="bar">
                              <div class="title">T.7</div>
                              <div class="value tooltips" data-original-title="{{$tiLe[7]}}%" data-toggle="tooltip" data-placement="top">{{$tiLe[7]}}%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">T.8</div>
                              <div class="value tooltips" data-original-title="{{$tiLe[8]}}%" data-toggle="tooltip" data-placement="top">{{$tiLe[8]}}%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">T.9</div>
                              <div class="value tooltips" data-original-title="{{$tiLe[9]}}%" data-toggle="tooltip" data-placement="top">{{$tiLe[9]}}%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">T.10</div>
                              <div class="value tooltips" data-original-title="{{$tiLe[10]}}%" data-toggle="tooltip" data-placement="top">{{$tiLe[10]}}%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">T.11</div>
                              <div class="value tooltips" data-original-title="{{$tiLe[11]}}%" data-toggle="tooltip" data-placement="top">{{$tiLe[11]}}%</div>
                          </div>
                          <div class="bar ">
                              <div class="title">T.12</div>
                              <div class="value tooltips" data-original-title="{{$tiLe[12]}}%" data-toggle="tooltip" data-placement="top">{{$tiLe[12]}}%</div>
                          </div>
                      </div>
                      <!--custom chart end-->
                  </div>
                  
              </div>
              <div class="row">
                  <div class="col-lg-4">
                      <!--user info table start-->
                      <section class="panel">
                          <div class="panel-body">
                              <a href="#" class="task-thumb">
                                  <img src="img/avatar1.jpg" alt="">
                              </a>
                              <div class="task-thumb-details">
                                  <h1><a href="#">Khách Hàng</a></h1>
                              </div>
                          </div>
                          <table class="table table-hover personal-task">
                              <tbody>
                                <tr>
                                    <td>STT</td>
                                    <td>Mã</td>
                                    <td>Tên</td>
                                    <td> Ngày Tạo</td>
                                </tr>
                                @foreach($khachHangs as $khachHang)
                                <tr>
                                    
                                    <td>{{$i++}}</td>
                                    <td>{{$khachHang->MaKhachHang}}</td>
                                    <td>{{$khachHang->TenKhachHang}}</td>
                                    <td>{{$khachHang->created_at}}</td>
                                </tr>
                               @endforeach
                              </tbody>
                          </table>
                      </section>
                      <!--user info table end-->
                  </div>
                  <div class="col-lg-8">
                      <!--work progress start-->
                      <section class="panel">
                          <div class="panel-body progress-panel">
                              <div class="task-progress">
                                  <h1>Đơn Hàng</h1>
                              </div>
                          </div>
                          <table class="table table-hover personal-task">
                              <tbody>
                              <tr>
                                  <td>STT</td>
                                  <td>Mã Đơn Hàng</td>
                                  <td>Tổng Tiền</td>
                                  <td>Số Lượng Sản Phẩm</td>
                                  <td>Trạng Thái</td>
                                  <td>Khách Hàng</td>
                                  <td>Ngày Đặt</td>
                              </tr>
                              @foreach($donHangs as $donHang)
                              <tr>
                                  <td>{{$ii++}}</td>
                                  <td>{{$donHang->MaDonHang}}</td>
                                  <td>{{Helper::fomatmoney($donHang->TongTien)}}</td>
                                  <td>{{$donHang->SoLuong}}</td>
                                  <td>{{$donHang->TrangThai}}</td>
                                  <td>{{KhachHang::where('IDKhachHang',$donHang->KhachHangID)->first()->TenKhachHang}}</td>
                                  <td>{{$donHang->created_at}}</td>
                              </tr>
                            @endforeach
                            
                              </tbody>
                          </table>
                      </section>
                      <!--work progress end-->
                  </div>
              </div>

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
    <script src="{{url('public/admin/js/jquery.sparkline.js')}}" type="text/javascript"></script>
    <script src="{{url('public/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')}}"></script>
    <script src="{{url('public/admin/js/owl.carousel.js')}}" ></script>
    <script src="{{url('public/admin/js/jquery.customSelect.min.js')}}" ></script>
    <script src="{{url('public/admin/js/respond.min.js')}}" ></script>

    <!--right slidebar-->
    <script src="{{url('public/admin/js/slidebars.min.js')}}"></script>

    <!--common script for all pages-->
    <script src="{{url('public/admin/js/common-scripts.js')}}"></script>

    <!--script for this page-->
    <script src="{{url('public/admin/js/sparkline-chart.js')}}"></script>
    <script src="{{url('public/admin/js/easy-pie-chart.js')}}"></script>
    <script src="{{url('public/admin/js/count.js')}}"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>

<!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:43:32 GMT -->
</html>
