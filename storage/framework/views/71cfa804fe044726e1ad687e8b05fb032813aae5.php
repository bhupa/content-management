<?php $__env->startSection('title', 'Faq'); ?>
<?php $__env->startSection('footer_js'); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<div id="custom-header">
  <div class="custom-header-content">
    <div class="container">
      <h1 class="page-title">FAQ</h1>
      <div id="breadcrumb">
        <div  aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
          <ul class="trail-items">
            <li class="trail-item trail-begin"><i class="fas fa-home mrg15"></i><a href="<?php echo e(route('home')); ?>" rel="home"><span>Home</span></a></li>
            <li class="trail-item trail-end"><span>FAQ</span></li>
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
          
          <!------------------------------>
          
          <div class="faq-section">
            <div class="faq-main-wrapper">
              <div class="faq-section faq-section-list">
                <ul class="faq-accordion accordionjs">
                
                  <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys=>$faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li class="acc_section">
                    <div class="faq-title acc_head">
                      <h4><?php echo e($faq->question); ?></h4>
                    </div>
                    <!-- .faq-title -->
                    <div class="faq-content acc_content" style="">
                      <?php echo $faq->answer; ?>

                      </div>
                    <!-- .faq-content --> 
                  </li>
                  
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </ul>
              </div>
            </div>
          </div>
          
          <!------------------------------> 
          
          
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>