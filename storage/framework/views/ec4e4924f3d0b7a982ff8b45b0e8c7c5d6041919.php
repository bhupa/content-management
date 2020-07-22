<section class="home-blog gallery" style="margin-bottom: 50px;">
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
    </div>
</section>
