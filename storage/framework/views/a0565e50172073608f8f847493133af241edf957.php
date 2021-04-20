
<?php $__env->startSection('content'); ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Enquiry</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <!-- /.card -->
          <?php if(Session::has('success_message')): ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 10px">
                    <?php echo e(Session::get('success_message')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
          <?php endif; ?>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Enquiry</h3>
               <a href="<?php echo e(url('admin/enquiry-done')); ?>" style="max-width: 150px;float:right;display: inline-block;" class="btn btn-block btn-success">Old Enquiry Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="sections" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Subject</th>                  
                  <th>Message</th>
                  <th>Created at</th>
                  
                  <!-- <th>Actions</th> -->
                </tr>
                </thead>
                <tbody>
               <?php $__currentLoopData = $enquries_old; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enquriry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($enquriry->id); ?></td>
                  <td><?php echo e($enquriry->name); ?></td>
                  <td><?php echo e($enquriry->email); ?></td>
                  <td><?php echo e($enquriry->subject); ?></td>
                  <td><?php echo e($enquriry->message); ?></td>
                  <td><?php echo e($enquriry->created_at); ?></td>
                 
                
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Subject</th>                  
                  <th>Message</th>
                  <th>Created at</th>
                 
                 <!--  <th>Actions</th> -->
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layout.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\photographer\resources\views/admin/enquiry/old_enquiry_data.blade.php ENDPATH**/ ?>