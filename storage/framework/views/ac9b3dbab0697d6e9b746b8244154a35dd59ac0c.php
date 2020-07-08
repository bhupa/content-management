<?php $__env->startSection('styles'); ?>
  
<?php $__env->stopSection(); ?>

    <?php $__env->startSection('scripts'); ?>
   
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Content</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo e(route('admin.dashboard')); ?>"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li>
                    <a href="<?php echo e(route('admin.contents.index')); ?>"><i class="icon-page-break position-left"></i> Contents</a>
                </li>
                <li class="active">Add Content</li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Create Content</h5>
            <div class="heading-elements">
                <a href="<?php echo e(route('admin.contents.index')); ?>" class="btn btn-default legitRipple pull-right">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>
        <div class="panel-body">
            <?php echo Form::open(array('route' => 'admin.contents.store','class'=>'form-horizontal','id'=>'validator', 'files' => 'true')); ?>

            <fieldset class="content-group">
                <div class="clearfix"></div>
                <br>
                <div class="form-group">
                    <label class="control-label col-lg-2">Parent<span class="text-danger">*</span></label>
                    <div class="col-lg-6">

                        <select name="parent_id" class="form-control">
                            <option value="">Parent Itself</option>
                            <?php echo $__env->make('admin.content.recursive_options', ['parents' => $parents, 'selected_id' => ""], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </select>

                    </div>
                </div>
                <br>

                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Header</label>
                    <div class="col-lg-10">
                        <input type="checkbox" name="header">
                    </div>
                </div>
                <div class="clearfix"></div> <div class="form-group">
                    <label class="control-label col-lg-2">Footer</label>
                    <div class="col-lg-10">
                        <input type="checkbox" name="footer">

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Editable ?</label>
                    <div class="col-lg-10">
                        <input type="checkbox" name="edit">
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Title <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        <?php echo Form::text('title', null, array('class'=>'form-control','placeholder'=>'Post title')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Image</label>
                    <div class="col-lg-10">

                        <input name="image" type="hidden" class="fileimage">
                        <div id="form1" runat="server">
                            <input type='file' id="imgInp" /></br> </br>
                            <img id="my-image" src="#" />
                        </div>
                        
                        <input type="button" class="use" value="Crop" >
                       <input type="button" class="cancle-btn" value="Delete" ></br> </br>
                        <div class="result"></div>
                    </div>


                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Meta Keys <span class="text-danger"></span></label>

                    <div class="col-lg-6">
                        <?php echo Form::text('meta_keys', null, array('class'=>'form-control','placeholder'=>'Meta Keys')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Meta Description <span class="text-danger"></span></label>

                    <div class="col-lg-6">
                        <?php echo Form::text('meta_desc', null, array('class'=>'form-control','placeholder'=>'Meta Description')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group row <?php echo e($errors->has('short_description') ? 'has-errors'  : ''); ?>">
                    <label class="control-label col-lg-2">Short Description </label>

                    <div class="col-lg-10">
                        <?php echo Form::textarea('short_description', null, array('class'=>'form-control mini-editor','id'=>'editor', )); ?>

                        <?php if($errors->has('short_description')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('short_description')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Description <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <?php echo Form::textarea('description', null, array('class'=>'form-control editor', 'id'=>'editor', 'required' => 'true')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>


                <div class="form-group">
                    <label class="control-label col-lg-2">Publish ?</label>
                    <div class="col-lg-10">
                        <?php echo Form::checkbox('is_active', 1, true, array('class' => 'switch','data-on-text'=>'On','data-off-text'=>'Off', 'data-on-color'=>'success','data-off-color'=>'danger' )); ?>

                    </div>
                </div>
                <div class="clearfix"></div>
            </fieldset>
            <div class="text-left col-lg-offset-2">
                <button type="submit" class="btn btn-primary legitRipple">
                    Submit <i class="icon-arrow-right14 position-right"></i>
                </button>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>