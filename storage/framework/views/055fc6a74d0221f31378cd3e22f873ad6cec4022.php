<?php $__env->startSection('title', 'Gallery '); ?>
<?php $__env->startSection('header_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>

    <div id="custom-header"
        <?php if(file_exists('storage/'.$setting->value) && $setting->value != ''): ?>
         style="background-image: url('<?php echo e(asset('storage/'.$setting->value)); ?>')"
         <?php endif; ?>
         >
        <div class="custom-header-content">
            <div class="container">
                <h1 class="page-title">Gallery</h1>
                <div id="breadcrumb">
                    <div aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
                        <ul class="trail-items">
                            <li class="trail-item trail-begin"><a href="<?php echo e(route('home')); ?>" rel="home"><span>Home</span></a></li>
                            <li class="trail-item trail-end"><span>Gallery</span></li>
                        </ul>
                    </div> <!-- .breadcrumbs -->
                </div> <!-- #breadcrumb -->
            </div> <!-- .container -->
        </div>  <!-- .custom-header-content -->
    </div>
<!-- .custom-header -->


<div id="content" class="site-content global-layout-right-sidebar">
  <div class="container">
    <div class="inner-wrapper">
      <div id="primary" class="content-area">
        <main id="main" class="site-main">
         <h1 class="page-title">Gallery </h1>
            <section class="home-blog gallery">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col-md-12 text-center">
                            <h2>Gallery</h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="row">

                            <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                    <?php if(file_exists('storage/'.$gallery->image) && $gallery->image != ''): ?>
                                        <a class="thumbnail" href="<?php echo e(route('gallery.show',[$gallery->slug])); ?>">
                                            <img class="img-thumbnail"
                                                 src="<?php echo e(asset('storage/'.$gallery->image)); ?>"
                                                 alt="<?php echo e($gallery->title); ?>">
                                            <h3 class="gallery-title"><?php echo e(str_limit($gallery->title,'100','.....')); ?></h3>
                                        </a>

                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </div>


                        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="image-gallery-title"></h4>
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                                        </button>

                                        <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="more-wrapper">
                        <nav class="navigation pagination"> <?php echo e($galleries->links('vendor.pagination.custom')); ?>

                            
                            
                            
                            
                            
                             </nav>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </section>

        </main>
        <!-- #main -->
      </div>
      <!-- #primary -->
      
      <!-- .sidebar -->
    </div>
    <!-- #inner-wrapper -->
  </div>
  <!-- .container -->
</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>