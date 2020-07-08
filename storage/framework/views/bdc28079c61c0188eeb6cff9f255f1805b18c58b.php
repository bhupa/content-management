<?php $__env->startSection('title', 'Booking'); ?>
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
                <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($contact->title == 'InqueryFrom'  && $contact->title !== ''): ?>
                        <div class="col col-xs-12 col-sm-4 col-md-3 title-full">
                            <h1 class="main-title"><?php echo e($contact->title); ?></h1>
                        </div>
                        <div class="col col-xs-12 col-sm-8 col-md-9">
                            <div class="main-title-txt"><?php echo $contact->short_description; ?></div>
                        </div>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>

                <div class="inner-container">

                    <?php if(Session::has('flash_notice')): ?>
                        <div class="alert alert-success  no-border">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4><i class="icon fa fa-check"></i> Success:</h4>
                            <?php echo Session::get('flash_notice'); ?>

                        </div>
                    <?php endif; ?>
                    <?php echo Form::open(array('route'=>'booking.store','id'=>'inquiryform')); ?>

                    
                        <div class="col col-xs-12 col-sm-6 col-md-4 <?php echo e($errors->has('first_name') ? 'has-error':''); ?>">
                            <input type="text" name="first_name" placeholder="First Name">
                       <?php if($errors->has('first_name')): ?>
                           <span class="help-block">
                               <strong><?php echo e($errors->first('first_name')); ?></strong>

                           </span>
                            <?php endif; ?>
                        </div>
                        <div class="col col-xs-12 col-sm-6 col-md-4 <?php echo e($errors->has('last_name') ? 'has-error':''); ?>">
                            <input type="text" name="last_name" placeholder="Last Name">
                        <?php if($errors->has('last_name')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('last_name')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                        <div class="col col-xs-12 col-sm-6 col-md-4"<?php echo e($errors->has('contact') ? 'has-error':''); ?>>
                            <input type="text" name="contact" placeholder="Contact No.">
                            <?php if($errors->has('contact')): ?>
                        <span class="help-block">
                            <strong><?php echo e($errors->first('contact')); ?></strong>
                        </span>
                                <?php endif; ?>
                        </div>
                        <div class="col col-xs-12 col-sm-6 col-md-4 <?php echo e($errors->has('product') ? 'has-error':''); ?>">
                            <select name="product" id="">
                                <option value="0">Product Type</option>
                                <option value="Website">Website</option>
                                <option value="Content Management System">Content Management System</option>
                                <option value="App">App</option>
                            </select>
                            <?php if($errors->has('product')): ?>
                            <span>
                                <strong class="help-block">
                                    <?php echo e($errors->first('product')); ?>

                                </strong>
                            </span>
                            <?php endif; ?>
                        </div>
                        <div class="col col-xs-12 col-sm-6 col-md-4 <?php echo e($errors->has('refrence') ? 'has-error':''); ?>">
                            <select name="refrence" id="">
                                <option value="0">How did you find out about Us</option>
                                <option value="Reference">Reference</option>
                                <option value="Website">Website</option>
                                <option value="Advertisement">Advertisement</option>
                            </select>
                            <?php if($errors->has('refrence')): ?>
                            <span class="help-block">
                                <strong>
                                    <?php echo e($errors->first('refrence')); ?>

                                </strong>
                            </span>
                                <?php endif; ?>
                        </div>

                        <div class="col col-xs-12 col-sm-12 col-md-12 <?php echo e($errors->has('details') ?'has-error' :''); ?>">
                            <textarea name="details" id="" cols="" rows="10" placeholder="What would you like to know ?"></textarea>
                          <?php if($errors->has('details')): ?>
                              <span class="help-block">
                                  <strong>
                                      <?php echo e($errors->first('details')); ?>

                                  </strong>
                              </span>
                              <?php endif; ?>
                        </div>
                        <div class="col col-xs-12">
                            <button class="btn btn-red" id="submit_btn">
                                Send
                            </button>

                        </div>
                    <?php echo Form::close(); ?>

                    <div class="clearboth"></div>
                </div>


            </div>
        </div>
    </section><!-- #content-->
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