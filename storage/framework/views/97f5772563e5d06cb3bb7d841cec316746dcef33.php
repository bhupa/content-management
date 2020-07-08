<?php $__env->startSection('title', 'Event'); ?>
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

                        <h1 class="">Event</h1>
                        <span class="caption mb-3">Event List</span>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="site-section">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-6 col-lg-4 mb-5">
                    <div class="media-with-text">
                        <div class="img-border-sm mb-4">
                            <a href="<?php echo e(route('event.show',[$event->slug])); ?>" class=" image-play">
                                <?php if(file_exists('storage/'.$event->image) && $event->image !==''): ?>
                                <img src="<?php echo e(asset('storage/'.$event->image)); ?>" alt="<?php echo e($event->title); ?>" class="img-fluid">
                                    <?php endif; ?>
                            </a>
                        </div>
                        <h2 class="heading mb-0"><a href="<?php echo e(route('event.show',[$event->slug])); ?>"><?php echo str_limit($event->title,'35','.....'); ?></a></h2>
                        <span class="mb-3 d-block post-date"><?php echo e(\Carbon\Carbon::parse($event->created_at)->toFormattedDateString()); ?></span>
                        <p><?php echo str_limit($event->short_description,'150','.....'); ?></p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>



        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>