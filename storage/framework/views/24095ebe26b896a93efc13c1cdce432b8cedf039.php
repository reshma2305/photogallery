
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
              <li class="breadcrumb-item active">Services</li>
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
      	<form name="albumForm" id="albumForm" <?php if(empty($serviceData['id'])): ?> action="<?php echo e(url('admin/add-edit-service')); ?>" <?php else: ?> action="<?php echo e(url('admin/add-edit-service/'.$serviceData['id'])); ?>" <?php endif; ?> method="post"  enctype="multipart/form-data"><?php echo csrf_field(); ?>
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
	                  <label>Select Event</label>
	                  <select name="event_id" id="event_id" class="form-control select2" style="width: 100%;">
	                    <option value="">Select</option>
	                   <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                   <option value="<?php echo e($event['id']); ?>" <?php if(!empty($serviceData['event_id']) && $serviceData['event_id']==$event['id']): ?> selected="" <?php endif; ?>><?php echo e($event['name']); ?><option>
	                   	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                  </select>
	               	</div> 	
	               	<div class="form-group">
	                    <label for="no_of_photos">No of Photos Range</label>
	                    <input type="text" class="form-control" name="no_of_photos" id="no_of_photos" <?php if(!empty($serviceData['no_of_photos'])): ?> value="<?php echo e($serviceData['no_of_photos']); ?>" <?php else: ?> value="<?php echo e(old('no_of_photos')); ?>" <?php endif; ?> placeholder="Enter Product name">
	                </div> 		              	
	               	
	              </div>
	              <div class="col-md-6">
	              	
                   <div class="form-group">
                      <label for="type">Type of Plan</label>
                      <select name="type" id="type" class="form-control select2" style="width: 100%;">
                      <option value="">Select</option>
                      <option value="Basic">Basic</option>
                      <option value="Intermediate">Intermediate</option>
                      <option value="Advance">Advance</option>
                    </select>
                     
                  </div>                    
                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="text" class="form-control" name="price" id="price" <?php if(!empty($serviceData['price'])): ?> value="<?php echo e($serviceData['price']); ?>" <?php else: ?> value="<?php echo e(old('price')); ?>" <?php endif; ?> placeholder="Enter Product name">
                  </div>           
	              	             
	              </div>
	    
	           
	            </div>
	     
	          </div>
	          <div class="card-footer">
	            <button type="submit" class="btn btn-primary">Submit</button>
	          </div>
	        </div>
    	</form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin_layout.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\photogallery\resources\views/admin/services/add_edit_service.blade.php ENDPATH**/ ?>