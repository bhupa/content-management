<?php $__env->startSection('title', 'Contact Us'); ?>
<?php $__env->startSection('header_js'); ?> 
<script type="text/javascript">

        $('div.alert').delay(3000).slideUp(300);


    </script> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>

<!-- .custom-header -->
<div id="content" class="site-content global-layout-right-sidebar">
  <div class="container">
    <div class="inner-wrapper">
      <div id="primary" class="content-area">
        <main id="main" class="site-main">
        <h1 class="page-title">Contact Us</h1>
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14133.15199596207!2d85.3121399!3d27.6774923!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xa37c23d7800d7e30!2sSeto+Gurans+National+Child+Development+Services+(SGNCDS)!5e0!3m2!1sen!2snp!4v1560658311924!5m2!1sen!2snp" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
          <h2 class="boderbottom">Send Us Message!</h2>
          
          <?php echo Form::open(array('route' =>'contact.store','class'=>'contactform style2 wrap-form ','method'=>'post','id'=>'contactform00')); ?>

          <?php if(session()->has('success')): ?>
          <div class="alert alert-success" > <?php echo e(session()->get('success')); ?> </div>
          <?php endif; ?>
          
            <ul >
              <li>
                <label> <i class="icon-profile-male"></i> <span class="ttm-form-control">
                  <input class="text-input" name="name" type="text" value="" placeholder="Your Full Name: *" >
                  </span> <?php if($errors->has('name')): ?> <span class="help-block"> <strong><?php echo e($errors->first('name')); ?></strong> <?php endif; ?> </label>
              </li>
              <li>
                <label> <i class="icon-envelope"></i> <span class="ttm-form-control">
                  <input class="text-input" name="email" type="text" value="" placeholder="Your Email-Id: *" >
                  </span> <?php if($errors->has('email')): ?> <span class="help-block"> <strong><?php echo e($errors->first('email')); ?></strong> <?php endif; ?> </label>
              </li>
              <li>
                <label> <i class="icon-phone"></i> <span class="ttm-form-control">
                  <input class="text-input" name="phone" type="text" value="" placeholder="Your Phone Number: *" >
                  </span> <?php if($errors->has('phone')): ?> <span class="help-block"> <strong><?php echo e($errors->first('phone')); ?></strong> <?php endif; ?></label>
              </li>
              <li>
                <label> <i class="icon-documents"></i> <span class="ttm-form-control">
                  <input class="text-input" name="subject" type="text" value="" placeholder="Your Subject: *" >
                  </span> <?php if($errors->has('subject')): ?> <span class="help-block"> <strong><?php echo e($errors->first('subject')); ?></strong> <?php endif; ?> </label>
                <div class="clear"></div>
              </li>
              <li>
                <label class="edit-pen"> <i class="icon-edit"></i> <span class="ttm-form-control">
                  <textarea class="text-area" name="message" placeholder="Your Message: *" ></textarea>
                  <?php if($errors->has('message')): ?> <span class="help-block"> <strong><?php echo e($errors->first('message')); ?></strong> <?php endif; ?> </span> </label>
              </li>
              <li></li>
              <li>
                <div style="display: block; margin-top: 20px;"></div>
                <div>
                  <?php echo \NoCaptcha::renderJs(); ?>

                  <?php echo \NoCaptcha::display(); ?>

                </div>
                <?php if($errors->has('g-recaptcha-response')): ?> <span class="help-block"> <strong><?php echo e($errors->first('g-recaptcha-response')); ?></strong> <?php endif; ?> </span> </label>

              </li>
            </ul><div class="clear"></div>
              <input name="submit" type="submit" value="Submit Now!" class="ttm-btn ttm-btn-size-md  ttm-btn-style-border ttm-btn-color-white submitbtn" id="submit" title="Submit now">

            
          <?php echo Form::close(); ?> </main>
        
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