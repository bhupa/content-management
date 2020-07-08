<?php $__env->startSection('title', $ecd->title); ?>
<?php $__env->startSection('header_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>

    <!-- .custom-header -->
    <div id="content" class="site-content global-layout-right-sidebar">
        <div class="container">
            <div class="inner-wrapper">
                <div id="primary" class="content-area">
                    <?php if($ecdImages->isNotEmpty()): ?>
                        <h1 class="page-title"><?php echo e($ecd->title); ?></h1>
                    <?php endif; ?>
                    <main id="main" class="site-main">
                        <ul class="gallerylist galleydetail">
                            <?php $__currentLoopData = $ecdImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ecdImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <div class="item-inner-wrapper"> <?php if(file_exists('storage/'.$ecdImage->image) && $ecdImage->image !== ''): ?> <img class="portfolio-thumb img-border " src="<?php echo e(asset('storage/'.$ecdImage->image)); ?>" alt="<?php echo e($ecdImage->ecd->title); ?>"  /> <?php endif; ?>
                                        <div class="overlay"></div>
                                        <a  class="zoom-icon" data-gal="prettyPhoto[product-gallery]" rel="bookmark" href="<?php echo e(asset('storage/'.$ecdImage->image)); ?>"><i class="icon-focus"></i></a>

                                    </div>
                                </li>


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div class="more-wrapper" style="margin-top: 0"> <?php echo e($ecdImages->render('vendor.pagination.custom')); ?> </div>
                        <div style="clear:both"></div>

                    </main>
                    <!-- #main -->
                </div>
                <!-- #primary -->
            <?php echo $__env->make('frontend.inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- .sidebar -->
            </div>
            <!-- #inner-wrapper -->
        </div>
        <!-- .container -->
    </div>


<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>

    <script>

        $(function(){
            $(".openModal").click(function(){
                var modal_id = $(this).data("modal_name");
                $("#"+modal_id).css("display", "block");
            });

            $(".close").click(function(){
                var modal_id = $(this).data("modal_name");
                $("#"+modal_id).css("display", "none");
            });
        });
    </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>