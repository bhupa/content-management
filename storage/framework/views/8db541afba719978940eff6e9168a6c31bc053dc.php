<?php $__env->startSection('title', 'Contact Us'); ?>
<?php $__env->startSection('header_js'); ?>
    <script type="text/javascript">

        $('div.alert').delay(3000).slideUp(300);


    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
  <div id="pagebackground" style="background:url(<?php echo e(asset('frontend/img/slider3.jpg')); ?>);" class="parallax-bg">
  </div>
  <!--    Page Background    -->



  <section id="inner-container-section" class="mt90" >
    <div class="container">
      <div class="row">
        <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($contact->title == 'Contact'  && $contact->title !== ''): ?>
        <div class="col col-xs-12 col-sm-4 col-md-3 title-full">
          <h1 class="main-title"><?php echo e($contact->title); ?></h1>
        </div>
        <div class="col col-xs-12 col-sm-8 col-md-9">
          <div class="main-title-txt"><?php echo $contact->short_description; ?></div>
        </div>

          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


      </div>
    </div>
    <div class="container-fluid nopadding">
      <div class="">
        <div class="col col-xs-12 col-sm-12 col-md-6 contact-left">
          <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14131.818139427733!2d85.3187813!3d27.687800049999996!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snp!4v1556873794820!5m2!1sen!2snp" width="100%" height="580" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="col col-xs-12 col-sm-12 col-md-6 contact-right">
          <div class="contact-address">
            <ul>
              <li>
                <div class="contact-item ">

                  <!-- Icon -->
                  <div class="ci-icon">
                    <i class="fa fa-map-marker"></i>
                  </div>

                  <div class="ci-title">Address</div>
                  <?php if($address !==''): ?>
                  <div class="ci-text"><?php echo e($address['value']); ?></div>
                    <?php endif; ?>

                </div>
              </li>
              <li>
                <div class="contact-item ">

                  <!-- Icon -->
                  <div class="ci-icon">
                    <a href="#">
                      <i class="fa fa-envelope"></i>
                    </a>
                  </div>

                  <div class="ci-title">Say Hello</div>
                  <?php if($email !==''): ?>
                  <div class="ci-text"><a href="#."><?php echo e($email['value']); ?></a></div>
                    <?php endif; ?>

                </div>
              </li>

              <li>
                <div class="contact-item ">

                  <!-- Icon -->
                  <div class="ci-icon">

                    <i class="fa fa-phone"></i>

                  </div>

                  <div class="ci-title">Call us</div>
                  <?php if($phone !==''): ?>
                  <div class="ci-text"><?php echo e($phone['value']); ?></div>
                    <?php endif; ?>

                </div>
              </li>
            </ul>
            <div class="clearboth"></div>
            <div class="row">
                <?php echo Form::open(array('route' =>'feedback.store','class'=>'form contact-form contact-form-page','method'=>'post','id'=>'contact_form')); ?>


              <div class="alert alert-success" style="display:none"></div>
                <!-- Name -->
                <div class="form-group col col-xs-12 col-sm-6 col-md-6">
                  <input type="text" name="name" id="text-name" class="ci-field form-control" placeholder="Name" pattern=".{3,100}" >

                  <div id="name"></div>
                </div>

                <!-- Email -->
                <div class="form-group col col-xs-12 col-sm-6 col-md-6">
                  <input type="email" name="email" id="text-email" class="ci-field form-control" placeholder="Email" pattern=".{5,100}" >
                  <div id="email"></div>
                </div>


                <div class="form-group col col-xs-12">

                  <!-- Message -->
                  <div class="">
                    <label for="message">Message</label>
                    <textarea name="message" id="text-message" class="ci-area form-control"></textarea>
                    <div id="message"></div>
                  </div>

                </div>

                <div class="clearboth"></div>
                <div class="col col-xs-12">
                  <button class="submit_btn btn btn-mod btn-large btn-full ci-btn" id="submit_btn">
                    Send
                  </button>

                  <div id="result"></div>
                </div>

              <?php echo Form::close(); ?>

            </div>
          </div>


        </div>
        <div class="clearboth"></div>
      </div>
    </div>
  </section>
  <!--    Services    -->




 <!-- Content area -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>