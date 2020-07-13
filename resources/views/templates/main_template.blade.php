<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/logo/logo.jpg">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Kistlak Test</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- CSS Files -->
    <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/css/main_nav_style.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Muli:200,400,700" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/aos.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/page_loader.css') }}" rel="stylesheet">
    @yield('css_content')
</head>

<body class="BodyBefore">

@yield('content')

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
    });
</script>

@yield('js_content')

</body>
</html>