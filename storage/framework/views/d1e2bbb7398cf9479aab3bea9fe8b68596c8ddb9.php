<?php $__env->startSection('title', 'Management Lists'); ?>
<?php $__env->startSection('header_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>

    <!-- .site-header -->

    <!-- #main-navigation -->
    <div id="custom-header">
        <div class="custom-header-content">
            <div class="container">
                <h1 class="page-title">Management Lists</h1>
                <div id="breadcrumb">
                    <div  aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
                        <ul class="trail-items">
                            <li class="trail-item trail-begin"><i class="fas fa-home mrg15"></i><a href="<?php echo e(route('home')); ?>" rel="home"><span>Home</span></a></li>
                            <li class="trail-item trail-end"><span>Management Lists</span></li>
                        </ul>
                    </div>
                </div>
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
                    <h2>Management Team</h2>
                    <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $staff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-grid-3">
                            <div class="team">

                                    <?php if(file_exists('storage/'.$staff->image)  && $staff->image != ''): ?>
                                        <img  src="<?php echo e(asset('storage/'.$staff->image)); ?>" alt="<?php echo e($staff->name); ?>" style="margin-bottom:10px; ">
                                    <?php endif; ?>

                                
                            </div>
                        </div>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>
                <!-- #primary -->
            <?php echo $__env->make('frontend.inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- .sidebar -->
            </div>
            <!-- #inner-wrapper -->
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