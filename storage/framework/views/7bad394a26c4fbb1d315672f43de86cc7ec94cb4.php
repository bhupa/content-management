<?php $__env->startSection('title', 'Gallery '); ?>
<?php $__env->startSection('header_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>

<!-- .custom-header -->
<div id="content" class="site-content global-layout-right-sidebar">
  <div class="container">
    <div class="inner-wrapper">
      <div id="primary" class="content-area">
        <main id="main" class="site-main">
         <h1 class="page-title">Gallery </h1>
          <ul class="gallerylist">
            <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallerie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
              <div class="item-inner-wrapper"> <a href="<?php echo e(route('gallery.show',[$gallerie->slug])); ?>"> <?php if(file_exists('storage/'.$gallerie->image) && $gallerie->image !== ''): ?> <img class="aligncenter img-border " src="<?php echo e(asset('storage/'.$gallerie->image)); ?>" alt="<?php echo e($gallerie->title); ?>" /> <?php endif; ?> </a> </div>
              <a class="gallerytxt" href="<?php echo e(route('gallery.show',[$gallerie->slug])); ?>"> <?php echo e($gallerie->title); ?> </a> </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
          <div class="more-wrapper">
            <nav class="navigation pagination"> <?php echo e($galleries->links('vendor.pagination.custom')); ?>

              
                
                
                
                
                 </nav>
            <br>
            <br>
            <br>
          </div>
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