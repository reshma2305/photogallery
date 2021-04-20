
<?php $__env->startSection('content'); ?>
    <div class="site-section"  data-aos="fade">
      <div class="container">

        <div class="row justify-content-center">

          <div class="col-md-7">
            <div class="row mb-5">
              <div class="col-12 ">
                <h2 class="site-section-heading text-center">Contact</h2>
              </div>
            </div>
          </div>

        </div>
        
        <div class="row">
          <div class="col-lg-8 mb-5">
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
           <form action="<?php echo e(url('/contact')); ?>" id="contact-form" name="contact-form" method="post">
                <?php echo e(csrf_field()); ?>

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-white" for="fname">First Name</label>
                  <input type="text" id="fname"  name="fname" class="form-control">
                </div>
                <div class="col-md-6">
                  <label class="text-white" for="lname">Last Name</label>
                  <input type="text" id="lname" name="lname" class="form-control">
                </div>
              </div>

              <div class="row form-group">

                <div class="col-md-12">
                  <label class="text-white" for="email">Email</label> 
                  <input type="email" id="email" name="email" class="form-control">
                </div>
              </div>

              <div class="row form-group">

                <div class="col-md-12">
                  <label class="text-white" for="subject">Subject</label> 
                  <input type="subject" id="subject" name="subject" class="form-control">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-white" for="message">Message</label> 
                  <textarea name="message" id="message" name="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Send Message" class="btn btn-primary py-2 px-4 text-white">
                </div>
              </div>


            </form>
          </div>
          <div class="col-lg-3 ml-auto">
            <?php $__currentLoopData = $adminDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="mb-3">
              <p class="mb-0 font-weight-bold text-white">Address</p>
              <p class="mb-4"><?php echo e($admin['Address']); ?></p>

              <p class="mb-0 font-weight-bold text-white">Phone</p>
              <p class="mb-4"><a href="#"><?php echo e($admin['mobile']); ?></a></p>

              <p class="mb-0 font-weight-bold text-white">Email Address</p>
              <p class="mb-0"><a href="#"><?php echo e($admin['email']); ?></a></p>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </div>

<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.front_layout.front_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\photogallery\resources\views/front/contact.blade.php ENDPATH**/ ?>