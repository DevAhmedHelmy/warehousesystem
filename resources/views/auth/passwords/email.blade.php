<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>پنل مدیریت | صفحه ورود</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <!-- iCheck -->

  <link rel="stylesheet" href="{{asset('admin/plugins/iCheck/square/blue.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="{{asset('admin/dist/css//bootstrap-rtl.min.css')}}">

  <!-- template rtl version -->
  <link rel="stylesheet" href="{{asset('admin/dist/css//custom-style.css')}}">

</head>
<body class="hold-transition login-page">
    <div class="login-box">
    <div class="login-logo">
        <a><b>{{ __('general.Send_Password_Reset_Link') }}</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">

        <div class="card-body login-card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        <p class="login-box-msg"></p>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="mb-3 input-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                <div class="input-group-append">
                    <span class="fa fa-envelope input-group-text"></span>
                </div>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mt-4 row">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">
                        {{ __('general.Send_Password_Reset_Link') }}
                    </button>
                </div>
            </div>
        </form>
        </div>
        <!-- /.login-card-body -->
    </div>
    </div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- iCheck -->
<script src="{{asset('admin/plugins/iCheck/icheck.min.js')}}"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>
</body>
</html>

