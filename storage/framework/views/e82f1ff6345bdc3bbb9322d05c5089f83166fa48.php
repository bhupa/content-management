<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo config('app.name'); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
    <script src="<?php echo e(asset('js/admin.js')); ?>"></script>

</head>

<body class="login-container">

<div class="page-container">

    <div class="page-content">

        <div class="content-wrapper">

            <div class="content pb-20">

                <form action="" method="post">
                    <div class="panel panel-body login-form">

                        <div class="text-center">
                            <div class=" border-warning-400 text-warning-400">
                                <img src="" style="width: 80%;">
                            </div>
                            <br>
                            <h5 class="content-group-lg">Login to your account
                            </h5>
                        </div>

                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger alert-styled-left alert-bordered">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <?php if(Session::has('flash_error')): ?>
                            <div class="alert alert-danger alert-styled-left alert-bordered">
                                <?php echo e(Session::get('flash_error')); ?>

                            </div>

                        <?php endif; ?>

                        <?php if(Session::has('flash_notice')): ?>
                            <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                                <?php echo e(Session::get('flash_notice')); ?>

                            </div>
                        <?php endif; ?>


                        <div class="form-group has-feedback has-feedback-left">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted"></i>
                            </div>
                        </div>

                        
                            
                                
                                    
                                        
                                        
                                    
                                

                                
                                    
                                
                            
                        
                        <div class="form-group">
                            <button type="submit" class="btn bg-green-400 btn-block">Login <i
                                        class="icon-arrow-right14 position-right"></i></button>
                        </div>
                    </div>
                    <?php echo csrf_field(); ?>

                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
