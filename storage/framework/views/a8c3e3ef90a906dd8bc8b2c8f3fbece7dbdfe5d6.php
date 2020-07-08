<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            var image_resize_width = 50;
            var image_resize_height = 50;
            var aspectRation = image_resize_width/image_resize_height;

            var viewport_width = aspectRation * 200;
            var viewport_height =  200;
            var boundary_width = aspectRation * 210;
            var boundary_height = 210;

            function readURL(input) {
                $('#icon .croppie-container').css('display', 'block');
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#my-icon').attr('src', e.target.result);
                        var resize = new Croppie($('#my-icon')[0], {
                            viewport: {width:50, height: 50},
                            boundary: {width:80, height: 80},
                            showZoomer: true,
                            enableResize: false,
                            enableOrientation: false,
                            format: 'jpeg'

                        });

                        $('.use-icon').fadeIn();
                        $('.cancle-btn-icon').fadeIn();
                        $('.use-icon').each(function (index) {
                            $(this).on('click', function () {
                                resize.result({
                                    type: 'canvas',
                                    size: {width: 30, height: 30}
                                }).then(function (dataImg) {
                                    var data = [{image: dataImg}, {name: 'myimgage.jpg'}];
                                    if ($('#leftmenu').is(':empty')) {
                                        // use ajax to send data to php
                                        $('.result-icon').css('display', 'block');
                                        $('.result-icon').append('<img src="' + dataImg + '" style="width:'+50+'px; height:'+50+'px"    >');
                                        $('.fileimage-icon').val(dataImg);
                                        $('.displayimage-icon').css('display', 'none');
                                    } else {
                                        $('.result-icon').empty();
                                        $('.result-icon').css('display', 'block');
                                        $('.result-icon').append('<img src="' + dataImg + '" style="width:'+50+'px; height:'+50+'px"    >');
                                        $('.fileimage-icon').val(dataImg);
                                        $('.displayimage-icon').css('display', 'none');
                                    }

                                });

                            })

                        });
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgicon").change(function () {
                readURL(this);
            });
            $('.cancle-btn-icon').on('click', function () {
                $('#icon .croppie-container').hide();
                $('#icon .cr-image').attr('src', '');
                $('#icon .cr-boundary').remove();
                $('#icon .cr-slider').remove();
                $('.result-icon').empty();
                $('.use-icon').hide();
                $('.cancle-btn-icon').hide();
                $("#imgicon").val('');
                $(".fileimage-icon").val('');
                $('.displayimage-icon').css('display', 'block');
            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-header'); ?>

    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Service</h4>
            </div>
        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Service</li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Edit Service</h5>
            <div class="heading-elements">
                <a href="<?php echo e(route('admin.service.index')); ?>" class="btn btn-default legitRipple pull-right">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>
        <div class="panel-body">
            <?php echo Form::open(array('route' => ['admin.service.update', $service->id],'class'=>'form-horizontal','id'=>'validator', 'files' => 'true')); ?>

            <fieldset class="content-group">

                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Service-Category<span class="text-danger">*</span></label>
                    <div class="col-lg-6">
                        <?php $categoies = [];  ?>
                        <?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $categoies[$key->id] = $key->title; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e(Form::select('service_category_id', $categoies, $service->service_category_id,['class'=>'form-control', 'placeholder'=>'select ServiceCategory','id'=>'select-category'])); ?>



                    </div>
                </div>
                <br>
                <div class="clearfix"></div>
                <div class="form-group <?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                    <label class="control-label col-lg-2">Title <span class="text-danger">*</span></label>

                    <div class="col-lg-6 ">
                        <?php echo Form::text('title', $service->title, array('class'=>'form-control','placeholder'=>'Title')); ?>

                    </div>
                    <?php if($errors->has('title')): ?>
                        <span class="help-block">
                                        <strong><?php echo e($errors->first('title')); ?></strong>
                                    </span>
                    <?php endif; ?>
                </div>
                <div class="clearfix"></div>
                <div class="form-group <?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                    <label class="control-label col-lg-2">Description <span class="text-danger">*</span></label>

                    <div class="col-lg-10 ">
                        <?php echo Form::textarea('description', $service->description, array('class'=>'form-control editor','placeholder'=>'Description')); ?>


                    </div>
                    <?php if($errors->has('description')): ?>
                        <span class="help-block">
                                        <strong><?php echo e($errors->first('description')); ?></strong>
                                    </span>
                    <?php endif; ?>
                </div>
                <div class="clearfix"></div>


                <div class="form-group <?php echo e($errors->has('image') ? ' has-error' : ''); ?>">
                    <label class="control-label col-lg-2">Image</label>
                    <div class="col-lg-10">
                        <?php if(file_exists('storage/'.$service->image) && $service->image !== ''): ?>
                            <img src="<?php echo e(asset('storage/'.$service->image)); ?>" class="displayimage-icon" style="width:100px; height:100px; margin-bottom: 15px;" alt=""></br>

                        <?php endif; ?>
                        <input name="image" type="hidden" class="fileimage">

                        <div id="form1" runat="server">
                            <input type='file' id="imgInp" placeholder="Upload Image"/> </br> </br>
                            <img id="my-image" src="#" />
                        </div>
                        
                        <input type="button" class="use" value="Crop" >
                        <input type="button" class="cancle-btn" value="Delete" ></br> </br>
                        <div class="result"></div>
                        <?php if($errors->has('image')): ?>
                            <span class="help-block">
                                        <strong><?php echo e($errors->first('image')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>


                </div>
                <div class="form-group <?php echo e($errors->has('icon_image') ? ' has-error' : ''); ?>">
                    <label class="control-label col-lg-2">Icon</label>
                    <div class="col-lg-10">
                        <?php if(file_exists('storage/'.$service->icon_image) && $service->icon_image !== ''): ?>
                            <img src="<?php echo e(asset('storage/'.$service->icon_image)); ?>" class="displayimage-icon" style="width:50px; height:50px; margin-bottom: 15px;" alt=""></br>

                        <?php endif; ?>
                        <input name="icon_image" type="hidden" class="fileimage-icon">

                        <div id="icon" runat="server1">
                            <input type='file' id="imgicon" placeholder="Upload Image"/> </br> </br>
                            <img id="my-icon" src="#" />
                        </div>
                        
                        <input type="button" class="use-icon" value="Crop" >
                        <input type="button" class="cancle-btn-icon" value="Delete" ></br> </br>
                        <div class="result-icon"></div>
                        <?php if($errors->has('icon_image')): ?>
                            <span class="help-block">
                                        <strong><?php echo e($errors->first('icon_image')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>


                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Publish ?</label>
                    <div class="col-lg-10">
                        <?php echo Form::checkbox('is_active', null, $service->is_active, array('class' => 'switch','data-on-text'=>'On','data-off-text'=>'Off', 'data-on-color'=>'success','data-off-color'=>'danger' )); ?>

                    </div>
                </div>
                <div class="clearfix"></div>
            </fieldset>
            <div class="text-left col-lg-offset-2">
                <button type="submit" class="btn btn-primary legitRipple">
                    Submit <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            <?php echo method_field('PATCH'); ?>

            <?php echo Form::hidden('id', $service->id); ?>

            <?php echo Form::close(); ?>

        </div>
    </div>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>