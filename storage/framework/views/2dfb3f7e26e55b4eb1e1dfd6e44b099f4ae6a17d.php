<!--
Author: http://webthemez.com
Note: Donate to remove backlink/credits in the footer(webthemez.com)--
Any help: webthemez@gmail.com
Licence: Creative Commons Attribution 3.0** - http://creativecommons.org/licenses/by/3.0/
-->
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<title>Wow Portfolio Multi Purpose HTML5 Template | Webthemez</title>
<link rel="icon" href="favicon.png" type="image/png">
<link href="<?php echo e(asset('css/front_css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo e(asset('js/front_js/fancybox/jquery.fancybox.css')); ?>" type="text/css" media="screen" />
<link href="<?php echo e(asset('css/front_css/style.css')); ?>" rel="stylesheet" type="text/css"> 
<link href="<?php echo e(asset('css/front_css/font-awesome.css')); ?>" rel="stylesheet" type="text/css"> 
<link href="<?php echo e(asset('css/front_css/animate.css')); ?>" rel="stylesheet" type="text/css">
 
<!--[if lt IE 9]>
    <script src="js/respond-1.1.0.min.js"></script>
    <script src="js/html5shiv.js"></script>
    <script src="js/html5element.js"></script>
<![endif]-->
 
</head>
<body>

<!--Hero_Section-->
<div class="container-fluid">
   <div class="row">
    <div class="col-lg-12">
     <img src="images/Banner_Photography.jpg">       
      <a href="#aboutUs" class="read_more2">Who Am I</a> 
     </div>
    </div>       
</div>
<!--Hero_Section--> 

<!--Header_section-->
<header id="header_wrapper">
  <div class="container">
    <div class="header_box">
      <div class="logo"><a href="#"><img src="img/logo.png" alt="logo" height="45px"></a></div>
	  <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
	    <div id="main-nav" class="collapse navbar-collapse navStyle">
			<ul class="nav navbar-nav" id="mainNav">
			  <li class="active"><a href="#hero_section" class="scroll-link">Home</a></li>
        <li><a href="#Portfolio" class="scroll-link">Gallery</a></li>
			  <li><a href="#aboutUs" class="scroll-link">About Me</a></li>
			 <!--  <li><a href="#service" class="scroll-link">Skills</a></li>
			  
			  <li><a href="#clients" class="scroll-link">Experience</a></li>
			  <li><a href="#team" class="scroll-link">Testimonial</a></li> -->
			  <li><a href="#contact"  class="scroll-link">Contact</a></li>
			</ul>
      </div>
	 </nav>
    </div>
  </div>
</header>
<!--Header_section--> 

<!-- Portfolio -->
<section id="Portfolio" class="content"> 
  
  <!-- Container -->
  <div class="container portfolio_title"> 
    
    <!-- Title -->
    <div class="section-title">
      <h2>Gallery</h2>

    </div>
    <!--/Title --> 
    
  </div>
  <!-- Container -->
  
  <div class="portfolio-top"></div>
  
  <!-- Portfolio Filters -->
  <div class="portfolio">     
    <div id="filters" class="sixteen columns">
      <ul class="clearfix">
        <li><a id="all" href="#" data-filter="*" class="active">
          <h5>All</h5>
          </a></li>
        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <li><a class="" href="#" data-filter=".<?php echo e($event['id']); ?>">
          <h5><?php echo e($event['name']); ?></h5>
          </a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
    <!--/Portfolio Filters --> 
     <?php //echo "<pre>"; print_r($albums);  ?>
   
    <!-- Portfolio Wrapper -->
    <div class="isotope fadeInLeft animated wow grid" style="position: relative; overflow: hidden; height: 480px;" id="portfolio_wrapper">
    <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php $__currentLoopData = $album['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php 
          $album_image_path='images/album_images/small/'.$image['image'];
          $album_largeimage_path='images/album_images/large/'.$image['image'];
        ?>
        <?php if(!empty($image['image']) && file_exists($album_image_path)): ?>     
        <!-- Portfolio Item-->
        <figure style="position: absolute; left: 0px; top: 0px; transform: translate3d(337px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four  <?php echo e($image['event_id']); ?> isotope-item effect-oscar">
            <div class="portfolio_img"> <img src="<?php echo e(asset($album_image_path)); ?>" alt="Portfolio 1"> </div>
            <figcaption>    
            <div>
              <a href="<?php echo e(asset($album_largeimage_path)); ?>" class="fancybox"> 
              <h2><?php echo e($album['title']); ?></h2>
              <p><?php echo e($album['description']); ?></p>
              </a>
            </div>
            </figcaption>
          </figure>
        <!--/Portfolio Item -->
        <?php endif; ?>
      <!--/Portfolio Wrapper --> 
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </div>
  
  </div>
  <!--/Portfolio Filters -->
  
  <div class="portfolio_btm"></div>
  
  
  <div id="project_container">
    <div class="clear"></div>
    <div id="project_data"></div>
  </div>
  
</section>
<!--/Portfolio --> 


<section id="aboutUs"><!--Aboutus-->
  <div class="inner_wrapper aboutUs-container fadeInLeft animated wow">
    <div class="container">

    <?php $__currentLoopData = $cmsdetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    
    <div class="inner_section"> 
	  <div class="row">
						<div class="col-lg-12 about-us">
							<div class="row">
							<div class="col-md-4"> 
                <?php $__currentLoopData = $adminDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php 
                  $admin_image_path='images/admin_images/admin_photos/'.$admin['image'];
                  
                ?>
                <img class="img-responsive" src="<?php echo e($admin_image_path); ?>" align=""> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div><!-- /.col-md-6 -->

								<div class="col-md-8">
									<p>
                      <?php echo $cms['description']; ?>       
                  </p>
								 
								</div><!-- /.col-md-6 -->
								
							</div><!-- /.row -->	
						</div><!-- /.col-lg-12 -->
					</div>
      
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div> 
  </div>
</section>
<!--Aboutus--> 



<!--Footer-->
<footer class="footer_wrapper" id="contact">
  <div class="container">
    <section class="page_section contact" id="contact">
      <div class="contact_section">
        <h2>Get In Touch</h2>
	
      </div>
      <div class="row">
        <div class="col-lg-4 wow fadeInLeft">	
        <?php $__currentLoopData = $adminDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    		 <div class="contact_info">
              <div class="detail">
                  <h4>UNIQUE Infoway</h4>
                  <p><?php echo e($admin['Address']); ?></p>
              </div>
              <div class="detail">
                  <h4>call us</h4>
                  <p><?php echo e($admin['mobile']); ?></p>
              </div>
              <div class="detail">
                  <h4>Email us</h4>
                  <p><?php echo e($admin['email']); ?></p>
              </div> 
          </div>
       		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <ul class="social_links">
            <li class="twitter animated bounceIn wow delay-02s"><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
            <li class="facebook animated bounceIn wow delay-03s"><a href="https://www.facebook.com/reshma.sawant.18294"><i class="fa fa-facebook"></i></a></li>
            <li class="pinterest animated bounceIn wow delay-04s"><a href="javascript:void(0)"><i class="fa fa-pinterest"></i></a></li>
            <li class="gplus animated bounceIn wow delay-05s"><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li> 
          </ul>
        </div>


        <div class="col-lg-8 wow fadeInLeft delay-06s">
          <?php if(Session::has('flash_message_success')): ?>
              <div class="alert alert-success alert-block">
                  <button type="button" class="close" data-dismiss="alert">×</button> 
                      <strong><?php echo session('flash_message_success'); ?></strong>
              </div>
            <?php endif; ?> 

            <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
          <?php endif; ?>
          <div class="status alert alert-success" style="display: none"></div>
            <form action="<?php echo e(url('/contact')); ?>" id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                <?php echo e(csrf_field()); ?>

            <div class="form">
              <input class="input-text" type="text" name="name" value="Your Name *" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
              <input class="input-text" type="text" name="email" value="Your E-mail *" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
              <input class="input-text" type="text" name="subject" value="Your Subject *" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">
              <textarea class="input-text text-area" name="message" cols="0" rows="0" onFocus="if(this.value==this.defaultValue)this.value='';" onBlur="if(this.value=='')this.value=this.defaultValue;">Your Message *</textarea>
              <input class="input-btn" type="submit" value="send message" name="submit">
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
  <div class="container">
    <div class="footer_bottom"><span>Copyright © 2015,    Template by <a href="http://webthemez.com">WebThemez.com</a>. </span> </div>
  </div>
</footer>

<script type="text/javascript" src="<?php echo e(asset('js/front_js/jquery-1.11.0.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/front_js/bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/front_js/jquery-scrolltofixed.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/front_js/jquery.nav.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('js/front_js/jquery.easing.1.3.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('js/front_js/jquery.isotope.js')); ?>"></script>
<script src="<?php echo e(asset('js/front_js/fancybox/jquery.fancybox.pack.js')); ?>" type="text/javascript"></script> 
<script type="text/javascript" src="<?php echo e(asset('js/front_js/wow.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('js/front_js/custom.js')); ?>"></script>

</body>
</html><?php /**PATH C:\xampp\htdocs\photographer\resources\views/front/index.blade.php ENDPATH**/ ?>