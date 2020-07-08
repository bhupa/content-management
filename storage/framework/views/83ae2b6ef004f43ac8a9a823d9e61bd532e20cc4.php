<?php if(session('status')): ?>
    <div class="alert alert-success    no-border">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>
        </button>
        <h4><i class="icon fa fa-check"></i> Success:</h4>
        <?php echo session('status'); ?>

    </div>
<?php endif; ?>


<?php if(Session::has('flash_success')): ?>
    <div class="alert alert-success  no-border">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>
        </button>
        <h4><i class="icon fa fa-check"></i> Success:</h4>
        <?php echo Session::get('flash_success'); ?>

    </div>
<?php endif; ?>

<?php if(Session::has('flash_notice')): ?>
    <div class="alert alert-success  no-border">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Success:</h4>
        <?php echo Session::get('flash_notice'); ?>

    </div>
<?php endif; ?>

<?php if(Session::has('flash_error')): ?>
    <div class="alert alert-danger  no-border">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
        <h4><i class="icon fa fa-warning"></i> Error!</h4>
        <?php echo Session::get('flash_error'); ?>

    </div>
<?php endif; ?>

<?php if($errors->any()): ?>
    <div class="alert alert-danger  no-border">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>
        </button>
        <h4><i class="icon fa fa-ban"></i>Error(s):</h4>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<?php if(Session::has('flash_info')): ?>
    <div class="alert alert-info  no-border">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>
        </button>
        <h4><i class="icon fa fa-info"></i> Notice:</h4>
        <?php echo Session::get('flash_info'); ?>

    </div>
<?php endif; ?>
