<?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($parent->parent_id == ''): ?>
    <option value="<?php echo e($parent->id); ?>" <?php echo e(($selected_id == $parent->id) ? "selected" : ""); ?>>  --<?php echo e($parent->title); ?></option>
    <?php endif; ?>
       <?php echo $__env->make('admin.content.recursive_options', ['parents' => $parent->child, 'selected_id' => $selected_id ?? ""], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>