<?php $__env->startSection('title', config('app.name') ); ?>
<?php $__env->startSection('style_css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('header_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
    <div class="slide-one-item home-slider owl-carousel">
        <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="site-blocks-cover overlay" style="background-image: url('<?php echo e(asset('storage/'.$banner->image)); ?>');" data-aos="fade" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 text-center" data-aos="fade">

                            <h1 class="mb-2"><?php echo e($banner->title); ?></h1>
                            <h2 class="caption"><?php echo e($banner->description); ?></h2>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





    </div>
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                    <h2 class="mb-5">Our Rooms</h2>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $roomlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roomlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="hotel-room text-center">
                        <a href="<?php echo e(route('room.show',[$roomlist->slug])); ?>" class="d-block mb-0 thumbnail">
                            <?php if(file_exists('storage/'.$roomlist->cover_image)  && $roomlist->cover_image !== ''): ?>
                            <img src="<?php echo e(asset('storage/'.$roomlist->cover_image)); ?>" alt="<?php echo e($roomlist->name); ?>" class="img-fluid">
                            <?php endif; ?>
                        </a>
                        <div class="hotel-room-body">
                            <h3 class="heading mb-0"><a href="<?php echo e(route('room.show',[$roomlist->slug])); ?>"><?php echo e($roomlist->name); ?></a></h3>
                            <strong class="price"><?php echo e($roomlist->price); ?> / per night</strong>
                        </div>
                    </div>
                </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>


    <div class="site-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mb-5 mb-md-0">

                    <div class="img-border">
                        <?php if(file_exists('storage/'.$content->image) && $content->image !== ''): ?>
                            <img src="<?php echo e(asset('storage/'.$content->image)); ?>" alt="<?php echo e($content->title); ?>" class="img-fluid">
                        <?php endif; ?>
                        </a>
                    </div>


                </div>
                <div class="col-md-5 ml-auto">


                    <div class="section-heading text-left">
                        <h2 class="mb-5"><?php echo e($content->title); ?></h2>
                    </div>
                    <p class="mb-4"><?php echo $content->description; ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                    <h2 class="mb-5">Service</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="text-center p-4 item">
                        <img src="<?php echo e(asset('frontend/images/peace.png')); ?>" alt="Peacefull" style="border-radius: 50%;width: 100px; height: 100px;">
                        <h2 class="h5" style="margin-top: 15px;">Peace Environment</h2>

                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="text-center p-4 item">
                        <img src="<?php echo e(asset('frontend/images/cctv.png')); ?>" alt="Cctv Camera" style="border-radius: 50%;width: 100px; height: 100px;">

                        <h2 class="h5" style="margin-top: 15px;">CCTV Security</h2>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="text-center p-4 item">
                        <img src="<?php echo e(asset('frontend/images/gaurd.jpg')); ?>" alt="Cctv Camera" style="border-radius: 50%;width: 100px; height: 100px;">

                        <h2 class="h5" style="margin-top: 15px;">Security Gaurd</h2>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="text-center p-4 item">
                        <img src="<?php echo e(asset('frontend/images/water.jpg')); ?>" alt="Cctv Camera" style="border-radius: 50%;width: 100px; height: 100px;">

                        <h2 class="h5" style="margin-top: 15px;">Hot & Cold</h2>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="text-center p-4 item">
                        <img src="<?php echo e(asset('frontend/images/food.png')); ?>" alt="Cctv Camera" style="border-radius: 50%;width: 100px; height: 100px;">

                        <h2 class="h5" style="margin-top: 15px;">Hygienic Food</h2>
                    </div>
                </div>

                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="text-center p-4 item">
                        <img src="<?php echo e(asset('frontend/images/meal.jpg')); ?>" alt="Cctv Camera" style="border-radius: 50%;width: 100px; height: 100px;">

                        <h2 class="h5" style="margin-top: 15px;">Different Food</h2>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="text-center p-4 item">
                        <img src="<?php echo e(asset('frontend/images/wifi.png')); ?>" alt="Cctv Camera" style="border-radius: 50%;width: 100px; height: 100px;">

                        <h2 class="h5" style="margin-top: 15px;">Free Wifi</h2>
                    </div>
                </div>
               







            </div>
        </div>
    </div>



    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                    <h2 class="mb-5">Our Gallery</h2>
                </div>
            </div>
            <div class="row no-gutters">
                <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-6 col-lg-3">
                    <?php if(file_exists('storage/'.$gallery->image) && $gallery->image !== ''): ?>
                    <a href="<?php echo e(asset('storage/'.$gallery->image)); ?>" class="image-popup img-opacity">
                        <img src="<?php echo e(asset('storage/'.$gallery->image)); ?>" alt="<?php echo e($gallery->title); ?>" class="img-fluid">
                    </a>
                        <?php endif; ?>
                </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>
        </div>
    </div>






    <div class="site-section block-14 bg-light">

        <div class="container">

            <div class="row">
                <div class="col-md-6 mx-auto text-center mb-5 section-heading">
                    <h2>What People Say</h2>
                </div>
            </div>

            <div class="nonloop-block-14 owl-carousel">
                <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="p-4">
                    <div class="d-flex block-testimony">
                        <div class="person mr-3">
                            <?php if(file_exists('storage/'.$testimonial->image) && $testimonial->image !== ''): ?>
                            <img src="<?php echo e(asset('storage/'.$testimonial->image)); ?>" alt="<?php echo e($testimonial->name); ?>" class="img-fluid rounded">
                                <?php endif; ?>
                        </div>
                        <div>
                            <h2 class="h5"><?php echo e($testimonial->name); ?></h2>
                            <blockquote><?php echo $testimonial->description; ?></blockquote>
                        </div>
                    </div>
                </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>