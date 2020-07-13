<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- CSS Files -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Muli:200,400,700" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/aos.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/page_loader.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/login_style.css') }}" rel="stylesheet">

</head>

<body class="BodyBefore">

<div class="container">
    <div class="row FullFormSection">
        <div class="col-md-12 FullFormCol">

            <div class="row">
                <div class="col-md-12 PMSLabel">
                    Login System
                </div>
            </div>

            <div class="row LoginForm">
                <div class="col-md-12">
                    <form method="POST" id="LoginForm">
                        @csrf
                        <div class="InputTypesOnly">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="text" class="col-form-label text-md-left LoginText">Email</label>
                                </div>
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="password" class="col-form-label text-md-left LoginText">Password</label>
                                </div>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 LoginErrorLabel">
                            </div>
                        </div>

                        <div class="row LoginBtnSection">
                            <div class="col-md-12">
                                <button type="button" class="btn LoginBtn">
                                    <span class="LoginIcon"><i class="fas fa-user-lock"></i></span>
                                    <span class="LoginLabel">Login</span>
                                </button>

                            </div>
                        </div>

                        <div class="row HomeBtnSection">
                            <div class="col-md-12">
                                <a href="{{url("/")}}" class="home_btn">Home</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="IndexPageLoader no-freeze-spinner">
    <div id="no-freeze-spinner">
        <div>
            <i class="material-icons">
                account_circle
            </i>
            <i class="material-icons">
                home
            </i>
            <i class="material-icons">
                work
            </i>
            <div>
            </div>
        </div>
    </div>
</div>

<!--   Core JS Files   -->
<script src="{{ URL::asset('assets/js/jquery-3.5.1.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/js/jquery-3.3.1.slim.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/popper.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/main_nav_script.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/js/aos.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/js/jquery-3.5.1.min.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $(".IndexPageLoader").removeClass("no-freeze-spinner");
        $("body").removeClass("BodyBefore");

        $("#email").click(function () {
            $(".LoginErrorLabel").empty();
        });

        $("#password").click(function () {
            $(".LoginErrorLabel").empty();
        });

        $(".LoginBtn").click(function () {
            $(".LoginErrorLabel").empty();
            let home_page = '{{url('home')}}';

            if($('#email').val() == "") {
                $(".LoginErrorLabel").empty();
                $(".LoginErrorLabel").text("Please enter your email");
            } else if($('#password').val() == "") {
                $(".LoginErrorLabel").empty();
                $(".LoginErrorLabel").text("Please enter your password");
            } else {
                $.ajax({
                    url:"{{ route('login') }}",
                    method:'POST',
                    data: {
                        email: $('#email').val(),
                        password: $('#password').val(),
                        _token: '{{csrf_token()}}'
                    },
                    success:function(res){
                        // location.reload();
                        window.location.href = home_page;
                    },
                    error: function (jqXHR) {
                        // console.log(jqXHR.responseJSON.errors.email[0]);
                        $(".LoginErrorLabel").html("These credentials do not match our records");
                        $('#LoginForm').trigger("reset");
                    }
                });
            }
        });

    });
</script>

</body>
</html>