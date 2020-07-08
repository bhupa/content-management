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
//            function readURL(input){
//                $('.croppie-container').css('display','block');
//                if(input.files && input.files[0]){
//                    var reader = new FileReader();
//                    reader.onload = function(e){
//                        $("#my-image").attr('src',e.target.result);
//                        var resize = new Croppie($("#my-image")[0],{
//                            viewport: { width:275, height:370},
//                            boundary: { width:800, height:400},
//                            showZoomer: true,
//                            enableResize:false,
//                            enableOrentation: true,
//                            enableExif: false,
//                        });
//                        $('.use').fadeIn();
//                        $('.cancle-btn').fadeIn();
//                        $('.use').click(function(){
//                            resize.result({type: 'canvas', size: { width:275,height:370}}).then(function(dataImg) {
//
//                                var data = [{ image: dataImg }, { name: 'myimgage.jpg' }];
//                                if( $('#leftmenu').is(':empty') ) {
//                                    // use ajax to send data to php
//                                    $('.result').css('display', 'block');
//                                    $('.result').append('<img src="' + dataImg + '" style="width:200px; height:200px"    >');
//                                    $('.fileimage').val(dataImg);
//                                    $('.displayimage').css('display', 'none');
//                                }else{
//                                    $('.result').empty();
//                                    $('.result').css('display', 'block');
//                                    $('.result').append('<img src="' + dataImg + '" style="width:200px; height:200px"    >');
//                                    $('.fileimage').val(dataImg);
//                                    $('.displayimage').css('display', 'none');
//                                }
//                            });
//                        });
//                    }
//                    reader.readAsDataURL(input.files[0]);
//
//                }
//
//            }
//
//            $("#imgInp").change(function(){
//
//                readURL(this)
//            });
//            $('.cancle-btn').on('click', function(){
//                $('.croppie-container').hide();
//                $('.cr-image').attr('src', '');
//                $('.cr-boundary').remove();
//                $('.cr-slider').remove();
//                $('.result').empty();
//                $('.use').hide();
//                $('.cancle-btn').hide();
//                $("#imgInp").val('');
//                $(".fileimage").val('');
//            })
        });
    </script>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Tranning</h4>
            </div>

        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Tranning </li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-file-plus position-left"></i>Edit Tranning</h5>
            <div class="heading-elements">
                <a href="<?php echo e(route('admin.tranning.index')); ?>" class="btn btn-default legitRipple pull-right">
                    <i class="icon-undo2 position-left"></i>
                    Back
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>

        <div class="panel-body">


            <?php echo Form::open(array('route' => ['admin.tranning.update',$tranning->id],'class'=>'form-horizontal','id'=>'validator', 'files' => 'true')); ?>

            <fieldset class="content-group">


                <div class="form-group">
                    <label class="control-label col-lg-2">Name <span class="text-danger">*</span></label>

                    <div class="col-lg-6">
                        <?php echo Form::text('name', $tranning->name, array('class'=>'form-control','placeholder'=>'Name')); ?>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2">Image<span class="text-danger">*</span></label>
                    <div class="col-lg-10">
                        <?php if(file_exists('storage/'.$tranning->image) && $tranning->image != ''): ?>
                            <img src="<?php echo e(asset('storage/'.$tranning->image)); ?>" class="displayimage" style="width:100px; height:100px; margin-bottom: 15px;" alt="<?php echo e($team->title); ?>"></br>

                        <?php endif; ?>
                        <input name="image" type="hidden" class="fileimage" accept="image/*">
                        <div id="form1" runat="server">
                            <input type='file' id="imgInp" accept="image/*" /></br> </br>
                            <img id="my-image" src="#" />
                        </div>
                        
                        <input type="button" class="use" value="Crop" >
                        <input type="button" class="cancle-btn" value="Delete" ></br> </br>
                        <div class="result"></div>
                    </div>


                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Description <span class="text-danger">*</span></label>

                    <div class="col-lg-10">
                        <?php echo Form::textarea('description', $tranning->description, array('class'=>'form-control editor')); ?>

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
                    Submit <i class="icon-arrow-right14 position-right"></i></button>
            </div>
            <?php echo method_field('PATCH'); ?>

            <?php echo Form::hidden('id', $tranning->id); ?>

            <?php echo Form::close(); ?>



        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>