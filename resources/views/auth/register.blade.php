@extends('templates.main_template')

@section('css_content')
    <link href="{{ URL::asset('assets/css/register_style.css') }}" rel="stylesheet" />
@endsection

@section('content')
  
  <div class="container full-height">
    
  <div class="UserRegText col-md-12">
            User Registration Form
        </div>

        <div class="UserRegForm">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" id="member_reg_form" enctype="multipart/form-data">
            @csrf

            <div class="row SetTop">
                <div class="col-md-6 col-sm-3 UserInputSection">
                    <label for="validationCustom01" class="InputLabels">Your Name</label>
                    <input type="text" class="form-control" id="member_name" placeholder="Name" name="member_name">
                </div>
                
                <div class="col-md-6 col-sm-3 UserInputSection">
                    <label for="validationCustom05" class="InputLabels">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="email" name="email">
                </div>

            </div>

            <div class="row SetTop">
                <div class="col-md-6 col-sm-3 UserInputSection">
                    <label for="validationCustom04" class="InputLabels">National ID</label>
                    <input type="text" class="form-control" id="national_id" placeholder="National ID" name="national_id" maxlength="12">
                </div>

                <div class="col-md-6 col-sm-2 UserInputSection">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1" class="InputLabels">Contact No</label>
                        <input type="text" class="form-control" id="contact_no" placeholder="Contact No" name="contact_no">
                    </div>
                </div>
            </div>

            <div class="row SetTop">
                <div class="col-md-12 col-sm-3 UserInputSection">
                    <label for="validationCustom04" class="InputLabels">Home Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Address" name="address">
                </div>
            </div>

            <div class="row SetTop"> <!-- SetTop-->
               
                <div class="col-md-6 col-sm-2 UserInputSection">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1" class="InputLabels">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                </div>
                <div class="col-md-6 col-sm-2 UserInputSection">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1" class="InputLabels">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password" name="confirm_password">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-3">
                    <button class="btn RegBtn" type="submit" id="RegSaveBtn">Register</button>
                </div>
                <div class="col-md-6 col-sm-3 LoginLinkSection">
                    <a href="{{url("login")}}" class="LoginLink">Login</a>
                </div>
            </div>


        </form>

    </div>

  </div>

@endsection

@section('js_content')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
    <script>

        AOS.init({
            // disable: false,
            offset: 10, // offset (in px) from the original trigger point
            duration: 1000, // values from 0 to 3000, with step 50ms

        });

        $.validator.setDefaults({});

        $(document).ready(function () {
            $("#member_reg_form").validate({
                rules: {
                    member_name: {
                        required: true
                    },
                    national_id: {
                        required: true,
                        minlength: 10,
                        maxlength: 12
                    },
                    contact_no: {
                        required: true,
                        minlength: 10,
                        number: true
                    },
                    address: {
                        required: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    confirm_password: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    },
                    email: {
                        required: true,
                        email: true
                    },

                },
                messages: {
                    member_name: {
                        required: "Please enter your name"
                    },
                    national_id: {
                        required: "Please enter your national Id number",
                        minlength: "Your number must be at least 10 characters long",
                        maxlength: "Your number can not no longer than 12"
                    },
                    contact_no: {
                        required: "Please provide your contact number",
                        minlength: "Your number must be at least 10 characters long"
                    },
                    address: {
                        required: "Please provide your home address",
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    confirm_password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long",
                        equalTo: "Please enter the same password as above"
                    },
                    email: "Please enter a valid email address",

                },
                errorElement: "em",
                errorPlacement: function (error, element) {
                    // Add the `help-block` class to the error element
                    error.addClass("help-block");

                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.parent("label"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
                }
            });
        });
    </script>
@endsection