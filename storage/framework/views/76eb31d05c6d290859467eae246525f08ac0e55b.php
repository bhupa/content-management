
<h2><?php echo e($service['title']); ?></h2>
<?php if(file_exists('storage/'.$service['image']) && $service['image'] !== ''): ?>
    <img src="<?php echo e(asset('storage/'.$service['image'])); ?>" alt="<?php echo e($service['title']); ?>" type="" class="services-img">
<?php endif; ?>
<p>
    <?php echo $service['description']; ?>

</p>