
<footer class="site-footer" role="contentinfo">
  <div class="container">
    <div class="row ">
      <div class="col-md-4">
        <h3>About Us</h3>
        <p class="mb-5">

          <?php echo str_limit($about->short_description,'200','...'); ?>

        <ul class="list-unstyled footer-link d-flex footer-social">
          <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($setting->slug =='twitter'): ?>
          <li><a href="<?php echo e($setting->value); ?>" class="p-2"><span class="fa fa-twitter"></span></a></li>
            <?php endif; ?>
           <?php if($setting->slug =='facebook'): ?>
          <li><a href="<?php echo e($setting->value); ?>" class="p-2"><span class="fa fa-facebook"></span></a></li>
              <?php endif; ?>
             <?php if($setting->slug =='linkedin'): ?>
          <li><a href="<?php echo e($setting->value); ?>" class="p-2"><span class="fa fa-linkedin"></span></a></li>
                <?php endif; ?>
                  <?php if($setting->slug =='instagram'): ?>
          <li><a href="<?php echo e($setting->value); ?>" class="p-2"><span class="fa fa-instagram"></span></a></li>
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
      <div class="col-md-3">
        <h3>Menu</h3>
        <ul class="list-unstyled footer-link">
          <li><a href="<?php echo e(route('content.show',[$about->slug])); ?>">About Us</a></li>
          <li><a href="<?php echo e(route('executive-committee.index')); ?>">Team</a></li>
          <li><a href="<?php echo e(route('event.index')); ?>">Events</a></li>
          <li><a href="<?php echo e(route('contact.index')); ?>">Contact</a></li>
        </ul>
      </div>
      <div class="col-md-2">
        <h3>Links</h3>
        <ul class="list-unstyled footer-link">
          <?php $__currentLoopData = $footermenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><a href="<?php echo e(route('content.show',[$menu->slug])); ?>"><?php echo e($menu->title); ?></a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
      <div class="col-md-3">
        <h3>Contacts</h3>
        <ul class="list-unstyled footer-link">

          <li class="d-block">
            <span class="d-block">Address:</span>
            <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($setting->slug =='address'): ?>
            <span class="text-white"><?php echo e($setting->value); ?></span>
            <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </li>
          <li class="d-block">
            <span class="d-block">Telephone:</span>
              <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($setting->slug =='contact'): ?>
            <span class="text-white"><?php echo e($setting->value); ?></span>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </li>
          <li class="d-block">
            <span class="d-block">Email:</span>
              <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($setting->slug =='email'): ?>
            <span class="text-white"><?php echo e($setting->value); ?></span>

            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </li>

        </ul>
      </div>
    </div>
    <p class="text-center">
        Copyright © <?php echo e(date('Y')); ?> khassamaj Uk.  All rights reserved |  Developed By

        <a href="http://www.genstechnology.com/" target="_blank">Gens Technology</a></p>


  </div>
</footer>
