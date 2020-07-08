<div class="footer-container">
  <div id="footer-widgets">
    <div class="container">
      <div class="inner-wrapper">
        <aside  class="footer-active-3 footer-widget-area">
          <h3 class="widget-title">Quick Links</h3>
          <ul id="menu-footer-services">
            <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
            <li><a href="<?php echo e(route('news.index')); ?>">News</a></li>
            <li><a href="<?php echo e(route('career.index')); ?>">Career</a></li>
            <!--<li><a href="<?php echo e(route('tranning.index')); ?>">Tranning</a></li>--> 
            <?php $__currentLoopData = $contentmenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a href="<?php echo e(route('content.show',[$menu->slug])); ?>"><?php echo e($menu->title); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <li><a href="<?php echo e(route('gallery.index')); ?>">Gallery</a></li>
            <li><a href="<?php echo e(route('notice.index')); ?>">Notice</a></li>
            <li><a href="<?php echo e(route('faqs.index')); ?>">FAQ</a></li>
            <li><a href="<?php echo e(route('contact.index')); ?>">Contact</a></li>
          </ul>
          
          <!-- .social-links --> 
        </aside>
        <!-- .footer-widget-area --> 
        <!--<aside class="footer-active-3 footer-widget-area">
>>>>>>> 18a37fde613530f2debb6dfa80a63ecfbb170ff3
                    <div class="widget recent-posts-widget">
                        <h3 class="widget-title"><span class="widget-title-wrapper">Our Ongoing Programs</span></h3>
                        <ul class="ongoingprograms">

                            <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="recent-post-item">
                                    <?php if(file_exists('storage/'.$program->image) && $program->image != ''): ?>
                                    <a href="<?php echo e(route('program.show',[$program->slug])); ?>" >
                                        <img class="alignleft" src="<?php echo e(asset('storage/'.$program->image)); ?>" alt="<?php echo e($program->title); ?>"></a>

                                   <?php endif; ?>
                                        <h4><a href="<?php echo e(route('program.show',[$program->slug])); ?>" ><?php echo e(str_limit($program->title,'30','...')); ?></a></h4>
                                    <p><?php echo e($program->created_at->format('M d Y')); ?></p>
                                </div>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
                    </div>
                </aside>-->
        <aside class="footer-active-3 footer-widget-area">
          <div class="widget recent-posts-widget">
            <h3 class="widget-title"><span class="widget-title-wrapper">Contact Info</span></h3>
            <div class="widget-quick-contact"> <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($setting->name == 'Phone'): ?> <span><i class="fa fa-phone-square"></i> <?php echo e($setting->value); ?> </span> <?php endif; ?>
              <?php if($setting->name == 'Email'): ?> <span><a href="mailto::<?php echo e($setting->value); ?> "><i class="icon-envelope"></i></a><?php echo e($setting->value); ?> </span> <?php endif; ?>
              <?php if($setting->name == 'Address'): ?> <span><i class="icon-map"></i> <?php echo e($setting->value); ?> </span> <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </div>
            <div class="social-links brand-color circle">
              <ul>
                <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($setting->name == 'Facebook'): ?>
                <li><a href="<?php echo e($setting->value); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <?php endif; ?>
                <?php if($setting->name == 'Twitter'): ?>
                <li><a href="<?php echo e($setting->value); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <?php endif; ?>
                <?php if($setting->name == 'Google'): ?>
                <li><a href="<?php echo e($setting->value); ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
                <?php endif; ?>
                <!--<?php if($setting->name == 'Linkedin'): ?>
                <li><a href="<?php echo e($setting->value); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                <?php endif; ?>-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </div>
          </div>
        </aside>
        <aside  class="footer-active-3 footer-widget-area fbmap">
          <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fsetoguransncds%2F&tabs=timeline&width=340&height=500&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" width="100%" height="230" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
        </aside>
        <!-- .footer-widget-area --> 
        
      </div>
      <!-- .inner-wrapper --> 
    </div>
    <!-- .container --> 
  </div>
  <!-- #footer-widgets --> 
  
  <!-- footer ends here --> 
</div>
<footer id="colophon" class="site-footer">
  <div class="colophon-bottom">
    <div class="container">
      <div class="copyright">
        <p> Copyright © <?php echo e(date('Y')); ?> Seto Gurans. All rights reserved. </p>
      </div>
      <div class="site-info">
        <p>Developed by <a  rel="" href="https://peacenepal.com/" target="_blank">Peace Nepal Dot Com</a> </p>
      </div>
      <!-- .site-info --> 
    </div>
    <!-- .container --> 
  </div>
  <!-- .colophon-bottom --> 
</footer>
