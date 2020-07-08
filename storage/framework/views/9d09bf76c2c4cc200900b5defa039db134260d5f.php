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



</body>
</html>