
<!DOCTYPE html>
<html lang="en">
<head>
  <title> KHASHA SAMAJA |<?php echo $__env->yieldContent('title'); ?> </title>
  <meta charset="utf-8">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?>">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/owl.carousel.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('frontend/css/custom.css')); ?>">
  <?php echo $__env->yieldContent('style_css'); ?>
</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<div id="topbar" class="d-none d-lg-flex">
  <div class="container d-flex">
    <div class="contact-info mr-auto">
      <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($setting->slug =='email'): ?>
      <i class="fa fa-envelope"></i> <a href="mailto:contact@example.com"><?php echo e($setting->value); ?></a>
        <?php endif; ?>
          <?php if($setting->slug =='contact'): ?>
      <i class="fa fa-phone"></i> <?php echo e($setting->value); ?>

          <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <div class="social-links">
      <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($setting->slug =='twitter'): ?>
      <a href="<?php echo e($setting->value); ?>" class="twitter"><i class="fa fa-twitter"></i></a>
        <?php endif; ?>
          <?php if($setting->slug =='facebook'): ?>
      <a href="<?php echo e($setting->value); ?>" class="facebook"><i class="fa fa-facebook"></i></a>
          <?php endif; ?>
            <?php if($setting->slug =='instagram'): ?>
      <a href="<?php echo e($setting->value); ?>" class="instagram"><i class="fa fa-instagram"></i></a>
            <?php endif; ?>
              <?php if($setting->slug =='linkedin'): ?>
      <a href="<?php echo e($setting->value); ?>" class="linkedin"><i class="fa fa-linkedin"></i></a>
              <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</div>

<div class="top-logo">
  <div class="row m0">
    <div class="col-md-7">
      <div class="logo-image">
        <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($setting->slug =='menu-banner'): ?>
        <img  src="<?php echo e(asset('storage/'.$setting->value)); ?>" alt="<?php echo e($setting->name); ?>">
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>
    <div class="col-md-5">
     <div class="top-side-men">
       <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         <?php if($setting->slug =='menu-banner-side-one'): ?>
       <img  src="<?php echo e(asset('storage/'.$setting->value)); ?>" alt="<?php echo e($setting->name); ?>">
         <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     </div>
      <div class="top-side-men">
        <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($setting->slug =='menu-banner-side-one'): ?>
            <img  src="<?php echo e(asset('storage/'.$setting->value)); ?>" alt="<?php echo e($setting->name); ?>">
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      
        
      
    
    
      
        
      
    </div>

  </div>
</div>
<header role="banner">
  <nav class="navbar navbar-expand-lg ">
    <div class="container">

      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarsExample05" style="">
        <ul class="navbar-nav ">
          <li class="nav-item">
            <a class="nav-link " href="<?php echo e(route('home')); ?>">Home</a>
          </li>

          <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($content->child->isEmpty() && $content->parent_id == '' ): ?>

              <li class="nav-item"  >
                <a class="nav-link " href="<?php echo e(route('content.show',[$content->slug])); ?>"><?php echo e($content->title); ?></a>
              </li>

            <?php else: ?>
              <?php if($content->child->isNotEmpty() && $content->parent_id == '' ): ?>
                        <?php $sub_menus = $content->child()->pluck('slug')->toArray();?>
                <li class="nav-item dropdown ">
                  <a class="nav-link dropdown-toggle" href="javascript:void(0)"><?php echo e($content->title); ?></a>
                  <div class="dropdown-menu">
                    <?php $__currentLoopData = $content->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $firstchild): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                      <a class="dropdown-item" href="<?php echo e(route('content.show',[$firstchild->slug])); ?>"><?php echo e($firstchild->title); ?></a>


                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
              <?php endif; ?>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
          
          
          
          
          
          
          
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('executive-committee.index')); ?>">Executive Committee</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('event.index')); ?>">Event</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('blogs.index')); ?>">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('gallery.index')); ?>">Gallery</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('contact.index')); ?>">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>



<?php echo $__env->yieldContent('main'); ?>

<!-- start footer -->
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="<?php echo e(asset('frontend/js/jquery-3.3.1.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('frontend/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('frontend/js/owl.carousel.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('frontend/js/jquery-equal-height.min.js')); ?>"></script>



<script>
    let modalId = $('#image-gallery');
    $(document).ready( function () {
        $('#banner-carsoule').owlCarousel({
            items: 1,
            loop:true,
            dots: false,
            nav: true,
            autoplay:false,
            autoplayTimeout:3000,
            navText: ["<i class='fa fa-chevron-left '></i>","<i class='fa fa-chevron-right'></i>"],
            responsive: {
                480: {
                    items: 1
                },
                765: {
                    items: 1
                },
                991: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });
        $(document).on('change','#executive-select-btn',function(){
            var date = $(this).find('option:selected').val();
            $.ajax({
                type: "POST",
                url: "<?php echo e(route('executive-committee.list')); ?>",
                data: {
                    'date': date,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'html',
                success: function (teams) {
                    setTimeout(function(){
                        $("#overlay-load").fadeOut(300);
                        $('.executive-lists').html(teams)
                    },500);


                },
                error: function (e) {
                    if (e.responseJSON.message) {
                        swal('Error', e.responseJSON.message, 'error');
                    } else {
                        swal('Error', 'Something went wrong while processing your request.', 'error')
                    }
                }
            });

        })


        function equal_height() {
// Equal Card Height

            $('.home-blog').jQueryEqualHeight('.post-entry');
            $('.home-blog').jQueryEqualHeight('.card-img-top');
            $('#our-events').jQueryEqualHeight('.event');

            // $('.event').jQueryEqualHeight('.event-image');

            $('.blogs-sider-bar ').jQueryEqualHeight('.side-bar-image');

            $('.blogs-sider-bar ').jQueryEqualHeight('.row');



            $('.team-section').jQueryEqualHeight('.team-top');
            $('.team-section').jQueryEqualHeight('.team-image');

            $('.features_area').jQueryEqualHeight('.features_item p');

            $('.gallery').jQueryEqualHeight('.img-thumbnail');
            $('.gallery').jQueryEqualHeight('.gallery-title');

            $('#gallery-index-page').jQueryEqualHeight('.card-img');







            // $('#gallery-index-page .thumbnail').jQueryEqualHeight('.img-thumbnail');



// $('.jQueryEqualHeight3').jQueryEqualHeight('.card');
        }

        $(window).on('load', function (event) {
            equal_height();
        });
        $(window).resize(function (event) {
            equal_height();
        });


        // gallery image js

        loadGallery(true, 'a.thumbnail');

        //This function disables buttons when needed
        function disableButtons(counter_max, counter_current) {
            $('#show-previous-image, #show-next-image')
                .show();
            if (counter_max === counter_current) {
                $('#show-next-image')
                    .hide();
            } else if (counter_current === 1) {
                $('#show-previous-image')
                    .hide();
            }
        }

        function loadGallery(setIDs, setClickAttr) {
            let current_image,
                selector,
                counter = 0;

            $('#show-next-image, #show-previous-image')
                .click(function () {
                    if ($(this)
                        .attr('id') === 'show-previous-image') {
                        current_image--;
                    } else {
                        current_image++;
                    }

                    selector = $('[data-image-id="' + current_image + '"]');
                    updateGallery(selector);
                });

            function updateGallery(selector) {
                let $sel = selector;
                current_image = $sel.data('image-id');
                $('#image-gallery-title')
                    .text($sel.data('title'));
                $('#image-gallery-image')
                    .attr('src', $sel.data('image'));
                disableButtons(counter, $sel.data('image-id'));
            }

            if (setIDs == true) {
                $('[data-image-id]')
                    .each(function () {
                        counter++;
                        $(this)
                            .attr('data-image-id', counter);
                    });
            }
            $(setClickAttr)
                .on('click', function () {
                    updateGallery($(this));
                });
        }

    });

</script>

</html>