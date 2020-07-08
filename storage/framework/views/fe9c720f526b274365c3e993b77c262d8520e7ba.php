<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $__env->yieldContent('title'); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Work+Sans:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/fonts/icomoon/style.css')); ?>">

  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/magnific-popup.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/jquery-ui.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/owl.carousel.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/owl.theme.default.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap-datepicker.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/animate.css')); ?>">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">



  <link rel="stylesheet" href="<?php echo e(asset('frontend/fonts/flaticon/font/flaticon.css')); ?>">

  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/aos.css')); ?>">

  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/style.css')); ?>">
  <?php echo $__env->yieldContent('style_css'); ?>
</head>
<body>

<div class="site-wrap">

  <div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div> <!-- .site-mobile-menu -->


  <div class="site-navbar-wrap js-site-navbar bg-white">

    <div class="container">
      <div class="site-navbar bg-light">
        <div class="py-1">
          <div class="row align-items-center">
            <div class="col-3">
              <h2 class="mb-0 site-logo"><a href="<?php echo e(route('home')); ?>">Yala Tala Chhen</a></h2>
            </div>
            <div class="col-9">
              <nav class="site-navigation text-right" role="navigation">
                <div class="container">

                  <div class="d-inline-block d-lg-none  ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>
                  <ul class="site-menu js-clone-nav d-none d-lg-block">
                    <li class="<?php echo e((request()->segment(1) == '') ? 'active' :''); ?>">
                      <a href="<?php echo e(route('home')); ?>">Home</a>
                    </li>

                      <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($content->child->isEmpty() && $content->parent_id == '' ): ?>

                        <li class="<?php echo e(Request::segment(1) == 'content' && (Request::segment(2) == $content->slug) ? 'active' : ''); ?>" >
                          <a href="<?php echo e(route('content.show',[$content->slug])); ?>"><?php echo e($content->title); ?></a>
                        </li>

                          <?php else: ?>
                          <?php if($content->child->isNotEmpty() && $content->parent_id == '' ): ?>
                          <?php $sub_menus = $content->child()->pluck('slug')->toArray();?>
                          <li class="has-children <?php echo e(Request::segment(1) == 'content' && (Request::segment(2) == $content->slug || in_array(Request::segment(2), $sub_menus)) ? 'active' : ''); ?>">
                            <a href="javascript:void(0)"><?php echo e($content->title); ?></a>
                            <ul class="dropdown arrow-top">
                              <?php $__currentLoopData = $content->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $firstchild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                               <li><a href="<?php echo e(route('content.show',[$firstchild->slug])); ?>"><?php echo e($firstchild->title); ?></a></li>


                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                          <?php endif; ?>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </li>
                          <li class="<?php echo e((request()->segment(1) == 'roomlist') ? 'active' : ''); ?>"><a href="<?php echo e(route('room.index')); ?>">Rooms</a></li>
                    <li class="<?php echo e((request()->segment(1) == 'event') ? 'active' : ''); ?>"><a href="<?php echo e(route('event.index')); ?>">Events</a></li>
                    <li class="<?php echo e((request()->segment(1) == 'about-us') ? 'active' : ''); ?>" ><a href="<?php echo e(route('about-us.index')); ?>">About</a></li>
                    <li class="<?php echo e((request()->segment(1) == 'contact-us') ? 'active' : ''); ?>"><a href="<?php echo e(route('contact.index')); ?>">Contact</a></li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>










<?php echo $__env->yieldContent('main'); ?>

<!-- start footer -->
  <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>

<script src="<?php echo e(asset('frontend/js/jquery-3.3.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery-migrate-3.0.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery-ui.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/owl.carousel.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery.stellar.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery.countdown.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery.magnific-popup.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/aos.js')); ?>"></script>


<script src="<?php echo e(asset('frontend/js/mediaelement-and-player.min.js')); ?>"></script>

<script src="<?php echo e(asset('frontend/js/main.js')); ?>"></script>


<script>
  document.addEventListener('DOMContentLoaded', function() {
    var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

    for (var i = 0; i < total; i++) {
      new MediaElementPlayer(mediaElements[i], {
        pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
        shimScriptAccess: 'always',
        success: function () {
          var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
          for (var j = 0; j < targetTotal; j++) {
            target[j].style.visibility = 'visible';
          }
        }
      });
    }
  });

</script>

</body>
</html>