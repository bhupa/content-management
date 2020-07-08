<?php $__env->startSection('scripts'); ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>


    <script>
        $(document).ready(function () {
            $(".defaultTable").on("click", ".change-status", function () {
                $object = $(this);
                var id = $object.attr('id');
                Swal({
                    title: 'Are you sure?',
                    text: 'Do you want to change the status',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, change it!',
                    cancelButtonText: 'No, keep it'
                }).then((result) => {
                    if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo e(route('admin.gallery.change-status')); ?>",
                        data: {
                            'id': id,
                        },
                        dataType: 'json',
                        success: function (response) {
                            console.log(response);
                            swal("Thank You!", response.message, "success");
                            if (response.response.is_active == 1) {
                                $($object).children().removeClass('icon-minus2');
                                $($object).children().addClass('icon-checkmark3');
                            } else {
                                $($object).children().removeClass('icon-checkmark3');
                                $($object).children().addClass('icon-minus2');
                            }
                        },
                        error: function (e) {
                            if (e.responseJSON.message) {
                                Swal('Error', e.responseJSON.message, 'error');
                            } else {
                                Swal('Error', 'Something went wrong while processing your request.', 'error')
                            }
                        }
                    });

                }
            })
            });

            $(".gallery").on("click", ".delete", function () {
                $object = $(this);
                var id = $object.attr('id');
                var gallery = $object.data('gallery');
                debugger

                Swal({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this !',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, keep it'
                }).then((result) => {
                    if (result.value) {
                    $.ajax({
                        type: "POST",
                        url: baseUrl + "/admin/roomlist/image" + "/" + gallery + "/" + id,
                        data: {
                            id: id,
                            _method: 'DELETE'
                        },
                        success: function (response) {
                            swal("Deleted!", response.message, "success");
                            $("#imageItem-"+id).empty();
                        },
                        error: function (e) {
                            if (e.responseJSON.message) {
                                Swal('Error', e.responseJSON.message, 'error');
                            } else {
                                Swal('Error', 'Something went wrong while processing your request.', 'error')
                            }
                        }
                    });
                }
            })
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-header'); ?>
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> -
                    Roomlist Images</h4>
            </div>

        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Roomlist Images</li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <link href="<?php echo e(asset('backend/css/bootstrap_limitless.min.css')); ?>" rel="stylesheet" type="text/css">
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-grid3 position-left"></i>Roomlist Images</h5>
            <div class="heading-elements">
                <a href="<?php echo e(route('admin.roomlist-image.create', [$roomlist->id])); ?>"
                   class="btn btn-default legitRipple pull-right">
                    <i class="icon-file-plus position-left"></i>
                    Upload Images
                    <span class="legitRipple-ripple"></span>
                </a>
            </div>
        </div>

        <div class="panel-body gallery">

            <div class="row">

                <?php $__empty_1 = true; $__currentLoopData = $roomimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roomimage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-sm-6 col-lg-3" id="imageItem-<?php echo e($roomimage->id); ?>">
                        <div class="card">
                            <div class="card-img-actions m-1">
                                <img class="card-img img-fluid" src="<?php echo e(asset('storage/'.$roomimage->image)); ?>" alt=""
                                     style="width: 221px; height:165px;">
                                <div class="card-img-actions-overlay card-img">
                                    <a href="<?php echo e(asset('storage/'.$roomimage->image)); ?>"
                                       class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round"
                                       data-popup="lightbox" rel="group">
                                        <i class="icon-plus3"></i>
                                    </a>

                                    <a href="javascript:void(0)" id="<?php echo e($roomimage->id); ?>" data-gallery = "<?php echo e($roomlist->id); ?>"
                                       class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2 delete">
                                        <i class="icon-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-sm-6 col-lg-3">
                        <div class="card">
                            Sorry, no image has been uploaded yet.
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>