<?php $__env->startSection('title', $blog->title); ?>
<?php $__env->startSection('facebook_meta'); ?>

    <meta property="og:url"           content="<?php echo e(route('blogs.show',[$blog->slug])); ?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?php echo e($blog->title); ?>" />
    <meta property="og:description"   content="<?php echo e($blog->short_description); ?>" />
    <?php if(file_exists('storage/'.$blog->image) && $blog->image != ''): ?>
        <meta property="og:image"         content="<?php echo e(asset('storage/'.$blog->image)); ?>" />
    <?php else: ?>
        <meta property="og:image"         content="https://dummyimage.com/600x340/ed3833/1e1edc.png&text=Khassamaj-UK" />
    <?php endif; ?>
    <meta property="og:image:width" content="500" />
    <meta property="og:image:height" content="500" />

<?php $__env->stopSection(); ?>
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
                <h1 class="page-title">Blog</h1>
                <div id="breadcrumb">
                    <div aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
                        <ul class="trail-items">
                            <li class="trail-item trail-begin"><a href="<?php echo e(route('home')); ?>" rel="home"><span>Home</span></a></li>
                            <li class="trail-item trail-end"><span><?php echo e($blog->slug); ?></span></li>
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
                        <h1><?php echo e($blog->title); ?></h1>

                        <ul class="event-meta-single-page">
                            <li><i class="fa fa-clock-o"></i> <?php echo e(\Carbon\Carbon::parse($blog->date)->toFormattedDateString()); ?></li>
                            <li>
                                <a  class="btn_hover view-more-btn" href="javascript:void(0)" onclick="fb_share('<?php echo e(route('blogs.show',[$blog->slug])); ?>', '<?php echo e($blog->title); ?>')">
                                    Share
                                </a>
                            </li>
                        </ul>


                        <div class="single-page-img">
                            <?php if(file_exists('storage/'.$blog->image) && $blog->image != ''): ?>

                                <img src="<?php echo e(asset('storage/'.$blog->image)); ?>" alt="<?php echo e($blog->title); ?>">
                            <?php endif; ?>
                        </div>


                        <div class="single-page-main-content">
                            <?php echo $blog->description; ?>

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
    <?php echo $__env->make('gallery.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>


    <script type="text/javascript">

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>