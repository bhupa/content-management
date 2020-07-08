<?php $__env->startSection('title', config('app.name') ); ?>
<?php $__env->startSection('header_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>


  <div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
      <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li data-target="#demo" data-slide-to="<?php echo e($banner->id); ?>" class="active"></li>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <div class="carousel-inner">

      <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="carousel-item <?php echo e($loop->first ? 'active' : ''); ?>">
          <img src="<?php echo e(asset('storage/'.$banner->image)); ?>" alt="<?php echo e($banner->title); ?>" width="1100" height="500">
          <div class="carousel-caption">
            <h3><?php echo e($banner->title); ?></h3>
            <p><?php echo e($banner->description); ?></p>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon">

        </span> </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span> </a> </div>
  <section id="about" class="mb60 mt90">
    <div class="container">

      <div class="row">
        <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $about): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($about->title == 'About'  && $about->title !== ''): ?>
        <div class="col col-xs-12 col-sm-4 col-md-3">
         <img class="xmart-logo" src="<?php echo e(asset('frontend/img/logo-bg.png')); ?>" alt=""></div>
        <div class="col col-xs-12 col-sm-8 col-md-9 about-txt">
          <div class="inner-about-wrapper"> <span class="abt-block"><?php echo $about->short_description; ?> </span> </div>
        </div>
      </div>
      <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </section>
  <!--    About     -->

  <section id="services-home" >
    <div class="container">
      <div class="row">
        <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($service->title == 'Services'  && $service->title !== ''): ?>
        <div class="col col-xs-12 col-sm-4 col-md-3">
          <h1 class="main-title"><?php echo e($service->title); ?></h1>
        </div>
        <div class="col col-xs-12 col-sm-8 col-md-9">
          <div class="main-title-txt"><?php echo $service->short_description; ?></div>
        </div>
          <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="col col-xs-12">
          <div class="row">
            <ul class="service-ul">
              <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="col col-xs-12 col-sm-6 col-md-4">
                <div> <i class="icon">
                    <?php if(file_exists('storage/'.$service->icon_image) && $service->icon_image !== ''): ?>
                      <img src="<?php echo e(asset('storage/'.$service->icon_image)); ?>" alt="<?php echo e($service->title); ?>">
                      <?php endif; ?>
                  </i>
                  <h3><a href="<?php echo e(route('services.show',[$service->service_category_id])); ?>"><?php echo e(str_limit($service->title,'20','...')); ?></a></h3>

                  
                  <div class="service-text"><?php echo str_limit($service->description,'80',''); ?></div>
                </div>
              </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--    Services    -->

  <section id="subscribe-block">
    <div class="container">
      <div class="row">
        <span class="sm-title">start A project</span>
        <div class="subscribe-block-title">Want to work with us ?</div>
        <a href="<?php echo e(route('booking.create')); ?>" class="btn btn-red">Lets get started</a>
      </div>
    </div>
  </section>
  <!--    Start a Project    -->

  <section id="featured-product" class="">
    <div class="container">
      <div class="row">
        <div class="col col-xs-12 col-sm-12 col-md-6">

          <ul class="features">
            <li class="clearfix">
              <div class="icon"><i class="fas fa-donate"></i></div>
              <div class="wrap"><h3>Loan Application</h3>
                Custom software serves the unique processes of your business, solves your specific problems.</div>
            </li>
            <li class="clearfix">
              <div class="icon"><i class="fas fa-vihara"></i></div>
              <div class="wrap"><h3>Loan Appraisal Complaince</h3>
                Imagine the time it would take to search a single book in this chaos! Not only the time</div>
            </li>
            <li class="clearfix">
              <div class="icon"><i class="fas fa-hand-holding-usd"></i></div>
              <div class="wrap"><h3>Loan Appraisal Approval</h3>
                One and Multi Page templete with modern flat, minimalistic and clean look.</div>
            </li>
          </ul>
        </div>
        <div class="col col-xs-12 col-sm-12 col-md-6">
          <img class="img-featured overlay-photo" src="<?php echo e(asset('frontend/img/featured-img.png')); ?>" alt="">
        </div>
      </div>
    </div>
  </section>
  <!--    featured product    -->

  <section id="product-list" class="">
    <div class="container">
      <div class="row">
        <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($project->title == 'Products'  && $project->title !== ''): ?>
        <div class="col col-xs-12 col-sm-4 col-md-3">
          <h1 class="main-title"><?php echo e($project->title); ?></h1>
        </div>
        <div class="col col-xs-12 col-sm-8 col-md-9">


          <div class="main-title-txt"> <?php echo $project->short_description; ?></div>
        </div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="clearboth"></div>
        <ul class="product-list">
          <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="col col-xs-12 col-sm-6 col-md-4">
            <div class="product-img">
              <?php if(file_exists('storage/'.$project->image) && $project->image !== ''): ?>
              <img src="<?php echo e(asset('storage/'.$project->image)); ?>" alt="<?php echo e($project->title); ?>" title="<?php echo e($project->title); ?>">
              <?php endif; ?>
              <div class="date-product">
                <a class="product-readmore" href="<?php echo e(route('products.show',[$project->slug])); ?>">Read More</a>
              </div>
            </div>
            <a href="<?php echo e(route('products.show',[$project->slug])); ?>" class="product-title"><?php echo e($project->title); ?></a>
          </li>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    </div>
  </section>
  <section id="sisters" class="mt60">
    <div class="container">
      <div class="">
        <div class="owl-carousel owl-theme">
          <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="item">
            <?php if(file_exists('storage/'.$partner->image) && $partner->image !==''): ?>
            <img src="<?php echo e(asset('storage/'.$partner->image)); ?>" alt="<?php echo e($partner->image); ?>">
              <?php endif; ?>
          </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



        </div>
      </div>
    </div>
    </div>
  </section>
  <!--    product list    -->
  <?php echo $__env->make('frontend.inc.feedbackform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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