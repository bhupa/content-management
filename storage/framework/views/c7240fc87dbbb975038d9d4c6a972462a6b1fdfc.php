<?php $__currentLoopData = $categorys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($category->id !== ''): ?>
        <option value="<?php echo e($category->id); ?>" <?php echo e(($selected_id == $category->id) ? "selected" : ""); ?>>  --<?php echo e($category->title); ?></option>
        <?php endif; ?>
        <?php echo $__env->make('admin.service.recursive_options', ['$categorys' => $categorys, 'selected_id' => ""], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>