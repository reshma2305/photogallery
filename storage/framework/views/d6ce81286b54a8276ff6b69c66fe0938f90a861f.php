
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
              <li class="breadcrumb-item active">Product Images</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      	 <?php if($errors->any()): ?>
        <div class="alert alert-danger" style="margin-top: 10px">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
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
        <?php if(Session::has('error_message')): ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 10px">
                    <?php echo e(Session::get('error_message')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
        <?php endif; ?>
      	<form name="addImageForm" id="addImageForm" method="post" action="<?php echo e(url('admin/add-images/'.$AlbumData['id'])); ?>" enctype="multipart/form-data"><?php echo csrf_field(); ?>
          <input type="hidden" name="album_id" value="<?php echo e($AlbumData['id']); ?>">
	        <div class="card card-default">
	          <div class="card-header">
	            <h3 class="card-title"><?php echo e($title); ?></h3>

	            <div class="card-tools">
	              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
	              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
	            </div>
	          </div>
	          <!-- /.card-header -->
	          <div class="card-body">
	            <div class="row">           	              	
	              	<div class="col-md-6">	
                    <div class="form-group">
                        <label for="product_name">Event :</label>
                        <input type="text" name="event_id" value="<?php echo e($AlbumData['event']['id']); ?>">
                        &nbsp;
                        <?php echo e($AlbumData['event']['name']); ?>

                    </div>               	 	
		              	<div class="form-group">
		                    <label for="product_name">Title :</label>&nbsp;
		               			<?php echo e($AlbumData['title']); ?>

		                </div> 	               		              	                   
	              </div>
	             
	              <div class="col-md-6">	                
				        	<div class="form-group">	                   
                    	<div><img style="height: 130px;" src="<?php echo e(asset('images/album_images/small/'.$AlbumData['image'])); ?>">&nbsp; 
                    	</div>	                  		                                      
	                </div>
	              </div>
                <div class="col-md-6">                  
                  <div class="form-group">                     
                     <div class="field_wrapper">
                      <div>
                          <input type="file" name="images[]" id="images" value="" style="width:120px" required="" multiple="" />                          
                      </div>
                  </div>                                                            
                  </div>
                </div>
	            </div>
	          </div>
	          <div class="card-footer">
	            <button type="submit" class="btn btn-primary">Add Images</button>
	          </div>
	        </div>
    	</form>

      <form name="editImageForm" id="editImageForm" method="post" action="<?php echo e(url('admin/edit-images/'.$AlbumData['id'])); ?>"><?php echo csrf_field(); ?>
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Added Product Images</h3>              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="Products" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Image</th>                 
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $AlbumData['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                
                <tr>
                  <td><?php echo e($image['id']); ?></td>                               
                  <td><img src="<?php echo e(asset('images/album_images/small/'.$image['image'])); ?>" style="width: 80px"></td>
                              
                  <td><?php if($image['status']=='1'): ?>
                      <a class="updateImageStatus" id="image-<?php echo e($image['id']); ?>" image_id="<?php echo e($image['id']); ?>" href="javascript:void(0)"><i class="fas fa-toggle-on" aria-hidden="true" status="Active"></i></a>
                      <?php else: ?>
                      <a class="updateImageStatus" id="image-<?php echo e($image['id']); ?>" image_id="<?php echo e($image['id']); ?>" href="javascript:void(0)"> <i class="fas fa-toggle-off" aria-hidden="true" status="Inactive"></i></a>
                      <?php endif; ?>
                      &nbsp;&nbsp;
                      <a title="Delete Image" href="javascript:void(0)" class="confirmDelete" record="image" recordid="<?php echo e($image['id']); ?>"><i class="fas fa-trash"></i></a>
                  </td>                 
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Image</th>                 
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update Images</button>
            </div>
            <!-- /.card-body -->
        </div>
      </form>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layout.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\photographer\resources\views/admin/albums/add_images.blade.php ENDPATH**/ ?>