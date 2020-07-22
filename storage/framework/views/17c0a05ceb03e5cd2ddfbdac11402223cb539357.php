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
