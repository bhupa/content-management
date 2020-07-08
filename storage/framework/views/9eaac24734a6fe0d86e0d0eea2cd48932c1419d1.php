<?php $__env->startSection('title', config('app.name') ); ?>
<?php $__env->startSection('header_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
<section class="slider_wrap">
  <div class="container">
    <div class="inner-wrapper slidersection">
      <div class="col-grid-9">
        <aside class="section no-padding">
          <div class="section-featured-slider">
            <div id="main-slider"  class="cycle-slideshow overlay-enabled featrued-slider" data-cycle-fx="fadeout"  data-cycle-speed="1000"  data-cycle-pause-on-hover="true"  data-cycle-loader="true"  data-cycle-log="false"  data-cycle-swipe="true" data-cycle-auto-height="container"  data-cycle-timeout="3000"  data-cycle-slides="article" data-pager-template='<span class="pager-box"></span>'> 
              <!-- prev/next links -->
              <div class="cycle-prev button-circle button-circle"><i class="fas fa-angle-left" aria-hidden="true"></i></div>
              <div class="cycle-next button-circle button-circle"><i class="fas fa-angle-right" aria-hidden="true"></i></div>
              <!-- pager -->
              <div class="cycle-pager"> </div>
              <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <article class="first">
                <div class="caption">
                  <div class="cycle-caption text-alignleft"> 
                    
                    <div class="slider-buttons" style="display:none" > <a class="custom-button" href="#">About Us</a> </div>
                    <!-- .slider-buttons --> 
                  </div>
                  <!-- .cycle-caption --> 
                </div>
                <!-- .caption --> 
                <a href= "#"  > <?php if(file_exists('storage/'.$banner->image) && $banner->image !== ''): ?> <img  src="<?php echo e(asset('storage/'.$banner->image)); ?>" alt="<?php echo e($banner->title); ?>" /> <?php endif; ?> </a> </article>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
              <!-- article --> 
              
              <!-- article --> 
              
              <!-- article --> 
            </div>
            <!-- #main-slider --> 
          </div>
          <!-- .section-featured-slider --> 
        </aside>
      </div>
      <div class="col-grid-3">
        <div class="featured-page-section">
          <div class="abthome">
            <div class="section-title-wrap text-alignleft">
              <p class="section-top-subtitle" style="display:none">Welcome to </p>
              <h2 class="section-title">About Seto Gurans</h2>
              <span class="divider"></span> </div>
            <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($content->title == 'Who We Are'): ?>
            <?php if(file_exists('storage/'.$content->image) && $content->image != ''): ?> <img class="guransimg" alt="<?php echo e($content->title); ?>" src="<?php echo e(asset('storage/'.$content->image)); ?>" style="margin-bottom:10px;"> <?php endif; ?>
            
            <div style="line-height: 24px;font-size: 14px;"> <?php echo str_limit($content->short_description,'130',''); ?> </div>
            <a href="<?php echo e(route('content.show',[$content->slug])); ?>" class="custom-button">Know More</a> </div>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </div>
      </div>
    </div>
  </div>

  </section>
  <aside class="facts-block">
    <div class="facts-block-bg"></div>
    <div class="container">
      <div class="teams-section facts-wrapper">
        <div class="inner-wrapper2">
          <div class="section-teams-caroulel iteam-col-4 section-carousel-enabled labels-ico">
            <?php $__currentLoopData = $counts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $count): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-grid-2 team-item">
              <a href="#.">
              <div class="fact_overlay"><?php echo $count->description; ?></div>
                <div class="inner-facts-block">
                  <?php echo $count->icon; ?>


                  <div><?php echo e($count->count); ?> <span>+</span> </div>
                  <p> <?php echo e($count->name); ?></p>

                </div>
              </a>
</div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
          
          <!-- .team-item  --> 
          
        </div>
      </div>
    </div>
  </div>
</aside>
<aside class="threeblock">
  <div class="container">
    <div class="inner-wrapper">
      <div class="col-grid-3 dirdonate">
        <div class="dirdonation">
          <h2>Chairperson Message</h2>
          <span class="divider" style="display:none"></span> <?php $__currentLoopData = $message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mess): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if(file_exists('storage/'.$mess->team->image) && $mess->team->image != ''): ?> <img  src="<?php echo e(asset('storage/'.$mess->team->image)); ?>" style="margin-bottom:15px; width:120px"> <?php endif; ?>
          <div style="color: #333;font-size: 16px;font-weight: bold;margin-bottom: 10px;"><?php echo e($mess->team->name); ?> </div>
          <a href="<?php echo e(route('message.show',[$mess->id])); ?>" class="custom-button chairman-btn"> Read More </a> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </div>
      </div>
      <div class="col-grid-6 missiongoals">

        <iframe width="100%" height="310" src="https://www.youtube.com/embed/Kv9EiLsR4PA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <ul class="targetblocks" style="display:none">
          <li>
            <div class="targetblock-icon"><i class="icon-telescope"></i></div>
            <div class="targetblock-text">
              <h3><a href="#.">Five years Seto Gurans Vision</a></h3>
              <p>Seto Gurans National Child Development services (SGNCDS) is a pioneer organization in the field of Early Childhood Development at national, district and community level. It is registered as an Educational Non Governmental organization, working since 1979 in advocacy</p>
            </div>
          </li>
          <li>
            <div class="targetblock-icon"><i class="icon-scope"></i></div>
            <div class="targetblock-text">
              <h3><a href="#.">Mission & Goal</a></h3>
              <p>To sensitize, lobby and advocate for ECD programs
                To provide services for the development, expansion, promotion, and innovation of ECD program</p>
            </div>
          </li>
        </ul>
      </div>
      <div class="col-grid-3 gallery-list-home">
        <ul class="home-gallery">
          <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallerie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li> <a href="<?php echo e(route('gallery.show',[$gallerie->slug])); ?>"> <?php if(file_exists('storage/'.$gallerie->image) && $gallerie->image != ''): ?> <img alt="<?php echo e($gallerie->title); ?>" src="<?php echo e(asset('storage/'.$gallerie->image)); ?>"> <?php endif; ?> </a> </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    </div>
  </div>
</aside>
<aside class="section lite-background blocksection bg-gray" id="recentupdates">
  <div class="recentupdates"><img src="images/recentupdate-bg.jpg" alt=""></div>
  <div class="section-featured-page-grid">
    <div class="container">
      <div  class="inner-wrapper titlemargin">
        <div class="col-grid-4">
          <div class="sm-title">Our News</div>
          <h2 class="h2title white">Recent Updates</h2>
        </div>
        <div class="col-grid-5">
          <div class="titlemid">Stay to date with our latest news, event schedules
            and corporate developments for new blogs</div>
        </div>
        <div class="col-grid-3"> <a href="<?php echo e(route('news.index')); ?>" class="custom-button custon-white viewallpositon"> View All </a> </div>
      </div>
      <div class="featured-page-grid-section">
        <div class="inner-wrapper">
          <div class="iteam-col-3 section-carousel-enabled recentupdates-list"> <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-grid-4 featured-page-grid-item">
              <div class="featured-page-grid-wrapper box-shadow-block">
                <div class="featured-page-grid-thumb thumb-overlay"> <a href="<?php echo e(route('news.show',[$new->slug])); ?>" > <?php if(file_exists('storage/'.$new->image) && $new->image != ''): ?> <img alt="<?php echo e($new->title); ?>" src="<?php echo e(asset('storage/'.$new->image)); ?>"> <?php endif; ?> </a> </div>
                <div class="featured-page-grid-text-content-wrapper">
                  <div class="featured-page-grid-text-content ">
                    <h3 class="featured-page-grid-title"> <a href="<?php echo e(route('news.show',[$new->slug])); ?>"><?php echo e(str_limit($new->title,'50','...')); ?></a> </h3>
                    <div class="featured-page-grid-summary"> <?php echo str_limit($new->short_description,'80','..'); ?> </div>
                    <a href="<?php echo e(route('news.show',[$new->slug])); ?>" class="more-link">Know More</a> </div>
                  <!-- .featured-page-grid-text-content --> 
                </div>
                <!-- .featured-page-grid-text-content-wrapper --> 
              </div>
              <!-- .featured-page-grid-wrapper --> 
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            <!-- .featured-page-grid-item  --> 
            <!-- .featured-page-grid-item  --> 
          </div>
        </div>
      </div>
    </div>
    <!-- .container --> 
  </div>
  <!-- .section-featured-page-grid --> 
</aside>
<aside class="section-block-wrapper">
  <div class="container">
    <div class="inner-wrapper">
      <div class="col-grid-12">
        <h2 class="secondarytitle" style="margin-top:0;">Seto Gurans Blog</h2>
      </div>
      <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-grid-4 blocks1">
        <div class="section-wrapper"> <a href="<?php echo e(route('blogs.show',[$event->slug])); ?>"> <?php if(file_exists('storage/'.$event->image) && $event->image != ''): ?> <img alt="<?php echo e($event->title); ?>" src="<?php echo e(asset('storage/'.$event->image)); ?>"> <?php endif; ?> </a>
          <h2><a href="<?php echo e(route('blogs.show',[$event->slug])); ?>"><?php echo e(str_limit($event->title,'100','...')); ?></a></h2>
<!--          <div class="homepage-div"><?php echo str_limit($event->description,'80','..'); ?></div>-->
          <a href="<?php echo e(route('blogs.show',[$event->slug])); ?>" class="more-link left-margin" tabindex="0">Read More</a> </div>
      </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <div class="col-grid-4 blocks3">
        <div class="ecd-media"> <i class="icon-newspaper"></i>
          <h2>ECD in Media</h2>
          <span class="divider"></span>
          <p>With 40 per cent of the population under the age of 18 years, investments in children and adolescents is important in shaping national development. </p>
          <a href="<?php echo e(route('ecds.index')); ?>" class="custom-button custon-white"> Know More </a> </div>
      </div>
    </div>
  </div>
</aside>
<div id="content">
  <aside class="section cta-background background-img overlay-enabled ad-bg">
    <div class="section-call-to-action cta-fluid">
      <div class="call-to-action-inner-wrapper">
        <div class="container">
          <div class="call-to-action-content">
            <div class="call-to-action-description">
              <h2 class="section-title">Doing Whatever it Takes for Children !!!</h2>
              <p class="section-subtitle">Seto Gurans has been at the forefront of global efforts to ensure children survive, learn and are protected. We believe that every act on behalf of children – a donation, a sponsorship, signing a petition. Changing the lives of children and their families, and creating a better future for us all.</p>
            </div>
            <div class=""> <a href="<?php echo e(route('content.show','donate')); ?>" class="custom-button custon-white"> Donate Now </a> </div>
          </div>
        </div>
      </div>
    </div>
  </aside>
</div>
<aside class="map-press">
  <div class="container">
    <div class="map-press-wrapper">
      <div class="col-grid-8 mapsection">
        <h2 class="secondarytitle" style="margin-left:25px;">Our Presence</h2>
        <div class="map-section"> <img src="<?php echo e(asset('frontend/images/nepalmap.jpg')); ?>" > </div>
      </div>
      <div class="col-grid-4 pressrelease">
        <h2 class="secondarytitle">Notice Board</h2>
        <ul>
          <?php $__currentLoopData = $notices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li> <a href="<?php echo e(route('notice.show',[$notice->slug])); ?>"><?php echo e(str_limit($notice->title,'150','..')); ?></a>
            <div><i class="icon-calendar"></i><?php echo e($notice->published_date->format('M d Y')); ?></div>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <a href="<?php echo e(route('notice.index')); ?>" class="more-link viewall" tabindex="0">View All</a> </div>
      <div class="clear-fix"></div>
    </div>
  </div>
</aside>
<aside class="section lite-background partners patnersid">
  <div class="section-associate-logo">
    <div class="container">
      <div class="partner-title">Partners</div>
      <div class="associate-logo-section associate-logo-col-5">
        <div class="iteam-col-5 section-carousel-enabled partners-list">
          <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="associate-logo-item">
                <?php if(file_exists('storage/'.$partner->image) && $partner->image != ''): ?>
                 <a href="#"><img alt="<?php echo e($partner->name); ?>" src="<?php echo e(asset('storage/'.$partner->image)); ?>"></a>
                <?php endif; ?>
             </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
          
          <!-- .plan-item  --> 
        </div>
      </div>
      <!-- .plan-section --> 
    </div>
    <!-- .container --> 
  </div>
  <!-- .section-associate-logo --> 
</aside>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?> 
<script type="text/javascript">

    $(document).ready(function(){
//      $('#contact_form').on('submit', function (event) {
//        event.preventDefault();
//        var url = $(this).attr('action');
//        var data = $(this).serialize();
//        debugger
//        $.ajax({
//          type: "post",
//          url: url,
//          data: data,
//          dataType: "json",
//          success: function (response) {
//            if (response.status == 'true') {
//              jQuery('.alert-success').show();
//              jQuery('.alert-success').append('<p>' + response.message + '</p>');
//              setTimeout(function(){
//                jQuery('.alert-success').fadeOut('slow');
//                jQuery('.alert-success').empty();
//              }, 6000);
//
//            } else if (response.status == 'false') {
//              jQuery('.error').show();
//              jQuery('.error').append('<p class="alert-danger">' + response.errors.email + '</p>');
//              setTimeout(function () {
//                jQuery('.error').empty();
//              }, 6000);
//            }
//          },
//          error: function (xhr) {
//            $('#validation-errors').html('');
//            $.each(xhr.responseJSON, function(key,value) {
//
//              $("#" + key + "").addClass('alert alert-danger');
//              $("#" + key + "").text(value);
//              setTimeout(function () {
//                jQuery("#" + key + "").removeClass('alert alert-danger');
//                jQuery("#" + key + "").text('');
//              }, 3000);
//
//            });
//
//          }
//        });
//      });

    });
  </script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>