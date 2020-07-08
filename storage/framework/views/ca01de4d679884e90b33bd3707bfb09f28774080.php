<?php $__env->startSection('title', 'Blog'); ?>
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
                <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($contact->title == 'Blog'  && $contact->title !== ''): ?>
                        <div class="col col-xs-12 col-sm-4 col-md-3 title-full">
                            <h1 class="main-title"><?php echo e($contact->title); ?></h1>
                        </div>
                        <div class="col col-xs-12 col-sm-8 col-md-9">
                            <div class="main-title-txt"><?php echo $contact->short_description; ?></div>
                        </div>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="inner-container">



                        <div class="clearboth"></div>
                        <div class="col col-xs-12">
                            <div class="row">
                                <ul class="blog-ul">
                                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <div class="blog-wrapper">
                                                <?php if(file_exists('storage/'.$blog->image) && $blog->image !== ''): ?>
                                                    <img src="<?php echo e(asset('storage/'.$blog->image)); ?>" alt="<?php echo e($blog->title); ?>">
                                                <?php endif; ?>
                                                <div class="entry-content-wrapper">
                                                    <header class="entry-header">
                                                        <h2 class="entry-title"><a href="<?php echo e(route('blogs.show',[$blog->slug])); ?>" rel="bookmark"><?php echo e($blog->title); ?></a></h2>
                                                    </header><!-- .entry-header -->
                                                    <div class="entry-meta">
                                                        <span><i class="far fa-calendar-alt"></i> <?php echo e(Carbon\Carbon::parse($blog->created_at)->format('d F Y')); ?></span>

                                                    </div>
                                                    <div class="entry-content">
                                                        <p><?php echo str_limit($blog->description); ?></p> <a href="<?php echo e(route('blogs.show',[$blog->slug])); ?>" class="btn btn-red">Read More</a>
                                                    </div><!-- .entry-content -->
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                </ul>
                                <?php echo e($blogs->links('frontend.pagination')); ?>

                                
                                    
                                        
                                            
                                        
                                        
      
        
        
      
                                        
                                        

                                        
                                        
                                            
                                        
                                    
                                
                            </div>
                        </div>
                    </div>
            </div>
        </div>

    </section>
    <!--    Services    -->




    <!-- Content area -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>