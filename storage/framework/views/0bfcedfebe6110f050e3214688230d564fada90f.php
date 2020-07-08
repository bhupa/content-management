<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $__env->yieldContent('title'); ?></title>
<meta name="description" content="Seto Gurans National Child Development Services">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="">
<link rel="shortcut icon" href="<?php echo e(asset('frontend/images/favicon.png')); ?>" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?php echo e(asset('frontend/images/apple-touch-icon.png')); ?>" />
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(asset('frontend/images/apple-touch-icon-72x72.png')); ?>" />
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(asset('frontend/images/apple-touch-icon-114x114.png')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/third-party/sidr/css/jquery.sidr.dark.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/third-party/slick/css/slick.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/third-party/slick/css/slick-theme.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/third-party/wow/css/animate.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/third-party/prettyphoto/css/prettyPhoto.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/third-party/accordionjs/css/accordion.min.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/style.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/icons/icons.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('frontend/third-party/fakeloader/fakeLoader.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/custom.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('frontend/css/responsive.css')); ?>">
<link rel="stylesheet" id="color" href="<?php echo e(asset('css/default.css')); ?>">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,600,700" rel="stylesheet">
<?php echo $__env->yieldContent('style_css'); ?>
<style>
.accordion {
	background-color: #eee;
	color: #444;
	cursor: pointer;
	padding: 18px;
	width: 100%;
	border: none;
	text-align: left;
	outline: none;
	font-size: 15px;
	transition: 0.8s;
}
.active, .accordion:hover {
	background-color: #ccc;
}
.panel {
	padding: 0 18px;
	display: none;
	background-color: white;
	overflow: hidden;
}
</style>
</head><body class="home header-v1">
<div class="search_wrap">
  <div class="search_close">X</div>
  <form id="form1" name="form1" method="get" action="<?php echo e(route('search')); ?>" >
    <div class="search_field">
      <input type="text" placeholder="Search" name="q">
       
      
      <!--------------------- FOr Page ----------------------> 
      
      <!--    <script>
    (function() {
      var cx = '000213063822872924663:n9s1q4_ol4k';
      var gcse = document.createElement('script');
      gcse.type = 'text/javascript';
      gcse.async = true;
      gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(gcse, s);
    })();
  </script>
  <gcse:searchresults-only></gcse:searchresults-only>--> 
      
      <!--------------------- FOr Page ----------------------> 
      
    </div>
  </form>
</div>
<div id="page" class="site"> 
  <!-- Mobile main menu --> 
  <a href="#" id="mobile-trigger"><i class="fa fa-list" aria-hidden="true"></i></a>
  <div id ="mob-menu">
    <ul>
      <li  class="<?php if(Request::segment(1)=='' ){echo 'current-menu-item';}?>"><a href="<?php echo e(route('home')); ?>">Home</a> </li>
      <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($content->child->isEmpty()  && $content->parent == ''): ?>
      <li class="<?php if(Request::segment(1)=='content' &&  Request::segment(2)==$content->slug ){
                                    echo 'current-menu-item';
                                }?>"><a href="<?php echo e(route('content.show',[$content->slug])); ?>"><?php echo e($content->title); ?></a> </li>
      <?php else: ?>
      <?php if($content->child->isNotEmpty() && $content->parent == ''): ?>
      <?php $sub_menus = $content->child()->pluck('slug')->toArray();?>
      <li class="menu-item-has-children <?php if(Request::segment(1) == 'content' && (Request::segment(2) == $content->slug || in_array(Request::segment(2), $sub_menus)))
                                           echo'current-menu-item'
                                 ?>"><a href="#"><?php echo e($content->title); ?></a>
        <ul class="sub-menu">
          <?php $__currentLoopData = $content->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><a href="<?php echo e(route('content.show',[$submenu->slug])); ?>"><?php echo e($submenu->title); ?></a></li>
          <?php if($submenu->parent->name == 'About Us'): ?>
          <h1>hello</h1>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php if($submenu->parent->title == 'About Us'): ?>
          <li><a href="<?php echo e(route('teams.index')); ?>">Board of Directors </a></li>
          <li><a href="<?php echo e(route('teams.list')); ?>">Management </a></li>
          <?php endif; ?>
        </ul>
      </li>
      <?php endif; ?>
      <?php endif; ?>
      
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <li class="menu-item-has-children <?php if(Request::segment(1)=='program' ){echo 'current-menu-item';}?>"><a href="#">Programs</a>
        <ul class="sub-menu">
          <?php $__currentLoopData = $programtypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$programtype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><a href="<?php echo e(route('program.list',$key)); ?>"><?php echo e($programtype); ?></a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
          
          
          
        </ul>
      </li>
      <li class="menu-item-has-children <?php if(Request::segment(1)=='organization' ){echo 'current-menu-item';}?>"><a href="#">Sister Organizations</a>
        <ul class="sub-menu">
          <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><a href="<?php echo e(route('organizations.show',[$organization->slug])); ?>"><?php echo e($organization->name); ?></a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </li>
      <li class="<?php if(Request::segment(1)=='gallery' ){echo 'current-menu-item';}?>"><a href="<?php echo e(route('gallery.index')); ?>">Gallery</a> </li>
      <li class="menu-item-has-children "><a href="#">Publication</a>
        <ul class="sub-menu">
          <li><a href="<?php echo e(route('ecds.index')); ?>">ECD in Media</a></li>
          <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><a href="<?php echo e(route('publication.list',$key)); ?>"><?php echo e($type); ?> </a></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          
          
          
          
        </ul>
      </li>
      <li class="<?php if(Request::segment(1)=='blog' ){echo 'current-menu-item';}?>"><a href="<?php echo e(route('blogs.index')); ?>">Blog</a> </li>
      <li class="<?php if(Request::segment(1)=='contact' ){echo 'current-menu-item';}?>"><a href="<?php echo e(route('contact.index')); ?>">Contact</a></li>
    </ul>
  </div>
  <!-- #mob-menu -->
  
  <header id="masthead" class="site-header" >
    <div class="container">
      <div class="site-branding pull-left">
        <div id="site-identity">
          <h1 class="site-title"><a href="<?php echo e(route('home')); ?>"  rel="home"><img alt="logo" src="<?php echo e(asset('frontend/images/logo.png')); ?>"></a></h1>
        </div>
        <!-- #site-identity --> 
      </div>
      
      <!-- .site-branding --> 
      <?php $__currentLoopData = $editcontents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($content->title == 'Donate'): ?> <a href="<?php echo e(route('content.show',[$content->slug])); ?>" Class="custom-button pull-right quick-link-button"> Donate Now </a> <?php endif; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <div class="quick-contact quick-contact-1 pull-right">
        <ul>
          <li class="quick-address">
            <div class="header-box-icon"> <i class="fa fa-phone-square"></i> </div>
            <div class="header-box-info"> <strong>Phone No.</strong> <?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($setting->name == 'Phone'): ?>
              <p><?php echo e($setting->value); ?></p>
              <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </div>
          </li>
        </ul>
      </div>
    </div>
    <!-- .container --> 
  </header>
  <!-- .site-header -->
  <div id ="main-navigation" class="sticky-enabled">
    <div class="scroll-logo"><a href="<?php echo e(route('home')); ?>"><img  src="<?php echo e(asset('frontend/images/favicon.png')); ?>" ></a></div>
    <div class="container">
      <div class="nav-inner-wrapper clear-fix">
        <nav class="main-navigation pull-left">
          <ul>
            <li  class="<?php if(Request::segment(1)=='' ){echo 'current-menu-item';}?>"><a href="<?php echo e(route('home')); ?>">Home</a> </li>
            <?php $__currentLoopData = $contents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($content->child->isEmpty()  && $content->parent == ''): ?>
            <li class="<?php if(Request::segment(1)=='content' &&  Request::segment(2)==$content->slug ){
                                    echo 'current-menu-item';
                                }?>"><a href="<?php echo e(route('content.show',[$content->slug])); ?>"><?php echo e($content->title); ?></a> </li>
            <?php else: ?>
            <?php if($content->child->isNotEmpty() && $content->parent == ''): ?>
            <?php $sub_menus = $content->child()->pluck('slug')->toArray();?>
            <li class="menu-item-has-children <?php if(Request::segment(1) == 'content' && (Request::segment(2) == $content->slug || in_array(Request::segment(2), $sub_menus)))
                                           echo'current-menu-item'
                                 ?>"><a href="#"><?php echo e($content->title); ?></a>
              <ul class="sub-menu">
                <?php $__currentLoopData = $content->child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submenu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(route('content.show',[$submenu->slug])); ?>"><?php echo e($submenu->title); ?></a></li>
                <?php if($submenu->parent->name == 'About Us'): ?>
                <h1>hello</h1>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($submenu->parent->title == 'About Us'): ?>
                <li><a href="<?php echo e(route('teams.index')); ?>">Board of Directors </a></li>
                <li><a href="<?php echo e(route('teams.list')); ?>">Management </a></li>
                <?php endif; ?>
              </ul>
            </li>
            <?php endif; ?>
            <?php endif; ?>
            
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <li class="menu-item-has-children <?php if(Request::segment(1)=='program' ){echo 'current-menu-item';}?>"><a href="#">Programs</a>
              <ul class="sub-menu">
                <?php $__currentLoopData = $programtypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$programtype): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(route('program.list',$key)); ?>"><?php echo e($programtype); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                
                
                
              </ul>
            </li>
            <li class="menu-item-has-children <?php if(Request::segment(1)=='organization' ){echo 'current-menu-item';}?>"><a href="#">Sister Organizations</a>
              <ul class="sub-menu">
                <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(route('organizations.show',[$organization->slug])); ?>"><?php echo e($organization->name); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </li>
            <li class="<?php if(Request::segment(1)=='gallery' ){echo 'current-menu-item';}?>"><a href="<?php echo e(route('gallery.index')); ?>">Gallery</a> </li>
            <li class="menu-item-has-children "><a href="#">Publication</a>
              <ul class="sub-menu">
                <li><a href="<?php echo e(route('ecds.index')); ?>">ECD in Media</a></li>
                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(route('publication.list',$key)); ?>"><?php echo e($type); ?> </a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                
                
                
              </ul>
            </li>
            <li class="<?php if(Request::segment(1)=='blog' ){echo 'current-menu-item';}?>"><a href="<?php echo e(route('blogs.index')); ?>">Blog</a> </li>
            <li class="<?php if(Request::segment(1)=='contact' ){echo 'current-menu-item';}?>"><a href="<?php echo e(route('contact.index')); ?>">Contact</a></li>
          </ul>
        </nav>
        <div class="search_icon"><i class="fa fa-search"></i> Search</div>
      </div>
      <!-- .nav-inner-wrapper --> 
    </div>
    <!-- .container --> 
  </div>
  <!-- #main-navigation --> 
  
  <?php echo $__env->yieldContent('main'); ?> 
  <!-- #content--> 
  <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </div>
<!--#page-->
<div id="btn-scrollup"> <a  title="Go Top"  class="scrollup button-circle" href="#"><i class="fas fa-angle-up"></i></a> </div>
<script  src="<?php echo e(asset('frontend/third-party/jquery/jquery-3.2.1.min.js')); ?>"></script> 
<script  src="<?php echo e(asset('frontend/third-party/jquery/jquery-migrate-3.0.0.min.js')); ?>"></script> 
<!--Include all compiled plugins (below), or include individual files as needed--> 

<script  src="<?php echo e(asset('frontend/third-party/sidr/js/jquery.sidr.js')); ?>"></script> 
<script  src="<?php echo e(asset('frontend/third-party/cycle2/jquery.cycle2.js')); ?>"></script> 
<script  src="<?php echo e(asset('frontend/third-party/slick/js/slick.min.js')); ?>"></script> 
<script  src="<?php echo e(asset('frontend/third-party/wow/js/wow.min.js')); ?>"></script> 
<script  src="<?php echo e(asset('frontend/third-party/counter-up/js/waypoints.min.js')); ?>"></script> 
<script  src="<?php echo e(asset('frontend/third-party/counter-up/js/jquery.counterup.min.js')); ?>"></script> 
<script  src="<?php echo e(asset('frontend/third-party/isotope/js/isotope.pkgd.min.js')); ?>"></script> 
<script  src="<?php echo e(asset('frontend/third-party/prettyphoto/js/jquery.prettyPhoto.js')); ?>"></script> 
<script src="<?php echo e(asset('frontend/third-party/fakeloader/fakeLoader.min.js')); ?>"></script> 
<script  src="<?php echo e(asset('frontend/third-party/accordionjs/js/accordion.min.js')); ?>"></script> 
<script  src="<?php echo e(asset('frontend/third-party/imagesloaded/imagesloaded.pkgd.min.js')); ?>"></script> 
<script  src="<?php echo e(asset('frontend/js/contact.js')); ?>"></script> 
<script  src="<?php echo e(asset('frontend/js/custom.js')); ?>"></script> 
<script  src="<?php echo e(asset('frontend/js/color-switcher.js')); ?>"></script> 
<script  src="<?php echo e(asset('frontend/js/zoom.js')); ?>"></script> 
<?php echo $__env->yieldContent('script'); ?> 
<script type="text/javascript">
    $('.partners-list').slick({

        slidesToShow: 7,
        slidesToScroll: 1 ,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            }

        ]
    });





    $('.recentupdates-list').slick({

        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 510,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]
    });





    $('.labels-ico').slick({

        slidesToShow: 5,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 500,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]

    });

    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
</script> 
<script type="text/javascript">

    $(document).ready(function(){


        $(".search_icon").click(function(){
            $(".search_wrap").slideDown("fast");
       });

         $(".search_close").click(function(){
            $(".search_wrap").slideUp("fast");
       });

          });
  </script>
</body>
</html>
