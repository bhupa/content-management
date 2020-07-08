<?php $__env->startSection('title', 'Product List'); ?>
<?php $__env->startSection('header_js'); ?>
    <script type="text/javascript">

        $('div.alert').delay(3000).slideUp(300);


    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
    <div id="pagebackground" style="background:url(<?php echo e(asset('frontend/img/slider3.jpg')); ?>);" class="parallax-bg">
    </div>
    <!--    Page Background    -->



    <section id="inner-container-section" class="mt90" >
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($project->title == 'Products'  && $project->title !== ''): ?>
                <div class="col col-xs-12 col-sm-4 col-md-3 title-full">
                    <h1 class="main-title"><?php echo e($project['title']); ?></h1>
                </div>
                <div class="col col-xs-12 col-sm-8 col-md-9">
                    <div class="main-title-txt"><?php echo $project['short_description']; ?></div>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="inner-container">

                    <div class="clearboth"></div>
                    <div class="col col-xs-12">
                        <div class="row">
                            <ul class="product-list">
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="col col-xs-12 col-sm-6 col-md-4">
                                    <div class="product-img">
                                        <?php if(file_exists('storage/'.$product->image) && $product->image !== ''): ?>
                                        <img src="<?php echo e(asset('storage/'.$product->image)); ?>" alt="<?php echo e($product->title); ?>" title="">
                                        <?php endif; ?>
                                        <div class="date-product">

                                            <a class="product-readmore" href="<?php echo e(route('products.show',[$product->slug])); ?>">Read More</a>
                                        </div>
                                    </div>
                                    <a href="<?php echo e(route('products.show',[$product->slug])); ?>" class="product-title"><?php echo e($product->title); ?></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>

                            <div class="col col-xs-12">
                                <div class="paginationwrapper">
                                    <?php echo e($products->render('vendor.pagination.default')); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!--    Services    -->


    <?php echo $__env->make('frontend.inc.feedbackform', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Content area -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>