<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - <?php echo config('app.name'); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
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
        var rootUrl = '<?php echo url(''); ?>';
        var baseUrl = '<?php echo url(''); ?>';
    </script>
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>

<?php echo $__env->make('layouts.admin.inc.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="page-container">
    <div class="page-content">
        <?php echo $__env->make('layouts.admin.inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="content-wrapper">
            <?php echo $__env->yieldContent('page-header'); ?>

            <div class="content">
                <?php echo $__env->make('layouts.admin.inc.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->yieldContent('content'); ?>
                <?php echo $__env->make('layouts.admin.inc.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
    </div>
</div>


</div>


    
        
        
        
        
    

<script> var CKEDITOR_BASEPATH = baseUrl + '/js/ckeditor/'; </script>
<script src="<?php echo e(asset('js/admin.js')); ?>"></script>









<?php echo $__env->yieldContent('scripts'); ?>

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
            var url = '<?php echo e(route('admin.reset_password')); ?>';
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


<script type="text/javascript">
    $(document).ready(function () {
        var image_resize_width = '<?php echo $imageresize ? $imageresize->image_resize_width : 0; ?>';
        var image_resize_height = '<?php echo $imageresize ? $imageresize->image_resize_height : 0; ?>';
        var aspectRation = image_resize_width/image_resize_height;

        var viewport_width = aspectRation * 200;
        var viewport_height =  200;
        var boundary_width = aspectRation * 210;
        var boundary_height = 210;

        function readURL(input) {
            $('#form1 .croppie-container').css('display', 'block');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#my-image').attr('src', e.target.result);
                    var resize = new Croppie($('#my-image')[0], {
                        viewport: {width: viewport_width, height: viewport_height},
                        boundary: {width: boundary_width, height: boundary_height},
                        showZoomer: true,
                        enableResize: false,
                        enableOrientation: false,
                        format: 'jpeg'

                    });

                    $('.use').fadeIn();
                    $('.cancle-btn').fadeIn();
                    $('.use').each(function (index) {
                        $(this).on('click', function () {
                            resize.result({
                                type: 'canvas',
                                size: {width: image_resize_width, height: image_resize_height}
                            }).then(function (dataImg) {
                                var data = [{image: dataImg}, {name: 'myimgage.jpg'}];
                                if ($('#leftmenu').is(':empty')) {
                                    // use ajax to send data to php
                                    $('.result').css('display', 'block');
                                    $('.result').append('<img src="' + dataImg + '" style="width:'+viewport_width+'px; height:'+viewport_height+'px"    >');
                                    $('.fileimage').val(dataImg);
                                    $('.displayimage').css('display', 'none');
                                } else {
                                    $('.result').empty();
                                    $('.result').css('display', 'block');
                                    $('.result').append('<img src="' + dataImg + '" style="width:'+viewport_width+'px; height:'+viewport_height+'px"    >');
                                    $('.fileimage').val(dataImg);
                                    $('.displayimage').css('display', 'none');
                                }

                            });

                        })

                    });
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
        $('.cancle-btn').on('click', function () {
            $('#form1 .croppie-container').hide();
            $('#form1 .cr-image').attr('src', '');
            $('#form1 .cr-boundary').remove();
            $('#form1 .cr-slider').remove();
            $('.result').empty();
            $('.use').hide();
            $('.cancle-btn').hide();
            $("#imgInp").val('');
            $(".fileimage").val('');
            $('.displayimage').css('display', 'block');
        })
    });
</script>
</body>
</html>