<section id="contacthome" class="mt60">
    <div class="container">
        <div class="row">

            <div class="col col-xs-12 col-sm-5 col-md-4">
                <!-- Phone -->
                <div class="contact-item mb-40 mb-md-20">

                    <!-- Icon -->
                    <div class="ci-icon">
                        <i class="fa fa-phone"></i>
                    </div>

                    <div class="ci-title">Call Us</div>

                    <?php if($phone !==''): ?>
                        <div class="ci-phone"><?php echo e($phone['value']); ?></div>
                    <?php endif; ?>


                </div>
                <!-- End Phone -->

                <!-- Address -->
                <div class="contact-item mb-40 mb-md-20">

                    <!-- Icon -->
                    <div class="ci-icon">
                        <i class="fa fa-map-marker"></i>
                    </div>

                    <div class="ci-title">Address</div>
                    <?php if($address !==''): ?>
                        <div class="ci-text"><?php echo e($address['value']); ?></div>
                    <?php endif; ?>

                </div>
                <!-- End Address -->

                <!-- Email -->
                <div class="contact-item mb-md-40">

                    <!-- Icon -->
                    <div class="ci-icon">
                        <a href="mailto:bigstream@lookandfeel.pro">
                            <i class="fa fa-envelope"></i>
                        </a>
                    </div>

                    <div class="ci-title">Say Hello</div>
                    <?php if( $email !==''): ?>
                        <div class="ci-text"><a href="#."><?php echo e($email['value']); ?></a></div>
                    <?php endif; ?>

                </div>
                <!-- End Email -->
            </div>

            <div class="col col-xs-12 col-sm-6 offset-sm-1 col-md-7 offset-md-1">
                
                <?php echo Form::open(array('route' =>'feedback.store','class'=>'form contact-form','method'=>'post','id'=>'contact_form')); ?>

                <div class="alert alert-success" style="display:none">

                </div>
                <div class="clearfix mb-20 mb-xs-0">

                    <div class="cf-left-col">

                        <!-- Name -->
                        <div class="form-group <?php echo e($errors->has('name' ? 'has-error':'')); ?>">
                            <input type="text" name="name" id="text-name" class="ci-field form-control" placeholder="Name*" pattern=".{3,100}" >
                            <div id="name"></div>
                            <?php if($errors->has('name')): ?>
                                <span class="help-block">
                          <strong><?php echo e($errors->first('name')); ?></strong>
                        </span>
                            <?php endif; ?>
                        </div>


                        <!-- Email -->
                        <div class="form-group <?php echo e($errors->has('email' ? 'has-error' : '')); ?>">
                            <input type="email" name="email" id="text-email" class="ci-field form-control" placeholder="Email*" pattern=".{5,100}">
                            <div id="email"></div>
                            <?php if($errors->has('email')): ?>
                                <span class="help-block">
                          <strong><?php echo e($errors->first('email')); ?></strong>
                        </span>
                            <?php endif; ?>
                        </div>

                    </div>

                    <div class="cf-right-col">

                        <!-- Message -->
                        <div class="form-group <?php echo e($errors->has('message' ? 'has-error' :'')); ?>">
                            <label for="message">Message*</label>
                            <textarea name="message" id="text-message" class="ci-area form-control"></textarea>
                            <div id="message"></div>
                            <?php if($errors->has('message')): ?>
                                <span class="help-block">
                          <strong><?php echo e($errors->first('message')); ?></strong>
                        </span>
                            <?php endif; ?>

                        </div>


                    </div>

                </div>

                <!-- Send Button -->
                <button class="submit_btn btn btn-mod btn-large btn-full ci-btn" id="submit_btn">
                    Send
                </button>

                <div id="result"></div>

                <?php echo Form::close(); ?>

            </div>
            <div class="clearboth"></div>

        </div>


    </div>
</section>















































