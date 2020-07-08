<!-- Main navbar -->
<div class="navbar navbar-inverse bg-indigo">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?php echo e(route('admin.dashboard')); ?>"><img
                    src="" style="height: 25px;" alt=""></a>

        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a>
            </li>


            
            
            
            
            
            

            
            
            
            
            
            
            

            
            
            
            
            
            
            

            
            
            
            
            

            
            
            
            
            
            

            
            
            
            
            

            
            
            
            
            

            
            
            
            
            
            

            
            
            
            
            
            

            
            
            
            
            
            

            
            
            
            
            
            

            
            
            
            
            
            

            
            
            
            
            
            
        </ul>

        <div class="navbar-right">
            <p class="navbar-text">
                <?php
                    $time = date("H");
                    $timezone = date("e");
                    if ($time < "12") {
                        echo "Good morning";
                    } else
                    if ($time >= "12" && $time < "17") {
                        echo "Good afternoon";
                    } else
                    if ($time >= "17" && $time < "19") {
                        echo "Good evening";
                    } else
                    if ($time >= "19") {
                        echo "Good night";
                    }
                ?>,
                <?php echo e(ucwords(Auth::user()->name)); ?>!
            </p>
            <p class="navbar-text"><span class="label bg-success-400">Online</span></p>

            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-bell2"></i>
                        <span class="visible-xs-inline-block position-right">Notification</span>
                        <span class="status-mark border-orange-400"></span>
                    </a>

                    <div class="dropdown-menu dropdown-content">
                        <div class="dropdown-content-heading">
                            Notification
                            <ul class="icons-list">
                                <li><a href="#"><i class="icon-menu7"></i></a></li>
                            </ul>
                        </div>

                        <ul class="media-list dropdown-content-body width-350">
                            <li class="media">
                                <div class="media-left">
                                    <span class="btn bg-success-400 btn-rounded btn-icon btn-xs"><i
                                                class="icon-mention"></i></span>
                                </div>

                                <div class="media-body">
                                    <p>No Notification yet</p>
                                </div>
                            </li>


                        </ul>
                    </div>
                </li>

                
                
                
                
                
                

                
                
                
                
                
                
                

                
                
                
                
                
                
                

                
                
                
                
                

                
                
                

                
                
                
                
                
                

                
                
                
                
                

                
                
                

                
                
                
                
                
                
                
                

                
                
                

                
                
                
                
                
                
                
                

                
                
                

                
                
                
                
                
                
                
                

                
                
                
                

                
                
                
                
                
                
            </ul>
        </div>
    </div>
</div>
<!-- /main navbar -->
