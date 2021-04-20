<?php
    use App\Event;
    $events=Event::event();
     //echo "<pre>";print_r($events); die;

    ?>  

   <header class="site-navbar py-3" role="banner">

      <div class="container-fluid">
        <div class="row align-items-center">

          <div class="col-6 col-xl-2" data-aos="fade-down">
            <h6 class="mb-0"><a href="<?php echo e(url('./')); ?>" class="text-white h2 mb-0"><img src="images/Photography.png" style="max-width: 100%;"></a></h6>
          </div>
          <div class="col-10 col-md-8 d-none d-xl-block" data-aos="fade-down">
            <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">

              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li class="active"><a href="<?php echo e(url('./')); ?>">Home</a></li>
                <li class="has-children">
                  <a href="#">Gallery</a>                 
                  <ul class="dropdown">
                    <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(url('/gallery/'.$event['id'])); ?>"><?php echo e($event['name']); ?></a></li>                  
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>                 
                </li>
                <li><a href="<?php echo e(url('/services')); ?>">Services</a></li>
                <li><a href="<?php echo e(url('/about-us')); ?>">About</a></li>
                <li><a href="<?php echo e(url('/contact')); ?>">Contact</a></li>
              </ul>
            </nav>
          </div>

          <div class="col-6 col-xl-2 text-right" data-aos="fade-down">
            <div class="d-none d-xl-inline-block">
              <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
                <li>
                  <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                </li>
                <li>
                  <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                </li>
                <li>
                  <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                </li>
                <li>
                  <a href="#" class="pl-3 pr-3"><span class="icon-youtube-play"></span></a>
                </li>
              </ul>
            </div>

            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header><?php /**PATH C:\xampp\htdocs\photogallery\resources\views/layouts/front_layout/front_header.blade.php ENDPATH**/ ?>