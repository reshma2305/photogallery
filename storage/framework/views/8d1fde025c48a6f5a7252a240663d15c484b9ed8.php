
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
              <li class="breadcrumb-item active">Album</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
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
              <h3 class="card-title">Album</h3>
              <a href="<?php echo e(url('admin/add-edit-album')); ?>" style="max-width: 150px;float:right;display: inline-block;" class="btn btn-block btn-success">Add Album</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="Album" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Event Name</th>
                  <th>Title</th>
                  <th>Desc</th>                 
                  <th>Image</th>  
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
               <?php $__currentLoopData = $albums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $album): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>              
                <tr>
                  <td><?php echo e($album->id); ?></td>                                             
                  <td><?php echo e($album->event['name']); ?></td>
                  <td><?php echo e($album->title); ?></td>
                  <td><?php echo e($album->description); ?></td>    
                  <td>
                    <?php $album_image_path="images/album_images/small/".$album->image; ?>
                    <?php if(!empty($album->image) && file_exists($album_image_path)): ?>
                    <img src="<?php echo e(asset('images/album_images/small/'.$album->image)); ?>" width="50px">
                    <?php else: ?>
                    <img src="<?php echo e(asset('images/album_images/small/no_image.png')); ?>" width="50px">
                    <?php endif; ?>
                  </td>                                   
                   <td><?php if($album->status=='1'): ?>
                      <a class="updateAlbumStatus" id="album-<?php echo e($album->id); ?>" album_id="<?php echo e($album->id); ?>" href="javascript:void(0)"><i class="fas fa-toggle-on" aria-hidden="true" status="Active"></i></a>
                      <?php else: ?>
                      <a class="updateAlbumStatus" id="album-<?php echo e($album->id); ?>" album_id="<?php echo e($album->id); ?>" href="javascript:void(0)"><i class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i></a>
                      <?php endif; ?>
                  </td>

                  <td>
                   
                    <a title="Add Images" href="<?php echo e(url('admin/add-images/'.$album->id)); ?>"><i class="fas fa-plus-circle"></i></a>
                    &nbsp;&nbsp;
                    <a title="Add Images" href="<?php echo e(url('admin/add-videos/'.$album->id)); ?>"><i class="fas fa-video"></i></a>
                    &nbsp;&nbsp;
                    <a title="Edit Album" href="<?php echo e(url('admin/add-edit-album/'.$album->id)); ?>"><i class="fas fa-edit"></i></a>
                    &nbsp;&nbsp;          
                   <a title="Delete Album" href="javascript:void(0)" class="confirmDelete" record="album" recordid="<?php echo e($album->id); ?>"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Event Name</th>
                  <th>Title</th>
                  <th>Desc</th>                 
                  <th>Image</th>  
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
<?php echo $__env->make('layouts.admin_layout.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\photogallery\resources\views/admin/albums/albums.blade.php ENDPATH**/ ?>