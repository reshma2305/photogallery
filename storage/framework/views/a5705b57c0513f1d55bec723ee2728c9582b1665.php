
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
              <li class="breadcrumb-item active">Events</li>
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
              <h3 class="card-title">Cms Pages</h3>
              <a href="<?php echo e(url('admin/add-edit-pages')); ?>" style="max-width: 150px;float:right;display: inline-block;" class="btn btn-block btn-success">Add Pages</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="sections" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Url</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
               <?php $__currentLoopData = $cmsdata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($cms->id); ?></td>
                  <td><?php echo e($cms->title); ?></td>
                  <td><?php echo e($cms->url); ?></td>
                  <td><?php if($cms->status=='1'): ?>
                  		<a class="updateCmsStatus" id="cms-<?php echo e($cms->id); ?>" event_id="<?php echo e($cms->id); ?>" href="javascript:void(0)"><i class="fas fa-toggle-on" aria-hidden="true" status="Active"></i></a>
                  		<?php else: ?>
                  		<a class="updateCmsStatus" id="cms-<?php echo e($cms->id); ?>" event_id="<?php echo e($cms->id); ?>" href="javascript:void(0)"><i class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i></a>
                  		<?php endif; ?>
                  </td>
                  <td>                   
                    <a title="Edit Pages" href="<?php echo e(url('admin/add-edit-pages/'.$cms->id)); ?>"><i class="fas fa-edit"></i></a>
                    &nbsp;&nbsp;          
                   <a title="Delete Pages" href="javascript:void(0)" class="confirmDelete" record="cms" recordid="<?php echo e($cms->id); ?>"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Url</th>
                  <th>Status</th>
                  <th>Actions</th>
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
<?php echo $__env->make('layouts.admin_layout.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\photographer\resources\views/admin/cms_pages/cms.blade.php ENDPATH**/ ?>