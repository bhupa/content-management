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


        $('div').on('click', '.closeDiv', function () {
            $(this).prev().remove();
            $(this).remove();
            $('#upload-file').val("");
            $('.displayimage').css('display','block');
        });

        var fileInput = document.getElementById("upload-file");

        fileInput.addEventListener("change", function (e) {

            var filesVAR = this.files;
            $('.displayimage').css('display','none');

            showThumbnail(filesVAR);

        }, false);



        function showThumbnail(files) {
            var file = files[0]

            var $thumbnail = $('#thumbnail').get(0);

            var $image = $("<img>", {
                class: "imgThumbnail upload-image-frame"
            });
            var $pDiv = $("<div>", {
                class: "divThumbnail",
                style: "float: left"
            });
            var $div = $("<div>", {
                class: "closeDiv",
                style: "float: right"
            }).html('X');

            $pDiv.append($image, $div).appendTo($thumbnail);
            var reader = new FileReader()
            reader.onload = function (e) {
                $image[0].src = e.target.result;
            }
            var ret = reader.readAsDataURL(file);
            var canvas = document.createElement("canvas");
            ctx = canvas.getContext("2d");
            $image.on('load', function () {
                ctx.drawImage($image[0], 100, 100);
            })
        }

        let today = new Date(),
            day = today.getDate(),
            month = today.getMonth()+1, //January is 0
            year = today.getFullYear();
        if(day<10){
            day='0'+day
        }
        if(month<10){
            month='0'+month
        }
        today = year+'-'+month+'-'+day;

        document.getElementById("event-date").setAttribute("min", today);
        document.getElementById("event-date").setAttribute("value", today);

    });
</script>



</body>
</html>