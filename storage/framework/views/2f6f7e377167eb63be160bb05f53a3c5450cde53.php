<?php $__env->startSection('title', 'Blog'); ?>
<?php $__env->startSection('header_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>

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
                            <li class="trail-item trail-end"><span>Blog</span></li>
                        </ul>
                    </div> <!-- .breadcrumbs -->
                </div> <!-- #breadcrumb -->
            </div> <!-- .container -->
        </div>  <!-- .custom-header-content -->
    </div>
    <!-- .custom-header -->
    <section class="home-blog ">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <h2>Our Blogs</h2>
                </div>
            </div>
            <div class="row">

                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-30">
                        <div class="card fundraise-item" >
                            <a href="<?php echo e(route('blogs.show',[$blog->slug])); ?>"  >
                                <?php if(file_exists('storage/'.$blog->image) && $blog->image != ''): ?>
                                    <img class="card-img-top"  src="<?php echo e(asset('storage/'.$blog->image)); ?>" alt="<?php echo e($blog->title); ?>">
                                <?php endif; ?>
                            </a>
                            <div class="card-body">
                                <h3 class="card-title"><a href="#"><?php echo e($blog->title); ?></a></h3>
                                <p class="card-text"><?php echo str_limit($blog->short_description,'100','.....'); ?></p>
                                <span class="donation-time mb-3 d-block"><?php echo e(\Carbon\Carbon::parse($blog->created_at)->toFormattedDateString()); ?></span>
                                <div class="progress custom-progress-success">
                                    <p><?php echo e($blog->short_description); ?></p>
                                </div>
                                <a href="<?php echo e(route('blogs.show',[$blog->slug])); ?>" class="btn_hover view-more-btn">
                                    More Detials
                                </a>
                            </div>
                        </div>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div style="text-align:center; margin-top: 40px">
                    <div class="more-wrapper">
                        <nav class="navigation pagination"> <?php echo e($blogs->links('vendor.pagination.custom')); ?>

                            
                            
                            
                            
                            
                             </nav>
                        <br>
                        <br>
                        <br>
                    </div>
                    </div>

            </div>
        </div>

    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>