@extends('templates.main_template')

@section('css_content')
    <link href="{{ URL::asset('assets/css/home_style.css') }}" rel="stylesheet" />
@endsection

@section('content')

    @include('layouts.main_nav_logout')

    <div class="container full-height">
        <div class="row">
            <div class="col-md-12 home_page_text">Home Page</div>
            <div class="col-md-12 edit_text">For edit, just type top of the text and then click edit button</div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div id="live_data"></div>
            </div>
        </div>

    </div>




@endsection

@section('js_content')

    <script>

        function fetch_data()
        {
            $.ajax({
                url:"{{ route('set_data_to_table') }}",
                method:"get",
                success:function(data){
                    $('#live_data').html(data);
                }
            });
        }

        fetch_data();

        $(document).on('click', '#input_product_name', function(){
            $(this).empty();
        });

        $(document).on('click', '#input_small_description', function(){
            $(this).empty();
        });

        $(document).on('click', '#btn_add', function(){
            let input_product_name = $('#input_product_name').text();
            let input_small_description = $('#input_small_description').text();
            if(input_product_name == '')
            {
                alert("Enter Product Name");
                return false;
            }
            if(input_small_description == '')
            {
                alert("Enter Small Description");
                return false;
            }
            $.ajax({
                url:"{{route('save_table_data')}}",
                method:"POST",
                data: {
                    product_name: input_product_name,
                    small_description: input_small_description,
                    _token: '{{csrf_token()}}'
                },
                dataType:"text",
                success:function(data)
                {
                    alert(data);
                    fetch_data();
                }
            })
        });

        $(document).on('click', '.btn_edit', function(){
            let product_id = $(this).closest("tr").find('.product_id').text();
            let update_product_name = $(this).closest("tr").find('.input_product_name').text();
            let update_small_description = $(this).closest("tr").find('.input_small_description').text();

            $.ajax({
                url:"{{route('edit_table_data')}}",
                method:"POST",
                data: {
                    product_id: product_id,
                    product_name: update_product_name,
                    small_description: update_small_description,
                    _token: '{{csrf_token()}}'
                },
                dataType:"text",
                success:function(data)
                {
                    alert(data);
                    fetch_data();
                }
            })
        });

        $(document).on('click', '.btn_delete', function(){
            let product_id = $(this).closest("tr").find('.product_id').text();

            $.ajax({
                url:"{{route('delete_table_data')}}",
                method:"POST",
                data: {
                    product_id: product_id,
                    _token: '{{csrf_token()}}'
                },
                dataType:"text",
                success:function(data)
                {
                    alert(data);
                    fetch_data();
                }
            })
        });

        AOS.init({
            // disable: false,
            offset: 10, // offset (in px) from the original trigger point
            duration: 1000, // values from 0 to 3000, with step 50ms

        });
    </script>
@endsection