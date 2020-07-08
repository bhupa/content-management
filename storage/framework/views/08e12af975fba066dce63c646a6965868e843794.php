<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('backend/tablednd.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="<?php echo e(asset('backend/tablednd.js')); ?>"></script>
    <script>
        $(function(){
            $('.defaultTable').dataTable( {
                "pageLength": 50
            } );
            $('#sortable').sortable({
                axis: 'y',
                update: function(event, ui){
                    var data = $(this).sortable('serialize');
                    var url = "<?php echo e(url('admin/partner/sort')); ?>";
                    $.ajax({
                        type: "POST",
                        url: url,
                        datatype: "json",
                        data: {order: data, _token: '<?php echo csrf_token(); ?>'},
                        success: function(data){
                            console.log(data);
                            var obj = jQuery.parseJSON(data);
                            swal({
                                title: "Success!",
                                text: "Article has been sorted.",
                                imageUrl: "<?php echo e(asset('backend')); ?>/thumbs-up.png",
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }
                    });
                }
            });
        });

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
                            url: "<?php echo e(route('admin.partner.change-status')); ?>",
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

            $(".defaultTable").on("click", ".delete", function () {
                $object = $(this);
                var id = $object.attr('id');

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
                            url: baseUrl + "/admin/partner/"+ id,
                            data: {
                                id: id,
                                _method: 'DELETE'
                            },
                            success: function (response) {
                                swal("Deleted!", response.message, "success");
                                var oTable = $('.defaultTable').dataTable();
                                var nRow = $($object).parents('tr')[0];
                                oTable.fnDeleteRow(nRow);
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
                    Partners</h4>
            </div>

        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active"> Partners</li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-grid3 position-left"></i> Partners</h5>
            <div class="heading-elements">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-policy.perform', ['partner', 'add'])): ?>
                    <a href="<?php echo e(route('admin.partner.create')); ?>" class="btn btn-default legitRipple pull-right">
                        <i class="icon-file-plus position-left"></i>
                        Create New
                        <span class="legitRipple-ripple"></span>
                    </a>
                    <?php endif; ?>
            </div>
        </div>
        <div class="panel-body">
            <table class="table datatable-column-search-inputs defaultTable">
                <thead>
                <tr>
                    <th>S. No.</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th></th>
                </tr>
                </thead>
                <tbody id="sortable">


                <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id="item-<?php echo e($partner->id); ?>">

                        <td><?php echo e($key  + $partners->firstItem()); ?></td>
                        <td><?php echo e($partner->name); ?></td>
                        <td>
                            <?php if(file_exists('storage/'.$partner->image) && $partner->image != ''): ?>
                                <img src="<?php echo e(asset('storage/'.$partner->image)); ?>"  style="width:180px; height:100px;" alt="<?php echo e($partner->name); ?>">
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-policy.perform', ['partner', 'changeStatus'])): ?>
                                <a href="javascript:void(0)"
                                   title="Change-status"
                                   data-toggle="tooltip"
                                   class="btn btn-primary btn-icon btn-rounded legitRipple change-status"
                                   id="<?php echo e($partner->id); ?>">
                                    <?php if($partner->is_active == 1): ?>
                                        <i class="icon-checkmark3"></i>
                                    <?php else: ?>
                                        <i class="icon-minus2"></i>
                                    <?php endif; ?>

                                </a>
                                <?php endif; ?>
                        </td>
                        <td>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-policy.perform', ['partner', 'edit'])): ?>
                                <a href="<?php echo e(route('admin.partner.edit',$partner->id)); ?>"
                                   title="Edit-Partner"
                                   data-toggle="tooltip"
                                   class="btn btn-success btn-icon btn-rounded legitRipple">
                                    <i class=" icon-database-edit2"></i>
                                </a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-policy.perform', ['banner', 'delete'])): ?>
                                    <a href="javascript:void(0)" id="<?php echo e($partner->id); ?>"
                                       title="Delete-Partner"
                                       data-toggle="tooltip"
                                       class="btn btn-danger btn-icon btn-rounded legitRipple delete">
                                        <i class="icon-cross2"></i>
                                    </a>
                                    <?php endif; ?>
                        </td>
                        <td></td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </tbody>
                <tfoot>
                <tr>
                    <th>S. No.</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th></th>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>