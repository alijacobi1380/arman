<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ورود به حساب کاربری</title>

    <link rel="icon" type="image/x-icon" href="{{url('images/logo.png')}}">

    <!-- styles  -->
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" type="text/css" href="{{url('assets/login/css/bootstrap4-rtl.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/login/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/login/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/login/css/style.css')}}" />
    <!--/ styles  -->

</head>

<body class="rtl">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">

                <!-- form -->
                <form method="POST" action="{{route('login')}}" class="login100-form validate-form">
                    @csrf
                    <!-- logo of form -->
                    <span class="login100-form-title p-b-48">
                        <!-- <a href="{{route('main')}}"><img class="logo" src="{{url('images/logo.jpg')}}" width="200px"></a> -->
                        <h1>مبل ایران</h1>
                    </span>
                    <!-- / logo of form -->

                    <!-- <span class="login100-form-title p-b-26 text-secondary">ورود به ناحیه کاربری</span> -->

                    <!-- please enter your email -->
                    <div class="wrap-input100 validate-input" data-validate="لطفا نام کاربری خود را وارد کنید!">
                        <input class="input100" type="text" name="username">
                        <span class="focus-input100" data-placeholder="نام کاربری"></span>
                    </div>
                    <!--  / please enter your email -->

                    <!-- please enter your username -->
                    <div class="wrap-input100 validate-input" data-validate="لطفا رمز عبور خود را وارد کنید!">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100" data-placeholder="رمز عبور"></span>
                    </div>
                    <!-- /  please enter your username -->

                    <!-- login button -->
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">ورود</button>
                        </div>
                    </div>
                    <!-- / login button -->


                </form>

                <br>
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-secondary text-center" role="alert">
                    {{$error}}
                </div>
                @endforeach
                @endif

                <!-- / form -->

            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{url('assets/login/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{url('assets/login/js/bootstrap.min.js')}}"></script>
    <script src="{{url('assets/login/js/scripts.js')}}"></script>
    <!-- / Scripts -->

</body><!-- This template has been downloaded from Webrubik.com -->

</html>