<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function () {
            $('#validator')
                    .formValidation({
                        framework: 'bootstrap',
                        icon: {
                            valid: 'glyphicon glyphicon-ok',
                            invalid: 'glyphicon glyphicon-remove',
                            validating: 'glyphicon glyphicon-refresh'
                        },
                        fields: {
                            title: {
                                validators: {
                                    notEmpty: {
                                        message: 'The title is required'
                                    }
                                }
                            },
                            description: {
                                validators: {
                                    notEmpty: {
                                        message: 'The description is required'
                                    }
                                }
                            },

                        }
                    })
        });

        $(function() {

            $('#file-container').on('click', function (e) {
                window.open(this.href, 'Filemanager', 'width=900,height=600');
                return false;
            });

            function SetUrl(url) {
                var selector = getCookie('selected');
                if (selector == '2') {
                    $('#thumbnail2').val(url);
                    $('#feature-img-container2').find('img').attr('src', url).attr('height', '100px');
                } else {
                    $('#thumbnail').val(url);
                    $('#feature-img-container').find('img').attr('src', url).attr('height', '100px');
                }
            }
        });
        onload = function()
        {
            var itemText = $('#select  option:selected').val();
            select_drop(itemText);
            debugger
        };



        function select_drop(itemText){

            if(itemText == 'Link') {
                debugger
                $('#file').css("display", "none");
                $('#link').css("display", "block");
            }
            else {
                debugger
                $('#link').css("display","none");
                $('#file').css("display", "block");
            }
        }
        $(function() {
            $('#select').on('change', function () {

                var itemText = $(this).find('option:selected').text();
                if (itemText == 'Link') {
                    $('#file').css("display", "none");
                    $('#link').css("display", "block");
                } else {
                    $('#link').css("display", "none");
                    $('#file').css("display", "block");
                }
            });
            $('#download').submit(function () {
                var itemText = $('#select').find('option:selected').text();
                if (itemText == 'Link') {
                    $('#file').remove();

                } else {
                    $('#link').remove();

                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Program</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Program</li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Edit Program</h5>
            <div class="heading-elements">
                <a href="<?php echo e(route('admin.programs.index')); ?>" class="btn btn-default legitRipple pull-right">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>
        <div class="panel-body">
            <?php echo Form::open(array('route' => ['admin.programs.update',$program->id],'class'=>'form-horizontal','id'=>'download', 'files' => 'true')); ?>

            <fieldset class="content-group">
                <div class="form-group">
                    <label class="control-label col-lg-2">Title <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        <?php echo Form::text('title', $program->title, array('class'=>'form-control','placeholder'=>'Title')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Meta Title <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        <?php echo Form::text('meta_title', $program->meta_title, array('class'=>'form-control','placeholder'=>'Meta Title')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Keywords <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        <?php echo Form::text('keywords', $program->keywords, array('class'=>'form-control','placeholder'=>'Keywords')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>

                <?php $type = ['Advocacy'=>'Advocacy','Innovative Programs' => 'Innovative Programs', 'Ongoing Programs' => 'Ongoing Programs' ,'Completed Programs'=>'Completed Programs'] ?>

                <div class="form-group">
                    <label class="control-label col-lg-2">Type<span class="text-danger">*</span></label>
                    <div class="col-lg-6">

                        <select name="type" class="form-control" id="select">
                            <option value="0">Select an option</option>
                            <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($key); ?>" <?php echo e(($program->type == $key) ? "selected" : ""); ?>><?php echo e($name); ?></option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="form-group">
                    <label class="control-label col-lg-2">File</label>
                    <div class="col-lg-10">
                        <?php if(!empty($program->file)): ?>
                            <?php echo Form::url('file', 'https://www.youtube.com/watch?v='.$program->file, array('class'=>'form-control','placeholder'=>'Youtube Video link')); ?>

                        <?php else: ?>
                            <?php echo Form::url('file', null, array('class'=>'form-control','placeholder'=>'Youtube Video link')); ?>


                        <?php endif; ?>


                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Image</label>
                    <div class="col-lg-10">
                        <?php if(file_exists('storage/'.$program->image) && $program->image != ''): ?>
                            <img src="<?php echo e(asset('storage/'.$program->image)); ?>" class="displayimage" style="width:100px; height:100px; margin-bottom: 15px;" alt="<?php echo e($program->title); ?>"></br>

                        <?php endif; ?>
                        <input name="image" type="hidden" class="fileimage">

                        <div id="form1" runat="server">
                            <input type='file' id="imgInp" placeholder="Upload Image"/> </br> </br>
                            <img id="my-image" src="#" />
                        </div>
                        
                        <input type="button" class="use" value="Crop" >
                        <input type="button" class="cancle-btn" value="Delete" ></br> </br>
                        <div class="result"></div>
                    </div>


                </div>

                <div class="clearfix"></div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Description <span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <?php echo Form::textarea('description', $program->description, array('class'=>'form-control editor')); ?>

                    </div>
                </div>
                <div class="clearfix"></div>


                <div class="form-group">
                    <label class="control-label col-lg-2">Publish ?</label>
                    <div class="col-lg-10">
                        <?php echo Form::checkbox('is_active', null, $program->is_active, array('class' => 'switch','data-on-text'=>'On','data-off-text'=>'Off', 'data-on-color'=>'success','data-off-color'=>'danger' )); ?>


                    </div>
                </div>
                <div class="clearfix"></div>
            </fieldset>
            <div class="text-left col-lg-offset-2">
                <button type="submit" class="btn btn-primary legitRipple">
                    Submit <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            <?php echo method_field('PATCH'); ?>

            <?php echo Form::hidden('id', $program->id); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>