<?php $__env->startSection('title', $content->title); ?>
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
                <h1 class="page-title"><?php echo e($content->title); ?></h1>
                <div id="breadcrumb">
                    <div aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
                        <ul class="trail-items">
                            <li class="trail-item trail-begin"><a href="<?php echo e(route('home')); ?>" rel="home"><span>Home</span></a></li>
                            
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
                        <h1><?php echo e($content->title); ?></h1>


                        <div class="single-page-img">
                            <?php if(file_exists('storage/'.$content->image) && $content->image != ''): ?>

                                <img src="<?php echo e(asset('storage/'.$content->image)); ?>" alt="<?php echo e($content->title); ?>">
                            <?php endif; ?>
                        </div>


                        <div class="single-page-main-content">
                            <?php echo $content->description; ?>

                        </div>

                    </div>
                </div>
                <div class="col-md-4">
                    <?php echo $__env->make('frontend.inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        </div>

    </section>


    <?php echo $__env->make('team.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('event.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


    <script type="text/javascript">

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>