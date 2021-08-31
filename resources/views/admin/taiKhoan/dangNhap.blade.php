<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">
    <title>Đăng Nhập Hệ Thống</title>
    <link href="{{url('public/admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('public/admin/css/bootstrap-reset.css')}}" rel="stylesheet">
    <link href="{{url('public/admin/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{url('public/admin/css/style.css')}}" rel="stylesheet">
    <link href="{{url('public/admin/css/style-responsive.css')}}" rel="stylesheet" />
</head>

<body class="login-body">
    <div class="container">
        <form class="form-signin" action="{{route('admin.dangNhapP')}}" method="post">
            {{ csrf_field() }}
            <h2 class="form-signin-heading">Đăng Nhập Hệ Thống</h2>
            <div class="login-wrap">
                @error('Username')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
                <input type="text" class="form-control" name="Username" placeholder="Tài Khoản" autofocus required>
                @error('Password')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
                <input type="password" class="form-control" name="Password" placeholder="Mật Khẩu" required>
                <button class="btn btn-lg btn-login btn-block" type="submit">Đăng Nhập</button>
            </div>
        </form>
    </div>
    <script src="{{url('public/admin/js/jquery.js')}}"></script>
    <script src="{{url('public/admin/js/bootstrap.min.js')}}"></script>
</body>

</html>