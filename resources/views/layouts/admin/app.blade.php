<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - {!! config('app.name') !!}</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.3/croppie.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
    <style>
        img {
            max-width: 100%; /* This rule is very important, please do not ignore this! */
        }


        #my-image, .use, .cancle-btn,.use-icon,.cancle-btn-icon,#my-icon {
            display: none;
        }
    </style>

    <script>
        var rootUrl = '{!! url('') !!}';
        var baseUrl = '{!! url('') !!}';
    </script>
    @yield('styles')
</head>
<body>

@include('layouts.admin.inc.header')
<div class="page-container">
    <div class="page-content">
        @include('layouts.admin.inc.sidebar')
        <div class="content-wrapper">
            @yield('page-header')

            <div class="content">
                @include('layouts.admin.inc.alert')
                @yield('content')
                @include('layouts.admin.inc.footer')
            </div>
        </div>
    </div>
</div>


</div>
{{--<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>--}}
{{--<script>--}}
    {{--var options = {--}}
        {{--filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',--}}
        {{--filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',--}}
        {{--filebrowserBrowseUrl: '/laravel-filemanager?type=Files',--}}
        {{--filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='--}}
    {{--};--}}
{{--</script>--}}
<script> var CKEDITOR_BASEPATH = baseUrl + '/js/ckeditor/'; </script>
<script src="{{ asset('js/admin.js') }}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>--}}
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>--}}


{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>--}}



@yield('scripts')

<script>
    $(document).ready(function () {

//
//            $('#datetimepicker1').datetimepicker(
//                {
//                    format: 'DD/MM/YYYY'
//                }
//            );
//            $('#datetimepicker2').datetimepicker({
//                format: 'DD/MM/YYYY'
//            });


        $('#change_password').on("click", function () {
            $("#myModal").modal();
        });

        $('#Password').on('submit', function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            var url = '{{route('admin.reset_password')}}';
            $.ajax({
                type: "post",
                url: url,
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.status == 'ok') {
                        jQuery('.alert-success').show();
                        jQuery('.alert-success').append('<p>' + response.message + '</p>');

                        setTimeout(function () {
                            $('#myModal').modal('hide');
                            $('#Password')[0].reset();
                        }, 10000);
                        $('#Password').reset();
                    } else if (response.error == 'false') {
                        jQuery('.alert-danger').show();
                        jQuery('.alert-danger').append('<p>' + response.message + '</p>');
                        setTimeout(function () {
                            $('#myModal').modal('hide');
                            $('#Password')[0].reset();
                        }, 10000);
                        $('#Password').reset();
                    } else {
                        jQuery.each(response.errors, function (key, value) {
                            jQuery('.alert-danger').show();
                            jQuery('.alert-danger').append('<p>' + value + '</p>');
                        });
                        setTimeout(function () {
                            $('#myModal').modal('hide');
                            $('#Password')[0].reset();
                        }, 10000);


                    }
                },
                error: function (xhr) {


                }
            });
        });

    });
</script>



</body>
</html>