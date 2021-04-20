
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
              <li class="breadcrumb-item active">Products</li>
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
      	<form name="albumForm" id="albumForm" <?php if(empty($albumData['id'])): ?> action="<?php echo e(url('admin/add-edit-album')); ?>" <?php else: ?> action="<?php echo e(url('admin/add-edit-album/'.$albumData['id'])); ?>" <?php endif; ?> method="post"  enctype="multipart/form-data"><?php echo csrf_field(); ?>
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
	                   <option value="<?php echo e($event['id']); ?>" <?php if(!empty($albumData['event_id']) && $albumData['event_id']==$event['id']): ?> selected="" <?php endif; ?>><?php echo e($event['name']); ?><option>
	                   	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                  </select>
	               	</div> 	
	               	<div class="form-group">
	                    <label for="url">Url</label>
	                    <input type="text" class="form-control" name="url" id="url" <?php if(!empty($albumData['url'])): ?> value="<?php echo e($albumData['url']); ?>" <?php else: ?> value="<?php echo e(old('url')); ?>" <?php endif; ?> placeholder="Enter Product name">
	                </div> 		              	
	               	
	              </div>
	              <div class="col-md-6">
	              	<div class="form-group">
	                    <label for="title">Title</label>
	                    <input type="text" class="form-control" name="title" id="title" <?php if(!empty($albumData['title'])): ?> value="<?php echo e($albumData['title']); ?>" <?php else: ?> value="<?php echo e(old('title')); ?>" <?php endif; ?> placeholder="Enter Product name">
	                </div> 
	              	<div class="form-group">
	                    <label for="description">Description</label>
	                    <textarea id="description" name="description" class="form-control" rows="3" placeholder="Enter.."><?php if(!empty($albumData['description'])): ?> <?php echo e($albumData['description']); ?> <?php else: ?> <?php echo e(old('description')); ?> <?php endif; ?></textarea>
	                </div> 	                
	              </div>
	    
	           
	            </div>
	            <div class="row">
	              <div class="col-12 col-sm-6">
	              	  <div class="form-group">
	                    <label for="image">Main Image</label>
	                    <div class="input-group">
	                      <div class="custom-file">
	                        <input type="file" class="custom-file-input" id="image" name="image">
	                        <label class="custom-file-label" for="image">Choose file</label>
	                      </div>
	                      <div class="input-group-append">
	                        <span class="input-group-text" id="">Upload</span>
	                      </div>
	                  	</div>	 
	                  	<?php if(!empty($albumData['image'])): ?>
	                      	<div><img style="height: 60px;margin-top: 5px" src="<?php echo e(asset('images/album_images/small/'.$albumData['image'])); ?>">&nbsp; 
	                      	<a href="<?php echo e(url('admin/delete-album-image/'.$albumData['id'])); ?>">Delete Image</a> 
	                      <!-- 	<a class="confirmDelete" href="javascript:void(0)" record="product-image" recordid="<?php echo e($albumData['id']); ?>">Delete Image</a> -->
	                      </div>
	                    <?php endif; ?>	                 	                                 
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
<?php echo $__env->make('layouts.admin_layout.admin_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\photogallery\resources\views/admin/albums/add_edit_album.blade.php ENDPATH**/ ?>