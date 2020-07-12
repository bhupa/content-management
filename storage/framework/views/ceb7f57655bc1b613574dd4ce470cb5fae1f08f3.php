<div id="sidebar-primary" class="sidebar widget-area" >
    <div class="sidebar-widget-wrapper">
        <aside class="widget recent-posts-widget">
            <h3 class="widget-title"><span class="widget-title-wrapper">Our Events</span></h3>
            <div class="blogs-sider-bar">

                <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blogs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row">
                        <div class="col-md-5">
                            <?php if(file_exists('storage/'.$blogs->image) && $blogs->image != ''): ?>
                                <a href="<?php echo e(route('event.show',[$blogs->slug])); ?>">
                                    <img src="<?php echo e(asset('storage/'.$blogs->image)); ?>" alt="<?php echo e($blogs->title); ?>" class="side-bar-image">
                                </a>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-7">

                            <div class="side-bar">
                                <a href="<?php echo e(route('event.show',[$blogs->slug])); ?>">
                                    <h4><?php echo e(str_limit($blogs->title,'50','.....')); ?></h4>
                                    <p><?php echo e(\Carbon\Carbon::parse($blogs->date)->toFormattedDateString()); ?></p>

                                </a>

                            </div>
                        </div>
                    </div>
                    <hr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>

        </aside>

        <!-- .widget-recent-entries -->

    </div>

    <div class="" style="display: block; margin:50px;"></div>
    <div class="sidebar-widget-wrapper">
    <aside class="widget recent-posts-widget">
        <h3 class="widget-title"><span class="widget-title-wrapper">Recent Post</span></h3>
        <div class="blogs-sider-bar">

            <?php $__currentLoopData = $sidebarblogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blogs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row">
                    <div class="col-md-5">
                        <?php if(file_exists('storage/'.$blogs->image) && $blogs->image != ''): ?>
                            <a href="<?php echo e(route('blogs.show',[$blogs->slug])); ?>">
                                <img src="<?php echo e(asset('storage/'.$blogs->image)); ?>" alt="<?php echo e($blogs->title); ?>" class="side-bar-image">
                            </a>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-7">

                        <div class="side-bar">
                            <a href="<?php echo e(route('blogs.show',[$blogs->slug])); ?>">
                                <h4><?php echo e(str_limit($blogs->title,'50','.....')); ?></h4>
                                <p><?php echo e(\Carbon\Carbon::parse($blogs->created_at)->toFormattedDateString()); ?></p>

                            </a>

                        </div>
                    </div>
                </div>
                <hr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </div>

    </aside>
    </div>
    <div class="" style="display: block; margin:50px;"></div>
    <!-- .sidebar-widget-wrapper -->
</div>