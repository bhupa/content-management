<div class="footer text-muted">
    &copy; <?php echo e(date('Y')); ?>. <a href="<?php echo e(route('home')); ?>" target="_blank"> <?php echo config('app.name'); ?> </a> by <a
            href="http://www.genstechnology.com/" target="_blank">Gens Technology.</a>
    || Ver <a href="#"> <?php echo e(exec('git describe --tags --abbrev=1')); ?></a>
</div>