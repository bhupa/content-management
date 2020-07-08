<?php $__env->startSection('title', 'Roomlist'); ?>
<?php $__env->startSection('style_css'); ?>
    <style >
        .site-blocks-cover, .site-blocks-cover .row { min-height:250px !important; height:auto !important; padding-top: 40px;}
        .site-blocks-cover h1 {font-size: 2rem}
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header_js'); ?>
    <script type="text/javascript">

        $('div.alert').delay(3000).slideUp(300);


    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
    <?php if($contentbanner['image']  !==''): ?>
        <div class="site-blocks-cover overlay" style="background-image: url('<?php echo e(asset('storage/'.$contentbanner['image'])); ?>')" data-aos="fade" data-stellar-background-ratio="0.5" >
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7 text-center" data-aos="fade">

                        <h1 class="">Roomlist</h1>
                        <span class="caption mb-3">Room Lists</span>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>