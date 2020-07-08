<section id="footerbottom">
  <div class="container">
      <ul class="footermenu">
          <?php $__currentLoopData = $contentmenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footermenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><a href="<?php echo e(route('content.show',[$footermenu->slug])); ?>"><?php echo e($footermenu->title); ?></a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <li><a href="<?php echo e(route('blogs.index')); ?>">Blog</a></li>
          <li><a href="#.">About</a></li>
          <li><a href="#.">Service</a></li>
          <li><a href="#.">Products</a></li>
          <li><a href="#.">Contact</a></li>
      </ul>
    <div class="copyright">Copyright © 2018 xmart. All rights reserved.</div>
    <div class="poweredby">Powered By: <a href="https://peacenepal.com/">Peace Nepal DOT Com</a></div>
    <div class="socialmedia">
      <ul>
        <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($setting->name == 'Facebook' && $setting->name  !== ''): ?>
        <li><a href="<?php echo e($setting->value); ?>"><i class="fab fa-facebook-f"></i></a></li>
          <?php endif; ?>
            <?php if($setting->name == 'Twitter' && $setting->name  !== ''): ?>
              <li><a href="<?php echo e($setting->value); ?>"><i class="fab fa-twitter"></i></a></li>
            <?php endif; ?>
            <?php if($setting->name == 'Youtube' && $setting->name  !== ''): ?>
              <li><a href="<?php echo e($setting->value); ?>"><i class="fab fa-youtube"></i></a></li>
            <?php endif; ?>
            <?php if($setting->name == 'Google Plus' && $setting->name  !== ''): ?>
              <li><a href="<?php echo e($setting->value); ?>"><i class="fab fa-google-plus-g"></i></a></li>
            <?php endif; ?>
            <?php if($setting->name == 'Linkedin' && $setting->name  !== ''): ?>
              <li><a href="<?php echo e($setting->value); ?>"><i class="fab fa-linkedin-in"></i></a></li>
            <?php endif; ?>
            <?php if($setting->name == 'Instagram' && $setting->name  !== ''): ?>
              <li><a href="<?php echo e($setting->value); ?>"><i class="fab fa-instagram"></i></a></li>
            <?php endif; ?>





          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
  </div>
</section>