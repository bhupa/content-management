<?php
    $secondParam = Request::segment(2);
    $thirdParam = Request::segment(3);
?>

<div class="sidebar sidebar-main sidebar-default">
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user-material">
            <div class="category-content">
                <div class="sidebar-user-material-content">
                    <a href="#">
                        <img src="<?php echo e(Gravatar::get($admin->email)); ?>" class="img-circle img-responsive">
                    </a>
                    <h6><?php echo e(ucwords($admin->getFullName())); ?></h6>
                    <span class="text-size-small"><?php echo config('app.name'); ?></span>
                </div>

                <div class="sidebar-user-material-menu">
                    <a href="#user-nav" data-toggle="collapse"><span>My account</span> <i class="caret"></i></a>
                </div>
            </div>

            <div class="navigation-wrapper collapse" id="user-nav">
                <ul class="navigation">
                    
                    
                    
                    
                    
                    <li><a href="#" id="change_password"><i class="icon-cog5"></i> <span>Change Password</span></a></li>
                    <li><a href="<?php echo e(route('admin.logout')); ?>"><i class="icon-switch2"></i> <span>Logout</span></a></li>


                </ul>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i>
                    </li>
                    <li class="<?php echo e($secondParam == 'dashboard' ? 'active':''); ?>">
                        <a href="<?php echo e(route('admin.dashboard')); ?>">
                            <i class="icon-home4"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-policy.perform',['admin-type','view'])): ?>
                        <li>
                            <a href="<?php echo e(route('admin.admin-type.index')); ?>"><i class="icon-address-book2 "></i>
                                <span>Admin Types</span></a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-policy.perform',['modules','view'])): ?>
                        <li class="<?php echo e($secondParam == 'modules' ? 'active':''); ?>">
                            <a href="<?php echo e(route('admin.module.index')); ?>"><i class="icon-address-book2 "></i>
                                <span>Module</span></a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-policy.perform', ['banner', 'view'])): ?>
                        <li class="<?php echo e($secondParam == 'banner' ? 'active':''); ?>">
                            <a href="<?php echo e(route('admin.banner.index')); ?>">
                                <i class=" icon-image3"></i>
                                <span>Banners</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-policy.perform', ['booking', 'view'])): ?>
                        <li class="<?php echo e($secondParam == 'booking' ? 'active':''); ?>">
                            <a href="<?php echo e(route('admin.booking.index')); ?>">
                                <i class=" icon-image3"></i>
                                <span>Booking</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-policy.perform', ['content', 'view'])): ?>
                        <li class="<?php echo e($secondParam == 'contents' ? 'active':''); ?>">
                            <a href="<?php echo e(route('admin.contents.index')); ?>">
                                <i class="icon-stats-bars"></i>
                                <span>Content</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-policy.perform', ['content-banner', 'view'])): ?>
                        <li class="<?php echo e($secondParam == 'content-banner' ? 'active':''); ?>">
                            <a href="<?php echo e(route('admin.content-banner.index')); ?>">
                                <i class="icon-stats-bars"></i>
                                <span>Content-Banner</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-policy.perform',['event','view'])): ?>
                        <li class="<?php echo e($secondParam == 'event' ? 'active':''); ?>">
                            <a href="<?php echo e(route('admin.event.index')); ?>">
                                <i class=" icon-images2"></i>
                                <span>Event</span>
                            </a>
                        </li>
                    <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-policy.perform',['gallery','view'])): ?>
                                <li class="<?php echo e($secondParam == 'gallery' ? 'active':''); ?>">
                                    <a href="<?php echo e(route('admin.gallery.index')); ?>">
                                        <i class=" icon-images2"></i>
                                        <span>Gallery</span>
                                    </a>
                                </li>
                            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-policy.perform', ['news', 'view'])): ?>
                                                <li class="<?php echo e($secondParam == 'news' ? 'active':''); ?>">
                                                    <a href="<?php echo e(route('admin.news.index')); ?>">
                                                        <i class=" icon-grid"></i>
                                                        <span>News</span>
                                                    </a>
                                                </li>
                                            <?php endif; ?>

                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-policy.perform', ['room-list', 'view'])): ?>
                                                    <li class="<?php echo e($secondParam == 'room-list' ? 'active':''); ?>">
                                                        <a href="<?php echo e(route('admin.roomlist.index')); ?>">
                                                            <i class=" icon-download"></i>
                                                            <span>Roomlist</span>
                                                        </a>
                                                    </li>
                                                <?php endif; ?>



                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-policy.perform', ['imageresize', 'view'])): ?> 
                          <li class="<?php echo e($secondParam == 'imageresize' ? 'active':''); ?>">
                            <a href="<?php echo e(route('admin.imageresize.index')); ?>">
                                <i class="icon-arrow-resize7"></i>
                                <span>Image Resize</span>
                            </a>
                        </li>
                  <?php endif; ?> 


                   

                  
                      
                        
                           
                           
                            
                         
                     



                  
                   

                
                 
                 








                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-policy.perform', ['setting', 'view'])): ?>
                                                        <li class="<?php echo e($thirdParam == 'setting' ? 'active':''); ?>">
                                                            <a href="<?php echo e(route('admin.setting.index')); ?>">
                                                                <i class=" icon-cog2"></i>
                                                                <span>Site Setting</span>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-policy.perform', ['testimonial', 'view'])): ?>
                        <li class="<?php echo e($secondParam == 'testimonial' ? 'active':''); ?>">
                            <a href="<?php echo e(route('admin.testimonials.index')); ?>">
                                <i class=" icon-vcard"></i>
                                <span>Testimonial</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-policy.perform', ['member-type', 'view'])): ?>
                        <li class="<?php echo e($thirdParam == 'member-type' ? 'active':''); ?>">
                            <a href="<?php echo e(route('admin.memberType.index')); ?>">
                                <i class=" icon-cog2"></i>
                                <span>Member Type</span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-policy.perform', ['team', 'view'])): ?>
                        <li class="<?php echo e($thirdParam == 'team' ? 'active':''); ?>">
                            <a href="<?php echo e(route('admin.team.index')); ?>">
                                <i class=" icon-cog2"></i>
                                <span>Team</span>
                            </a>
                        </li>
                    <?php endif; ?>

                  
                   
                

                 
                  
                  
                  

                </ul>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change Password</h4>
                <div class="alert alert-success" style="display:none"></div>
                <div class="alert alert-danger" style="display:none"></div>
            </div>
            <div class="modal-body">
                <?php echo Form::open(array('route' => 'admin.reset_password','class'=>'form-horizontal','id'=>'Password', 'files' => 'true')); ?>

                _
                <fieldset class="content-group">
                    <div class="form-group <?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                        <label class="control-label col-lg-4">old Password <span class="text-danger">*</span></label>

                        <div class="col-lg-8 ">
                            <?php echo Form::password('oldpassword', null, array('class'=>'form-control','placeholder'=>'Title')); ?>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group <?php echo e($errors->has('caption') ? ' has-error' : ''); ?>">
                        <label class="control-label col-lg-4">New Password <span class="text-danger">*</span></label>

                        <div class="col-lg-8 ">
                            <?php echo Form::password('newpassword', null, array('class'=>'form-control','placeholder'=>'Caption')); ?>

                        </div>
                        <?php if($errors->has('caption')): ?>
                            <span class="help-block">
                                        <strong><?php echo e($errors->first('caption')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group <?php echo e($errors->has('description') ? 'has-error' :''); ?>">
                        <label class="control-label col-lg-4">Confirm Password <span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <?php echo Form::password('confirmpassword', null, array('class'=>'form-control', 'required' => 'true')); ?>


                        </div>
                    </div>
                    <div class="clearfix"></div>
                </fieldset>
                <div class="text-left col-lg-offset-2">
                    <button type="submit" class="btn btn-primary legitRipple">
                        Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
                <?php echo Form::close(); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>