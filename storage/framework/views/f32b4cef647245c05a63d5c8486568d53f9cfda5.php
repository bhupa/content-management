<?php $__env->startSection('scripts'); ?>
    <script>
        

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        $(document).ready(function () {

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
                            url: baseUrl + "/admin/memberType" + "/" + id,
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
                    Member Type</h4>
            </div>

        </div>
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="icon-home2 position-left"></i> Home</a>
                </li>
                <li class="active">Member Type</li>
            </ul>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="panel panel-flat">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="icon-grid3 position-left"></i>Member Type</h5>
            <div class="heading-elements">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-policy.perform',['member-type','add'])): ?>
                    <a href="<?php echo e(route('admin.memberType.create')); ?>" class="btn btn-default legitRipple pull-right">
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
                    <th>Action</th>
                    <th style="width: 1%">&nbsp;</th>
                    <th style="width: 1%">&nbsp;</th>
                </tr>
                </thead>
                <tbody id="sortable">


                <?php $__currentLoopData = $membersType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id="item-<?php echo e($member->id); ?>">
                        <td><?php echo e($key+1); ?></td>
                        <td><?php echo e($member->name); ?></td>
                        <td>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-policy.perform',['member-type','edit'])): ?>
                                <a href="<?php echo e(route('admin.memberType.edit',$member->id)); ?>"
                                   class="btn btn-success btn-icon btn-rounded legitRipple">
                                    <i class=" icon-database-edit2"></i>
                                </a>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('master-policy.perform',['member-type','delete'])): ?>
                                <a href="javascript:void(0)" id="<?php echo e($member->id); ?>"
                                   class="btn btn-danger btn-icon btn-rounded legitRipple delete">
                                    <i class="icon-cross2"></i>
                                </a>
                            <?php endif; ?>
                        </td>
                        <td style="width: 1%"></td>
                        <td style="width: 1%"></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </tbody>
                <tfoot>
                <tr>
                    <th>S. No.</th>
                    <th>Name</th>
                    <th>Action</th>
                    <th style="width: 1%">&nbsp;</th>
                    <th style="width: 1%">&nbsp;</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>