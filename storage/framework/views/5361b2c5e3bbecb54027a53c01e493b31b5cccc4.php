
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Admin Details</h3>
              </div>
              <!-- /.card-header -->
              <?php if(Session::has('error_message')): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px">
                    <?php echo e(Session::get('error_message')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php endif; ?>
              <?php if(Session::has('success_message')): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px">
                    <?php echo e(Session::get('success_message')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
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
              <!-- form start -->
              <form role="form" action="<?php echo e(url('/admin/update-admin-details')); ?>" name="updateAdminDetails" id="updateAdminDetails" method="post" enctype="multipart/form-data"><?php echo csrf_field(); ?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Admin Email</label>
                    <input class="form-control"  readonly="" value="<?php echo e(Auth::guard('admin')->user()->email); ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Admin Type</label>
                    <input class="form-control"  readonly="" value="<?php echo e(Auth::guard('admin')->user()->type); ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" class="form-control" id="admin_name" name="admin_name" placeholder="Enter Name" value="<?php echo e(Auth::guard('admin')->user()->name); ?>">
                    <span id="chkCurrentPwd"></span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <textarea id="admin_add" name="admin_add" rows="2" cols="100"><?php echo e(Auth::guard('admin')->user()->Address); ?></textarea>
                  </div>
                 <div class="form-group">
                    <label for="exampleInputPassword1">Mobile</label>
                    <input type="text" name="admin_mobile" id="admin_mobile" class="form-control" placeholder="Enter Admin Mobile" value="<?php echo e(Auth::guard('admin')->user()->mobile); ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" name="admin_image" id="admin_image" class="form-control" >
                    <?php if(!empty(Auth::guard('admin')->user()->image)): ?>
                      <a target="_blank" href="<?php echo e(url('images/admin_images/admin_photos/'.Auth::guard('admin')->user()->image)); ?>">View Image</a>
                      <input type="hidden" name="current_admin_image" value="<?php echo e(Auth::guard('admin')->user()->image); ?>">
                    <?php endif; ?>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layout.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\photographer\resources\views/admin/update_admin_details.blade.php ENDPATH**/ ?>