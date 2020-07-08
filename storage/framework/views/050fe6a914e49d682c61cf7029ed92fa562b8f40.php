<?php $__env->startSection('title', 'Gallery Details'); ?>
<?php $__env->startSection('footer_js'); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>

    <section class="inner_header_bg "> <svg viewBox="-1.5 529.754 603 71.746" preserveAspectRatio="none">
      <path d=" M 0 560 Q 66.018 533.115 153.816 571.235 C 241.613 609.355 293.526 571.416 310 560 C 346.774 534.516 402.903 510.645 450 560 Q 497.097 609.355 600 560 L 600 600 L 0 600 L 0 560 Z " stroke-width="3"></path>
      </svg> <img src="<?php echo e(asset('images/innerbanner3.jpg')); ?>" > </section>

      <section class="pd content">
              <div class="container">
                <div class="title">
                  <h1>Gallery Image</h1>
                  <span>MAT Nepal </span></div>
                   <div class="row  gallery ">
                    <?php $__currentLoopData = $galleryImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-md-4 col-sm-4 col-xs-6 gal_img">
                       <?php if(file_exists('storage/'.$image->image) && $image->image !==''): ?>
                        <a href="<?php echo e(asset('storage/'.$image->image)); ?>" class="big">
                        <img src="<?php echo e(asset('storage/'.$image->image)); ?>" alt="<?php echo e($image->image); ?>"></a>
                       <?php endif; ?>
                   </div>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>  
             </div>
     </section>        



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>