<?php $__env->startSection('title', 'Career'); ?>
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
                    <div class="col col-xs-12 col-sm-12 col-md-12 ">
                        <?php if(Session::has('flash_notice')): ?>
                            <div class="alert alert-success  no-border">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4><i class="icon fa fa-check"></i> Success:</h4>
                                <?php echo Session::get('flash_notice'); ?>

                            </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="careerpage">
                                <tr>
                                    <th width="5%">SN</th>
                                    <th width="50%">Job Opening</th>
                                    <th width="10%">Applicable Date</th>
                                    <th width="10%"></th>
                                </tr>

                                <?php $__currentLoopData = $careers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$career): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td><?php echo e($key  + $careers->firstItem()); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('career.create',[$career->id])); ?>"><div class="expander"><i class="fas fa-chevron-down"></i><?php echo e($career->position); ?></div></a>
                                        <div class="text">
                                            <?php echo $career->job_description; ?>

                                        </div>
                                    </td>
                                    <td><?php echo e($career->expire_date); ?></td>
                                    <td><a class="btn btn-sm" href="<?php echo e(route('career.create',[$career->id])); ?>">Apply</a></td>
                                </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>







                            </table>
                        </div>
                        <div class="clearboth"></div>

                        <div class="row">

                            <div class="col col-xs-12">
                                <h3 class="title-career-form">Career Form</h3>
                            </div>
                            <?php echo e(Form::open(array('route'=>'careerform.store','id'=>'inquiryform','class'=>'careerform2','files' => 'true'))); ?>

                            
                                <div class="col col-xs-12 col-sm-6 col-md-4 <?php echo e($errors->has('first_name') ? 'has-error':''); ?>">
                                    <input type="text" name="first_name" placeholder="First Name">
                                    <?php if($errors->has('first_name')): ?>
                                        <span class="help-block">
                                            <strong>
                                                <?php echo e($errors->first('first_name')); ?>

                                            </strong>
                                        </span>
                                        <?php endif; ?>
                                </div>
                                <div class="col col-xs-12 col-sm-6 col-md-4">
                                    <input type="text" name="last_name"  placeholder="Last Name">
                                    <?php if($errors->has('last_name')): ?>
                                        <span class="help-block">
                                            <strong>
                                                <?php echo e($errors->first('last_name')); ?>

                                            </strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col col-xs-12 col-sm-6 col-md-4">
                                    <input type="text" name="contact" placeholder="Contact No.">
                                    <?php if($errors->has('contact')): ?>
                                        <span class="help-block">
                                            <strong>
                                                <?php echo e($errors->first('contact')); ?>

                                            </strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col col-xs-12 col-sm-6 col-md-4">
                                    <input type="text" name="email" placeholder="Email">
                                    <?php if($errors->has('email')): ?>
                                        <span class="help-block">
                                            <strong>
                                                <?php echo e($errors->first('email')); ?>

                                            </strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col col-xs-12 col-sm-6 col-md-4">
                                    <input type="text" name="degination" placeholder="Degination">
                                    <?php if($errors->has('degination')): ?>
                                        <span class="help-block">
                                            <strong>
                                                <?php echo e($errors->first('degination')); ?>

                                            </strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col col-xs-12 col-sm-6 col-md-4">
                                    <input type="text" name="salary" placeholder="Expected Salary">
                                    <?php if($errors->has('salary')): ?>
                                        <span class="help-block">
                                            <strong>
                                                <?php echo e($errors->first('salary')); ?>

                                            </strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col col-xs-12 col-sm-6 col-md-4">
                                    Upload CV: <input type="file" accept="application/pdf,application/msword" name="file" placeholder="Upload CV">
                                    <?php if($errors->has('file')): ?>
                                        <span class="help-block">
                                            <strong>
                                                <?php echo e($errors->first('file')); ?>

                                            </strong>
                                        </span>
                                    <?php endif; ?>

                                </div>


                                <div class="col col-xs-12 col-sm-12 col-md-12">
                                    <textarea name="message" id="" cols="" rows="10" placeholder="Message Here"></textarea>
                                    <?php if($errors->has('message')): ?>
                                        <span class="help-block">
                                            <strong>
                                                <?php echo e($errors->first('message')); ?>

                                            </strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="col col-xs-12">
                                    <button class="btn btn-red" id="submit_btn">
                                                     Send
                                    </button>

                                </div>
                            <?php echo e(Form::close()); ?>

                            

                        </div>
                    </div>




                </div>


            </div>
        </div>
    </section>
    <!--    Services    -->




    <!-- Content area -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>