<?php $__env->startSection('title', 'Service Lists'); ?>
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
                <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($servi->title == 'Services'  && $servi->title !== ''): ?>
                <div class="col col-xs-12 col-sm-4 col-md-3 title-full">
                    <h1 class="main-title"><?php echo e($servi['title']); ?></h1>
                </div>
                <div class="col col-xs-12 col-sm-8 col-md-9">
                    <div class="main-title-txt"><?php echo $servi->short_description; ?></div>
                </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="inner-container full-width">

                    <div class="clearboth"></div>
                    <div class="col col-xs-12 full-width">
                        <div class="row">

                            <div>
                                <div class="col col-xs-12 col-sm-12 col-md-4 services-left">

                                    <ul class="sidenav">
                                        <?php $__currentLoopData = $servicelists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicelist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="<?php echo e($loop->first ? 'active' : ''); ?>"><a  data-type="<?php echo e($servicelist->id); ?>"  href="<?php echo e(route('services.show',[$servicelist->slug])); ?>" class="servicelist"><?php echo e($servicelist->title); ?></a></li>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>


                                </div>
                                <!-- tab content -->
                                <div class="col col-xs-12 col-sm-12 col-md-8  services-right">
                                    <div class="tab-content">

                                        <h2><?php echo e($service['title']); ?></h2>
                                        <?php if(file_exists('storage/'.$service['image']) && $service['image'] !== ''): ?>
                                        <img src="<?php echo e(asset('storage/'.$service['image'])); ?>" alt="<?php echo e($service['title']); ?>" type="" class="services-img">
                                        <?php endif; ?>
                                        <p>
                                            <?php echo $service['description']; ?>

                                        </p>

                                    </div>

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
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    $('div.alert').delay(3000).slideUp(300);
    $(document).ready(function(){

        $('.sidenav li a').on('click',function(event){
            event.preventDefault();
            $(".sidenav li").removeClass('active');
            $(this).parent('li').addClass('active');
            var routeurl = '<?php echo e(route('service.getsingle')); ?>';
            var url = $(this).attr('data-type');


            $.ajax({
                type:'get',
                url:routeurl,
                headers:{_token:"<?php echo e(csrf_token()); ?>"},
                data:{id:url},
                dataType:'html',
                success:function(service){
                    event.preventDefault();

                    $('.tab-content').html(service);

                },
                error:function(data){

                }

            });
        });
    });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>