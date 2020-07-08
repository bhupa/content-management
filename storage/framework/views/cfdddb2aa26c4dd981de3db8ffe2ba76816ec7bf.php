<?php $__env->startSection('title', $type); ?>
<?php $__env->startSection('header_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>

<!-- .site-header -->


<!-- .custom-header -->
<div id="content" class="site-content global-layout-no-sidebar">
    <div class="container">
        <div class="inner-wrapper">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" >
                   
                    <!-- .section-latest-posts -->
                    <aside class="section section-latest-posts lite-background">
                        <div class="container">
                             <h1 class="page-title"><?php echo e($type); ?> </h1>
                            <div class="latest-posts-section">

                                <!-- .section-title-wrap -->
                                <div class="inner-wrapper">
                                    <?php if(strtoupper($type) == "ADVOCACY"): ?>
                                        <p>Seto Gurans — since its establishment — has been continuously working for the Early Childhood Development (ECD) in Nepal with ethical obligation to promote shared aspirations amongst the communities in order to enhance children’s health and wellbeing.  In addition, it has been advocating for the development and implementation of laws and policies that promote child-friendly communities, and to utilise the knowledge and research for universal access to a range of high-quality early childhood programmes for all children.</p>
    <p>                                    
    
    For the rights of early age children, it always stands forefront and lobbies with government concerned line agencies/ministries in coordination with ECD Caucus (a loose forum comprised of parliamentarians for advocacy on ECD). </p>
    <p>
    Overall, Seto Gurans makes its involvement in making stakeholders aware on the issues of ECD and advocates accordingly. Likewise, it appeals on sectoral integrated approach to ECD to related ministries, and National Planning Commission. 
    </p>
    <p>
    In addition, it does regular consultation and dialogue sessions with government line agencies concerned on ECD along with other national and international non-government organizations. In addition, Seto Gurans — as a member organization of different regional and global ECD networks i.e. Asia Pacific Regional Network for Early Childhood (ARNEC) —spreads supporting hands for national, regional and global ECD campaigns i.e. "thematic support to global action week campaign of ECD" for solidarity.</p>
                                    <?php endif; ?>
           <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-grid-4 latest-posts-item newslist-page">
                                        <div class="latest-posts-wrapper box-shadow-block">
                                            <div class="latest-posts-thumb">
                                                <a href="<?php echo e(route('program.show',[$program->slug])); ?>" >
                                                    <?php if(file_exists('storage/'.$program->image) && $program->image != ''): ?>
                                                    <img alt="<?php echo e($program->title); ?>" src="<?php echo e(asset('storage/'.$program->image)); ?>">
                                                        <?php endif; ?>
                                                </a> </div>
                                            <div class="latest-posts-text-content-wrapper">
                                                <div class="latest-posts-text-content">
                                                    <h3 class="latest-posts-title"> <a href="<?php echo e(route('program.show',[$program->slug])); ?>"><?php echo e(str_limit($program->title,'60','...')); ?></a> </h3>
                                                    <div class="entry-meta latest-posts-meta"> <span class="posted-on"><?php echo e($program->created_at->format('M d Y')); ?></span> </div>
                                                    <div class="latest-posts-summary">
                                                        <?php echo str_limit($program->description,'100','...'); ?>

                                                    </div>
                                                    <a href="<?php echo e(route('program.show',[$program->slug])); ?>" class="more-link button-curved">Know More</a> </div>

                                            </div>

                                        </div>

                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

 <div class="more-wrapper"> <?php echo e($programs->links('vendor.pagination.custom')); ?>

                                </div>
                                <!-- .inner-wrapper -->
                            </div>
                            <!-- .container -->
                        </div>
                        <!-- .latest-posts-section -->
                    </aside>
                    <!-- .section-latest-posts -->
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
        </div>
        <!-- .inner-wrapper -->
    </div>
    <!-- .container -->
</div>
<!-- #content-->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
        $('.carousel').carousel({
            interval: 2000
        })

        $('#room-id').on('change',function() {
            var roomId = $('#room-id').val();

            $.get("<?php echo url('/')?>" + "/roomlist/"+roomId, function(data, status){
                if(data != 'no data'){
                    var numberOfRooms = data.number_of_rooms;

                    if(numberOfRooms != 0){
                        var options = '';
                        for(i=1; i<= numberOfRooms; i++){
                            options += '<option value="'+i+'">'+i+'</option>';
                        }

                        $('#number-of-rooms option').remove();
                        $('#number-of-rooms').append(options);
                    }else{
                        $('#number-of-rooms option').remove();
                        $('#number-of-rooms').append('<option>'+0+'<option>');
                    }

                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>