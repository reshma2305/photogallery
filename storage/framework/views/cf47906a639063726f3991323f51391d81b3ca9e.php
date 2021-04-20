
<?php $__env->startSection('content'); ?>
    <div class="site-section"  data-aos="fade">
      <div class="container-fluid">

        <div class="row justify-content-center">

          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-12 ">
                <h2 class="site-section-heading text-right">Gallery</h2>
              </div>
            </div>
          </div>
    

        </div>
        <div class="row">
          <?php $__currentLoopData = $albumVideos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $albumVideo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php $__currentLoopData = $albumVideo['videos']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php 
            $album_image_path='videos/event_videos/'.$video['video'];
           
            $album_largeimage_path='videos/event_videos/'.$video['video'];
             //echo $album_largeimage_path."string";
          ?>
          <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item">
            <a href="#"><video width="400" height="440" controls preload="metadata">
              <source src="<?php echo e(URL::asset($album_image_path)); ?>" type="video/mp4">
            </video></a>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>

    <div class="footer py-4">
      <div class="container-fluid text-center">
        <p>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
      </div>
    </div>

   <?php $__env->stopSection(); ?> 

    
    
 
<?php echo $__env->make('layouts.front_layout.front_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\photogallery\resources\views/front/Videos.blade.php ENDPATH**/ ?>