<?php $__env->startSection('title', 'Job application'); ?>
<?php $__env->startSection('header_js'); ?>
    <script type="text/javascript">

        $('div.alert').delay(3000).slideUp(300);


    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
    <div id="custom-header">
        <div class="custom-header-content">
            <div class="container">
            
                
            
                <h1 class="page-title">Apply for a Job</h1>
                <div id="breadcrumb">
                    <div  aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
                        <ul class="trail-items">
                            <li class="trail-item trail-begin"><i class="fas fa-home mrg15"></i><a href="<?php echo e(route('home')); ?>" rel="home"><span>Home</span></a></li>
                            <li class="trail-item trail-end"><span>Apply for a Job</span></li>
                        </ul>
                    </div>
                    <!-- .breadcrumbs -->
                </div>
                <!-- #breadcrumb -->
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
                    <main id="main" class="site-main">
                       
                        <h2 class="boderbottom">Description</h2>
                <ul class="description-ul">
                  <li><div class="descriptiontxt"><span>Designation</span>: <?php echo e($career->position); ?></div></li>
                  <li><div class="descriptiontxt"><span>Number of Vacancy</span>: <?php echo e($career->number); ?></div></li>
                  <li><div class="descriptiontxt"><span>Posted Date</span>: <?php echo e($career->publish_date); ?></div></li>
                  <li><div class="descriptiontxt"><span>Qualification</span>: <?php echo e($career->qualification); ?></div></li>
                  <li><div class="descriptiontxt"><span>Min. Experience</span>: <?php echo e($career->experience); ?></div></li>
                  <li><div class="descriptiontxt"><span>Last Apply Date</span>: <?php echo e($career->expire_date); ?></div></li>
                  
                </ul>        
                
                
                
                
                
                
               
                <div class="job-description">
                    <?php echo $career->job_description; ?>

                </div>
                    
                        <h2 class="boderbottom">Apply for Job!</h2>
                        
                        <?php echo Form::open(array('route' =>'career.store','class'=>'contactform style2 wrap-form ','method'=>'post','id'=>'contactform00','files' => 'true')); ?>

                        <?php if(session()->has('success')): ?>
                            <div class="alert alert-success" >
                                <?php echo e(session()->get('success')); ?>

                            </div>
                        <?php endif; ?>
                        

                        <ul style="margin-bottom: 15px;">
                            <li><?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                        <?php endif; ?><br/>
                                <label> <i class="icon-profile-male"></i> <span class="ttm-form-control">
                        <input class="text-input" name="name" type="text" value="" placeholder="Your Name:*" >

                    </span></label>

                            </li>
                            <li>
                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                        <?php endif; ?><br/><label> <i class="icon-envelope"></i> <span class="ttm-form-control">
                        <input class="text-input" name="email" type="text" value="" placeholder="Your email-id:*" >
                    </span></label></li>
                            <li>
                                <?php if($errors->has('phone')): ?>
                                    <span class="help-block">
                                                        <strong><?php echo e($errors->first('phone')); ?></strong>
                                        <?php endif; ?><br/>
                                <label> <i class="icon-phone"></i> <span class="ttm-form-control">
                        <input class="text-input" name="phone" type="text" value="" placeholder="Your Number:*" >
                    </span></label></li>

                            <li>
                                <?php if($errors->has('cover_letter')): ?>
                                    <span class="help-block">
                                                        <strong><?php echo e($errors->first('cover_letter')); ?></strong>
                                        <?php endif; ?><br/>
                                <label class="edit-pen"> Upload Cover Letter * <span class="ttm-form-control">
                        <input type="file" name="cover_letter" accept=" application/pdf" ></input>
                    </span>

                                </label></li>
                            <li>
                                <?php if($errors->has('file')): ?>
                                    <span class="help-block">
                                                        <strong><?php echo e($errors->first('file')); ?></strong>
                                        <?php endif; ?><br/>
                                <label class="text-input"> Upload CV *<span class="ttm-form-control">

                    </span>
                        <input  name="file" type="file" value="" accept=" application/pdf" >

                                </label>
                            </li>

                            <li>
                                <div class="clear">&nbsp;</div>
                                <div>
                                    <?php echo \NoCaptcha::renderJs(); ?>

                                    <?php echo \NoCaptcha::display(); ?>

                                </div>
                                <?php if($errors->has('g-recaptcha-response')): ?> <span class="help-block"> <strong><?php echo e($errors->first('g-recaptcha-response')); ?></strong> <?php endif; ?> </span> </label>

                            </li>

                        </ul>
                        <div class="clear">&nbsp;</div>
                        <input class="text-input" name="id" type="hidden" value="<?php echo e($career->id); ?>"  >
                        <input name="submit" type="submit" value="Submit Now!" class="ttm-btn ttm-btn-size-md  ttm-btn-style-border ttm-btn-color-white submitbtn" id="submit" title="Submit now">
                        
                        <?php echo Form::close(); ?>

                    </main>

                    <!-- #main -->
                </div>
                <!-- #primary -->
            <?php echo $__env->make('frontend.inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- .sidebar -->
            </div>
            <!-- #inner-wrapper -->
        </div>
        <!-- .container -->
    </div>
    <!--    Services    -->




    <!-- Content area -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>