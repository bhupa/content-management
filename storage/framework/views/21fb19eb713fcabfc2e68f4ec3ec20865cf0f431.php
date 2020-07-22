<section class="home-blog  home-blog-bottom">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h2>Our Blogs</h2>
            </div>
        </div>
        <div class="row">

            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
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

        </div>
    </div>

</section>
