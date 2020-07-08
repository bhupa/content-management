<?php $__env->startSection('title', $content->slug); ?>
<?php $__env->startSection('header_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>


    <!-- .site-header -->

    <!-- #main-navigation -->
    <div id="pagebackground" style="background:url(<?php echo e(asset('frontend/img/slider3.jpg')); ?>);" class="parallax-bg">
    </div>
    <section id="inner-container-section" class="mt90" >
        <div class="container">
            <div class="row">

                <div class="col col-xs-12 col-sm-4 col-md-3 title-full">

                    <h1 class="main-title"><?php echo e($content->title); ?></h1>

                </div>
                <div class="col col-xs-12 col-sm-8 col-md-9">
                    <div class="main-title-txt"> <?php echo $content->short_description; ?></div>
                </div>


                    <div class="clearboth"></div>
                <div class="inner-container">
                    <div class="col col-xs-12 col-sm-6 col-md-6 aboutimg">

                        <?php if(file_exists('storage/'.$content->image) && $content->image !== ''): ?>
                        <img src="<?php echo e(asset('storage/'.$content->image)); ?>" alt="<?php echo e($content->title); ?>" type="">
                            <?php endif; ?>
                    </div>
                    <div class="col col-xs-12 col-sm-6 col-md-6 abouttext">
                        <div><?php echo $content->description; ?></div>
                    </div>

                    <div class="clearboth"></div>
                    
                        
                            
                                
                                
                                    
                                           
                                                
                                       
                                        
                                        
                                        
                                
                            
                            
                        
                    
                </div>


            </div>
        </div>
    </section> <!-- #content-->
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