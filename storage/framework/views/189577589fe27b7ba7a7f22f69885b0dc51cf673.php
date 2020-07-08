<?php $__env->startSection('title', 'Booking'); ?>
<?php $__env->startSection('style_css'); ?>
    <style >
        .site-blocks-cover, .site-blocks-cover .row { min-height:250px !important; height:auto !important; padding-top: 40px;}
        .site-blocks-cover h1 {font-size: 2rem}
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header_js'); ?>
    <script type="text/javascript">

        $('div.alert').delay(3000).slideUp(300);


    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>

    <?php if($contentbanner['image']  !==''): ?>
        <div class="site-blocks-cover overlay" style="background-image: url('<?php echo e(asset('storage/'.$contentbanner['image'])); ?>')" data-aos="fade" data-stellar-background-ratio="0.5" >
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7 text-center" data-aos="fade">

                        <h1 class="">Booking</h1>
                        <span class="caption mb-3"></span>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="site-section site-section-sm">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-8 mb-5">


                    <?php echo e(Form::open(array('route'=>'booking.store', 'class'=>'p-5 bg-white','id'=>'contact-form'))); ?>


                    <?php if(session()->has('success')): ?>
                        <div class="alert alert-success" > <?php echo e(session()->get('success')); ?> </div>
                    <?php endif; ?>
                    <div class="row form-group <?php echo e($errors->has('first_name') ? 'has-error' : ''); ?>">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="font-weight-bold" for="fullname">First Name</label>
                            <input type="text" name="first_name" id="firstname" class="form-control" placeholder="First Name">
                        </div>
                        <?php if($errors->has('first_name')): ?>
                            <span class="alert alert-danger">
                            <strong>
                                <?php echo e($errors->first('first_name')); ?>

                            </strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="row form-group <?php echo e($errors->has('last_name') ? 'has-error' : ''); ?>">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="font-weight-bold" for="lastname">Last Name</label>
                            <input type="text" name="last_name" id="lastname" class="form-control" placeholder="Last Name">
                        </div>
                        <?php if($errors->has('last_name')): ?>
                            <span class="alert alert-danger">
                            <strong>
                                <?php echo e($errors->first('last_name')); ?>

                            </strong>
                        </span>
                        <?php endif; ?>
                    </div>

                    <div class="row form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email Address">
                        </div>
                        <?php if($errors->has('email')): ?>
                            <span class="alert alert-danger">
                            <strong>
                                <?php echo e($errors->first('email')); ?>

                            </strong>
                        </span>
                        <?php endif; ?>
                    </div>


                    <div class="row form-group <?php echo e($errors->has('phone') ? 'has-error': ''); ?>">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="font-weight-bold" for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone No">
                        </div>
                        <?php if($errors->has('phone')): ?>
                            <span class="alert alert-danger">
                            <strong>
                                <?php echo e($errors->first('phone')); ?>

                            </strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="row form-group <?php echo e($errors->has('address') ? 'has-error': ''); ?>">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="font-weight-bold" for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Address ">
                        </div>
                        <?php if($errors->has('address')): ?>
                            <span class="alert alert-danger">
                            <strong>
                                <?php echo e($errors->first('address')); ?>

                            </strong>
                        </span>
                        <?php endif; ?>
                    </div>

                    <?php $rooms=[] ?>

                    <?php $__currentLoopData = $roomlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roomlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php $rooms[$roomlist->id] = $roomlist->name ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="row form-group <?php echo e($errors->has('room_id') ? 'has-error' : ''); ?>">
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="message">Room</label>
                            <?php echo e(Form::select('room_id', $rooms, $room->id,['class'=>'form-control', 'placeholder'=>'Please select the room','id'=>'select-room'])); ?>


                        </div>
                        <?php if($errors->has('room_id')): ?>
                            <span class="alert alert-danger">
                            <strong>
                                <?php echo e($errors->first('room_id')); ?>

                            </strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="row form-group <?php echo e($errors->has('no_of_room') ? 'has-error' : ''); ?>">
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="message">Number of room</label>
                            <?php echo e(Form::select('no_of_room', range(0, 5), null, ['class'=>'form-control','placeholder' => 'Select number of room'])); ?>

                        </div>
                        <?php if($errors->has('no_of_room')): ?>
                            <span class="alert alert-danger">
                            <strong>
                                <?php echo e($errors->first('no_of_room')); ?>

                            </strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="row form-group <?php echo e($errors->has('no_of_adult') ? 'has-error' : ''); ?>">
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="message">Number of adult</label>
                            <?php echo e(Form::select('no_of_adult', range(0, 5), null, ['class'=>'form-control','placeholder' => 'Select number of adult'])); ?>

                        </div>
                        <?php if($errors->has('no_of_adult')): ?>
                            <span class="alert alert-danger">
                            <strong>
                                <?php echo e($errors->first('no_of_adult')); ?>

                            </strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="row form-group <?php echo e($errors->has('no_of_child') ? 'has-error' : ''); ?>">
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="message">Number of child</label>
                            <?php echo e(Form::select('no_of_child', range(0, 5), null, ['class'=>'form-control','placeholder' => 'Select number of child'])); ?>

                        </div>
                        <?php if($errors->has('no_of_child')): ?>
                            <span class="alert alert-danger">
                            <strong>
                                <?php echo e($errors->first('no_of_child')); ?>

                            </strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="row form-group <?php echo e($errors->has('check_in') ? 'has-error' : ''); ?>">
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="message">Check-in</label>
                            <?php echo Form::date('check_in', null, array('class'=>'form-control','placeholder'=>'Check_in')); ?>

                        </div>
                        <?php if($errors->has('check_in')): ?>
                            <span class="alert alert-danger">
                            <strong>
                                <?php echo e($errors->first('check_in')); ?>

                            </strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="row form-group <?php echo e($errors->has('check_out') ? 'has-error' : ''); ?>">
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="message">Check-out</label>
                            <?php echo Form::date('check_out', null, array('class'=>'form-control','placeholder'=>'Check_out')); ?>

                        </div>
                        <?php if($errors->has('check_out')): ?>
                            <span class="alert alert-danger">
                            <strong>
                                <?php echo e($errors->first('check_out')); ?>

                            </strong>
                        </span>
                        <?php endif; ?>
                    </div>
                    <div class="row form-group <?php echo e($errors->has('g-recaptcha-response') ? 'has-error' : ''); ?>">
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="message"></label>
                            <?php echo \NoCaptcha::renderJs(); ?>

                            <?php echo \NoCaptcha::display(); ?>

                            <?php if($errors->has('g-recaptcha-response')): ?> <span class="alert alert-danger"> <strong><?php echo e($errors->first('g-recaptcha-response')); ?></strong> <?php endif; ?> </span> </label>

                        </div>

                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Submit" class="btn btn-primary pill px-4 py-2">
                        </div>
                    </div>


                    <?php echo Form::close(); ?>

                </div>

                <div class="col-lg-4">
                    <div class="other">
                        <ul>
                            <?php $__currentLoopData = $roomlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roomlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <div class="row other_row">
                                        <div class="col-md-4 col-sm-4 col-xs-4 other_col">
                                            <a href="<?php echo e(route('room.show',[$roomlist->slug])); ?>" >
                                                <?php if(file_exists('storage/'.$roomlist->cover_image) && $roomlist->cover_image !== ''): ?>
                                                    <img src="<?php echo e(asset('storage/'.$roomlist->cover_image)); ?>" alt="<?php echo e($roomlist->title); ?>" class="img-fluid">
                                                <?php endif; ?>
                                            </a></div>
                                        <div class="col-md-8 col-sm-8 col-xs-8 other_col">
                                            <div class="media-with-text">
                                                <h2 class="heading mb-0"><a href="<?php echo e(route('room.show',[$roomlist->slug])); ?>"><?php echo str_limit($roomlist->name,'50','...'); ?></a></h2>
                                                <span class="mb-3 d-block post-date"><?php echo e($roomlist->price); ?> / per night</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
                        <div class="clear"></div>
                    </div>


                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>