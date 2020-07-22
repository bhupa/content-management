<?php $__env->startSection('title', 'Contact Us'); ?>
<?php $__env->startSection('header_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>

    <div id="custom-header"
         <?php if(file_exists('storage/'.$setting->value) && $setting->value != ''): ?>
         style="background-image: url('<?php echo e(asset('storage/'.$setting->value)); ?>')"
            <?php endif; ?>
    >
        <div class="custom-header-content">
            <div class="container">
                <h1 class="page-title">Contact Us</h1>
                <div id="breadcrumb">
                    <div aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
                        <ul class="trail-items">
                            <li class="trail-item trail-begin"><a href="<?php echo e(route('home')); ?>" rel="home"><span>Home</span></a></li>
                            <li class="trail-item trail-end"><span>Contact Us</span></li>
                        </ul>
                    </div> <!-- .breadcrumbs -->
                </div> <!-- #breadcrumb -->
            </div> <!-- .container -->
        </div>  <!-- .custom-header-content -->
    </div>
    <!-- .custom-header -->
    <section class="contact-page">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="contact-map">
                        <div class="map-inner-wrapper">
                            <iframe style="border:0;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14132.557418569479!2d85.3106242!3d27.6820875!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe7ff208549dfe1ca!2sFair+Trade+Group+Nepal!5e0!3m2!1sen!2snp!4v1554706599732!5m2!1sen!2snp" width="700" height="490px"></iframe>
                        </div> <!-- .map-inner-wrapper -->
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="contact-form-area contactdesc">
                        <h3 class="contact-title">Contact Us</h3>
                        <div id="contact-form" class="contact-form">
                            <div id="message">
                            </div>
                            

                                <?php echo Form::open(['route'=>'contact.store','id'=>'contact-form']); ?>

                            <?php if(\Session::has('success')): ?>
                                <div class="alert alert-success">
                                    <span><?php echo \Session::get('success'); ?></span>
                                </div>

                            <?php endif; ?>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Name *" style="width: 100%;">

                            <?php if($errors->has('name')): ?>
                                <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                            <?php endif; ?>
                                <div style="margin-bottom: 30px;"></div>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email *" style="width: 100%;">

                            <?php if($errors->has('email')): ?>
                                <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                            <?php endif; ?><br>

                                <textarea class="form-control" name="message" id="comments" rows="3" placeholder="Message *" style="resize:none;"></textarea>

                            <?php if($errors->has('message')): ?>
                                <span class="text-danger"><?php echo e($errors->first('message')); ?></span>
                            <?php endif; ?>
                                <div style="margin-bottom: 20px;"></div>
                                
                                    

                                    
                                
                                <div style="margin-bottom: 30px;"></div>

                                <button type="submit" value="SEND" id="submit">Submit</button>

                            <?php echo Form::close();; ?>

                        </div><!-- .contact-form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo $__env->make('event.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('blog.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

    <script>

        jQuery(document).ready(function() {
            // $("#contact-form").on('submit',function(){
            //     var e = $(this).attr("action");
            //     return $("#message").slideUp(750, function() {
            //         $("#message").hide(), $("#submit").attr("disabled", "disabled"), $.post(e, {
            //             name: $("#name").val(),
            //             email: $("#email").val(),
            //             comments: $("#comments").val(),
            //             verify: $("#verify").val()
            //         }, function(e) {
            //             document.getElementById("message").innerHTML = e;
            //             $("#message").slideDown("slow");
            //             $("#contactform img.loader").fadeOut("slow", function() {
            //                 $(this).remove();
            //             });
            //             $("#submit").removeAttr("disabled");
            //             null != e.match("success") && $("#contactform").slideUp("slow");
            //         })
            //     }), !1
            // });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>