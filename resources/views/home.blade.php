@extends('templates.main_template')

@section('css_content')
    <link href="{{ URL::asset('assets/css/home_style.css') }}" rel="stylesheet" />
@endsection

@section('content')

    @include('layouts.main_nav_logout')

    <div class="container full-height">
        <div class="row">
            <div class="col-md-12 welcome_text">Home Page</div>
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