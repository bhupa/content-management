<footer class="site-footer">
  <div class="container">


    <div class="row">
      <div class="col-md-4">
        <h3 class="footer-heading mb-4 text-white">About</h3>
        <p><?php echo str_limit($about->short_description,'200','....'); ?> </p>
        <p><a href="<?php echo e(route('about-us.index')); ?>" class="btn btn-primary pill text-white px-4">Read More</a></p>
      </div>
      <div class="col-md-5">
        <div class="row">
          <div class="col-md-6">
            <h3 class="footer-heading mb-4 text-white">Quick Menu</h3>
            <ul class="list-unstyled">
                <?php $__currentLoopData = $latestcontents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestcontent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><a href="<?php echo e(route('content.show',[$latestcontent->slug])); ?>"><?php echo e($latestcontent->title); ?></a></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>
          </div>
          <div class="col-md-6">
            <h3 class="footer-heading mb-4 text-white">&nbsp;</h3>
            <ul class="list-unstyled">
                <?php $__currentLoopData = $contentmenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contentmenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(route('content.show',[$contentmenu->slug])); ?>"><?php echo e($contentmenu->title); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        </div>
      </div>


      <div class="col-md-3">
        <div class="col-md-12"><h3 class="footer-heading mb-4 text-white">Contact Information</h3></div>
        <div class="col-md-12">
          <p>
            <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <?php if($setting->name == 'Instagram'): ?>
                <a href="<?php echo e($setting->value); ?>" class="p-2"><span class="icon-instagram"></span></a>
              <?php endif; ?>
              <?php if($setting->name == 'Vimeo'): ?>
                <a href="<?php echo e($setting->value); ?>" class="p-2"><span class="icon-vimeo"></span></a>
              <?php endif; ?>
                <?php if($setting->name == 'Twitter'): ?>
                  <a href="<?php echo e($setting->value); ?>" class="p-2"><span class="icon-twitter"></span></a>
                <?php endif; ?>
              <?php if($setting->name == 'Facebook'): ?>
            <a href="<?php echo e($setting->value); ?>" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
              <?php endif; ?>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </p>
        </div>
      </div>
    </div>
    <div class="row  mt-5 text-center">
      <div class="col-md-12">


        Copyright &copy; <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All Rights Reserved


      </div>

    </div>
  </div>
</footer>