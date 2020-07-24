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
                <h1 class="page-title">Events</h1>
                <div id="breadcrumb">
                    <div aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
                        <ul class="trail-items">
                            <li class="trail-item trail-begin"><a href="<?php echo e(route('home')); ?>" rel="home"><span>Home</span></a></li>
                            <li class="trail-item trail-end"><span>Events</span></li>
                        </ul>
                    </div> <!-- .breadcrumbs -->
                </div> <!-- #breadcrumb -->
            </div> <!-- .container -->
        </div>  <!-- .custom-header-content -->
    </div>
    <!-- .custom-header -->
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
                    <div class="pagination-wrapper">
                        <div class="more-wrapper">
                            <nav class="navigation pagination"> <?php echo e($events->links('vendor.pagination.custom')); ?>

                                
                                
                                
                                
                                
                                 </nav>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>

            </div>
        </div>

    </section>
<?php echo $__env->make('team.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('blog.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>