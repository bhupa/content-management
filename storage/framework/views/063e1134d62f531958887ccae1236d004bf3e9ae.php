<?php $__env->startSection('title', 'Career Lists'); ?>
<?php $__env->startSection('header_js'); ?> 
<script type="text/javascript">
  $('div.alert').delay(3000).slideUp(300);
</script> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>

<!-- .custom-header -->
<div id="content" class="site-content global-layout-right-sidebar">
  <div class="container">
    <div class="inner-wrapper">
      <div id="primary" class="content-area" style="width:100%">
      
        <main id="main" class="site-main">
          <h1 class="page-title">Career </h1>
          <div class="table-responsive">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="careerpage" class="downloadtable2">
              <tr>
                <th width="5%">SN</th>
                <th width="40%">Job Opening</th>
                <th width="15%">Designation</th>
                <th width="13%">No. of Vacancies</th>
                <th width="13%">Applicable Date</th>
                <th width="10%"></th>
              </tr>
              <?php $__currentLoopData = $careers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$career): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($key  + $careers->firstItem()); ?></td>
                
                <td><div class="text"><a class="" href="<?php echo e(route('career.create',[$career->slug])); ?>"> <?php echo str_limit($career->job_description,'150','...'); ?> </a></div></td>
                  <td><?php echo e($career->position); ?></td>
                <td><?php echo e($career->number); ?></td>
                <td><?php echo e($career->expire_date); ?></td>
                <td><a class="btn btn-sm" href="<?php echo e(route('career.create',[$career->slug])); ?>">View Job</a></td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
          </div>
        </main>
      </div>
      <!-- #primary --> 
      
      <!-- .sidebar --> 
    </div>
    <!-- #inner-wrapper --> 
  </div>
  <!-- .container --> 
</div>
<!--    Services    --> 

<!-- Content area --> 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>