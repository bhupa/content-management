<?php $__env->startSection('title', 'Notice'); ?>
<?php $__env->startSection('header_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>

    <!-- .site-header -->

    <!-- #main-navigation -->
    <div id="custom-header">
        <div class="custom-header-content">
            <div class="container">
                <h1 class="page-title">News List</h1>
                <div id="breadcrumb">
                    <div  aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
                        <ul class="trail-items">
                            <li class="trail-item trail-begin"><i class="fas fa-home mrg15"></i><a href="<?php echo e(route('home')); ?>" rel="home"><span>Home</span></a></li>
                            <li class="trail-item trail-end"><span>Notice List</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- .container -->
        </div>
        <!-- .custom-header-content -->
    </div>
    <!-- .custom-header -->
    <div id="content" class="site-content global-layout-no-sidebar">
        <div class="container">
            <div class="inner-wrapper">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" >

                        <!-- .section-latest-posts -->
                        <aside class="section section-latest-posts lite-background">
                            <div class="container">
                                <div class="latest-posts-section">

                                    <!-- .section-title-wrap -->
                                    <div class="inner-wrapper">
                                        <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-grid-4 latest-posts-item newslist-page">
                                                <div class="latest-posts-wrapper box-shadow-block">
                                                    <div class="latest-posts-thumb">
                                                        <a href="<?php echo e(route('notice.show',[$new->slug])); ?>" >
                                                            <?php if(file_exists('storage/'.$new->image) && $new->image != ''): ?>
                                                                <img alt="<?php echo e($new->title); ?>" src="<?php echo e(asset('storage/'.$new->image)); ?>">
                                                            <?php endif; ?>
                                                        </a> </div>
                                                    <div class="latest-posts-text-content-wrapper">
                                                        <div class="latest-posts-text-content">
                                                            <h3 class="latest-posts-title"> <a href="<?php echo e(route('notice.show',[$new->slug])); ?>"><?php echo e(str_limit($new->title,'30','...')); ?></a> </h3>
                                                            <div class="entry-meta latest-posts-meta"> <span class="posted-on"><?php echo e($new->created_at->format('M d Y')); ?></span> </div>
                                                            <div class="latest-posts-summary">
                                                                <p><?php echo str_limit($new->title,'100','...'); ?></p>
                                                            </div>
                                                            <a href="<?php echo e(route('notice.show',[$new->slug])); ?>" class="more-link button-curved">Know More</a> </div>

                                                    </div>

                                                </div>

                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                                        <div class="more-wrapper">
                                            <?php echo e($notices->links('vendor.pagination.custom')); ?>

                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                        </div>

                                    </div>
                                    <!-- .inner-wrapper -->
                                </div>
                                <!-- .container -->
                            </div>
                            <!-- .latest-posts-section -->
                        </aside>
                        <!-- .section-latest-posts -->
                    </main>
                    <!-- #main -->
                </div>
                <!-- #primary -->
            </div>
            <!-- .inner-wrapper -->
        </div>
        <!-- .container -->
    </div>
    <!-- #content-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $('.carousel').carousel({
            interval: 2000
        })

        $('#room-id').on('change',function() {
            var roomId = $('#room-id').val();

            $.get("<?php echo url('/')?>" + "/roomlist/"+roomId, function(data, status){
                if(data != 'no data'){
                    var numberOfRooms = data.number_of_rooms;

                    if(numberOfRooms != 0){
                        var options = '';
                        for(i=1; i<= numberOfRooms; i++){
                            options += '<option value="'+i+'">'+i+'</option>';
                        }

                        $('#number-of-rooms option').remove();
                        $('#number-of-rooms').append(options);
                    }else{
                        $('#number-of-rooms option').remove();
                        $('#number-of-rooms').append('<option>'+0+'<option>');
                    }

                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>