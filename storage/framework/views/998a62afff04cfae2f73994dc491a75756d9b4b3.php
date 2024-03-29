<?php $__env->startSection('scripts'); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Roomlist</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Roomlist</li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Edit Roomlist</h5>
            <div class="heading-elements">
                <a href="<?php echo e(route('admin.roomlist.index')); ?>" class="btn btn-default legitRipple pull-right">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>
        <div class="panel-body">
            <?php echo Form::open(array('route' => ['admin.roomlist.update', $roomlist->id],'class'=>'form-horizontal','id'=>'validator', 'files' => 'true')); ?>


            <fieldset class="content-group">
                <div class="form-group <?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                    <label class="control-label col-lg-2">Name <span class="text-danger">*</span></label>

                    <div class="col-lg-6 ">
                        <?php echo Form::text('name', $roomlist->name ?? "", array('class'=>'form-control','placeholder'=>'Name')); ?>

                    </div>
                    <?php if($errors->has('name')): ?>
                        <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                    <?php endif; ?>
                </div><div class="form-group <?php echo e($errors->has('price') ? ' has-error' : ''); ?>">
                    <label class="control-label col-lg-2">Price <span class="text-danger">*</span></label>

                    <div class="col-lg-6 ">
                        <?php echo Form::text('price', $roomlist->price ?? "", array('class'=>'form-control','placeholder'=>'price')); ?>

                    </div>
                    <?php if($errors->has('price')): ?>
                        <span class="help-block">
                                        <strong><?php echo e($errors->first('price')); ?></strong>
                                    </span>
                    <?php endif; ?>
                </div>
                <div class="clearfix"></div>
                <div class="form-group <?php echo e($errors->has('number_of_rooms') ? ' has-error' : ''); ?>">
                    <label class="control-label col-lg-2">Number of Rooms  <span class="text-danger">*</span></label>

                    <div class="col-lg-6 ">
                        <?php echo Form::number('number_of_rooms', $roomlist->number_of_rooms ?? "", array('class'=>'form-control','placeholder'=>'Number of Rooms')); ?>

                    </div>
                    <?php if($errors->has('number_of_room')): ?>
                        <span class="help-block">
                                        <strong><?php echo e($errors->first('number_of_rooms')); ?></strong>
                                    </span>
                    <?php endif; ?>
                </div>
                <div class="clearfix"></div>
                <div class="form-group <?php echo e($errors->has('description') ? 'has-error' :''); ?>">
                    <label class="control-label col-lg-2">Description <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <?php echo Form::textarea('description', $roomlist->description ?? "", array('class'=>'form-control editor', 'required' => 'true')); ?>

                        <?php if($errors->has('description')): ?>
                            <sapn class="help-block">
                                <strong>
                                    <?php echo e($errors->first('description')); ?>

                                </strong>
                            </sapn>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group <?php echo e($errors->has('short_description') ? 'has-error' : ''); ?>">
                    <label class="control-label col-lg-2">Short Description <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <?php echo Form::textarea('short_description', $roomlist->short_description ?? "", array('class'=>'form-control editor', 'required' => 'true')); ?>

                        <?php if($errors->has('short_description')): ?>
                            <sapn class="help-block">
                                <strong>
                                    <?php echo e($errors->first('short_description')); ?>

                                </strong>
                            </sapn>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group" <?php echo e($errors->has('cover_image') ? 'has-error': ''); ?>>
                    <label class="control-label col-lg-2">Image</label>
                    <div class="col-lg-10">
                        <?php if(file_exists('storage/'. $roomlist->cover_image) &&  $roomlist->cover_image != ''): ?>
                            <img src="<?php echo e(asset('storage/'. $roomlist->cover_image)); ?>" class="displayimage" style="width:200px; height:200px;" alt="">
                        <?php endif; ?>

                            <input name="cover_image" type="hidden" class="fileimage">
                            <div id="form1" runat="server"></br> </br>
                                <input type='file' id="imgInp" />
                                <img id="my-image" src="#" />
                            </div>
                            
                            <input type="button" class="use" value="Crop" >
                            <input type="button" class="cancle-btn" value="Delete" ></br> </br>
                            <div class="result"></div>
                            <?php if($errors->has('cover_image')): ?>
                                <sapn class="help-block">
                                    <strong>
                                        <?php echo e($errors->first('cover_image')); ?>

                                    </strong>
                                </sapn>
                            <?php endif; ?>
                    </div>


                </div>
                <div class="clearfix"></div>


                <div class="form-group">
                    <label class="control-label col-lg-2">Publish ?</label>
                    <div class="col-lg-10">
                        <?php echo Form::checkbox('is_active', null, $roomlist->is_active, array('class' => 'switch','data-on-text'=>'On','data-off-text'=>'Off', 'data-on-color'=>'success','data-off-color'=>'danger' )); ?>

                    </div>
                </div>
                <div class="clearfix"></div>
            </fieldset>
            <div class="text-left col-lg-offset-2">
                <button type="submit" class="btn btn-primary legitRipple">
                    Submit <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            <?php echo method_field('PATCH'); ?>

            <?php echo Form::hidden('id', $roomlist->id); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>