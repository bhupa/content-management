<?php $__env->startSection('title', $publication->title); ?>
<?php $__env->startSection('header_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>

    <div id="custom-header">
        <div class="custom-header-content">
            <div class="container">
                <h1 class="page-title"><?php echo e($publication->type); ?></h1>
                <div id="breadcrumb">
                    <div  aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
                        <ul class="trail-items">
                            <li class="trail-item trail-begin"><i class="fas fa-home mrg15"></i><a href="<?php echo e(route('home')); ?>" rel="home"><span>Home</span></a></li>
                            <li class="trail-item trail-end"><span><?php echo e($publication->title); ?></span></li>
                        </ul>
                    </div>
                    <!-- .breadcrumbs -->
                </div>
                <!-- #breadcrumb -->
            </div>
            <!-- .container -->
        </div>
        <!-- .custom-header-content -->
    </div>
    <!-- .custom-header -->
    <div id="content" class="site-content global-layout-right-sidebar">
        <div class="container">
            <div class="inner-wrapper">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                        <?php if($publication->type == 'Brochures'): ?>
                        <?php if(file_exists('storage/'.$publication->file) && $publication->file !== ''): ?>
                            <img src="<?php echo e(asset('storage/'.$publication->file)); ?>" alt="">
                        <?php endif; ?>
                        <?php else: ?>

                        <h2><?php echo e($publication->title); ?></h2>
                        <div class="entry-meta latest-posts-meta boderbottom"> <span class="posted-on"><?php echo e($publication->created_at->format('M d Y')); ?></span> </div>

                        <?php echo $publication->description; ?>

                         <?php if(!empty($publication->file)): ?>
                            <a id="submit" class="custom-button" href="<?php echo e(asset('storage/'.$publication->file)); ?>" target="_blank">Download</a>
                       <?php endif; ?>
                        <?php endif; ?>
                        
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
    <!-- .site-header -->


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


    <script type="text/javascript">

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>