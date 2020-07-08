<?php $__env->startSection('title', $gallery->title); ?>
<?php $__env->startSection('footer_js'); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>

<!-- .custom-header -->
<div id="content" class="site-content global-layout-right-sidebar">
  <div class="container">
    <div class="inner-wrapper">
      <div id="primary" class="content-area">
        <?php if($galleryImages->isNotEmpty()): ?>
        <h1 class="page-title"><?php echo e($gallery->title); ?></h1>
        <?php endif; ?>
        <main id="main" class="site-main">
          <ul class="gallerylist galleydetail">
            <?php $__currentLoopData = $galleryImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galleryImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
              <div class="item-inner-wrapper"> <?php if(file_exists('storage/'.$galleryImage->image) && $galleryImage->image !== ''): ?> <img class="portfolio-thumb img-border " src="<?php echo e(asset('storage/'.$galleryImage->image)); ?>" alt="<?php echo e($galleryImage->gallery_id); ?>"  /> <?php endif; ?>
                <div class="overlay"></div>
                <a  class="zoom-icon" data-gal="prettyPhoto[product-gallery]" rel="bookmark" href="<?php echo e(asset('storage/'.$galleryImage->image)); ?>"><i class="icon-focus"></i></a>
              
              </div>
            </li>
            
            
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
          <div class="more-wrapper" style="margin-top: 0"> <?php echo e($galleryImages->render('vendor.pagination.custom')); ?> </div>
          <div style="clear:both"></div>
          <?php if($videos->isNotEmpty()): ?>
          <h2 style="margin-top: 0">Video</h2>
          <?php endif; ?>
          <div> <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="vdo_grid">
              
              <a data-v-aa2be910="" data-modal_name="myModal_<?php echo e($video->id); ?>" data-fancybox="true" href="#video45" class="video-content video-1 openModal"><img data-v-aa2be910="" src="https://i3.ytimg.com/vi/<?php echo e($video->link); ?>/maxresdefault.jpg" alt="Time Is Money | Buddha Air | Fly With Us" class="img-fluid2"><i data-v-aa2be910="" class="far fa-play-circle play-button"></i></a>
              <h5><?php echo e($video->title); ?></h5>
              
             <!-- <div id="myModal_<?php echo e($video->id); ?>" class="modal">
                <span class="close" data-modal_name="myModal_<?php echo e($video->id); ?>">&times;</span>
                <iframe width="100%" height="200" src="https://www.youtube.com/embed/<?php echo e($video->link); ?>" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>-->
              
              <div id="myModal_<?php echo e($video->id); ?>" class="modal">
              <div class="modal-content">
                <span class="close" data-modal_name="myModal_<?php echo e($video->id); ?>">&times;</span>
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/<?php echo e($video->link); ?>" frameborder="0" allowfullscreen></iframe>
                       
                
              </div>

            </div>
              
         
              
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </div>

          <div class="more-wrapper" style="margin-top: 0"> <?php echo e($videos->render('vendor.pagination.custom')); ?> </div>
        </main>
        <!-- #main --> 
      </div>
      <!-- #primary --> 
      <?php echo $__env->make('frontend.inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
      <!-- .sidebar --> 
    </div>
    <!-- #inner-wrapper --> 
  </div>
  <!-- .container --> 
</div>


<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?> 

<script>

  $(function(){
	  $(".openModal").click(function(){
		  var modal_id = $(this).data("modal_name");
		  $("#"+modal_id).css("display", "block");
	  });
	  
	  $(".close").click(function(){
		  var modal_id = $(this).data("modal_name");
		  $("#"+modal_id).css("display", "none");
	  });
  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>