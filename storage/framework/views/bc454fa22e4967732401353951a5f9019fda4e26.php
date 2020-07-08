<?php $__env->startSection('title', 'Job Application'); ?>
<?php $__env->startSection('header_js'); ?>
    <script type="text/javascript">

        $('div.alert').delay(3000).slideUp(300);


    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
    <div id="pagebackground" style="background:url(<?php echo e(asset('frontend/img/slider3.jpg')); ?>);" class="parallax-bg">
    </div>
    <!--    Page Background    -->



    <section id="inner-container-section" class="mt90" >
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $career): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($career->title == 'Career'  && $career->title !== ''): ?>
                        <div class="col col-xs-12 col-sm-4 col-md-3">
                            <h1 class="main-title"><?php echo e($career->title); ?></h1>
                        </div>
                        <div class="col col-xs-12 col-sm-8 col-md-9">
                            <div class="main-title-txt"><?php echo $career->short_description; ?></div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="inner-container">

                        <?php if(Session::has('flash_notice')): ?>
                            <div class="alert alert-success  no-border">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Success:</h4>
                                <?php echo Session::get('flash_notice'); ?>

                            </div>
                        <?php endif; ?>
                        <?php echo Form::open(array('route'=>'career.store','id'=>'inquiryform')); ?>

                            <input type="hidden" name="career_id" value="<?php echo e($id); ?>">
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
                        <div class="col col-xs-12 col-sm-12 col-md-12 <?php echo e($errors->has('details') ?'has-error' :''); ?>">
                            <textarea name="details" id="" cols="" rows="10" placeholder="Tell Something About Yourself ?"></textarea>
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
    </section>
    <!--    Services    -->




    <!-- Content area -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>