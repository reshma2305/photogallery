
<?php $__env->startSection('content'); ?>
<div class="row">
        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php 
          $album_image_path='images/album_images/small/'.$event['album']['image'];
          $album_largeimage_path='images/album_images/medium/'.$event['album']['image'];
        ?>
        <div class="col-lg-4">

          <div class="image-wrap-2">
            <div class="image-info">
              <h2 class="mb-3"><?php echo e($event['name']); ?></h2>
              <a href="<?php echo e(url('/gallery/'.$event['id'])); ?>" class="btn btn-outline-white py-2 px-4">More Photos</a>
            </div>

            <img src="<?php echo e($album_largeimage_path); ?>" alt="Image" class="img-fluid">
          </div>

        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front_layout.front_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\photogallery\resources\views/front/index.blade.php ENDPATH**/ ?>