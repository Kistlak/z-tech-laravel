@extends('templates.main_template')

@section('css_content')
    <link href="{{ URL::asset('assets/css/index_style.css') }}" rel="stylesheet" />
@endsection

@section('content')
  
  <div class="container full-height">
    <div class="row">
        <div class="col-md-12 welcome_text">Welcome</div>
        <div class="col-md-12 btn_section login_btn_section">

            @if(Auth::check())
                <a class="login_btn" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fas fa-user-lock IconRight"></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a href="{{url('login')}}" class="login_btn">
                <span class=""><i class="fas fa-user IconRight"></i></span>
                <span class="">Login</span>
            </a>
            @endif

        </div>
        <div class="col-md-12 btn_section reg_btn_section">
            <a href="{{url('register')}}" class="reg_btn">
            <span class=""><i class="fas fa-users IconRight"></i></span>
            <span class="">Register</span>
            </a>
        </div>
    </div>
  </div>

@endsection

@section('js_content')

    <script>

        AOS.init({
            // disable: false,
            offset: 10, // offset (in px) from the original trigger point
            duration: 1000, // values from 0 to 3000, with step 50ms

        });
    </script>
@endsection