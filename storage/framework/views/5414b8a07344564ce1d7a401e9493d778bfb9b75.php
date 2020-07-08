<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Xmart">
    <meta name="keywords" content="Xmart">
    <!-- <meta name="author" content=""> -->
    <meta name="author" content="Xmart">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="icon" type="image/png" href="<?php echo e(asset('frontend/img/favicon.png')); ?>">
    <!--  Favicon  -->

    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>">

    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" crossorigin="anonymous">
    <link href="<?php echo e(asset('frontend/css/style.css')); ?>" rel="stylesheet">
    <!--  Css  -->

    <!-- Animation -->
    <link href="<?php echo e(asset('frontend/css/animate.min.css')); ?>" rel="stylesheet">
    <script src="<?php echo e(asset('frontend/js/wow.min.js')); ?>"></script>
    <script>new WOW().init();</script>
    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }
        .error {
            color:red !important;
        }
    </style>
    <?php echo $__env->yieldContent('style_css'); ?>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-none fixed-top scroll-top-wrapper">
    <div class="container"> <a class="navbar-brand" href="<?php echo e(route('home')); ?>"><img class="logo-light" src="<?php echo e(asset('frontend/img/logo.png')); ?>" alt="" type=""><img class="logo-dark" src="<?php echo e(asset('frontend/img/logo-dark.png')); ?>" alt="" type=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
        <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item" > <a class="nav-link" href="<?php echo e(route('home')); ?>">Home<?php if(Request::segment(1)=='' ){
                            echo '<span class="sr-only"></span>';
                        }?></a> </li>

                <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if($content->child->isEmpty() && $content->parent_id == ''): ?>

                        <li class="nav-item active"> <a class="nav-link" href="<?php echo e(route('content.show',[$content->slug])); ?>"><?php echo e($content->title); ?> <?php if(Request::segment(1)=='content' &&  Request::segment(2)==$content->slug ){
                                    echo '<span class="sr-only"></span>';
                                }?></a> </li>
                    <?php else: ?>
                        <?php if($content->child->isNotEmpty() && $content->parent_id == ''): ?>
                            <li class="nav-item dropdown">
                              <?php $sub_menus = $content->child()->pluck('slug')->toArray();?>
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($content->title); ?>

                                  <?php if(Request::segment(1) == 'content' && (Request::segment(2) == $content->slug || in_array(Request::segment(2), $sub_menus))): ?>
                                       <span class="sr-only"></span>
                                      <?php endif; ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdown07">

                                 <?php $__currentLoopData = $content->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <a class="dropdown-item" href="<?php echo e(route('content.show',[$submenu->slug])); ?>"><?php echo e($submenu->title); ?>


                                    </a>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services<?php if(Request::segment(1)=='servicescategory' ){
                            echo '<span class="sr-only"></span>';
                        }?> <?php if(Request::segment(1)=='services' ){
                            echo '<span class="sr-only"></span>';
                        }?></a>
                    <div class="dropdown-menu" aria-labelledby="dropdown07">
                        <?php $__currentLoopData = $servicecategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicecategorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a class="dropdown-item" href="<?php echo e(route('services.show',[$servicecategorie->id])); ?>"><?php echo e($servicecategorie->title); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </li>
                <li class="nav-item"> <a class="nav-link " href="<?php echo e(route('products.index')); ?>">Products<?php if(Request::segment(1)=='products' ){
                            echo '<span class="sr-only"></span>';
                        }?></a> </li>
                <li class="nav-item"> <a class="nav-link " href="<?php echo e(route('contact.index')); ?>">Contact<?php if(Request::segment(1)=='contact' ){
                            echo '<span class="sr-only"></span>';
                        }?></a> </li>
                <li class="nav-item"> <a class="nav-link " href="<?php echo e(route('career.index')); ?>">Career<?php if(Request::segment(1)=='career' ){
                            echo '<span class="sr-only"></span>';
                        }?></a> </li>
            </ul>
        </div>
    </div>
</nav>

<!--    Slider    -->

<!--    Menu    -->

<!--    Contact    -->



<?php echo $__env->yieldContent('main'); ?>



<!-- start footer -->
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!--  Jquery  -->
<script src="<?php echo e(asset('frontend/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/popper.min.js')); ?>"></script>
<?php echo $__env->yieldContent('script'); ?>
<script type="text/javascript">

$(document).ready(function(){


    $(window).scroll(function() {
        if ($(this).scrollTop() > 1){
            $('.scroll-top-wrapper').addClass("show");
        }
        else{
            $('.scroll-top-wrapper').removeClass("show");
        }
    });
});

    $(document).ready(function(){

        $('.text').hide();
        $('.expander').click(function () {
            // .parent() selects the A tag, .next() selects the P tag
            $(this).parent().next().slideToggle(200);
        });
        $('.text').slideUp(200);

//        $('#contact_form').on('submit', function (event) {
            event.preventDefault();
            $('#contact_form').validate({
                rules: {
                    name: 'required',
                    message: 'required',
                    email: {
                        required: true,
                        email: true,
                    }
                },
                messages: {
                    name: 'This field is required',
                    message: 'This field is required',
                    email: 'Enter a valid email',
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        dataType: "json",
                        success: function (response) {
                            if (response.status == 'true') {
                                jQuery('.alert-success').show();
                                jQuery('.alert-success').append('<p>' + response.message + '</p>');
                                setTimeout(function(){
                                    jQuery('.alert-success').fadeOut('slow');
                                    jQuery('.alert-success').empty();
                                }, 6000);

                            } else if (response.status == 'false') {
                                jQuery('.error').show();
                                jQuery('.error').append('<p class="alert-danger">' + response.errors.email + '</p>');
                                setTimeout(function () {
                                    jQuery('.error').empty();
                                }, 6000);
                            }
                        },
                        error: function (xhr) {
                            $('#validation-errors').html('');
                            $.each(xhr.responseJSON, function(key,value) {
                                $("#" + key + "").addClass('alert alert-danger');
                                '<div class="alert alert-danger">'+$("#" + key + "").text(value)+'</div>';
                                setTimeout(function () {
                                    jQuery("#" + key + "").removeClass('alert alert-danger');
                                    jQuery("#" + key + "").text('');
                                }, 6000);
                            });

                        }
                    });
                }
            });

        });

//    });
</script>

</body>
</html>
