<?php $__env->startSection('title', $room['name']); ?>
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

                        <h1 class="">Room</h1>
                        <span class="caption mb-3"><?php echo e($room['name']); ?></span>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-7  col-md-8 col-lg-8 ">


                    <div class="row no-gutters">

                        <?php $__currentLoopData = $room->roomimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="col-md-6 col-lg-3">
                            <a href="<?php echo e(asset('storage/'.$image->image)); ?>" class="image-popup img-opacity">
                                <img src="<?php echo e(asset('storage/'.$image->image)); ?>" alt="<?php echo e($room->name); ?>" class="img-fluid">
                            </a>
                        </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </div>

                    <br>
                    <div class="media-with-text">
                        <span><strong>Price:</strong><?php echo e($room->price); ?></span></br>
                        <span><strong>Number of Room:</strong><?php echo e($room->number_of_rooms); ?></span></br>

                        <p><?php echo $room['description']; ?></p>

                        <a href="<?php echo e(route('room.book',[$room->slug])); ?>" class="btn btn-danger">Inquiry</a>
                    </div>
                </div>

                <div class="col-sm-5  col-md-4 col-lg-4">

                    <div class="section-heading text-left">
                        <h2 class="mb-5" style="font-size: 24px;">Other Rooms Type</h2>
                    </div>

                    <div class="other">
                        <ul>
                            <?php $__currentLoopData = $roomlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roomlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <div class="row other_row">
                                        <div class="col-md-4 col-sm-4 col-xs-4 other_col">
                                            <a href="<?php echo e(route('room.show',[$roomlist->slug])); ?>" >
                                                <?php if(file_exists('storage/'.$roomlist->cover_image) && $roomlist->cover_image !== ''): ?>
                                                    <img src="<?php echo e(asset('storage/'.$roomlist->cover_image)); ?>" alt="<?php echo e($roomlist->title); ?>" class="img-fluid">
                                                <?php endif; ?>
                                            </a></div>
                                        <div class="col-md-8 col-sm-8 col-xs-8 other_col">
                                            <div class="media-with-text">
                                                <h2 class="heading mb-0"><a href="<?php echo e(route('room.show',[$roomlist->slug])); ?>"><?php echo str_limit($roomlist->name,'50','...'); ?></a></h2>
                                                <span class="mb-3 d-block post-date"><?php echo e($roomlist->price); ?> / per night</span>
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