<?php $__env->startSection('title', $event->title); ?>
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
                        <span class="caption mb-3"><?php echo e($event['title']); ?></span>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-7  col-md-8 col-lg-8 ">
                    <div class="media-with-text">
                        <div class="img-border-sm mb-4">
                            <a href="javascript:void(0)" class="image-play">
                                <?php if(file_exists('storage/'.$event['image']) && $event['image'] !==''): ?>
                                <img src="<?php echo e(asset('storage/'.$event['image'])); ?>" alt="<?php echo e($event['image']); ?>" class="img-fluid">
                                    <?php endif; ?>
                            </a>
                        </div>
        <p><?php echo $event['description']; ?></p>
                    </div>
                </div>

                <div class="col-sm-5  col-md-4 col-lg-4">

                    <div class="other">
                        <ul>
                            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evnt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="row other_row">
                                    <div class="col-md-4 col-sm-4 col-xs-4 other_col">
                                        <a href="<?php echo e(route('event.show',[$evnt->slug])); ?>" >
                                            <?php if(file_exists('storage/'.$evnt->image) && $evnt->image !==  ''): ?>
                                            <img src="<?php echo e(asset('storage/'.$evnt->image)); ?>" alt="<?php echo e($evnt->title); ?>" class="img-fluid">
                                                <?php endif; ?>
                                        </a></div>
                                    <div class="col-md-8 col-sm-8 col-xs-8 other_col">
                                        <div class="media-with-text">
                                            <h2 class="heading mb-0"><a href="<?php echo e(route('event.show',[$evnt->slug])); ?>"><?php echo e(str_limit($evnt->title,'50','....')); ?></a></h2>
                                            <span class="mb-3 d-block post-date"><?php echo e(\Carbon\Carbon::parse($evnt->created_at)->toFormattedDateString()); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>






                        </ul>
                        <div class="clear"></div>
                    </div>

                </div>




            </div>



        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>