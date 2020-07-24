<?php $__env->startSection('title', config('app.name') ); ?>
<?php $__env->startSection('style_css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('header_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
    <div id="banner-carsoule" class="owl-carousel owl-theme ">

        <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <section class="home-page-banner-area d-flex text-center" style="min-height:570px; background:linear-gradient(to right, rgba(4, 9, 30, 0.3), rgba(4, 9, 30, 0.23)), url('<?php echo e(asset('storage/'.$banner->image)); ?>')">
        <div class="container align-self-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_content">
                        <h1><?php echo e($banner->title); ?>  </h1>

                        <?php echo str_limit($banner->short_description,'200','.....'); ?> <br>
                        <a href="<?php echo e(route('banner.show',[$banner->slug])); ?>" class="btn_hover btn_hover_two">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <section class="home-about-us-section">
        <div class="container">

                <?php if(!empty($about)): ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="home-about-image-wrapper">

                        <?php if(file_exists('storage/'.$about->image) && $about->image != ''): ?>
                            <a href="<?php echo e(route('content.show',[$about->slug])); ?>">
                                <img src="<?php echo e(asset('storage/'.$about->image)); ?>" alt="<?php echo e($about->title); ?>"  class="event-image">
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="home-about-content">
                        <h2>About Us</h2>

                       <?php echo $about->short_description; ?>



                        <a href="<?php echo e(route('content.show',[$about->slug])); ?>">More About Us</a>
                    </div>
                </div>
            </div>
                <?php endif; ?>
        </div>
    </section>
    <section class="features_area mt-6">
        <div class="row m0">


            <div class="col-md-4 features_item">
                <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($content->slug == 'our-aims'): ?>
                <h3><?php echo e($content->title); ?></h3>

                <?php echo str_limit($content->short_description,'120','.....'); ?>

                <a href="<?php echo e(route('content.show',[$content->slug])); ?>" class="btn_hover view_btn">View Details</a>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>










            <div class="col-md-4 features_item">
                <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($content->slug == 'our-vision'): ?>
                    <h3><?php echo e($content->title); ?></h3>

                    <?php echo str_limit($content->short_description,'120','.....'); ?>

                    <a href="<?php echo e(route('content.show',[$content->slug])); ?>" class="btn_hover view_btn">View Details</a>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <div class="col-md-4 features_item">
                <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($content->slug == 'our-values'): ?>
                    <h3><?php echo e($content->title); ?></h3>

                    <?php echo str_limit($content->short_description,'120','.....'); ?>

                    <a href="<?php echo e(route('content.show',[$content->slug])); ?>" class="btn_hover view_btn">View Details</a>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </section>
    <section class="message team-section home-team-section" >
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <h2>Executive Committee</h2>
                </div>
            </div>


            <div class="row justify-content-center owl-carousel owl-theme " id="home-team-carsoule">

                <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                        <div class="team-top">
                            <div class="team-wrapper">
                                <?php if(file_exists('storage/'.$team->image) && $team->image != ''): ?>
                                    <img src="<?php echo e(asset('storage/'.$team->image)); ?>" alt="<?php echo e($team->name); ?>" class="team-image">
                                <?php endif; ?>

                                <div class="content-details">
                                    <h4><?php echo e($team->name); ?></h4>
                                    <h5><?php echo e($team->position->name); ?></h5>
                                    <p><?php echo e($team->address); ?></p>
                                </div>

                                <ul class="team-social-link">
                                    <li>
                                        <a href="<?php if($team->facebook !== ''): ?> <?php echo e($team->facebook); ?> <?php else: ?> # <?php endif; ?>"> <i class="fa fa-facebook"></i> </a>
                                    </li>
                                    <li>
                                        <a href="<?php if($team->linkedin !== ''): ?> <?php echo e($team->linkedin); ?> <?php else: ?> # <?php endif; ?>"> <i class="fa fa-linkedin"></i> </a>
                                    </li>
                                    <li>
                                        <a href="<?php if($team->twitter !== ''): ?> <?php echo e($team->twitter); ?> <?php else: ?> # <?php endif; ?>"> <i class="fa fa-twitter"></i> </a>
                                    </li>
                                </ul>
                            </div>




                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            <div class="view-more-btn-wrapper">
                <a href="<?php echo e(route('executive-committee.index')); ?>" class="btn btn-view-more">View More</a>
            </div>
        </div>

    </section>

    <section class="home-blog home-team-section"  id="our-events">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <h2>Our Events</h2>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="col-12 col-md-6" id="event-height-div">
                        <div class="event">
                            <div class="event-img">
                                <?php if(file_exists('storage/'.$event->image) && $event->image != ''): ?>
                                    <a href="<?php echo e(route('event.show',[$event->slug])); ?>">
                                        <img src="<?php echo e(asset('storage/'.$event->image)); ?>" alt="<?php echo e($event->title); ?>"  class="event-image">
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="event-content">
                                <h3><a href="<?php echo e(route('event.show',[$event->slug])); ?>"><?php echo e(str_limit($event->title,'50','....')); ?></a></h3>
                                <ul class="event-meta">
                                    <li><i class="fa fa-clock-o"></i> <?php echo e(\Carbon\Carbon::parse($event->date)->toFormattedDateString()); ?></li>
                                    <li><i class="fa fa-map-marker"></i> <?php echo e($event->location); ?></li>
                                </ul>
                                <p>
                                    <?php echo str_limit($event->short_description,'150','.....'); ?>

                                    
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>
        </div>

    </section>

    <section class="home-blog gallery">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-12 text-center">
                    <h2>Gallery</h2>
                </div>
            </div>
            <div class="row">
                <div class="row">

                    <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                        <?php if(file_exists('storage/'.$gallery->image) && $gallery->image != ''): ?>
                        <a class="thumbnail" href="<?php echo e(route('gallery.show',[$gallery->slug])); ?>">
                            <img class="img-thumbnail"
                                 src="<?php echo e(asset('storage/'.$gallery->image)); ?>"
                                 alt="<?php echo e($gallery->title); ?>">
                            <h3 class="gallery-title"><?php echo e(str_limit($gallery->title,'100','.....')); ?></h3>
                        </a>

                            <?php endif; ?>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>


                <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="image-gallery-title"></h4>
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                                </button>

                                <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>