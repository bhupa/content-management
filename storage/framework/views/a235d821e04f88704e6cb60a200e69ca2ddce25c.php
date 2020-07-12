<?php $__env->startSection('title', $banner->title); ?>
<?php $__env->startSection('header_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>


    <!-- .custom-header -->
    <div id="custom-header"
         <?php if(file_exists('storage/'.$setting->value) && $setting->value != ''): ?>
         style="background-image: url('<?php echo e(asset('storage/'.$setting->value)); ?>')"
            <?php endif; ?>
    >
        <div class="custom-header-content">
            <div class="container">
                <h1 class="page-title">Banner</h1>
                <div id="breadcrumb">
                    <div aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
                        <ul class="trail-items">
                            <li class="trail-item trail-begin"><a href="<?php echo e(route('home')); ?>" rel="home"><span>Home</span></a></li>
                            <li class="trail-item trail-end"><span><?php echo e($banner->slug); ?></span></li>
                        </ul>
                    </div> <!-- .breadcrumbs -->
                </div> <!-- #breadcrumb -->
            </div> <!-- .container -->
        </div>  <!-- .custom-header-content -->
    </div>


    <section class="single-page-content-section">

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="single-page-content">
                        <h1><?php echo e($banner->title); ?></h1>

                        <div class="single-page-img">
                            <?php if(file_exists('storage/'.$banner->image) && $banner->image != ''): ?>

                                <img src="<?php echo e(asset('storage/'.$banner->image)); ?>" alt="<?php echo e($banner->title); ?>">
                            <?php endif; ?>
                        </div>


                        <div class="single-page-main-content">
                            <?php echo $banner->description; ?>

                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <?php echo $__env->make('frontend.inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>

    </section>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


    <script type="text/javascript">

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>