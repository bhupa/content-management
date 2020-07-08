<?php $__env->startSection('title', 'Board of Directors'); ?>
<?php $__env->startSection('header_js'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?> 

<!-- .site-header --> 

<!-- #main-navigation -->
<div id="custom-header">
  <div class="custom-header-content">
    <div class="container">
      <h1 class="page-title">Board of Directors</h1>
      <div id="breadcrumb">
        <div  aria-label="Breadcrumbs" class="breadcrumbs breadcrumb-trail">
          <ul class="trail-items">
            <li class="trail-item trail-begin"><i class="fas fa-home mrg15"></i><a href="<?php echo e(route('home')); ?>" rel="home"><span>Home</span></a></li>
            <li class="trail-item trail-end"><span>Board of Directors</span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="content" class="site-content global-layout-right-sidebar">
  <div class="container">
    <div class="inner-wrapper">
      <div id="primary" class="content-area">
        <h2>Founding Members</h2>
        <div class="row"> <?php $__currentLoopData = $boards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $board): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-grid-3">
            <div class="team"> <?php if(file_exists('storage/'.$board->image)  && $board->image != ''): ?> <img  src="<?php echo e(asset('storage/'.$board->image)); ?>" alt="<?php echo e($board->name); ?>" style="margin-bottom:10px; "> <?php endif; ?>
              <div class="team_name"><?php echo e($board->name); ?> <br>
                <span><?php echo e($board->position); ?></span></div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </div>
        <div class="clear"></div>
        <h2>Central Executive Board</h2>
        <div class="row"> <?php $__currentLoopData = $executives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $board): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-grid-3">
            <div class="team"> <a href="#"> <?php if(file_exists('storage/'.$board->image)  && $board->image != ''): ?> <img  src="<?php echo e(asset('storage/'.$board->image)); ?>" alt="<?php echo e($board->name); ?>" style="margin-bottom:10px; "> <?php endif; ?> </a>
              <div class="team_name"><a href="<?php echo e(route('teams.show',[$board->id])); ?>"><?php echo e($board->name); ?></a> <span><?php echo e($board->position); ?></span> </div>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </div>
        <div class="clear"></div>
        <h2>Former Board of Directors</h2>
        <table class="table datatable-column-search-inputs defaultTable">
          <thead>
            <tr>
              <th>S. No.</th>
              <th style="text-align:left; padding-left:15px;">Name</th>
              <th>Period</th>
            </tr>
          </thead>
          <tbody id="sortable">
          
          <?php $__currentLoopData = $formermember; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr id="item-<?php echo e($member->id); ?>">
            <td><?php echo e($key+1); ?></td>
            <td style="text-align:left; padding-left:15px;"><?php echo e($member->name); ?></td>
            <td><?php echo e($member->period); ?></td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          
          <tfoot>
        </table>
      </div>
      
      <!-- #primary --> 
      <?php echo $__env->make('frontend.inc.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
      <!-- .sidebar --> 
    </div>
    <!-- #inner-wrapper --> 
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